<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//              // Admin Panel
Route::get('Admin/login','Admin\AdminController@login');
Route::post('Admin/login','Admin\AdminController@postLogin');
Route::group(['middleware'=>['admin']],function(){
  Route::get('Admin/Dashboard','Admin\AdminController@dashboard');
  Route::get('Admin/logout','Admin\AdminController@logout');
  Route::resource('Admin','Admin\AdminController');
  Route::resource('User','Admin\UserController');
  Route::resource('Idea','Admin\IdeasController');
  Route::resource('ContactUs','Admin\ContactUsController');
  Route::resource('Category','Admin\CategoryController');
  Route::resource('Comment','Admin\CommentController');
  Route::resource('Supporter','Admin\SupportController');
  Route::resource('city','Admin\CityController');
  Route::resource('favorite','Admin\FavoriteController');
  Route::resource('follow','Admin\FollowController');
  Route::resource('slide','Admin\SlideController');
  Route::resource('about','Admin\AboutController');
  Route::resource('goal','Admin\GoalsController');
  Route::resource('brief','Admin\BriefController');
  Route::resource('recent','Admin\RecentController');
  Route::resource('notifications','Admin\NotificationController');
  Route::resource('conversation','Admin\ConversationController');
  Route::resource('messages','Admin\MessageController');
  Route::resource('policy','Admin\PolicyController');
});


Route::group(['middleware' => 'web'], function () {
  // Site
  Route::get('/laws', 'Site\SiteController@laws');


  Route::resource('/payment', 'Site\PaypalPaymentController');
  Route::resource('/','Site\SiteController');
  Route::resource('/contact','Site\ContactController');

  // login with facebook
  Route::get('login/facebook', 'Site\AuthController@redirectToProvider');
  Route::get('login/facebook/callback', 'Site\AuthController@handleProviderCallback');
  // login with twitter
  Route::get('login/twitter', 'Site\AuthController@redirect');
  Route::get('login/twitter/callback', 'Site\AuthController@handle');

  Route::get('/forget','Site\AuthController@forget');
  Route::resource('/user','Site\AuthController');

  Route::get('/profile/{id}','Site\UserController@profile');
  Route::resource('/site','Site\UserController');
  Route::get('/change/{id}','Site\UserController@changePassword');
  Route::get('logout','Site\AuthController@logout');

  // Projects In Site
  // filter pages
  Route::post('/change','Site\ProjectController@postChange');
  Route::post('/search','Site\SiteController@search');
  // projects and spacial projects
  Route::get('/proj/{id}','Site\ProjectController@project');
  Route::post('comment/{id}','Site\ProjectController@comment');
  Route::post('recent/{id}','Site\ProjectController@recent');
  Route::get('/support/{id}','Site\SiteController@support');
  Route::get('/favor/{id}','Site\SiteController@favorite');
  Route::post('/support/{id}','Site\SiteController@PostSupport');
  Route::resource('/project','Site\ProjectController');

 // Reset Password
  Route::get('/password/email','Site\PasswordController@getEmailResetPassword');
  Route::post('/password/email','Site\PasswordController@postEmailResetPassword');
  Route::get('/password/reset/{id?}/{token?}','Site\PasswordController@getResetPassword');
  Route::post('/password/reset','Site\PasswordController@postResetPassword');


  // Connect ['notification','Message']

  Route::get('messageme/{id}','Site\ConnectController@messageMe');
  Route::get('message','Site\ConnectController@showMessage');
  Route::get('notification','Site\ConnectController@showNotification');
  Route::get('searchuser','Site\ConnectController@searchUser');
  Route::get('choose/{id}','Site\ConnectController@chooseUser');
  Route::post('choose/{id}','Site\ConnectController@sendMessage');
});


Route::group(['middleware'=>['loginRedirect']],function(){
  Route::get('/login','Site\AuthController@login');
  Route::post('/login','Site\AuthController@postLogin');
});
