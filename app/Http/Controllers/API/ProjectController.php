<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Routing\Controller;
use App\Idea;
use App\Project_updates;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use App\Comment;
use App\City;
use App\Support;
use App\Images;
use App\Follow;
use App\Favorite;
// use JWTAuth;
use Auth;



class ProjectController extends Controller
{


   public function getAllProjects()
   {
     // all projects orderBy latest
     $projects = Idea::leftjoin('supported','supported.idea_project_id','=','ideas_projects.id')
      ->groupBy('ideas_projects.id','ideas_projects.address','ideas_projects.basic_image','cities.name',
      'ideas_projects.idea','ideas_projects.budget','ideas_projects.expected_date','ideas_projects.created_at')
     ->join('cities','cities.id','=','ideas_projects.city_id')
     ->join('users','users.id','=','ideas_projects.user_id')
     ->select('ideas_projects.id','ideas_projects.address','ideas_projects.budget','ideas_projects.basic_image',
     'cities.name as city_name','ideas_projects.idea as description','ideas_projects.budget',
     \DB::raw('GROUP_CONCAT(DISTINCT users.first_name, " ", users.last_name) AS user'),
     \DB::raw('GROUP_CONCAT(users.id) AS user_id'),
     \DB::raw('count(supported.id) as shareholders'),\DB::raw('sum(supported.amount_of_contribution) as collected'),
     \DB::raw("DATEDIFF(ideas_projects.expected_date,now()) AS day")
     )->orderBy('ideas_projects.created_at','desc')->paginate(10);
     foreach ($projects as $key => $project) {
       if($projects[$key]->day ==null){
         $projects[$key]->day ="لا يوجد";
       }
     }
        return response()->json($projects,200);

  }





  public function addProject(Request $request)
  {
       // user that authentacted
       $user = Auth::user();

       // upload basic image of project
       $img = uploadImgFromMobile($request->basic_image,'/uploads/projects/');

       // create new project
       $project = Idea::create($request->except('img','video','basic_image') + ['basic_image'=>$img ,'user_id'=>$user->id]);

       // upload additional images of project
       if($request->additional_image){
             foreach ($request->additional_image as $img){
                 $img = uploadImgFromMobile($img,'/uploads/projects/');
                 Images::create(['img'=>$img , 'idea_id'=>$project->id]);
             }
           }


        return response(['status'=>'ok'],200);
  }




  public function uploadVideo(Request $request)
  {
    // dd($request->all());
    if($request->type == 'link')
    {
      Idea::find($request->project_id)->update(['youtube_link' => $request->video]);
      return response(['status' => 'ok']);
    }

    $imageName = date('Y-m-d-H:i:s') . "-" .$request->file('video')->getClientOriginalName();
    $request->file('video')->move(
    base_path() . '/public/uploads/projects/videos', $imageName
    );

    Idea::find($request->project_id)->update(['video' => $imageName]);
    return response(['status' => 'ok']);


  }



    // all city
    public function cities(){
      $cities = City::all();
      return response($cities, 200);
    }

       // single post if user authenticated
    public function getSinglePost($token,$id)
    {
      if($user = Auth::user())
      {
        // return $user;
        // check if this project followed by this user or not
           if(!is_null($check = Follow::where('user_id',$user->id)->where('project_id',$id)->first()))
               $data['follow'] = 1;

           else
               $data['follow'] = 0;


          // check if this project Favorited by this user or not
           if(!is_null($check = Favorite::where('user_id',$user->id)->where('idea_project_id',$id)->first()))
               $data['favorite'] = 1;

           else
               $data['favorite'] = 0;



           if(Idea::find($id)->user_id == $user->id)
              $data['owner'] = 1;
              else
              $data['owner'] = 0;
      }




      $idea = Idea::find($id);
      $idea->update(['views' => $idea->views + 1]);
      $data['city_name']     = $idea->city->name;
      $data['budget']     = $idea->budget;
      $data['address']       = $idea->address;
      $data['imgs']          = $idea->images;

      $now = Carbon::now();
      $created = new Carbon($idea->expected_date);
      $data['day'] = $created->diff($now)->days;
      $data['description']   = $idea->idea;
      $data['collected']  = $idea->support->sum('amount_of_contribution');
      $data['commentsCount'] = Count($idea->comments);
      $data['views'] = $idea->views + 1;
      $data['shareholders'] = count($idea->support);
      $data['user'] = $idea->user->first_name.' '.$idea->user->last_name;
      $data['user_img'] = $idea->user->profile_pic;
      $data['video'] = $idea->video;
      $data['youtube_link'] = $idea->youtube_link;

      return $data;
    }



