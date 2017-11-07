<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Message;

class MessageController extends Controller
{
    /**
     * controll for all recents in site from the admin
     */


       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // browse of comment
         $messages = Message::all();
         return view('Admin.messages.browse',compact('messages'));
       
    }

   
}
