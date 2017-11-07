<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Auth;
use Session;
use Redirect;
use App\City;
use App\User;
use Socialite;
use DateTime;

class AuthController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        // browse of admin
         return view('Site.users.login');

    }
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $email     =$request->email;
        $password  =$request->password;
        $remember  =$request->remember_me;
        if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
        // to active user
        $user = Auth::user();
        if ($user) {
        $user->active = 1;
        $user->save();
        }
        return redirect('profile/'.Auth::id());
        }

        elseif (Auth::attempt(['phone_number' =>$request->email,'password' =>$request->password])) {
        return redirect('profile/'.Auth::id());

        }
        Session::flash('message', 'المستخدم غير موجود');
        return Redirect::back()->withErrors(['error_code',5]);
    }

    // To Login By Facebook
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
            $user      = Socialite::driver('facebook')->stateless()->user();
            $users     = User::all();

            foreach($users as $user_logged ){
             if($user->id == $user_logged->facebook_id){
                   Auth::login( $user_logged, true);
                      $user = Auth::user();
                        if ($user) {
                        $user->active =1;
                        $user->save();
                        }
                  return redirect('profile/'.Auth::id());
             }
            }
                        $user_auth = new User();
                         $user_auth->token              = $user->token;
                         $user_auth->facebook_id        = $user->id;
                         $user_auth->first_name         = $user->name;
                         $user_auth->last_name          = $user->name;
                         $user_auth->profile_pic        = 'default.png';
                         $user_auth->updated_at         = new DateTime('now');
                         $user_auth->created_at         = new DateTime('now');
                         $user_auth->save();
                         Auth::login( $user_auth, true);
                         $user = Auth::user();
                         if ($user) {
                         $user->active =1;
                         $user->save();
                            }
                         return redirect('profile/'.Auth::id());
                         return redirect('login');

       }

         // To Login By Twitter
        public function redirect()
        {
            return Socialite::driver('twitter')->redirect();
        }

        /**
         * Obtain the user information from GitHub.
         *
         * @return Response
         */
        public function handle()
        {
            $user      = Socialite::driver('twitter')->user();
            $users     = User::all();
            foreach($users as $user_logged ){
             if($user->id == $user_logged->twitter_id){
                   Auth::login( $user_logged, true);
                      $user = Auth::user();
                        if ($user) {
                        $user->active =1;
                        $user->save();
                        }
                  return redirect('profile/'.Auth::id());
             }
            }
                        $user_auth = new User();
                         $user_auth->token              = $user->token;
                         $user_auth->twitter_id         = $user->id;
                         $user_auth->first_name         = $user->name;
                         $user_auth->last_name          = $user->name;
                         $user_auth->profile_pic        = 'default.png';
                         $user_auth->updated_at         = new DateTime('now');
                         $user_auth->created_at         = new DateTime('now');
                         $user_auth->save();
                         $use = Auth::login( $user_auth, true);
                        if ($use) {
                        $use->active =1;
                        $use->save();
                        }
                         return redirect('profile/'.Auth::id());
                         // else
                         return redirect('login');


        }


         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function forget()
    {
        // browse of admin
         return view('Site.users.forget');

    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $cities =City::all();
       return view('Site.users.register',compact('cities'));

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

       $user =User::addUser($request);
       Auth::login( $user , true);
       $user = Auth::user();
        if ($user) {
        $user->active =1;
        $user->save();
        }
       return redirect('profile/'.Auth::id());

    }


     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        $user =Auth::user();
        if($user){
            $user->active = 0;
            $user->save();
        }
        Auth::logout();
        return redirect('login');
    }

}