    //single post project
    public function getPost($id)
    {


      $idea = Idea::find($id);
      $idea->update(['views' => $idea->views + 1]);

      $data['city_name']     = $idea->city->name;
      $data['budget']     = $idea->budget;
      $data['address']       = $idea->address;
      $data['imgs']          = $idea->images;

      $now = Carbon::now();
      $created = new Carbon($idea->expected_date);
      $data['day'] = $created->diff($now)->days;
      $data['description']   = $idea->idea;
      $data['collected']  = $idea->support->sum('amount_of_contribution');
      $data['commentsCount'] = Count($idea->comments);
      $data['views'] = $idea->views + 1;
      $data['shareholders'] = count($idea->support);
      $data['user'] = $idea->user->first_name.' '.$idea->user->last_name;
      $data['user_img'] = $idea->user->profile_pic;
      $data['video'] = $idea->video;
      $data['youtube_link'] = $idea->youtube_link;
      $data['follow'] = 0;
      $data['favorite'] = 0;
      $data['owner'] = 0;



      return $data;
    }


    //updates of project
    public function getUpdates($id)
    {
      $all_updates = Project_updates::where('project_id',$id)->paginate(10);
      foreach ($all_updates as $update) {
        // return arabic data such as 14 مايو 2017
        $update->mounth = $this->dateInarabic($update->created_at->format('Y-m-d'));
        $update->day =  date("d", strtotime($update->created_at));
        $update->year =  date("Y", strtotime($update->created_at));
      }
      return $all_updates;
    }


    // get shareholders of project
    public function getShareholders($id)
    {
      // $s = Support::join('ideas_projects','ideas_projects.id','=','supported.idea_project_id')
      // ->join('users','users.id','=','supported.user_id')
      // ->join('users_supported','users_supported.id','=','supported.user_support')
      //  ->where('ideas_projects.id',$id)->select('users.id','users.first_name','users.active','users.last_name','users.profile_pic','supported.amount_of_contribution','supported.created_at')
      //  ->paginate(10);


        $s = Support::where('idea_project_id',$id)->where('known',1)->paginate(10);

        foreach ($s as $ss){
           if(!is_null($ss->user))
           {
             $ss->full_name = $ss->user->first_name.' '.$ss->user->last_name;
             $ss->profile_pic = $ss->user->profile_pic;
             $ss->active = $ss->user->active;
           }

           if(!is_null($ss->user_support))
           {
             $ss->full_name = $ss->user_supportt->username;
             $ss->profile_pic = 'default-user.png';
             $ss->active = 0;
           }

          $ss->mounth = $this->dateInarabic($ss->created_at->format('Y-m-d'));
          $ss->day =  date("d", strtotime($ss->created_at));
          $ss->year =  date("Y", strtotime($ss->created_at));
        }
       return $s;

    }



    public function dateInarabic($date)
    {
         // convert date from en to arabic the mounths name
        $months = array("Jan" => "يناير","Feb" => "فبراير","Mar" => "مارس","Apr" => "أبريل","May" => "مايو","Jun" => "يونيو","Jul" => "يوليو",
        "Aug" => "أغسطس","Sep" => "سبتمبر","Oct" => "أكتوبر","Nov" => "نوفمبر","Dec" => "ديسمبر");
        $en_month = date("M", strtotime($date));
        $ar_month = $months[$en_month];

        return $ar_month;
    }


    // //search by title of project
    public function searchByTitle($keyword)
    {

      $projects = Idea::join('cities','cities.id','=','ideas_projects.city_id')
      ->join('users','users.id','=','ideas_projects.user_id')
      ->where('address', 'like', "%{$keyword}%")->select('ideas_projects.id','ideas_projects.address','ideas_projects.basic_image',
      'cities.name','ideas_projects.idea','ideas_projects.expected_date','users.first_name','users.last_name')->paginate(10);

      if(count($projects) == 0)
           return response()->json($projects,200);


      foreach($projects as $project)
      {
        if($project->budget ==0){
         $project->collected = 0;
        }
        else{
          $project->shareholders = count($project->support);
          $project->collected = ($project->support->sum('amount_of_contribution') * 100) / $project->budget;
        }

      }

      return response()->json($projects,200);

    }



