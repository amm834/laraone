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
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
          </div>
          <button type="submit" class="btn btn-primary">Create</button>
        </form>

      </div>
    </div>
  </div>
</div>
@endsection