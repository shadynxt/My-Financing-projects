<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\ContactUs;
use Session;
use Redirect;
class ContactController extends Controller
{
         /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


    }

    public function create()
    {
      return view('Site.contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        ContactUs::addContact($request);
        Session::flash('message3', 'لقد تمت اضافه بياناتك الينا سنتصل بك لاحقا');
        return Redirect::back()->withErrors(['error_code',5]);
    }





}
