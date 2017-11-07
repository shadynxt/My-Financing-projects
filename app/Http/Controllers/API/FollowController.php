<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\FollowOnProject;
use App\Http\Controllers\API\NotificationsController;
use App\Follow;
use App\Idea;
use Auth;


class FollowController extends Controller
{
    //

    // follow project
    public function projectFollow(Request $request)
    {
          $user = Auth::user();
          $check = Follow::where(['user_id' => $user->id , 'project_id' => $request->project_id])->first();
          if($check == null)
          {
            Follow::create(['user_id' => $user->id , 'project_id' => $request->project_id]);
            $project = Idea::find($request->project_id);

            //save notification on database
          if($user->id != $project->user->id)
            $project->user->notify(new FollowOnProject($project,$user));

            // get all mobiles token of user who owner the project
            $tokens = $project->user->mobile_token;

            // return $token;
            $title = 'تم متابعة مشروعك بواسطة'.$user->first_name.' '.$user->last_name;

               foreach ($tokens as $token) {

                   // push notification to mobile device token
                    NotificationsController::sendNotification($token->token,$request->project_id,'follow',$title);
                }
          }
          else
          {
            $check->delete();
          }

          return response(['status' => 'ok'] ,200);
    }

}
