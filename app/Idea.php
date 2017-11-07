<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Image;
use Auth;
class Idea extends Model
{
     protected $table = 'ideas_projects';
     protected $hidden = array('support');
     protected $fillable = ['address','link','idea','budget','expected_date','city_id',
                            'basic_image','video','category_id','youtube_link','user_id' ,'views'];

     //Add Idea
     public static function addIdea($request){

      if(isset($request->basic_image)){
        // Upload Image
        $file                           = $request->basic_image;
        $basic_image                    = date('Y-m-d-H:i:s') . "-" .mt_rand();
        $path                           = 'public/uploads/projects/';
        $file                           = $file->move($path, $basic_image);
      }

        // for video
        if(!empty($request->video)){
        $file                            = $request->video;
        $video                           = date('Y-m-d-H:i:s') . "-" .mt_rand();
        $path                            = 'public/uploads/videos/';
        $file                            = $file->move($path, $video);
       }

        $idea                            =     new Idea();
        $idea->address                   =     $request->address;
        $idea->category_id               =     $request->category_id;
        $idea->link                      =     $request->link;
        $idea->idea                      =     $request->idea;
        $idea->budget                    =     $request->budget;
        $idea->basic_image               =     $basic_image;
        if(!empty($request->video)){
        $idea->video                      =     $video;
         }
         $idea->youtube_link              =    $request->youtube_link;
        $idea->expected_date              =     $request->expected_date;
        $idea->city_id                    =     $request->city_id;
        if(Auth::user()){
            // If User Is User
        $idea->user_id                    =     Auth::id();
        }
        else{
            // Else User is Admin
        $idea->user_id                    =     $request->user_id;
        }
        $idea->save();
         if(isset($request->additional_photos)) {
            foreach ($request->additional_photos as $additional) {
                $file                           = $additional;
                $additional_photos              = date('Y-m-d-H:i:s') . "-" .mt_rand();
                $path                           = 'public/uploads/projects/';
                $file                           = $file->move($path, $additional_photos);
                $addition_image                  =     new Image();
                $addition_image->img             = $additional_photos;
                $addition_image->idea_id         = $idea->id;
                $addition_image->save();
            }
        }
        return $idea;

     }


    //Edit Idea
     public static function editIdea($request,$id){

        // for video
        if(isset($request->video)){

        $file                            = $request->video;
        $video                           = date('Y-m-d-H:i:s') . "-" .mt_rand();
        $path                            = 'public/uploads/videos/';
        $file                            = $file->move($path, $video);
       }
        $idea                         =     Idea::find($id);
        $idea->address                =     $request->address;
        $idea->link                   =     $request->link;
        $idea->idea                   =     $request->idea;
        $idea->budget                 =     $request->budget;
        $idea->youtube_link           =    $request->youtube_link;
        $idea->expected_date          =     $request->expected_date;
        $idea->city_id                =     $request->city_id;

         // for basic photo
        if(isset($request->basic_image)){
        $file                           = $request->basic_image;
        $basic_image                    = date('Y-m-d-H:i:s') . "-" .mt_rand();
        $path                           = 'public/uploads/projects/';
        $file                           = $file->move($path, $basic_image);
        $idea->basic_image              =$basic_image;
         }
         $idea->basic_image           = $idea->basic_image ;
         // for Video
        if($request->video !=""){
        $idea->video                  =     $video;
         }

        $idea->category_id            =     $request->category_id;
        $idea->user_id                =     $request->user_id;
        $idea->save();
        return $idea;

            if(isset($request->additional_photos)){
            foreach ($request->additional_photos as $additional) {
                $file                           = $additional;
                $additional_photos              = date('Y-m-d-H:i:s') . "-" .mt_rand();
                $path                           = 'public/uploads/projects/';
                $file                           = $file->move($path, $additional_photos);
                $addition_image                  =     new Image();
                $addition_image->img             = $additional_photos;
                $addition_image->idea_id = $idea->id;
                $addition_image->save();
            }
        }
     }



       public function city()
     {
        return $this->belongsTo('App\City','city_id');
     }
        public function user()
     {
        return $this->belongsTo('App\User','user_id');
     }
         public function category()
     {
        return $this->belongsTo('App\Category','category_id');
     }

     public function support()
     {
        return $this->hasMany('App\Support','idea_project_id');
     }

       public function comment()
     {
        return $this->hasMany('App\Comment','idea_project_id');
     }

        public function favorite()
     {
        return $this->hasMany('App\Favorite','idea_project_id');
     }
       /////// all additional images
     public function images()
     {
       return $this->hasMany('App\Images','idea_id')->select('img');
     }
         // all comments in this idea
     public function comments()
     {
       return $this->hasMany('App\Comment','idea_project_id');
     }

}
