<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use App\Http\Requests\TagUpdateRequest;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tag=Tag::search($request->name)->orderBy('id','ASC')->paginate(5);
        return view('admin.tags.index')->with('tags',$tag);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        $tag=new Tag($request->all());
        if ($tag->save()) {
          flash("El Tag <b>{$tag->name}</b> fue creado correctamente..!")->success();
          return redirect()->route('tags.index');
        } else {
          flash("El Tag <b>{$tag->name}</b> no pudo ser creado..!")->error();
          return redirect()->route('tags.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit')->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(TagUpdateRequest $request, Tag $tag)
    {
      $tag->name=$request->name;
      if ($tag->save()) {
        flash("El Tag <b>{$tag->name}</b> fue editado correctamente..!")->success();
        return redirect()->route('tags.index');
      } else {
        flash("El Tag <b>{$tag->name}</b> no pudo ser editado..!")->error();
        return redirect()->route('tags.edit',[$tag]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
      if($tag->delete()):
        flash("El Tag <b>{$tag->name}</b> se ha Eliminado Correctamente..!")->success();
        return redirect()->route('tags.index');
      else:
        flash("El Tag <b>{$tag->name}</b> no se pudo eliminar")->error();
        return redirect()->route('tags.index');
      endif;
    }
}
