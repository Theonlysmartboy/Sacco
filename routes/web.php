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

Route::get('/home', 'HomeController@index');
Route::get('/add', 'MembersController@index');
Route::get('/project', 'ProjectsController@index');
Route::get('admin', function () {
    return view('admin_template');
});
Route::post('add', ['as' => 'member_register', 'uses' => 'MembersController@store']);
Route::get('members',['as' => 'members', 'uses' => 'MembersController@show']);
Route::delete('members/{id}',['as' => 'members.delete', 'uses' => 'MembersController@destroy']);
Route::get('member/{id}/edit',['as' => 'member.edit', 'uses' => 'MembersController@edit']);
// Members

	Route::get('member',['as' => 'member.index', 'uses' => 'MembersController@index']);
	Route::get('member/create',['as' => 'member.create', 'uses' => 'MembersController@create']);
	Route::post('member',['as' => 'member.store', 'uses' => 'MembersController@store']);
	Route::get('member/{id}/edit',['as' => 'member.edit', 'uses' => 'MembersController@edit']);
	Route::get('member/{id}/show',['as' => 'member.show', 'uses' => 'MembersController@show']);
	Route::put('member/{id}',['as' => 'member.update', 'uses' => 'MembersController@update']);
	Route::delete('member/{id}',['as' => 'member.delete', 'uses' => 'MembersController@destroy']);