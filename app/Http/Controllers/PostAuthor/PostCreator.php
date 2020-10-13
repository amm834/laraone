<?php

namespace App\Http\Controllers\PostAuthor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Http\Requests\PostFormRequest;
class PostCreator extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index() {
    $posts = Post::all();
    return view('author.index',compact('posts'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create() {
    //
    return view('author.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(PostFormRequest $request) {
    $user = Auth::user()->name;
    Post::create([
      'title' => $request->get('title'),
      'content' => $request->get('content'),
      'author' => $user
    ]);
    return redirect('post/create')->with('status', 'You Posted Successfully!');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id) {
   $post = Post::whereId($id)->firstOrFail();
    return view('author.edit',compact('post'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id) {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(PostFormRequest $request, $id) {
    
    $post = Post::whereId($id)->firstOrFail();
    $post->title = $request->get('title');
    $post->content = $request->get('content');
    $post->update();
    
    return redirect('post')->with('status','Success');
    
    
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id) {
    //
  }
  function delete($id){
    $user = Post::whereId($id)->firstOrFail();
    $user->delete();
    return redirect('/post')->with('status','Successfully Deleted!');
  }
}