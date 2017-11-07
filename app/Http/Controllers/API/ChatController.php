<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\NotificationsController;
use App\Message;
use App\Conversation;
use App\User;
use Input;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Auth;

class ChatController extends Controller
{
    //

    //getAll chat users with first Messages of each one
    public function getAllUsers()
    {
      $user = Auth::user();

      $allUsers1 = User::Join('conversations','users.id','conversations.user_one')
     ->where('conversations.user_two', $user->id)->select('conversations.id as conId','users.id as user_to','users.profile_pic as img',\DB::raw('CONCAT(users.first_name, " ", users.last_name) AS full_name'))->get();
     //return $allUsers1;
     $allUsers2 = User::Join('conversations','users.id','conversations.user_two')
     ->where('conversations.user_one', $user->id)->select('conversations.id as conId','users.id as user_to','users.profile_pic as img',\DB::raw('CONCAT(users.first_name, " ", users.last_name) AS full_name'))->get();
     $users= array_merge($allUsers1->toArray(), $allUsers2->toArray());

     $i=0;
     foreach($users as $user)
     {
       $message = Message::where('conversation_id',$user['conId'])->orderBy('created_at','desc')->first();

       if($message != null){

         $users[$i]['message'] = $message->message;
         $users[$i]['time'] = $message->created_at->format('h:i A');

       }else {
                Conversation::find($user['conId'])->delete();
                unset($users[$i]);
       }

       $i++;
     }

      // paginate array of users
     $page = Input::get('page', 1); // Get the current page or default to 1
     $perPage = 10;
     $offset = ($page * $perPage) - $perPage;

     $users =  new LengthAwarePaginator(array_slice($users, $offset, $perPage, true),
                count($users), $perPage, $page,['path' => request()->url(), 'query' => request()->query()]);

     return $users;
    }





    // send new Message
    // $request->conversation_id;  - $request->user_to; - $request->message;
    public function sendMessage(Request $request)
    {

      $rules =['message'=>'required'];
      $validator = \Validator::make($request->all(), $rules);
      if ($validator->fails())
      {
          return response(['status' => 0 , 'errors' => $validator->errors()->all()]);
      }

        $user_from = Auth::user();
        $conID = $request->conversation_id;
        $user_to = $request->user_to;
        $msg = $request->message;


       $mes = Message::create([
       'user_to' => $user_to,
       'user_from' => $user_from->id,
       'message' => $msg,
       'conversation_id' => $conID]);




       $mes->profile_pic = $mes->sender->profile_pic;
       $mes->msg_owner = 1;


       $user = User::find($user_to);
       $token = $user->token->token;
       $username = $user->first_name.' '.$user->last_name;

      // push notification to mobile device
      NotificationsController::pushMessage($token,$conID ,$mes->sender->profile_pic,$mes->message,$user_from->id,$username);

       return $mes;


    }




     // get all of Messages that belongs to one user
     public function getConversation($token,$user_id)
     {
       // user that he want to send Message
        $user = Auth::user();

        // who user that recever this message
        $userTo =$user_id;

        $chekifHasConversation1 = \DB::table('conversations')->where('user_one',$user->id)
        ->where('user_two',$userTo)->get();

        $chekifHasConversation2 = \DB::table('conversations')->where('user_one',$userTo)
        ->where('user_two',$user->id)->get();


        // check if there are conversation between them
        if((count($chekifHasConversation1) > 0) || (count($chekifHasConversation2) > 0))
        {
            if(count($chekifHasConversation1) > 0)
               $conID = $chekifHasConversation1->first()->id;


            if(count($chekifHasConversation2) > 0)
               $conID = $chekifHasConversation2->first()->id;
              //  return $chekifHasConversation2->id;

             }else {
                // if there not conversation found , create an empty conversation
                      $con = Conversation::create([
                        'user_one'=>$user->id,
                        'user_two'=>$userTo
                      ]);
                      $conID = $con->id;
             }

             // get messages in this conversation
             $messages =  Message::where('conversation_id',$conID)->Join('users','users.id','=','messages.user_to')
             ->select('users.profile_pic','messages.message','messages.created_at','messages.user_from','messages.user_to')->orderBy('created_at', 'desc')->paginate(10);

             // append message owner
             foreach ($messages as $message) {

               if($message->user_from == $user->id)
                  $message->msg_owner = 1;
               else
                 $message->msg_owner = 0;

             }
             return response($messages);

     }


    //start new conversation
    // Request => user_id  ,  message
    public function startConversation(Request $request)
    {
       // user that send Message
        $user = Auth::user();

       // who user that recever this message
        $userTo =$request->user_id;
        $chekifHasConversation1 = \DB::table('conversations')->where('user_one',$user->id)
        ->where('user_two',$userTo)->get();

        $chekifHasConversation2 = \DB::table('conversations')->where('user_one',$userTo)
        ->where('user_two',$user->id)->get();


        if((count($chekifHasConversation1) > 0) || (count($chekifHasConversation2) > 0))
        {
            if(count($chekifHasConversation1) > 0)
               $conID = $chekifHasConversation1->first()->id;


            if(count($chekifHasConversation2) > 0)
               $conID = $chekifHasConversation2->first()->id;


        }else {
                 $con = \DB::table('conversations')->insert([
                   'user_one'=>$user->id,
                   'user_two'=>$userTo
                 ]);
                 $conID = $con->id;
        }
      $mes =  Message::create([
          'message'=>$request->message,
          'conversation_id'=>$conID,
          'user_from'=> $user->id,
          'user_to'=>$userTo
        ]);


        $mes->profile_pic = $mes->sender->profile_pic;
        $mes->msg_owner = 1;


        $user = User::find($userTo);
        $tokens = $user->mobile_token;
        $username = $mes->userFrom->first_name.' '.$mes->userFrom->last_name;

       foreach ($tokens as $tokn)
        {
          // push notification to mobile device
          NotificationsController::pushMessage($tokn->token,$conID ,$mes->sender->profile_pic,$mes->message,$user->id,$username);
        }

        return $mes;



    }
}
