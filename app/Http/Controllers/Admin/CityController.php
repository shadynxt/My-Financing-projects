<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CityRequest;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\City;
use Session;

class CityController extends Controller
{
     /**
     * controll for all city in site from the admin
     */


       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // browse of city
         $cities =City::all();
         return view('Admin.cities.browse',compact('cities'));
       
    }

    public function create()
    {
       
        return view('Admin.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
      $city             =new City();
      $city->name       =$request->name;
      $city->save();
      return redirect('city');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           $city      = City::find($id);
           return view('Admin.cities.edit',compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, $id)
    {
       $city             = City::find($id);
       $city->name       = $request->name;
       $city->save();
       return redirect('city');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        City::find($id)->delete();
        Session::flash('message', 'المدينه قد حذف'); 
        Session::flash('alert-class', 'alert-success');
        return redirect('city');
  }
}
