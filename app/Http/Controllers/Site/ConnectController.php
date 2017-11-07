<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Message;
use App\Conversation;
use App\User;
use Auth;
use Session;
use Redirect;

class ConnectController extends Controller
{

   public function showMessage(){
       $id =Auth::id();
       if(Message::where('user_to',$id)->orWhere('user_from',$id)->count() == 0)
           return view('Site.users.nomessage');

         $user = Conversation::where('user_one',$id)->orWhere('user_two',$id)->first();

         if($user->user_two == $id)
              $user2 = $user->user_one;

          else
               $user2 = $user->user_two;


       return redirect('choose/'.$user2);

   }

   public function messageMe($id){
    if(Auth::id() !=$id){
       $user =Auth::user();
  // who user that recever this message
       $userTo =$id;
       $chekifHasConversation1 = \DB::table('conversations')->where('user_one',$user->id)
       ->where('user_two',$userTo)->get();
       $chekifHasConversation2 = \DB::table('conversations')->where('user_one',$userTo)
       ->where('user_two',$user->id)->get();
       if((count($chekifHasConversation1) > 0) || (count($chekifHasConversation2) > 0))
       {
           if(count($chekifHasConversation1) > 0)
              $conID = $chekifHasConversation1->first()->id;
               if(count($chekifHasConversation2) > 0)
              $conID = $chekifHasConversation1->first()->id;
          }else {
                $con = Conversation::create([
                  'user_one'=>$user->id,
                  'user_two'=>$userTo
                ]);
                $conID = $con->id;
       }
   return redirect('choose/'.$id);
    }
     Session::flash('message', 'لا يمكن ان تراسل نفسك');
     return Redirect::back()->withErrors(['error_code',5]);

 }


    public function chooseUser(Request $request,$id)
   {
    $user =Auth::user();
    $allUsers1 = User::Join('conversations','users.id','conversations.user_one')
    ->where('conversations.user_two', $user->id)
    ->select('conversations.id as conId','users.id as user_to','users.profile_pic as img',
      'users.active as active','users.first_name AS full_name')->get();
    //return $allUsers1;

    $allUsers2 = User::Join('conversations','users.id','conversations.user_two')
    ->where('conversations.user_one', $user->id)
    ->select('conversations.id as conId','users.id as user_to','users.profile_pic as img',
      'users.active as active','users.first_name AS full_name')->get();
    $users= array_merge($allUsers1->toArray(), $allUsers2->toArray());    //  return $users;
     $users =array_reverse($users);
     $messages =Message::where('user_from',Auth::id())->where('user_to',$id)
     ->orWhere('user_from',$id)->orWhere('user_to',Auth::id())->get();
     // dd($users);

      return view('Site.users.message',compact('users','messages','id'));
   }
   public function searchUser(Request $request){
        $id =User::where('first_name','!=',Auth::user()->first_name)
        ->where('first_name',$request->body)->select('id');
        return redirect('choose/18');
   }


    public function sendMessage(Request $request,$id){
     $message                  =new Message();
     $message->user_from       =Auth::id();
     $message->user_to         =$id;
     $message->message         =$request->content;
     $message->conversation_id =$request->conversation;
     $message->save();
     return redirect('choose/'.$id);
    }


    // notification for site

   public function showNotification(){
    $user =Auth::user();
    $i=0;
    foreach ($user->notifications as $notification) {
      switch ($notification->type) {
        case 'App\Notifications\CommentOnProject':
          $data[$i]['username']    =$notification->data['ownerName'];
          $data[$i]['user_id']     =$notification->data['userThatNoty']['id'];
          $data[$i]['project_id']  =$notification->data['project']['id'];
          $data[$i]['body']        ="علق على مشروعك";
          $data[$i]['time']        =$notification->created_at->format('m:i A');
          $data[$i]['date']        =$notification->created_at->format('d-m-y');
        break;
        case 'App\Notifications\FavoriteOnProject':
          $data[$i]['username']    =$notification->data['ownerName'];
          $data[$i]['user_id']     =$notification->data['userThatNoty']['id'];
          $data[$i]['project_id']  =$notification->data['project']['id'];
          $data[$i]['body']        ="تمت اضافه مشروعك الى مفضلته";
          $data[$i]['time']        =$notification->created_at->format('m:i A');
          $data[$i]['date']        =$notification->created_at->format('d-m-y');
      break;
          case 'App\Notifications\SiteSupport':
          $data[$i]['username']    =$notification->data['ownerName'];
          $data[$i]['user_id']     =$notification->data['userThatNotify']['id'];
          $data[$i]['project_id']  =$notification->data['project']['id'];
          $data[$i]['body']        ="طلب ان يدعم مشروعك";
          $data[$i]['time']        =$notification->created_at->format('m:i A');
          $data[$i]['date']        =$notification->created_at->format('d-m-y');
      break;
          case 'App\Notifications\ProjectEndSoon':
          $data[$i]['username']    =$notification->data['ownerName'];
          $data[$i]['user_id']     =$notification->data['userThatNotify']['id'];
          $data[$i]['project_id']  =$notification->data['project']['id'];
          $data[$i]['body']        ="طلب ان يدعم مشروعك";
          $data[$i]['time']        =$notification->created_at->format('m:i A');
          $data[$i]['date']        =$notification->created_at->format('d-m-y');
      break;
        default:
          # code...
        break;
      }
      $i++;
    }
   	    return view('Site.users.notification',compact('data'));

   }




}
