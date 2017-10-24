<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FrontController extends Controller
{
  public function __construct()
  {
      Carbon::setLocale('es');
  }

  public function index()
  {
    $articles=Article::orderBy('id', 'DESC')->paginate(4);
    $articles->each(function ($articles){
      $articles->category;
      $articles->image;
      $articles->tag;
    });
    return view('front.index')
    ->with('articles',$articles);
  }

  public function searchCategory($name)
  {
    $category=Category::SearchCategory($name)->first();
    $articles=$category->article()->paginate(4);
    $articles->each(function ($articles){
      $articles->category;
      $articles->image;
      $articles->tag;
    });
    return view('front.index')
    ->with('articles',$articles);
  }

  public function searchTag($name)
  {
    $tag=Tag::SearchTag($name)->first();
    $articles=$tag->article()->paginate(4);
    $articles->each(function ($articles){
      $articles->category;
      $articles->image;
      $articles->tag;
    });
    return view('front.index')
    ->with('articles',$articles);
  }

  public function viewArticle($slug)
  {
    $article=Article::where('slug', '=', $slug)->firstOrFail();
    $article->category;
    $article->image;
    $article->tag;
    $article->user;
    return view('front.article')->with('article',$article);
  }
}
