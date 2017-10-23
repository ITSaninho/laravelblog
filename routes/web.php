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

Route::match(['get','post'],'/{page?}',['uses'=>'IndexController@index','as'=>'post', 'only' => 'index'])->where('page','[0-9]+');

Route::match(['get'],'/post/{post_alias}',['uses'=>'PostController@index','as'=>'post'])->where('post_alias','[\w-]+');
Route::match(['post'],'/post/{post_alias}',['uses'=>'PostController@addComment','as'=>'post'])->where('post_alias','[\w-]+');

Route::match(['get'],'contacts',['uses'=>'ContactsController@index','as'=>'contacts']);
Route::match(['post'],'contacts',['uses'=>'ContactsController@addMessage','as'=>'contacts']);

Route::match(['get'],'portfolio',['uses'=>'PortfolioController@index','as'=>'portfolio']);
Route::match(['get'],'portfolio/{portfolio_alias}',['uses'=>'PortfolioController@show','as'=>'portfolio_show'])->where('portfolio_alias','[\w-]+');
Route::match(['post'],'portfolio/{portfolio_alias}',['uses'=>'ContactsController@addMessage'])->where('portfolio_alias','[\w-]+');


Route::get('category/{category}/{page?}',['uses'=>'CategoryController@index','as'=>'category'])->where(['category'=>'[0-9]+'],['page'=>'[0-9]+']);
Route::get('video/{category}/{page?}',['uses'=>'CategoryController@video','as'=>'video'])->where(['category'=>'[\w-]+'],['page'=>'[0-9]+']);
Route::get('script/{category}/{page?}',['uses'=>'CategoryController@script','as'=>'script'])->where(['category'=>'[\w-]+'],['page'=>'[0-9]+']);
Route::get('snipet/{category}/{page?}',['uses'=>'CategoryController@snipet','as'=>'snipet'])->where(['category'=>'[\w-]+'],['page'=>'[0-9]+']);

Route::get('users',['uses'=>'UserController@index','as'=>'users']);

Route::get('profile/{id}',['uses'=>'UserController@show', 'as'=> 'profile'])->where(['id'=>'[0-9]+']);
Route::get('profile/edit/{id}',['uses'=>'UserController@edit','as'=>'profile_edit'])->where(['id'=>'[0-9]+']);
Route::post('profile/edit/{id}',['uses'=>'UserController@update'])->where(['id'=>'[0-9]+']);

Route::get('profile/message',['uses'=>'MessageController@show','as'=>'message_list']);
Route::get('profile/message/{dialog}',['uses'=>'MessageController@showDialog','as'=>'message_dialog'])->where(['dialog'=>'[0-9]+']);
Route::post('profile/message/{dialog}',['uses'=>'MessageController@store'])->where(['dialog'=>'[0-9]+']);


//Реєстрація, авторизація
Route::auth();

