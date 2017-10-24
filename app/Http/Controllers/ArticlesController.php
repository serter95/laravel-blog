<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Tag;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\ArticleUpdateRequest;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles=Article::search($request->title)->orderBy('id','DESC')->paginate(5);
        $articles->each(function ($articles){
          $articles->category;
          $articles->user;
        });

        return view('admin.articles.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::orderBy('name','ASC')->pluck('name', 'id');
        $tags=Tag::orderBy('name','ASC')->pluck('name', 'id');
        return view('admin.articles.create')
        ->with('categories',$categories)
        ->with('tags',$tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        //Manipulacion de imagenes
        $file=$request->file('image');
        if ($file):
          $path=public_path().'/images/articles/';
          $nombreImg='BlogOnline_'.time().'.'.$file->getClientOriginalExtension();
          $file->move($path, $nombreImg);
        endif;

        $article=new Article($request->all());
        $article->user_id=\Auth::user()->id;

        if($article->save()):
          $article->tag()->sync($request->tags);
          if ($file):
            $image=new Image();
            $image->name=$nombreImg;
            $image->article()->associate($article);
            if ($image->save()):
              flash("El Artículo <b>{$article->title}</b> fue creado con imagen correctamente..!")->success();
            else:
              flash("El Artículo <b>{$article->title}</b> fue creado sin imagen..!")->warning();
            endif;
          else:
            flash("El Artículo <b>{$article->title}</b> fue creado sin imagen..!")->warning();
          endif;

          return redirect()->route('articles.index');
        else:
          flash("El Artículo <b>{$article->title}</b> no pudo ser creado..!")->error();
          return redirect()->route('articles.create');
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
      $categories=Category::orderBy('name','DESC')->pluck('name', 'id');
      $tags=Tag::orderBy('name','DESC')->pluck('name', 'id');
      $misTags=$article->tag->pluck('id')->toArray();
      return view('admin.articles.show')
      ->with('article',$article)
      ->with('tags',$tags)
      ->with('misTags',$misTags)
      ->with('categories', $categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories=Category::orderBy('name','DESC')->pluck('name', 'id');
        $tags=Tag::orderBy('name','DESC')->pluck('name', 'id');
        $misTags=$article->tag->pluck('id')->toArray();
        return view('admin.articles.edit')
        ->with('article',$article)
        ->with('tags',$tags)
        ->with('misTags',$misTags)
        ->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleUpdateRequest $request, Article $article)
    {
        $article->fill($request->all());
        if ($article->save()) {
          $article->tag()->sync($request->tags);
          flash("El Artículo <b>{$article->title}</b> fue editado correctamente..!")->success();
          return redirect()->route('articles.index');
        } else {
          flash("El Artículo <b>{$article->title}</b> no pudo ser editado..!")->error();
          return redirect()->route('articles.edit',[$article]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
      if($article->delete()):
        flash("El Artículo <b>{$article->title}</b> se ha Eliminado Correctamente..!")->success();
        return redirect()->route('articles.index');
      else:
        flash("El Artículo <b>{$article->title}</b> no se pudo eliminar")->error();
        return redirect()->route('articles.index');
      endif;
    }
}
