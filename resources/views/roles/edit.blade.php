@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          Create Role
        </div>
        <form class="card-body" method="post">
          @csrf
          @foreach($errors->all() as $error)
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{$error}}
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
          </div>
          @endforeach
          @if(session('status'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('status')}}
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
          <div class="mb-3">
            <label for="name" class="form-label"><b>Username</b> : </label>
            {{$user->name}}
          </div>
          <div class="form-group mb-2">
            <label>Choose Role</label>
            <select name="role" class="form-control">
              @foreach($roles as $role)
              <option value="{{$role->name}}"
                @if(in_array($role->name,$selects))
                selected
                @endif
                >
                {{$role->name}}
              </option>
              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Change</button>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection