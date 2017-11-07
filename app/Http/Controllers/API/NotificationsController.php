<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use PushNotification;
use Auth;



class NotificationsController extends Controller
{
    //


    // get all notifications of authentacted user
    public function getAll()
    {
       $user = Auth::user();
       $data=[];
       $i =0;
       foreach ($user->unreadNotifications as $notification) {
                 if(!empty($notification->data['ownerImg'])){
                   $data[$i]['notiyOwnerImg'] = $notification->data['ownerImg'];
                 }
                 else{
                   $data[$i]['notiyOwnerImg'] = 'logo.png';
                 }
                $data[$i]['notiyTime'] = time_string($notification->created_at);
                $data[$i]['projectId'] = $notification->data['project']['id'];
                $data[$i]['notification_id'] = $notification->id;

                switch ($notification->type) {
                  // new comment on project
                  case 'App\Notifications\CommentOnProject':
                      $data[$i]['notiyType'] = 'comment';
                      $data[$i]['notiyBody'] = $notification->data['ownerName'] . ' علق علي مشروع '. $notification->data['project']['address'];
                    break;
                    // new add to favorite
                  case 'App\Notifications\FavoriteOnProject':
                      $data[$i]['notiyType'] = 'favorite';
                      $data[$i]['notiyBody'] = $notification->data['ownerName'] . ' أضف مشروعك الي المفضلة '. $notification->data['project']['address'];
                    break;
                    // new follow on project
                  case 'App\Notifications\FollowOnProject':
                      $data[$i]['notiyType'] = 'follow';
                      $data[$i]['notiyBody'] = $notification->data['ownerName'] . '  قام بمتابعة مشروعك '. $notification->data['project']['address'];
                    break;
                    // project will end soon
                  case 'App\Notifications\ProjectEndSoon':
                      $data[$i]['notiyType'] = 'end_soon';
                      $data[$i]['notiyBody'] = "عميلنا العزيز باقي يومين علي انتهاء فتره المشروع من فضلك جدد المدة او قم بحذف المشروع";
                    break;
                  case 'App\Notifications\SiteSupport':
                    $data[$i]['notiyType'] = 'support';
                    $data[$i]['notiyBody'] =    $notification->data['support']['full_name'].  "لقد تم دعم مشروعك بواسطه ";
                  break;

                  default:
                       $notiyBody = "no thing";
                    break;
                }
                $i++;
            }

            // paginate array of data
           $page = Input::get('page', 1); // Get the current page or default to 1
           $perPage = 10;
           $offset = ($page * $perPage) - $perPage;

           $data =  new LengthAwarePaginator(array_slice($data, $offset, $perPage, true),
                      count($data), $perPage, $page,['path' => request()->url(), 'query' => request()->query()]);


        return $data;

    }

    public function getUnreadNotifications(Request $request){
        $user = Auth::user();
        $count = $user->unreadNotifications;
        $count = count($count);
        return response($count,200);
    }

    public function readNotifications(Request $request,$token,$id){
        $user = Auth::user();
        $user->notifications()->where('id',$id)->get()->markAsRead();
        return response('ok',200);
    }




    // send notification to mobile device
    public static function sendNotification($token,$project_id, $type , $body)
    {
           $message = PushNotification::Message($project_id . ',' . $type,array('title' => $body));
           PushNotification::app('appNameAndroid')->to($token)->send($message);
    }


    // push message to mobile device
    public static function pushComment($token,$project_id ,$pic,$Body,$comment_id,$full_name,$time)
    {
           $message = PushNotification::Message($project_id . ',push_comment,'.$Body.','.$full_name.','.$pic.','.$time.','.$comment_id );
           PushNotification::app('appNameAndroid')->to($token)->send($message);
    }


    // push comment to mobile device
    public static function pushMessage($token,$con_id ,$pic,$messagee,$user_id,$username)
    {
           $message = PushNotification::Message($con_id . ',chat,'.$pic.','.$messagee.','.$user_id.','.$username,['title' =>  'قام '.$username.' بأرسال '. $messagee] );
           PushNotification::app('appNameAndroid')->to($token)->send($message);
    }


    public function test2()
    {
      $message = PushNotification::Message('1,follow ',array('title' => 'title title'));
      $token = "d7lXQFmFwMI:APA91bHyJJh-1JIq1o8d8AnXHIm-PYZjr53a5Y5CU1Gzp1xQ53KEVljTIrYKMdHhf-GgXtu3SlEa0h7ksVx3jZ8DT7Iw4SYnKd2Z6TFGb2z0MEJT9DLXlkP-KvNRQTAqfMG4V2Z56Ssa";
      PushNotification::app('appNameAndroid')->to($token)->send($message);
      // PushNotification::app('appNameAndroid')->to($token)->send('1,follow');
    }
}
