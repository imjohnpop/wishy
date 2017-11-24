<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/checklist/new', 'ChecklistController@new');

Route::post('/checklists/{id}', 'ChecklistController@list');

Route::post('/checks/{id}', 'ChecksController@list');

Route::post('/check/{id}', 'ChecksController@change');

Route::post('/check/new/{id}', 'ChecksController@new');

Route::post('/check/delete/{id}', 'ChecksController@destroy');

Route::post('/check/date/{id}', 'ChecksController@date');

Route::post('/check/{id}', 'ChecksController@change');

Route::post('/calendar/{id}', 'CalendarController@get');

Route::post('/goal/complete/{id}', 'GoalsController@complete');

Route::get('/search/friends' , 'SearchController@search');

Route::get('/friends/{id}' , 'SearchController@select');

Route::get('/comment/goal/{id}' , 'CommentController@goals');

Route::get('/comment/post/{id}' , 'CommentController@posts');

Route::post('/passwordCurrent/{id}' , 'PasswordChangeController@checkCurrent');

Route::post('/passwordChange/new/{id}' , 'PasswordChangeController@changePassword');