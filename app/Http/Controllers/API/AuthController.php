<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\User;
use Auth;
use App\City;
use App\Mobile_Token;
use JWTAuth;
use \Cache;
use Carbon\Carbon;
use Session;
use Tymon\JWTAuth\Exceptions\JWTException;
use Mail;




class AuthController extends Controller
{


   // register new user
   public function registeration(Request $request)
   {
     $rules =['phone_number'=>'unique:users' , 'email'=>'unique:users' , 'token'=>'unique:mobile__tokens'];
     $messages = array( 'email.unique' => 'email','phone_number.unique'=>'phone');
     $validator = \Validator::make($request->all(), $rules,$messages);
     if ($validator->fails())
     {
         return response(['status' => 0 , 'errors' => $validator->errors()->all()]);
     }

    $user = User::create($request->except('password') + ['password'=>bcrypt($request->password),
    // create accsess token
     'token' => preg_replace('/[^A-Za-z0-9\-\']/', '', bcrypt(mt_rand())),'profile_pic' => 'default.png' ]);

    return response(['status' => 1 ,'user'=> $user],200);
   }



   // authentications users
   public function authentaction(Request $request)
   {
      // check user login by phone or email
      $user = (filter_var($request->username, FILTER_VALIDATE_EMAIL)) ? 'email' : 'phone_number';
      $credentials = [$user=> $request->username , 'password'=>$request->password];


       if (Auth::attempt($credentials))
       {
            // check if has mobile token if has not do thing if not add new token
           Mobile_Token::check($request, Auth::user()->id);
           return response(['user' => Auth::user(),'token' => Auth::user()->token ,'status' => 1], 200);
       }

      return response(['status' => 0],200);
  }



   public function getUser()
   {
     //first_name - last_name  - phone_number  - email  - city_id  - profile_pic
     $user = Auth::user();
     return $user;
   }



    public function logout(Request $request)
    {

       $tokn = Mobile_Token::where('token',$request->mobile_token)->first();
       if($tokn != null){
         User::find($tokn->user_id)->update(['token' => preg_replace('/[^A-Za-z0-9\-\']/', '', bcrypt(mt_rand()))]);
         Auth::logout(User::find($tokn->user_id));
         $tokn->delete();
      }
      return response(['status'=>'ok']);
    }


    // edit user
    public function editAuth(Request $request)
    {
      $user = Auth::user();
        //old pass and img
        $pass = $user->password;
        $img = $user->profile_pic;

         // new password if found
        if($request->password != null)
          $pass = bcrypt($request->password);

          // return $pass;

        // receve base64 img code , de_code , write it in users folder images and return img name
        if($request->profile_pic != null){
          $img = uploadImgFromMobile($request->profile_pic,'/uploads/users/');
        }
        else{
          $img = 'default.png';
        }

        $user->update($request->except('password','profile_pic') + ['password'=> $pass,'profile_pic'=>$img]);
        return $user;
    }



    // receve username and type option => [ email or phone]
    public function resetPassword(Request $request)
    {
       // check user name type email or phone
       $username = (filter_var($request->username, FILTER_VALIDATE_EMAIL)) ? 'email' : 'phone_number';
       $user = User::where($username,$request->username)->first();
       if($user == null)
         return response(['status' => 0] ,404);

       // generate new code
       $code = rand(20000,30000);

       // put code in session
      //  Session::put('code', ['code' =>$code , 'user' => $user->id] );

      // save session in db sessions table
      if(\DB::table('sessions')->where('user_id', $user->id)->count() == 0)
      {
       \DB::table('sessions')->insert(['user_id' => $user->id , 'code_session' => $code]);
      }
      else {
        \DB::table('sessions')->where('user_id', $user->id)->update(['code_session' => $code]);
      }

       // put code in Cache to expired after 10 minutes
       $expire = Carbon::now()->addMinutes(10);
       Cache::put('code-' . $code , true, $expire);

       // type send on
       // send code to email
       if($request->type == 'email')
       {
           Mail::raw($code , function ($message) use ($user){
             $message->to($user->email);
           });
       }

       // send code in phone
       if($request->type == 'phone')
       {
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
                return response(['status'=> 2 , 'messages'=>'error during sending code . pls try anthor time']);
       }


        return response(['status' => 2,'message'=>'code sent to your email'], 200);
        //  return $code;
    }




    // virefy code
    public function verifyCode(Request $request)
    {

        $code = \DB::table('sessions')->where('code_session','=',$request->code)->count();


      if($code != 0){
        $code = $code->code_session;
        if(Cache::has('code-'.$code)){

          if($request->code == $code)
             return response(['status' => 1] ,200); // code correct

                 // status 0 code invalide
          return response(['status' => 0]);
        }
         // status 2 code expired
        return response(['status' => 2]);
      }
       // status 2 the code had changed
      return response(['status' => 2]);
    }



    // change old password with new password
    // { password - code }
    public function Reset(Request $request)
    {
      $code = \DB::table('sessions')->where('code_session','=',$request->code)->first();
       if($code != null)
       {

          $codee = $code->code_session;
          // return $code;
          User::find($code->user_id)->update(['password' => bcrypt($request->password)]);
         \DB::table('sessions')->where('user_id',$code->user_id)->delete();
          return response(['status' => 'ok']);
       }

       return response(['status' => 0]);

    }
}
