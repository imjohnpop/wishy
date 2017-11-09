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

// --------------- Homepage ------------------------------------------

Route::get('/', 'HomeController@index');

Route::get('/home', function () {
    return redirect('/');
});
Route::get('/homepage', function () {
    return redirect('/');
});


// --------------- Feed Page ------------------------------------------


Route::get('/feed/calendar', 'CalendarController@view');

Route::post('/feed/search', 'SearchController@search');

Route::resource('feed', 'FeedController', [
    'except' => ['index','create', 'edit']
    ]);
    
    /*
    * Generated routes and their methods in the FeedController:
    * [GET]     /feed/{id}  => show (view an individual post)
    * [POST]    /feed       => store (new post) 
    * [PUT]     /feed/{id}  => update
    * [DELETE]  /feed/{id}  => destroy
    */
    
    Route::prefix('encourage')->group(function () {
        Route::post('/post/{post_id}', 'EncourageController@post');
        Route::post('/wish/{wish_id}', 'EncourageController@wish');
        Route::post('/goal/{goal_id}', 'EncourageController@goal');
    });    
    
    Route::prefix('status')->group(function () {
        Route::post('/wish/{wish_id}', 'StatusController@wish');
        Route::post('/goal/{goal_id}', 'StatusController@goal');
    });    
    
    Route::prefix('comment')->group(function () {
        Route::post('/post/{post_id}', 'CommentController@newpost');
        Route::put('/post/{post_id}/{comment_id}', 'CommentController@updatepost');
        Route::post('/goal/{goal_id}', 'CommentController@newgoal');    
        Route::put('/goal/{post_id}/{comment_id}', 'CommentController@updategoal');    
        Route::delete('/{comment_id}', 'CommentController@destroy');
    });
    
    
    // --------------- Profile Page ------------------------------------------
    
Route::resource('profile', 'ProfileController', [
    'except' => ['create','store']
]);

/*
* Generated routes and their methods in the ProfileController:
* [GET]     /profile           => index
* [GET]     /profile/{id}/edit => edit (display the page that'll edit the profile)
* [PUT]     /profile/{id}      => update
* [GET]     /profile/{id}      => show
* [DELETE]  /profile/{id}      => destroy
*/

Route::prefix('profile')->group(function () {    
    Route::resource('wish', 'WishController', [
        'only' => ['update', 'destroy']    
    ]);
    /*
    * Generated routes and their methods in the WishController:
    * [PUT]     /profile/wish/{id}      => update
    * [DELETE]  /profile/wish/{id}      => destroy
    */
    Route::get('/{user_id}/achievements', 'AchievementsController@view');
});


// --------------- Friends Page ------------------------------------------

Route::prefix('friends')->group(function(){
    Route::get('/{user_id}', 'FriendController@view');
    Route::post('/{friend_id}/add', 'FriendController@add');
    Route::post('/{friend_id}/unfriend', 'FriendController@unfriend');
});

// --------------- Goals Planner ------------------------------------------

Route::prefix('goal')->group(function(){    
    Route::get('/new', 'GoalsController@view');
    Route::get('/edit/{id}', 'GoalsController@view');
    Route::post('/edit/{id}', 'GoalsController@edit');
    Route::delete('/{id}', 'GoalController@destroy');
    Route::resource('milestone', 'MilestoneController', [
        'only' => ['store', 'update', 'destroy']
    ]);
    /* 
    *[POST]   /goal/milestone        => store
    *[PUT]    /goal/milestone/{id}   => update
    *[DELETE] /goal/milestone/{id} => destroy
    */
});

