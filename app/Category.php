<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public static function addCategory($request){
    	 // for Category Image
      if($request->category_pic !=""){
        // Upload Image
        $file                           = $request->category_pic;
        $category_pic                   = date('Y-m-d-H:i:s') . "-" .mt_rand();
        $path                           = 'public/uploads/categories/';
        $file                           = $file->move($path, $category_pic);
      }
       $category                        = new Category();
       $category->name                  = $request->name;
       $category->category_pic          = $category_pic ;
       $category->save();
       return $category;
    }


    public static function editCategory($request,$id){
       // for Category Image
      if($request->category_pic !=""){
        // Upload Image
        $file                           = $request->category_pic;
        $category_pic                   = date('Y-m-d-H:i:s') . "-" .mt_rand();
        $path                           = 'public/uploads/categories/';
        $file                           = $file->move($path, $category_pic);
      }
       $category               = Category::find($id);
       $category->name            = $request->name;
       if($request->category_pic !=""){
       $category->category_pic    = $category_pic;
        }
       $category->save();
       return $category;
    }
}
