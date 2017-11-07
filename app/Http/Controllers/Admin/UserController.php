<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\User;
use App\City;
use Session;

class UserController extends Controller
{
      /**
     * controll for all users in site from the admin
     */


       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // browse of admin
         $users =User::all();
         return view('Admin.users.browse',compact('users'));
       
    }

    public function create()
    {
       
        $cities =City::all();
        return view('Admin.users.create',compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
       User:: addUser($request);
       return redirect('User');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           $user      = User::find($id);
           $cities    = City::all();

           return view('Admin.users.edit',compact('user','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
       User:: editUser($request,$id);
       return redirect('User');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        Session::flash('message', 'المستخدم قد حذف'); 
        Session::flash('alert-class', 'alert-success');
        return redirect('User');
  }

}
