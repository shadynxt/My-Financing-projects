<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Auth;
use App\City;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // browse of admin
        return view('Site.index');
       
    }

    // Logged in sit return you to profile

      public function profile($id)
    {
         $user =User::find($id);
         return view('Site.users.profile',compact('user'));
    }

    // to setting That User


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $user =User::find($id);
       $cities =City::all();
       return view('Site.users.setting',compact('cities','user')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       User::editUser($request ,$id);
       return redirect('profile/'.$id);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changePassword(UserRequest $request,$id)
    {
       $user =User::find($id);
       $user->password =  bcrypt($request->password);
       $user->save(); 
       return redirect('profile');
    
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
    }

    public function forget(){
        return view('Site.users.forget');
    }
}