//Адмінка
Route::group(['prefix'=>'admin', 'middleware' => ['admin','auth']],   function() {
// только для админа


    Route::get('/',['uses' => 'Admin\IndexController@index','as' => 'adminIndex']);


    Route::resource('/posts','Admin\PostController');
    Route::get('/posts/{content}',['uses'=>'Admin\PostController@show','as'=>'admin_posts_show_id'])->where(['content'=>'[\w-]+']);
    Route::get('/posts/create',['uses'=>'Admin\PostController@create','as'=>'admin_posts_create']);
    Route::post('/posts/create',['uses'=>'Admin\PostController@store']);
    Route::get('/posts/edit/{id}',['uses'=>'Admin\PostController@edit','as'=>'admin_posts_edit'])->where(['id'=>'[0-9]+']);
    Route::post('/posts/edit/{id}',['uses'=>'Admin\PostController@update'])->where(['id'=>'[0-9]+']);
    Route::get('/posts/delete/{id}',['uses'=>'Admin\PostController@delete', 'as'=>'admin_posts_delete'])->where(['id'=>'[0-9]+']);



    Route::resource('/portfolio','Admin\PortfolioController');
    Route::get('/portfolio/{content}',['uses'=>'Admin\PortfolioController@show','as'=>'admin_portfolio_show_id'])->where(['content'=>'[\w-]+']);
    Route::get('/portfolio/create',['uses'=>'Admin\PortfolioController@create','as'=>'admin_portfolio_create']);
    Route::post('/portfolio/create',['uses'=>'Admin\PortfolioController@store']);
    Route::get('/portfolio/edit/{id}',['uses'=>'Admin\PortfolioController@edit','as'=>'admin_portfolio_edit'])->where(['id'=>'[0-9]+']);
    Route::post('/portfolio/edit/{id}',['uses'=>'Admin\PortfolioController@update'])->where(['id'=>'[0-9]+']);
    Route::get('/portfolio/delete/{id}',['uses'=>'Admin\PortfolioController@delete', 'as'=>'admin_portfolio_delete'])->where(['id'=>'[0-9]+']);




    Route::resource('/users','Admin\UserController');
    Route::get('/users/{content}',['uses'=>'Admin\UserController@show','as'=>'admin_users_show_id'])->where(['content'=>'[\w-]+']);
    Route::get('/users/create',['uses'=>'Admin\UserController@create','as'=>'admin_users_create']);
    Route::post('/users/create',['uses'=>'Admin\UserController@store']);
    Route::get('/users/edit/{id}',['uses'=>'Admin\UserController@edit','as'=>'admin_users_edit'])->where(['id'=>'[0-9]+']);
    Route::post('/users/edit/{id}',['uses'=>'Admin\UserController@update'])->where(['id'=>'[0-9]+']);
    Route::get('/users/delete/{id}',['uses'=>'Admin\UserController@delete', 'as'=>'admin_users_delete'])->where(['id'=>'[0-9]+']);


    Route::resource('/category','Admin\CategoryController');
    Route::get('/category/{content}',['uses'=>'Admin\CategoryController@show','as'=>'admin_category_show_id'])->where(['content'=>'[\w-]+']);
    Route::get('/category/create',['uses'=>'Admin\CategoryController@create','as'=>'admin_category_create']);
    Route::post('/category/create',['uses'=>'Admin\CategoryController@store']);
    Route::get('/category/edit/{id}',['uses'=>'Admin\CategoryController@edit','as'=>'admin_category_edit'])->where(['id'=>'[0-9]+']);
    Route::post('/category/edit/{id}',['uses'=>'Admin\CategoryController@update'])->where(['id'=>'[0-9]+']);
    Route::get('/category/delete/{id}',['uses'=>'Admin\CategoryController@delete', 'as'=>'admin_category_delete'])->where(['id'=>'[0-9]+']);


    Route::resource('/messages','Admin\MessageController');
    Route::get('/messages/{content}',['uses'=>'Admin\MessageController@show','as'=>'admin_messages_show_id'])->where(['content'=>'[\w-]+']);
    Route::get('/messages/create',['uses'=>'Admin\MessageController@create','as'=>'admin_messages_create']);
    Route::post('/messages/create',['uses'=>'Admin\MessageController@store']);
    Route::get('/messages/edit/{id}',['uses'=>'Admin\MessageController@edit','as'=>'admin_messages_edit'])->where(['id'=>'[0-9]+']);
    Route::post('/messages/edit/{id}',['uses'=>'Admin\MessageController@update'])->where(['id'=>'[0-9]+']);
    Route::get('/messages/delete/{id}',['uses'=>'Admin\MessageController@delete', 'as'=>'admin_messages_delete'])->where(['id'=>'[0-9]+']);




    Route::resource('/comments','Admin\CommentController');
    Route::get('/comments/{content}',['uses'=>'Admin\CommentController@show','as'=>'admin_comments_show_id'])->where(['content'=>'[\w-]+']);
    Route::get('/comments/create',['uses'=>'Admin\CommentController@create','as'=>'admin_comments_create']);
    Route::post('/comments/create',['uses'=>'Admin\CommentController@store']);
    Route::get('/comments/edit/{id}',['uses'=>'Admin\CommentController@edit','as'=>'admin_comments_edit'])->where(['id'=>'[0-9]+']);
    Route::post('/comments/edit/{id}',['uses'=>'Admin\CommentController@update'])->where(['id'=>'[0-9]+']);
    Route::get('/comments/delete/{id}',['uses'=>'Admin\CommentController@delete', 'as'=>'admin_comments_delete'])->where(['id'=>'[0-9]+']);



    Route::resource('/feedback','Admin\FeedbackController');
    Route::get('/feedback/{content}',['uses'=>'Admin\FeedbackController@show','as'=>'admin_feedback_show_id'])->where(['content'=>'[\w-]+']);
    Route::get('/feedback/create',['uses'=>'Admin\FeedbackController@create','as'=>'admin_feedback_create']);
    Route::post('/feedback/create',['uses'=>'Admin\FeedbackController@store']);
    Route::get('/feedback/edit/{id}',['uses'=>'Admin\FeedbackController@edit','as'=>'admin_feedback_edit'])->where(['id'=>'[0-9]+']);
    Route::post('/feedback/edit/{id}',['uses'=>'Admin\FeedbackController@update'])->where(['id'=>'[0-9]+']);
    Route::get('/feedback/delete/{id}',['uses'=>'Admin\FeedbackController@delete', 'as'=>'admin_feedback_delete'])->where(['id'=>'[0-9]+']);



    //Route::resource('/planets','Admin\PlanetsController');
    //Route::resource('/solar_systems','Admin\Solar_systemsController');


});


Auth::routes();
