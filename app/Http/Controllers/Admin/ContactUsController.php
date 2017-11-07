<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\ContactUs;

class ContactUsController extends Controller
{
     /**
     * controll for all contacts in site from the admin
     */


       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // browse of admin
         $contacts =ContactUs::all();
         return view('Admin.contactus.browse',compact('contacts'));
       
    }

}
