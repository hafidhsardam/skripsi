<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/register_user', 'UserController@register_user');
Route::post('/register_validation', 'UserController@register_validation');
Route::get('/login_user', 'UserController@login_user');
Route::post('/login_validation', 'UserController@login_validation');
Route::get('/user-logout', 'UserController@logout');

Route::get('/', 'UserController@index');
Route::get('/categories/{id}', 'UserController@categories');
Route::get('/about_us', 'UserController@about_us');
Route::get('/blog_detail/{id}', 'UserController@blog_detail');
Route::get('/profile', 'UserController@profile')->middleware('user');
Route::post('/profile_update', 'UserController@profile_update')->middleware('user');
Route::get('/blog_all', 'UserController@blog_all')->middleware('user');
Route::get('/blog_create', 'UserController@blog_create')->middleware('user');
Route::post('/blog_store', 'UserController@blog_store')->middleware('user');
Route::get('/blog_edit/{id}', 'UserController@blog_edit')->middleware('user');
Route::post('/blog_update', 'UserController@blog_update')->middleware('user');
Route::get('/blog_delete/{id}', 'UserController@blog_delete')->middleware('user');

Route::get('/admin', 'AdminController@index')->middleware('admin');
Route::get('/admin/profile', 'AdminController@profile')->middleware('admin');
Route::post('/admin/profile_update', 'AdminController@profile_update')->middleware('admin');
Route::get('/admin/manage_categorie', 'AdminController@categories_all')->middleware('admin');
Route::get('/admin/categorie_add', 'AdminController@categories_create')->middleware('admin');
Route::post('/admin/categorie_store', 'AdminController@categories_store')->middleware('admin');
Route::get('/admin/categorie_edit/{id}', 'AdminController@categories_edit')->middleware('admin');
Route::post('/admin/categorie_update', 'AdminController@categories_update')->middleware('admin');
Route::get('/admin/blog_all', 'AdminController@blog_all')->middleware('admin');
Route::get('/admin/blog_create', 'AdminController@blog_create')->middleware('admin');
Route::post('/admin/blog_store', 'AdminController@blog_store')->middleware('admin');
Route::get('/admin/blog_edit/{id}', 'AdminController@blog_edit')->middleware('admin');
Route::post('/admin/blog_update', 'AdminController@blog_update')->middleware('admin');
Route::get('/admin/blog_delete/{id}', 'AdminController@blog_delete')->middleware('admin');
Route::get('/admin/user_all', 'AdminController@user_all')->middleware('admin');
Route::get('/admin/user_add', 'AdminController@user_create')->middleware('admin');
Route::post('/admin/user_store', 'AdminController@user_store')->middleware('admin');
Route::get('/admin/user_edit/{id}', 'AdminCOntroller@user_edit')->middleware('admin');
Route::post('/admin/user_update', 'AdminController@user_update')->middleware('admin');
Route::get('/admin/user_delete/{id}', 'AdminController@user_delete')->middleware('admin');
Route::get('/admin/categories/{id}', 'AdminController@categories_blog')->middleware('admin');
Route::get('/admin/blog_detail/{id}', 'AdminController@blog_detail')->middleware('admin');
