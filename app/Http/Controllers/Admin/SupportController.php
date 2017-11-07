<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SupportRequest;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Support;
use App\Idea;
use Session;

class SupportController extends Controller
{
     /**
     * controll for all supporters in site from the admin
     */


       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // browse of suporters
         $suporters =Support::all();
         return view('Admin.supported.browse',compact('suporters'));
       
    }

    public function create()
    {
    	$ideas =Idea::all();
        return view('Admin.supported.create',compact('ideas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupportRequest $request)
    {
       Support:: addSupport($request);
       return redirect('Supporter');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           $support = Support::find($id);
           $ideas   = Idea::all();
           return view('Admin.supported.edit',compact('support','ideas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupportRequest $request, $id)
    {
       Support:: editSupport($request,$id);
       return redirect('Supporter');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $support =Support::find($id);
        $support->delete();
        Session::flash('message', 'المدعم قد حذف'); 
        Session::flash('alert-class', 'alert-success');
        return redirect('Supporter');
  }

}
