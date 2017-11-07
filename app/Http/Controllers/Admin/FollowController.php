<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FollowRequest;
use App\Follow;
use App\User;
use Session;
use App\Idea;

class FollowController extends Controller
{
     /**
     * controll for all categories in site from the admin
     */


       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Browse For All Follow
         $follows =Follow::all();
         return view('Admin.follow.browse',compact('follows'));
       
    }
    
    /**
     * Create New Favorite
     *
     * 
     */
    public function create()
    {
        $users = User::all();
        $ideas =Idea::all();
        return view('Admin.follow.create',compact('users','ideas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FollowRequest $request)
    {
       Follow::addFollow($request);
       return redirect('follow');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           $follow = Follow::find($id);
           $users  = User::all();
           $ideas  =Idea::all();
           return view('Admin.follow.edit',compact('follow','users','ideas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FollowRequest $request, $id)
    {
       Follow::editFollow($request,$id);
       return redirect('follow');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Follow::find($id)->delete();
        Session::flash('message', 'تم حذف المتابعه'); 
        Session::flash('alert-class', 'alert-success');
        return redirect('follow');
  }
}
