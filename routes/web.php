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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('skills','SkillsController');
Route::resource('levels','LevelsController');
Route::resource('users','UsersController')->only([
    'show'
]);;

Route::get('users/{skill?}', 'UsersController@index')->name('users.index');

Route::get('user/{user}/assign', 'UsersController@assignSkill')->name('users.assign');
Route::post('user/{user}/assign', 'UsersController@assignSkillStore')->name('users.assign.store');
Route::get('user/{user}/advance/{skill}', 'UsersController@advanceSkill')->name('users.advance');
