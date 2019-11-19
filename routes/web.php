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
use App\Products;
Route::get('/', function () {

	$products = Products::all();
    return view('welcome', compact('products'));
});

//https://laravel.com/docs/5.7/controllers#restful-partial-resource-routes
Route::resource('products', 'ProductsController');

Route::resource('products', 'AuthProductsController')->except(['show']);

//->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
//->middleware('can:update,products'); allows only the correct user to access the route's parts. It works better by placing access logic at the beginning of the resource's controller instead.
/*
	all of the routes that can be used: "projects" is just an example.

	GET /projects (index)
	GET /projects/create (create)
	GET /projects/1 (show)
	POST /projects (store)
	GET /projects/1/edit (edit)
	PATCH /projects/1 (update)
	DELETE /projects/1 (destroy)



Route::get('/projects', 'PorjectsController@index'); //get all projects
Route::get('/projects/create', 'ProjectsController@cteate'); //get a form to create projects
Route::get('/projects/{project}','ProjectsController@show'); //display one specific project
Route::post('/projects','ProjectsController@store'); //sore a new project in the database
Route::get('/projects/create','ProjectsController@create');

Route::get('/projects/{project}/edit', 'ProjectsController@edit');//form to update one existing project
Route::patch('/projects/{project}','ProjectsController@update');

Route::delete('/projects/{project}','ProjectsController@destroy');


create EVERYTHING above with this terminal command: 
 php artisan make:controller PostsController -r
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
