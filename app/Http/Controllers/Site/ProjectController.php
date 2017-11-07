<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

use App\Http\Controllers\Controller;
use App\Http\Requests\IdeaRequest;
use App\Http\Requests\RecentRequest;
use App\Http\Requests\EndSoonProject;
use App\Notifications\CommentOnProject;
use App\City;
use App\Category;
use App\Idea;
use App\Support;
use DB;
use App\Comment;
use Carbon\Carbon;
use Auth;
use Session;
use Redirect;
use App\Project_updates;
use App\Image;
use DateTime;

class ProjectController extends Controller
{

       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $categories =  Category::all();
       $array = array();
       $projects =
       Idea::with('support','user','city')->paginate(8);
       return view('Site.projects.all',compact('categories','projects'));
    }


  // filter function
    public function postChange(Request $request)
    {
     $data['categories'] =  Category::all();
     if($request->search =="finish_soon"){
      // search by finish projects
        $data['projects'] =
        Idea::with('category','city','support')
        ->where(DB::raw('DATEDIFF(now(),now())'),'<',15)->paginate(8);
        return view('Site.projects.all',$data);
      }

      elseif($request->search =="new"){
        // search by new projects
        $data['projects'] =
        Idea::with('category','city','support')
        ->where(DB::raw('DATEDIFF( now(), expected_date )'),'<',1)->paginate(8);
         return view('Site.projects.all',$data);
       }
    elseif( $request->search2 ){
      // search by categories
        $id= $request->search2;
        $data['projects'] =
        Idea::with('category','city','support')->where('category_id',$id)->paginate(8);
        return view('Site.projects.all',$data);
    }
    return redirect('/project');
  }

    public function create()
    {
      if(Auth::user()){
      $data['cities']             = City::all();
      $data['categories']         = Category::all();
      $data['categories_desc']    =Category::orderBy('id','DESC')->limit(6)->get();
      $data['categories_asc']     =Category::orderBy('id','ASC')->limit(5)->get();

      return view('Site.projects.idea',$data);

      }
      Session::flash('message', 'يجب ان تسجل دخولك اولا');
      return Redirect::back()->withErrors(['error_code',5]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IdeaRequest $request)
    {
                Idea::addIdea($request);
                Session::flash('message3', 'تم اضافه مشروعك');
                return Redirect::back()->withErrors(['error_code',5]);
    }

    /**
     *
     *Show Your Projects
     *
     *
     */
    public function show($id)
    {
       $data['projects'] =Idea::with('support','user','city')
       ->where('user_id',$id)->get();
      return view('Site.projects.myprojects',$data);

    }



    public function project($id)
    {
    if(Idea::find($id)){
      $idea = Idea::with('user')->find($id);
      if ($idea) {
          $idea->views = ++$idea->views;
          $idea->save();
                }

        // $data['project']   =  Idea::find($id);
         $data['supports']    =  Support::where('idea_project_id',$id)->get();
         $data['comments']    =  Comment::where('idea_project_id',$id)->orderBy('created_at','desc')->get();
         $data['recent_all']  =  Project_updates::where('project_id',$id)->get();
         $data['images']      =  Image::where('idea_id',$id)->get();
         $data['projects']    =
        Idea::with('support','user','city')->where('id',$id)->get();
        return view('Site.projects.spacial_project',$data);
    }
       return view('Site.projects.notfound');


    }

     // comment in spacial project
        public function comment(Request $request,$id)
    {
      $project =Idea::find($id);
       $user   =$project->user;
      if(Auth::user()){
          $comment =Comment::addComment($request,$id);
            // to notification that comment that not userAuth
             if($project->user_id != Auth::id()){
               $user->notify(new CommentOnProject($comment));
             }
           return redirect('proj/'.$id);
      }

      Session::flash('message2', 'يجب ان تسجل دخولك اولا');
      return Redirect::back()->withErrors(['error_code',5]);

    }
    // recent in spacial project
    public function recent(RecentRequest $request,$id){
        Project_updates::addRecent($request,$id);
        return redirect('proj/'.$id);
    }
}
