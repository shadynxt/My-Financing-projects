<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FavoriteRequest;
use App\Favorite;
use App\Idea;
use App\User;
use Session;

class FavoriteController extends Controller
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
        // browse of admin
         $favorites =Favorite::all();
         return view('Admin.favorites.browse',compact('favorites'));
       
    }
    
    /**
     * Create New Favorite
     *
     * 
     */
    public function create()
    {
        $users =User::all();
        $ideas =Idea::all();
        return view('Admin.favorites.create',compact('users','ideas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FavoriteRequest $request)
    {
      Favorite::addFavorite($request);
       return redirect('favorite');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           $favorite = Favorite::find($id);
           $users    = User::all();
           $ideas    = Idea::all();
           return view('Admin.favorites.edit',compact('favorite','users','ideas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FavoriteRequest $request, $id)
    {
       Favorite::editFavorite($request,$id);
       return redirect('favorite');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Favorite::find($id)->delete();
        Session::flash('message', 'تم حذف المفضله'); 
        Session::flash('alert-class', 'alert-success');
        return redirect('favorite');
  }
}
