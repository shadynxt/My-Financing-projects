<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\IdeaRequest;
use Illuminate\Routing\Controller;
use App\Idea;
use App\Category;
use App\User;
use App\City;
use Session;
use File;


class IdeasController extends Controller
{
     /**
     * controll for all ideas in site from the admin
     */

       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // browse of idea
         $ideas =Idea::all();
         return view('Admin.ideas.browse',compact('ideas'));

    }

    public function create()
    {
        $categories = Category::all();
        $users      = User::all();
        $cities     = City::all();
        return view('Admin.ideas.create',
            compact('categories','users','cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IdeaRequest $request)
    {
        Idea:: addIdea($request);
       return redirect('Idea');

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

       $idea       = Idea::find($id);
       $categories = Category::all();
       $users      = User::all();
       $cities     = City::all();
       return view('Admin.ideas.edit',
        compact('idea','categories','users','cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(IdeaRequest $request, $id)
    {
       Idea:: editIdea($request,$id);
       return redirect('Idea');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $idea =Idea::find($id);
        $idea->delete();
        File::delete($idea->basic_image);
        File::delete($idea->additional_photos);
        File::delete($idea->video);
        Session::flash('message', 'الفكره قد حذفت');
        Session::flash('alert-class', 'alert-success');
        return redirect('Idea');
  }

}
