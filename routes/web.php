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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/tests', 'Front\TestController@index');
Route::get('/test/start/{test}', 'Front\TestController@show');
Route::post('/test/store/{test}', 'Front\TestController@storeTest');
// Route::middleware('isAdmin')->get('/home', 'HomeController@index');

Route::group(['middleware' => ['isAdmin']], function() {
    Route::get('/home', 'HomeController@index');

    Route::get('/test', 'TestController@index');
    Route::get('/test/create', 'TestController@create');
    Route::post('/test/store', 'TestController@store');
    Route::get('/test/{test}', 'TestController@edit');
    Route::post('/test/update/{test}', 'TestController@update');
    // Route::get('/test/{test}', 'TestController@destroy');

    Route::get('/question', 'QuestionController@index');
    Route::get('/question/create', 'QuestionController@create');
    Route::post('/question/store', 'QuestionController@store');
    Route::get('/question/{question}', 'QuestionController@destroy');

    Route::get('/answer', 'AnswerController@index');
    Route::get('/answer/create', 'AnswerController@create');
    Route::post('/answer/store', 'AnswerController@store');

    Route::get('/users', 'HomeController@userIndex');
    Route::get('/tests/submitted', 'TestController@showSubmittedTest');
    Route::get('/tests/submitted/{test}', 'TestController@submittedEdit');
    Route::post('/tests/submitted/{test}', 'TestController@submittedUpdate');
    
});
