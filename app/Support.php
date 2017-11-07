<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $table ="supported";

    protected $hidden = array('user','user_supportt');
    protected $fillable = ['amount_of_contribution' , 'idea_project_id' ,'known' ,'user_support' ,'user_id'];

    public static function addSupport($request,$id=null){
     $support                         = New Support();
     $support->amount_of_contribution = $request->amount_of_contribution;
     $support->full_name              =$request->full_name;
     $support->email                  =$request->email;
     if($request->active ==='checked' ){
     	$support->known                 =0;
     }
     else{
     	$support->known                 =1;
     }

     // Id for support
     if($id)
     {
        $support->idea_project_id        =$id;
     }
     else{
        $support->idea_project_id        =$request->idea_project_id;

     }
     $support->save();
     return $support;
    }

    public static function editSupport($request,$id){
     $support                         = Support::find($id);
     $support->amount_of_contribution = $request->amount_of_contribution;
     $support->full_name              =$request->full_name;
     $support->email                  =$request->email;
     if($request->active ==='checked' ){
     	$support->known                 =0;
     }
     else{
     	$support->known                 =1;
     }
     $support->idea_project_id        =$request->idea_project_id;
     $support->save();
    }

  
    public function user_supportt()
    {
      return $this->belongsTo('App\User_Supported','user_support');
    }

    public  function project(){
        
        return $this->belongsTo('App\Idea','idea_project_id');

    }

    public function user()
    {
      return $this->belongsTo('App\User','user_id');
    }
}
