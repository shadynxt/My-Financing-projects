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
                    <small> {{ Html::linkAction('Admin\FollowController@index', 'كل المتابعون', '', []) }}</small>
                    <small>اضافه متابع </small>
                </h1>
                <ol class="breadcrumb">
                    <li><i class="fa fa-dashboard"></i> {{ Html::linkAction('Admin\AdminController@dashboard', 'لوحه التحكم', '', []) }} </li>
                    <li class="active">{{ Html::linkAction('Admin\FollowController@index', 'كل المتابعون ', '', []) }}</li>
                </ol>
            </section>

 <section class="content">
         <center>
           <div style="width:500px; ">
             {{ Form::open(array('url' => 'follow','class'=>'form-horizontal')) }}
              <div class="box-body">
                  <!-- Start Input Select Follow-->
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label"> اختر الفكره </label>
                  <div class="col-sm-10">
                    <select class="_slct form_input" name="project_id">
                    <option value="" selected disabled>اختر الفكره  </option>
                   @foreach($ideas as $idea)
                    <option value="{{ $idea->id }}"> {{$idea->address}} </option>
                   @endforeach
                  </select>
                  <!--Error Message-->
                   @if ($errors->has('project_id'))
                        <p style="color:red">{{ $errors->first('project_id') }}</p>
                    @endif
                </div>
                </div>
                <!-- End Input Select Follow-->
                 <!-- Start Input Select user-->
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label"> اختر المستخدم </label>
                  <div class="col-sm-10">
                    <select class="_slct form_input" name="user_id">
                    <option value="" selected disabled>اختر المستخدم  </option>
                   @foreach($users as $user)
                    <option value="{{$user->id}}"> {{ $user->first_name }} </option>
                   @endforeach
                  </select>
                      @if ($errors->has('user_id'))
                        <p style="color:red">{{ $errors->first('user_id') }}</p>
                      @endif
                </div>
                </div>
                <!-- End Input Select User-->
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
