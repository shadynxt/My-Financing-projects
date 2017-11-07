<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmailRequest;
use App\Http\Requests\PasswordRequest;
use App\User;
use Redirect;
use Session;

class PasswordController extends Controller
{
    public function getEmailResetPassword(){
      return view('Site.emails.password');
    }

    public function postEmailResetPassword(EmailRequest $request){
      $user = User::where('email', $request->email)->first();
      if(isset($user)){
        reset_email($user);
      }
      else{
        Session::flash('message', 'هذا البريد الالكترونى غير صحيح');
        return Redirect::back()->withErrors(['error_code',5]);
      }
      Session::flash('message3', 'تم ارسال التاكيد الى الايميل الخاص بك');
      return Redirect::back()->withErrors(['error_code',5]);
    }

    public function getResetPassword($id, $token)
    {
       $user = User::where([['id',$id], ['token',$token]])->first();
       if (!empty($user)) {
         return view('Site.passwords.reset', compact('user'));
       }
       abort(403);
    }

    public function postResetPassword(PasswordRequest $request)
    {
       User::where([['id',$request->id], ['token',$request->token]])->update(['password' => bcrypt($request->password)]);
       return redirect('login');
    }
}
