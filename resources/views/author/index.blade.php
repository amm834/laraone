@extends('layouts.app')
@section('title','Show All Post')
@section('content')
<div class="container">
  @if(session('status'))
  <div class="alert alert-success">
    {{session('status')}}
  </div>
  @endif
  <div class="row row-cols-1 row-cols-md-3 g-4">
    @foreach($posts as $post)
  <div class="col">
    <div class="card h-100">
      <div class="card-body">
        <div class="card-title">
          {{$post->title}}
        </div>
        <p class="card-text">
          {{$post->content}}
          </p>
      </div>
     <div>
       <a href="{{action('PostAuthor\PostCreator@show',$post->id)}}" class="btn btn-success m-2">
         Edit
       </a>
       <a href="{{action('PostAuthor\PostCreator@delete',$post->id)}}" class="btn btn-danger m-2">
         Delete
       </a>
       
     </div>
      <div class="card-footer">
        <small class="text-muted">
          <b>Created at</b>&nbsp;
        {{$post->created_at}}
        </small>
      </div>
    </div>
  </div>
  @endforeach
</div>
</div>
@endsection