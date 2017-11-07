<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RecentRequest;
use App\Project_updates;
use App\Idea;
use App\User;
use Session;



class RecentController extends Controller
{
     /**
     * controll for all updates projects in site from the admin
     */


       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // browse of comment
         $recent_all = Project_updates::all();
         return view('Admin.recents.browse',compact('recent_all'));
       
    }

    public function create()
    {
    	$ideas =Idea::all();
        return view('Admin.recents.create',compact('ideas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecentRequest $request)
    {
       Project_updates::addRecent($request);
       return redirect('recent');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           $recent = Project_updates::find($id);
           $ideas   = Idea::all();
           return view('Admin.recents.edit',compact('recent','ideas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RecentRequest $request, $id)
    {
       Project_updates::editRecent($request,$id);
       return redirect('recent');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recent =Project_updates::find($id);
        $recent->delete();
        Session::flash('message', 'التحديث قد حذف'); 
        Session::flash('alert-class', 'alert-success');
        return redirect('recent');
  }
}
