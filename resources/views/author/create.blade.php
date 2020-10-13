@extends('layouts.app')
@section('title','Create Post')
@section('content')
<div class="container">
  <h1 class="display-6">Create Post</h1>
     @if(session('status'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{session('status')}}
      </div>
      @endif
  <form method="post" class="mt-3">
    @csrf
    
    @foreach($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{$error}}
      <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
    </div>
    @endforeach
      <div class="form-group my-2">
        <label>Title</label>
        <input type="text" name="title" class="form-control">
      </div>
      <div class="form-group">
        <label>Content</label>
        <textarea type="text" name="content" class="form-control" rows="5"></textarea>
      </div>
      <button type="submit" class="btn btn-primary float-right my-2">Post</button>
    </form>
  </div>
  @endsection