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

Auth::routes();

// --------------- Homepage

Route::get('/', 'HomeController@index');

Route::get('/home', function () {
    return redirect('/');
});
Route::get('/homepage', function () {
    return redirect('/');
});


// --------------- Feed Page

Route::get('/feed', 'FeedController@view');
Route::post('/feed', 'FeedPostController@store');
Route::post('/feed/{id}', 'FeedPostController@destroy');
/*
 * post/put     FeedPostController@edit
 * post         EncourageController@change
 * post         StatusController@change
 * post         CommentController@add
 * post         CommentController@destroy
 * post         CommentController@edit
 * post ?       SearchController@search
 * get          CalendarController@view
 */

// --------------- Profile Page

Route::get('/profile', 'ProfileController@index');
Route::get('/profile/{name}.{id}', 'ProfileController@view');
Route::post('/profile/{name}.{id}', 'ProfileController@store');
/*
 * post/put     WishController@edit
 * post         WishController@destroy
 * post         GoalController@destroy
 * post         EncourageController@change
 * post         StatusController@change
 * post         CommentController@add
 * post         CommentController@destroy
 * post         CommentController@edit
 * post         FriendsController@addFriend
 * post         FriendsController@unfriend
 * post ?       SearchController@search
 */

// --------------- Profile Page Edit Info

Route::get('/profile/{name}.{id}/settings', 'ProfileController@detail');
Route::post('/profile/{name}.{id}/settings', 'ProfileController@edit');

/*
 * post ?       SearchController@search
 */

// --------------- Friends Page

Route::get('/profile/{name}.{id}/friends', 'FriendsController@view');
Route::post('/profile/{name}.{id}/friends', 'FriendsController@addFriend');

/*
 * post         FriendsController@unfriend
 * post ?       SearchController@search
 */


// --------------- Achievements Page

Route::get('/profile/{name}.{id}/achievements', 'AchievementsController@view');

/*
 * post         AchievementsController@destroy
 * post ?       SearchController@search
 * post         CommentController@add
 * post         CommentController@destroy
 * post         CommentController@edit
 */

// --------------- Goals Planner

Route::get('/goal/new', 'GoalsController@view');
Route::get('/goal/edit/{id}', 'GoalsController@view');
Route::post('/goal/edit/{id}', 'GoalsController@edit');

/*
 * post         MilestonController@add
 * post         MilestonController@edit
 * post         MilestonController@destroy
 * post         MilestonController@done
 * post         CommentController@add
 * post         CommentController@destroy
 * post         CommentController@edit
 * post ?       SearchController@search
 */
