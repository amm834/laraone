@extends('layouts.app')
@section('title','Show All Posts')
@section('content')
<div class="container">
  <h1 class="display-6">Edit Posts</h1>
  @foreach($errors->all() as $error)
  <div class="alert alert-danger">
    {{$error}}
  </div>
  @endforeach
   <form method="post">
     @if(session('status'))
     <div class="alert alert-success">
       {{session('status')}}
     </div>
     @endif
    @csrf
    <div class="form-group">
      <label>Post Title</label>
      <input type="text" class="form-control" name="title" value="{{$post->title}}">
    </div>
    <div class="form-group">
      <label>Post Content</label>
      <textarea type="text" class="form-control" name="content" rows="5">
        {{$post->content}}
      </textarea>
    </div>
    <button class="btn btn-success mt-3" type="submit">
      Update
    </button>
  </form>
</div>
@endsection