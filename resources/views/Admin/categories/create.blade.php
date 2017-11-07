@extends('Admin.layouts.master')

@section('header')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
<!-- Start Content Header (Page header)  to know this page-->
<section class="content-header">
    <h1>
        {{ Html::linkAction('Admin\AdminController@dashboard', 'لوحه التحكم', '', []) }}
        <small> {{ Html::linkAction('Admin\CategoryController@index', 'كل الفئات', '', []) }}</small>
        <small>اضافه الفئه </small>
    </h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> {{ Html::linkAction('Admin\AdminController@dashboard', 'لوحه التحكم', '', []) }} </li>
        <li class="active">{{ Html::linkAction('Admin\CategoryController@index', 'كل الفئات ', '', []) }}</li>
    </ol>
</section>
<!-- End Content Header (Page header) -->

<section class="content">
    <center>
        <div style="width:500px; ">
            {{ Form::open(array('url' => 'Category','method'=>'post','enctype' => 'multipart/form-data','class'=>'form-horizontal')) }}
            <div class="box-body">
                <!-- Start Category Name-->
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">الاسم</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="inputPassword3" placeholder="الاسم" ><br>
                        @if ($errors->has('name'))
                        <p style="color:red">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                </div>
                <!-- End Category Name-->
                <!-- Start Category Picture-->
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">صوره الفئه </label>
                    <div class="col-sm-10">
                        {{ Form::file('category_pic') }}
                        @if ($errors->has('category_pic'))
                        <p style="color:red">{{ $errors->first('category_pic') }}</p>
                        @endif
                    </div>
                </div>
                <!-- End Category Picture-->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">اضافه</button>
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
