<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class UserController extends Controller
{
  public $parentView = "adminuser";

     public function index()
     {
       //user ka record show hora ha he
      $data['users'] =  User::all();
      $data['action']='index'; 
      return view($this->parentView.'.index',$data);
    }

    public function create()
    {
      //form show hora ha he
      $data['action']="create";
      return view($this->parentView.'.create',$data);
    }

    public function edit($id)
    {
      //data update hora ha he
      $data['user'] = User::find($id);
      $data['action']="edit";
      return view($this->parentView.'.create',$data);
    }

    public function store(Request $request,$id=null)
    {
      $name = $request->name;
      $email = $request->email;
      $password = $request->password;

      User::updateOrCreate(['id'=>$id],[
        'name'=>$name,
        'email'=>$email,
        'password'=>Hash::make($password)
        
      ]);
      return redirect()->back();
    }

    public function delete($id)
    {
      //delete se data trash me move hora ha he
      User::where('id',$id)->delete();
      return redirect()->back();
    }

    public function trashed(Request $req)
    {
      //trash me data show hora ha he 
      $data['users'] = User::onlyTrashed()->get();
      $data['action']='trash';
      return view($this->parentView.".index",$data);

    }

    public function restore($id)
    {
      //restore se data dobara index me show hora ha he
      User::where('id',$id)->restore();
      return redirect()->back();
    }
    
    public function destroy($id)
    {
      //destory se data permenently delete hora ha he
      User::where('id',$id)->forceDelete();
      return redirect()->back();
    }
}
