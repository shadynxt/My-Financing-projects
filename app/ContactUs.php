<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = 'Contact_us';

    public static function addContact($request){
    	    $contact               = new ContactUs();
          $contact->first_name   = $request->first_name;
          $contact->last_name    = $request->last_name;
          $contact->email        = $request->email;
          $contact->phone_number =$request->phone_number;
          $contact->msg          =$request->msg;
          $contact->save();
    }
}
