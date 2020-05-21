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

Route::get('/', 'FacultiesController@home');
Route::get('/index', 'FacultiesController@home');
Route::get('/faculties/index', 'FacultiesController@index');

Route::get('/about', function(){
    return view('about');   
});
Route::get('/contact', function(){
    return view('contact');   
});
Auth::routes();
Route::get('/faculties/createBook', 'FacultiesController@createBook');
Route::post('/faculties/storeBook', 'FacultiesController@storeBook');
Route::get('/faculties/createNews', 'FacultiesController@createNews');
Route::post('/faculties/storeNews', 'FacultiesController@storeNews');

Route::resource('faculties','FacultiesController');
Route::get('/faculties/create', 'FacultiesController@create');

Route::get('/home', 'HomeController@index')->name('home');

// EVENTS
Route::get('/events/index', 'EventsController@index');
Route::resource('events','EventsController');
Route::get('/events/create', 'EventsController@create');

// SUMMARIES
Route::get('/summaries/test','SummariesController@test');
Route::get('/summaries/index', 'SummariesController@index');
Route::resource('summaries','SummariesController');
Route::get('/summaries/create', 'SummariesController@create');
Route::post('/summaries/{id}/accept','SummariesController@accept');

// SEARCH
Route::post('search', ['as' => 'search', 'uses' => 'SearchController@index']);

// RECENT NEWS
Route::get('/widgets/recent_news', function(){
    return view('widgets/recent_news');
});

// ADMIN DASHBOARD
Route::delete('dashboard/{id}/deleteNews','AdminController@deleteNews');
Route::delete('dashboard/{id}/deleteEvent','AdminController@deleteEvent');
Route::delete('dashboard/{id}/deleteSummary','AdminController@deleteSummary');
Route::delete('faculties/{id}/deleteBook','AdminController@deleteBook');
Route::delete('faculties/{id}/editBook','AdminController@editBook');
Route::resource('dashboard','AdminController');