<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brief extends Model
{
    protected $table ='brief';

    public static function editBrief($request ,$id){
    	$brief        =  Brief::find($id);
    	$brief->title = $request->title;
    	$brief->body  = $request->body;
    	$brief->save();

    }
}
