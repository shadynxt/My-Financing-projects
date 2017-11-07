<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CommentRequest;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Comment;
use App\Idea;
use App\User;
use Session;

class CommentController extends Controller
{
      /**
     * controll for all comments in site from the admin
     */


       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // browse of comment
         $comments =Comment::all();
         return view('Admin.comments.browse',compact('comments'));
    }

    public function create()
    {
    	$ideas =Idea::all();
    	$users =User::all();
        return view('Admin.comments.create',compact('ideas','users'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
       Comment::addComment($request);
       return redirect('Comment');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           $comment = Comment::find($id);
           $ideas   = Idea::all();
           $users   = User::all();
           return view('Admin.comments.edit',compact('comment','ideas','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommentRequest $request, $id)
    {
       Comment::editComment($request,$id);
       return redirect('Comment');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment =Comment::find($id);
        $comment->delete();
        Session::flash('message', 'التعليق قد حذف');
        Session::flash('alert-class', 'alert-success');
        return redirect('Comment');
  }
}
