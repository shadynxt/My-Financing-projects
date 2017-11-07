<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Idea;
use App\Favorite;
use App\Support;
use Carbon\Carbon;
use Cache;
use Auth;
use Cookie;

class UserController extends Controller
{

    // get all favorites of authenticated user
    public function Favorites()
    {
         $user = Auth::user();
         $projects = Idea::join('favorite' , 'ideas_projects.id','=','favorite.idea_project_id')
        ->join('users','users.id','=','favorite.user_id')->join('users as owner','owner.id','=','ideas_projects.user_id')->join('cities','cities.id','=','ideas_projects.city_id')
        ->where('favorite.user_id','=',$user->id)->leftjoin('supported','supported.idea_project_id','=','ideas_projects.id')
        ->groupBy('ideas_projects.id')->groupBy('owner.id')->groupBy('ideas_projects.address')->groupBy('ideas_projects.basic_image')
        ->groupBy('cities.name')->groupBy('ideas_projects.idea')->groupBy('ideas_projects.budget')
        ->groupBy('ideas_projects.expected_date')
        ->select(\DB::raw('GROUP_CONCAT(owner.first_name, " ", owner.last_name) AS user'),'owner.id as user_id',
        'ideas_projects.id','ideas_projects.basic_image','ideas_projects.address',
        'cities.name as city_name','ideas_projects.idea as description','ideas_projects.budget',
        \DB::raw('GROUP_CONCAT(ideas_projects.user_id) AS user_id'),
        \DB::raw("DATEDIFF(ideas_projects.expected_date,now()) AS day"),
         \DB::raw('count(supported.id) as shareholders'),\DB::raw('sum(supported.amount_of_contribution) as collected'))->paginate(10);

        return response($projects, 200);

    }



     // get all projects of authenticated user
    public function Myprojects()
    {
      $user = Auth::user();
      $projects = Idea::join('users as owner','owner.id','=','ideas_projects.user_id')->join('cities','cities.id','=','ideas_projects.city_id')
     ->where('ideas_projects.user_id','=',$user->id)
     ->leftjoin('supported','supported.idea_project_id','=','ideas_projects.id')
     ->groupBy('ideas_projects.id','owner.id','ideas_projects.address','ideas_projects.basic_image','cities.name','ideas_projects.idea','ideas_projects.budget','ideas_projects.expected_date')
     ->select(\DB::raw('GROUP_CONCAT(owner.first_name, " ", owner.last_name) AS user'),'owner.id as user_id',
     'ideas_projects.id','ideas_projects.basic_image','ideas_projects.address',
     'cities.name as city_name','ideas_projects.idea as description','ideas_projects.budget',
     \DB::raw("DATEDIFF(ideas_projects.expected_date,now()) AS day"),
      \DB::raw('count(supported.id) as shareholders'),\DB::raw('sum(supported.amount_of_contribution) as collected'))->paginate(10);


     return response($projects, 200);

    }



    // checkIfHasEmail
    public function checkIfHasEmail(Request $request)
    {

       Cookie::make('name', 'hemaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 360);
       $phone = $request->phone;
       $user = User::where('phone_number' , $phone)->first();
       if(!is_null($user))
       {
         if($user->email == null)
         {

           $code = rand(20000,30000);

           // put code in session
           \Session::put('code', ['code' =>$code , 'user' => $user->id] );

           // put code in Cache to expired after 10 minutes
           $expire = Carbon::now()->addMinutes(10);
           Cache::put('code-' . $code , true, $expire);


            // status 1 == the user not has email
            $url = 'https://rest.nexmo.com/sms/json?' . http_build_query(
               [
                'api_key' =>  '26485788',
                'api_secret' => 'c813cb3d8fca5ccc',
                'to' => "$user->phone_number",
                'from' => 'أدعمني',
                'text' => "كود التحقق : $code" ,
                'type' => 'unicode'
               ]
               );

               $ch = curl_init($url);
               curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
               $response = curl_exec($ch);
               $decoded_response = json_decode($response, true);

               if($decoded_response['messages'][0]['status'] == 0){

                 return response(['status'=>1 , 'message'=>'code sent to your mobile']);
               }
                return response(['status'=> 3 , 'messages'=>'error during sending code . pls try anthor time']);
         }

              // status 2 == has email
         return response(['status' => 2] , 200);

       }
         // status 0 == no users has this phone number
         return response(['status' => 0]);
    }


   public function getUser($id)
   {
     $user = User::find($id);
     return response($user,200);
   }

}
