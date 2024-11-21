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

<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td scope="row">{{$user->name}}</td>
                <td>{{$user->email}}</td>
                @if($action =='index')
                <td><a href="{{route('user.edit',$user->id)}}">Edit</a> || <a href="{{route('user.delete',$user->id)}}">Delete</a></td>
                @else
                <td><a href="{{route('user.restore',$user->id)}}">Restore</a> || <a href="{{route('user.destory',$user->id)}}">Destory</a></td>
                @endif                
            </tr>
                
            @endforeach
        </tbody>
</table>

@stop