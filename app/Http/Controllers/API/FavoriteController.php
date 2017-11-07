<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\FavoriteOnProject;
use App\Favorite;
use App\User;
use App\Idea;
use Carbon\Carbon;
use Auth;

class FavoriteController extends Controller
{

       // add project to favorite
       public function addFavorite(Request $request)
       {
           $user = Auth::user();
           $check = Favorite::where(['user_id' => $user->id , 'idea_project_id' => $request->idea_project_id])->first();

           // check if this project is favorited before
           if($check == null)
           {
           Favorite::create(['idea_project_id'=>$request->idea_project_id , 'user_id' => $user->id]);
           $project = Idea::find($request->idea_project_id);

           // save notification on database
           if($user->id != $project->user->id)
           $project->user->notify(new FavoriteOnProject($project,$user));

           $tokens = $project->user->mobile_token;
           $title = 'تم أضافة مشروعك للمفضلة بواسطة '.$user->first_name.' '.$user->last_name;

           foreach ($tokens as $token) {

               // push notification to mobile device token
               NotificationsController::sendNotification($token->token,$request->idea_project_id,'favorite',$title);
            }

          }
           else
           {
             $check->delete();
           }
           return response(['status' => 'ok'], 200);
       }
}
