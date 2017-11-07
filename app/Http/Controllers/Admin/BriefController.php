<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\Http\Requests\BriefRequest;
use Illuminate\Http\Request;
use App\Brief;

class BriefController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // browse of all About
        $brief_all  =   Brief::all();
        return view('Admin.brief.browse',compact('brief_all'));
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $brief    =  Brief::find($id);
       return view('Admin.brief.edit',compact('brief')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BriefRequest $request, $id)
    {
       Brief::editBrief($request ,$id);
       return redirect('brief');
    }
}
