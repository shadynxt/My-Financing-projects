<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\PaymentController;
use App\Support;
use App\User;
use App\Idea;
use App\User_Supported;
use App\Http\Controllers\API\NotificationsController;
use Auth;

class SupporterController extends Controller
{

    /**
     * Show  All supporter of that project
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $supporters =Support::where('idea_project_id',$id)->where('known',1)->paginate(10);
        return response($supporters , 200);
    }





    // addFinance to un project
    public function addFinance(Request $request)
    {
      // save to database
      $email = $request->email;
      $known = $request->known;
      if(!is_null( $user = User::where('email',$email)->first())){
         Support::create($request->except('user_id','known') + ['user_id' => $user->id , 'known' => $known]);
      }
      else
      {
        $user = User_Supported::create(['username' => $request->username , 'email' => $request->email]);
        Support::create($request->except('known','user_support') + ['known' => $known , 'user_support' => $user->id]);
      }



       // payment the amount charge
       // here
       $payment_method = $request->payment_method;
       $visa_number = $request->visa_number;
       $cvc_code = $request->cvc_code;
       $month = $request->month;
       $year= $request->year;
       $charge_amount = $request->amount_of_contribution;

        $project = Idea::find($request->idea_project_id);
        $tokens = $project->user->mobile_token;
        $title = 'قام '.$request->username . ' بدعم مشروعك ';


        foreach ($tokens as $tokn)
        {
          // push notification to mobile device
            NotificationsController::sendNotification($tokn->token,$request->idea_project_id,'support',$title);
        }

      //  PaymentController::charge();

      return response(['status' => 'ok'], 200);
    }


}
