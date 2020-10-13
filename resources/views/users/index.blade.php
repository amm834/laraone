@extends('layouts.app')
@section('title','Users')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <h1 class="display-5 mt-3">All Users</h1>
    <div class="card border-0 overflow-auto">
      <div class="card-body">
        <table class="table  table-hover">
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th colspan="2" class="text-center">Manage User</th>
          </tr>
          <tbody>
            @foreach($users as $user)
            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td class="text-center">
                <a class="btn btn-info text-light" href="{{action('Admin\AdminController@edit',$user->id)}}">
                  Edit
                </a>
              </td>
              <td  class="text-center">
                <a href="{{action('Admin\AdminController@delete',$user->id)}}" class="btn btn-danger">
                  Delete
                </a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>
@endsection