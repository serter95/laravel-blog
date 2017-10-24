<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// GET, POST, PUT, DELETE, RESOURCE

/*Route::get('/ejemplo/{nombre?}', function ($nombre="No colocó un nombre..."){
echo "el nombre que has colocado es '{$nombre}'";
});*/

/*Route::group(['prefix' => 'articles'], function (){ // Grupo de urls

Route::get('view/{id}', [ // ruta posterior al grupo de arriba
'uses' => 'TestController@view', // controlador y metodo a usar
'as' => 'articlesView' // renombrar ruta para uso interno creo
]);

});*/
Route::group(['prefix' => 'api'], function (){ // Grupo de urls

  Route::get('vue/users', [
    'as' => 'vue.users',
    'uses' => 'apiController@vueIndex',
  ]);

  Route::get('vue', function () {
    return view('api.vue.index');
  });

  /*Route::get('vue/users', function () {
    return ['Lynda', 'Isabella', 'Italo', 'Abel', 'Diana'];
  });*/

});

Route::get('/', [
  'as' => 'front.index',
  'uses' => 'FrontController@index',
]);

Route::get('/categories/{name}', [
  'as' => 'front.search.category',
  'uses' => 'FrontController@searchCategory',
]);

Route::get('/tags/{name}', [
  'as' => 'front.search.tag',
  'uses' => 'FrontController@searchTag',
]);

Route::get('/articles/{slug}', [
  'as' => 'front.view.article',
  'uses' => 'FrontController@viewArticle',
]);

/*Route::get('/login', function () {
  return view('auth.login');
});*/

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome')->middleware('auth');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function (){ // Grupo de urls

  Route::group(['middleware'=>'admin'], function (){
    Route::resource('users','UsersController');
  });

  Route::resource('categories', 'CategoriesController');
  Route::resource('tags', 'TagsController');
  Route::resource('articles', 'ArticlesController');
  Route::resource('images', 'ImagesController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
