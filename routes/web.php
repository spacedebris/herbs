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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function(){

	Route::get('/home', 'HomeController@index');

	Route::resource('users','UserController');

	Route::get('roles',[
		'as'=>'roles.index',
		'uses'=>'RoleController@index',
		'middleware' => ['permission:admin|role-list|role-create|role-edit|role-delete']
	]);
	Route::get('roles/create',[
		'as'=>'roles.create',
		'uses'=>'RoleController@create',
		'middleware' => ['permission:admin|role-create']
	]);
	Route::post('roles/create',[
		'as'=>'roles.store',
		'uses'=>'RoleController@store',
		'middleware' => ['permission:admin|role-create']
	]);
	Route::get('roles/{id}',[
		'as'=>'roles.show',
		'uses'=>'RoleController@show'
	]);
	Route::get('roles/{id}/edit',[
		'as'=>'roles.edit',
		'uses'=>'RoleController@edit',
		'middleware' => ['permission:admin|role-edit']
	]);
	Route::patch('roles/{id}',[
		'as'=>'roles.update',
		'uses'=>'RoleController@update',
		'middleware' => ['permission:admin|role-edit']
	]);
	Route::delete('roles/{id}',[
		'as'=>'roles.destroy',
		'uses'=>'RoleController@destroy',
		'middleware' => ['permission:admin|role-delete']
	]);

	Route::get('herbs',[
		'as'=>'herbs.index',
		'uses'=>'HerbController@index',
		/*'middleware' => ['permission:admin','permission:item-list|item-create|item-edit|item-delete']*/
	]);

	Route::get('herbs/create',[
		'as'=>'herbs.create',
		'uses'=>'HerbController@create',
		'middleware' => ['permission:item-create']
	]);

	Route::post('herbs/create',[
		'as'=>'herbs.store',
		'uses'=>'HerbController@store',
		'middleware' => ['permission:item-create']
	]);

	Route::get('herbs/{id}',[
		'as'=>'herbs.show',
		'uses'=>'HerbController@show']);

	Route::get('herbs/{id}/edit',
		['as'=>'herbs.edit',
		'uses'=>'HerbController@edit',
		'middleware' => ['permission:item-edit']]);

	Route::patch('herbs/{id}',
		['as'=>'herbs.update',
		'uses'=>'HerbController@update',
		'middleware' => ['permission:item-edit']]);

	Route::delete('herbs/{id}',[
		'as'=>'herbs.destroy',
		'uses'=>'HerbController@destroy',
		'middleware' => ['permission:item-delete']]);
});

