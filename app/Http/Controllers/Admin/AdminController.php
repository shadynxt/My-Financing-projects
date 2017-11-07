<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\AdminRequest;
use Auth;
use App\Admin;
use App\User;
use App\Idea;
use App\Comment;
use Session;
use DateTime;


class AdminController extends Controller
{

      public function  login()
    {
        // login admin

        return view('Admin.login');
       
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
      $admin = auth()->guard('admin');
      if($admin->attempt(['email' =>$request->email,'password' =>$request->password])){
        return redirect('Admin/Dashboard');
      }
     
      
      else{
      Session::flash('message', 'المستخدم غير موجود'); 
      Session::flash('alert-class', 'alert-danger');
      return redirect('Admin/login');
      
    } 
      
    }

  
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        // dashboard of admin
        $adminNumber   = Admin::count();
        $userNumber    = User::count();
        $ideaNumber    = Idea::count();
        $commentNumber =Comment::count();

         return view('Admin.dashboard',
            compact('adminNumber','userNumber','ideaNumber','commentNumber'));
       
    }
     

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function logout()
    {
      $admin = auth()->guard('admin')->logout();
      return redirect('Admin/login');
    }

     
    /**
     * controll for all admins in site
     */


       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // browse of admin
         $admins =Admin::all();
         return view('Admin.admins.browse',compact('admins'));
       
    }

    public function create()
    {
        return view('Admin.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
       Admin:: addAdmin($request);
       return redirect('Admin');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           $admin =Admin::find($id);
           return view('Admin.admins.edit',compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, $id)
    {
       Admin:: editAdmin($request,$id);
       return redirect('Admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin =Admin::find($id);
        $admin->delete();
        Session::flash('message', 'المدير قد حذف'); 
        Session::flash('alert-class', 'alert-success');
        return redirect('Admin');
    }
    
    

}
