<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RoleFormRequest;
use Spatie\Permission\Models\Role;
use App\Models\User;
class AdminController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index() {
    //
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create() {
    return view('roles.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(RoleFormRequest $request) {
    Role::create([
      'name' => $request->get('name')
    ]);
    return redirect(url('admin\roles/create'))->with('status', 'New Role created!');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show() {
    $users = User::all();
    return view('users.index', compact('users'));
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id) {
    $user = User::whereId($id)->firstOrFail();
    $roles = Role::all();
    /* Change To Array */
    $selects = $user->roles()->pluck('name')->toArray();
    return view('roles.edit',compact('user','roles','selects'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id) {
    $user = User::whereId($id)->firstOrFail();
    $user->syncRoles($request->get('role'));
    $user->update();
    return redirect(action('Admin\AdminController@update',$id))->with('status','Successfully Updated');
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
  
  /* Delete */
  
  public function delete($id) {
    $user = User::whereId($id)->firstOrFail();
    $user->delete();
    return redirect('admin/users');
  }
  
}