<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\CategoryRequest;
use App\Category;
use Session;
use File;
class CategoryController extends Controller
{
      /**
     * controll for all categories in site from the admin
     */


       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // browse of admin
         $categories =Category::all();
         return view('Admin.categories.browse',compact('categories'));

    }

    public function create()
    {
        return view('Admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
      Category::addCategory($request);
       return redirect('Category');

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           $category = Category::find($id);
           return view('Admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
       Category::editCategory($request,$id);
       return redirect('Category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category =Category::find($id);
        $category->delete();
        File::delete($category->category_pic);
        Session::flash('message', 'الفئه قد حذفت');
        Session::flash('alert-class', 'alert-success');
        return redirect('Category');
  }

}
