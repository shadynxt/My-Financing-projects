<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $table ="site_policy";

    public static function edit($id,$request){
      $policy              =  Policy::find($id);
      $policy->body        =  $request->body;
      $policy->site_policy = $request->site_policy;
      $policy->save();
      return $policy;
    }
}
