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
                    <small> {{ Html::linkAction('Admin\CommentController@index', 'كل التعليقات', '', []) }}</small>
                    <small>اضافه تعليق </small>
                </h1>
                <ol class="breadcrumb">
                    <li><i class="fa fa-dashboard"></i> {{ Html::linkAction('Admin\AdminController@dashboard', 'لوحه التحكم', '', []) }} </li>
                    <li class="active">{{ Html::linkAction('Admin\CommentController@index', 'كل التعليقات ', '', []) }}</li>
                </ol>
            </section>

 <section class="content">
         <center>
           <div style="width:500px; ">
             {{ Form::open(array('url' => 'Comment','class'=>'form-horizontal')) }}
              <div class="box-body">
                <!-- Start Text of comment-->
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">التعليق</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="body" id="inputPassword3" placeholder="التعليق" ><br>
                    @if ($errors->has('body'))
                        <p style="color:red">{{ $errors->first('body') }}</p>
                    @endif
                  </div>
                </div>
                 <!-- End Text of comment-->
                 <!-- Start Input Select Idea-->
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label"> الفكره التى تم التعليق عليها </label>
                  <div class="col-sm-10">
                    <select class="_slct form_input" name="idea_project_id">
                    <option value="" selected disabled>اختر الفكره  </option>
                   @foreach($ideas as $idea)
                    <option value="{{ $idea->id }}"> {{$idea->address}} </option>
                   @endforeach
                  </select>
                  @if ($errors->has('idea_project_id'))
                      <p style="color:red">{{ $errors->first('idea_project_id') }}</p>
                  @endif
                </div>
                </div>
                <!-- End Input Select Idea-->
                 <!-- Start Input Select Category-->
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label"> المستخدم التى علق  </label>

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
                <!-- End Input Select Category-->

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
