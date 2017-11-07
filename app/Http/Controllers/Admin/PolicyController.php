<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PolicyRequest;
use App\Policy;

class PolicyController extends Controller
{
  public function index(){
    $policies = Policy::all();
    return view('Admin.policy.index',compact('policies'));
  }
  public function edit($id){
    $policy = Policy::find($id);
   return view('Admin.policy.edit',compact('policy'));
  }
  public function update(PolicyRequest $request,$id){
   Policy::edit($id,$request);
   return redirect('policy');
  }
}
