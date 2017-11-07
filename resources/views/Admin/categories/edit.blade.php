@extends('Admin.layouts.master')

@section('header')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')

  <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
       {{ Html::linkAction('Admin\AdminController@dashboard', 'لوحه التحكم', '', []) }}
        <small> {{ Html::linkAction('Admin\CategoryController@index', 'كل الفئات', '', []) }}</small>
        <small>تعديل الفئه </small>
    </h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> {{ Html::linkAction('Admin\AdminController@dashboard', 'لوحه التحكم', '', []) }} </li>
        <li class="active">{{ Html::linkAction('Admin\CategoryController@index', 'كل الفئات ', '', []) }}</li>
    </ol>
</section>

<section class="content">
    <center>
      <div style="width:500px; ">
         {{ Form::open(array('route' => array('Category.update',$category->id),'enctype' => 'multipart/form-data','method' => 'PUT','class'=>'form-horizontal')) }}
            <div class="box-body">
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">الاسم</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" id="inputPassword3" value="{{ $category->name }}" ><br>
                        @if ($errors->has('name'))
                           <p style="color:red">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label"> الصوره الاساسيه للمشروع </label>

                    <div class="col-sm-10">
                      {{ Html::image('public/uploads/categories/'.$category->category_pic, 'a picture', array('width'=>'200','height'=>'150')) }}
                      {{ Form::file('category_pic') }}
                      @if ($errors->has('category_pic'))
                          <p style="color:red">{{ $errors->first('category_pic') }}</p>
                      @endif
                  </div>
                </div>
            </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-info pull-right">تعديل</button>
                </div>
                <!-- /.box-footer -->
            {{ Form::close() }}
        </div>
    </center>
</section>
@endsection

@section('footer')
@parent
@endsection
