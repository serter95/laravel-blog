<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::orderBy('id', 'ASC')->paginate(5);
        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
      $user= new User($request->all());
      $user->password=bcrypt($request->password);
      if($user->save()):
        flash("El Usuario <b>{$user->name}</b> se ha Registrado Correctamente..!")->success();
        return redirect()->route('users.index');
      else:
        flash("El Usuario <b>{$user->name}<b> No se Pudo Crear")->error();
        return redirect()->route('users.create');
      endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, User $user)
    {
      $user->name=$request->name;
      $user->email=$request->email;
      $user->password=bcrypt($request->password);
      $user->type=$request->type;
      if ($user->save()):
        flash("El usuario <b>{$user->name}</b> fue editado correctamente..!")->success();
        return redirect()->route('users.index');
      else:
        flash("El usuario <b>{$user->name}</b> no se pudo editar")->error();
        return redirect()->route('users.edit', [$user]);
      endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->delete()):
          flash("El Usuario <b>{$user->name}</b> se ha Eliminado Correctamente..!")->success();
          return redirect()->route('users.index');
        else:
          flash("El Usuario <b>{$user->name}</b> no se pudo eliminar")->error();
          return redirect()->route('users.index');
        endif;
    }
}
