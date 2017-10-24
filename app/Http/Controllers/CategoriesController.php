<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::orderBy('id','ASC')->paginate(5);
        return view('admin.categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category($request->all());
        if($category->save()):
          flash("La Categoria <b>{$category->name}</b> fue creada correctamente..!")->success();
          return redirect()->route('categories.index');
        else:
          flash("La Categoria <b>{$category->name}</b> no pudo ser creada..!")->error();
          return redirect()->route('categories.create');
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit')->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
      $category->name = $request->name;
      if($category->save()):
        flash("La Categoría <b>{$category->name}</b> fue editada correctamente..!")->success();
        return redirect()->route('categories.index');
      else:
        flash("La Categoría <b>{$category->name}</b> no pudo ser editada..!")->error();
        return redirect()->route('categories.edit',[$user]);
      endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
      if($category->delete()):
        flash("La Categoría <b>{$category->name}</b> se ha Eliminado Correctamente..!")->success();
        return redirect()->route('categories.index');
      else:
        flash("La Categoría <b>{$category->name}</b> no se pudo eliminar")->error();
        return redirect()->route('categories.index');
      endif;
    }
}
