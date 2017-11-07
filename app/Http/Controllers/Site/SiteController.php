<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SupportRequest;
use App\Notifications\SiteSupport;
use App\Notifications\FavoriteOnProject;
use App\Slide;
use App\Brief;
use App\About;
use App\Goals;
use App\Idea;
use DB;
use App\Support;
use Redirect;
use App\Category;
use App\Favorite;
use Auth;
use Session;
use App\Policy;

class SiteController extends Controller
{

       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // browse of Slider
         $data['sliders']   = Slide::all();
         $data['brief_all'] = Brief::all();
         $data['about_all'] = About::all();
         $data['goals']     = Goals::all();
         $data['projects']  =
         Idea::with('support','user','city')->orderBy('created_at','desc')->get();
         $data['number_projects'] = count($data['projects']);
         return view('Site.index',$data);

    }

    public function search(Request $request){
        $data['categories'] =  Category::all();
        $data['projects'] =Idea::with('support','user','city')
        ->where('address',$request->body)->get();
        return view('Site.projects.all',$data);
    }

    public function favorite(Request $request,$id){

        $project =Idea::find($id);
        $user    =$project->user;
       if(Auth::user()){
        $favorite = Favorite::addFavorite($request,$id);
               // add favorite to notification
           if($project->user_id != Auth::id()){
              $user->notify(new FavoriteOnProject($favorite,$favorite->user));
             }
         Session::flash('message3', 'لقد تمت اضافت المشروع الى مفضلتك');
         return Redirect::back()->withErrors(['error_code',5]);
       }
          Session::flash('message', 'يجب ان تسجل دخولك اولا');
          return Redirect::back()->withErrors(['error_code',5]);

    }

    public function support($id){
        return view('Site.supports.create',compact('id'));
    }

     public function PostSupport( Request $request,$id){
        $project = Idea::find($id);
        $user    = $project->user;
        $support = Support::addSupport($request,$id);
        // add favorite to notification
        $user->notify(new SiteSupport($support));
        Session::flash('message3', 'مبروك لقد دعمت هذا المشروع ');
        return Redirect::back()->withErrors(['error_code',5]);

    }

    public function laws(){
        $policies =Policy::all();
        return view('Site.users.lawsandrights',compact('policies'));
    }


}
