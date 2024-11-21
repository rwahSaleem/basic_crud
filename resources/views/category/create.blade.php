@extends('layouts.app')
@section('header')
    @include('partials.header')
@stop
@section('footer')
    @include('partials.footer')
@stop
@section('sidebar')
    @include('partials.sidebar')
@stop
@section('content')
@php
    
if($action == 'create')
{
    $parentRoute=route('category.store');
    $parentButton='Insert Record';
    $parentHeading='Insert Record';
}
else{
    $parentRoute=route('category.store',$user->id);
    $parentButton='Update Record';
    $parentHeading='Update Record';
}
@endphp
<div class="container">

    <form action="{{$parentRoute}}" method="POST">
        @csrf
        <h1 class="mt-3 text-center">{{$parentHeading}}</h1>
        <input type="text" placeholder="Your Name" name="name" class="form-control mt-3">
        <input type="text" placeholder="Your Email" name="email" class="form-control mt-3">
        <input type="text" placeholder="Your Password" name="passsword" class="form-control mt-3">
        <button type="submit" class="btn btn-warning mt-3">{{$parentButton}}</button>
    </form>
</div>

@stop
@push('js')
<script>
   let users = @json($user??'');
   console.log(users.name)
   let action = "{{$action}}";
   if(action == 'edit'){
    let name = $(`input[name="name"]`);
    let email = $(`input[name="email"]`);

    name.val(users.name)
    email.val(users.email)
   }
   
</script>
@endpush














