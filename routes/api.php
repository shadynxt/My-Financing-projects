<?php

use Illuminate\Http\Request;

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






Route::group(['prefix' => '{token}/'], function () {
  Route::group(['middleware' => ['api-auth']], function () {

         // get user auth
         Route::get('getUser','API\AuthController@getUser');

         //edit user that auth
         Route::post('/editUser','API\AuthController@editAuth');

         // get all Favorites
         Route::get('favorites', 'API\UserController@Favorites');

         // get all projects of
         Route::get('myProjects', 'API\UserController@Myprojects');

         //get all notifications of authentacted user
         Route::get('notifications','API\NotificationsController@getAll');

         /// get un read notifications

         Route::get('notifications/unread','API\NotificationsController@getUnreadNotifications');
         //readNotifications

         Route::get('notifications/read/{id}','API\NotificationsController@readNotifications');

         //get all messages of user
         Route::get('messages','API\ChatController@getAllUsers');

         //get conversation
         Route::get('conversation/{user_id}','API\ChatController@getConversation');

         // send new Message  { message  - conversation_id  - user_to }
        //  Route::post('sendMessage','API\ChatController@sendMessage');

        // send message { Request  message  -- user_id }
         Route::post('sendMessage','API\ChatController@startConversation');


         //add new project
         // {address - link - idea - budget - expected_date - city_id - basic_image - category_id  - additional_images  }
         Route::post('addProject','API\ProjectController@addProject');

         // upload video or link youtube
         // { video  - type - project_id }
         Route::post('uploadVideo','API\ProjectController@uploadVideo');


         //add new update to exist project  { project_id - description - img }
         Route::post('addUpdate','API\ProjectController@projectUpdates');

         //add comment on project  { body - idea_project_id }
         Route::post('addComment','API\CommentsController@addComment');

         //add project to favorite  { idea_project_id }
         Route::post('addFavorite','API\FavoriteController@addFavorite');


         // follow project  { project_id}
         Route::post('follow','API\FollowController@projectFollow');

         // increase date of project
        //  { date - project_id } as parameter  0 or date if 0 delete project else Extend the expected_date of it
         Route::post('ExtendDate' , 'API\ProjectController@Extend');


         //single post in index
         Route::get('getSinglePost/{id}' ,'API\ProjectController@getSinglePost');


        // logout current Auth
         Route::post('/logout','API\AuthController@logout');




  });
});




Route::group(['middleware' => ['apii']], function () {

// register new user
Route::post('/register', 'API\AuthController@registeration');

Route::post('/login', 'API\AuthController@authentaction');

Route::get('/profile/{id}','API\UserController@getUser');


// reset receve from application  email or phone and option
// then send code to email or phone accourding his option on email or phone
// { 1- username  |  2- type => option [ email or phone ] }
Route::post('resetPassword','API\AuthController@resetPassword');

// receve form application code and check if valid and not expired
// and then authenticated him
// { code }
Route::post('verifyCode','API\AuthController@verifyCode');

// change password with new password
// { password - code }
Route::post('reset','API\AuthController@Reset');

// index screan all projects
Route::get('/project','API\ProjectController@getAllProjects');


//single post in index
Route::get('getPost/{id}' ,'API\ProjectController@getPost');


//get all comments of project
Route::get('comments/{id}','API\CommentsController@getComments');

//search in projects
Route::get('search/{keyword}','API\ProjectController@searchByTitle');


// fillteration by keyword and fillter type
// { keyword:none or value  -  filterType => endSoon - mostSupportive - all - latest }
Route::get('fillteration/{id}/{keyword}/{filterType}','API\ProjectController@filter');

//all categories
Route::get('categories' , function(){
   return App\Category::get(['id','name','category_pic']);
});


// all updates that happend on this project
Route::get('project/updates/{id}','API\ProjectController@getUpdates');
 //get shareholders of project
Route::get('shareholders/{id}','API\ProjectController@getShareholders');

// Add addFinance to project
//{ idea_project_id - username - email  - known or unknown - amount_of_contribution - visa_number - cvc_code - month - year }
Route::post('addFinance','API\SupporterController@addFinance');

// all cities
Route::get('/cities','API\ProjectController@cities');

// check if user has email
// recive phone number of user
// { phone } as post parameter
Route::post('checkIfHasEmail','API\UserController@checkIfHasEmail');
});
