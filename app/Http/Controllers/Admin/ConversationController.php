<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Conversation;

class ConversationController extends Controller
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
         $conversations = Conversation::all();
         return view('Admin.conversations.browse',compact('conversations'));
       
    }
}
