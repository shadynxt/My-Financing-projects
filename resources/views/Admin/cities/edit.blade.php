@extends('Admin.layouts.master')

@section('header')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')
<section class="content-header">
    <h1>
        {{ Html::linkAction('Admin\AdminController@dashboard', 'لوحه التحكم', '', []) }}
        <small> {{ Html::linkAction('Admin\CommentController@index', 'كل التعليقات', '', []) }}</small>
        <small>تعديل التعليق </small>
    </h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> {{ Html::linkAction('Admin\AdminController@dashboard', 'لوحه التحكم', '', []) }} </li>
        <li class="active">{{ Html::linkAction('Admin\CommentController@index', 'كل التعليقات ', '', []) }}</li>
    </ol>
</section>


<section class="content">
    <center>
        <div style="width:500px; ">
            {{ Form::open(array('route' => array('city.update',$city->id),'method'=>'PUT','class'=>'form-horizontal')) }}
            <div class="box-body">
                <!-- Start Text of Country-->
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">اسم المدينه</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="inputPassword3" value="{{ $city->name }}"><br>
                        <!--Error Message-->
                        @if ($errors->has('name'))
                        <p style="color:red">{{ $errors->first('name') }}</p>
                        @endif
                    </div>
                </div>
                <!-- End Text of Country-->
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