    // filler by latest
    public function filter($cat_id ,$keyword , $filterType)
    {

      // fetch all projects in Database
      $query = Idea::leftjoin('supported','supported.idea_project_id','=','ideas_projects.id')
      ->groupBy('ideas_projects.id')->groupBy('ideas_projects.address')->groupBy('ideas_projects.basic_image')
      ->groupBy('cities.name')->groupBy('ideas_projects.idea')->groupBy('ideas_projects.budget')
      ->groupBy('ideas_projects.expected_date','ideas_projects.created_at')->join('cities','cities.id','=','ideas_projects.city_id')
      ->join('users','users.id','=','ideas_projects.user_id')
      ->select('ideas_projects.id','ideas_projects.address','ideas_projects.basic_image',
      'cities.name as city_name','ideas_projects.idea as description','ideas_projects.budget',
      \DB::raw('GROUP_CONCAT(DISTINCT users.first_name, " ", users.last_name) AS user'),
      \DB::raw('GROUP_CONCAT(users.id) AS user_id'),
      \DB::raw('count(supported.id) as shareholders'),\DB::raw('sum(supported.amount_of_contribution) as collected'),
      \DB::raw("DATEDIFF(ideas_projects.expected_date,now()) AS day"));


      if($filterType == 'latest')
      {
         // all projects orderBy latest created
         $query->orderBy('ideas_projects.created_at','desc');

         // if filter in resultes of serach
        if($keyword != 'none')
          $query->where('address', 'like', "%{$keyword}%");

        if($cat_id != 'none')
           $query->where('ideas_projects.category_id', '=', $cat_id);

      }

      if($filterType == 'mostSupportive')
      {
            // projects orderBy max supported users
            $query->orderBy('shareholders','desc');

              // if filteration on search resultes
          if($keyword != 'none')
              $query->where('address', 'like', "%{$keyword}%");

          if($cat_id != 'none')
                 $query->where('ideas_projects.category_id', '=', $cat_id);
      }


      if($filterType == 'endSoon')
      {

        // all projects orderd by expected_date
        $query->orderBy('day','asc');


        // if filteration on search resultes
       if($keyword != 'none')
         $query->where('address', 'like', "%{$keyword}%");

         if($cat_id != 'none')
            $query->where('ideas_projects.category_id', '=', $cat_id);

         // filters the projects with expected_date less than 15 days
         $query->where(\DB::raw("DATEDIFF(ideas_projects.expected_date,now())"),'<',10);

       }


     if($filterType == 'all')
     {
       // all projects that title with { keyword } and latest
       // if fillter in search resultes
       if($keyword != 'none')
         $query->where('address', 'like', "%{$keyword}%");

         if($cat_id != 'none')
            $query->where('ideas_projects.category_id', '=', $cat_id);

        // order resultes by desc
        $query->orderBy('ideas_projects.created_at','desc');
     }

      // paginate 10 pages
      $projects = $query->paginate(10);
      foreach ($projects as $key => $project) {
        if($projects[$key]->day ==null){
          $projects[$key]->day ="لا يوجد";
        }
      }
      return response()->json($projects,200);
    }



    //update project info
    public function projectUpdates(Request $request)
    {
        // receve base64 encode of img , decode it and write in updates folder
        $img = null;
        if($request->img)
          $img = uploadImgFromMobile($request->img,'/uploads/projects/updates/');


       Project_updates::create($request->except('img') + ['img' => $img]);
       return response(['status' => 'ok'] ,200);
    }




    public function Extend(Request $request)
    {
        $idea = Idea::find($request->project_id);

        // if 0 meain that user not increase the project expected_date
        // and then we will delete it
        if($request->date == 0)
        {
          $idea->delete();
          return response(['status' => 'project deleted']);
        }

       $idea->update(['expected_date' => \Carbon\Carbon::parse($idea->expected_date)->addDays($request->date)]);
       return response(['status' => 'project date extends']);
    }




}
