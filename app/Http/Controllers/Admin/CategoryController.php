<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Hash;
class CategoryController extends Controller
{
    public $parentView = "category";


    public function index()
    {
        $data['users'] = Category::all();
        $data['action'] = 'index';
        return view($this->parentView.'.index',$data);
        
    }

    public function create()
    {
        $data['action'] = 'create';
        return view($this->parentView.'.create',$data);
        
    }

    public function edit($id)
    {
        $data['user'] = Category::find($id);
        $data['action'] = "edit";
        return view($this->parentView.'.create',$data);
    }       

    public function store(Request $request,$id =null)
    {
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        category::updateOrCreate(['id'=>$id],[
            'name'=>$name,
            'email'=>$email,
            'password'=>Hash::make($password)
        ]);
        return redirect()->back();
    }   

    public function delete($id)
    {
     Category::where('id',$id)->delete();
        return redirect()->back();
    }       

    public function trashed()
    {
        $data['users'] = Category::onlyTrashed()->get();
        $data['action'] = 'trash';
        return view($this->parentView.'.index',$data);
       
    }

   public function restore($id)
   {
    Category::where('id',$id)->restore();
    return redirect()->back();
   }


   public function destory($id)
   {
    Category::where('id',$id)->forceDelete();
    return redirect()->back();
   }

   
   

}
