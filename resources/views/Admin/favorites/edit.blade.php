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
                    <small> {{ Html::linkAction('Admin\FavoriteController@index', 'كل التعليقات', '', []) }}</small>
                    <small>تعديل المفضله </small>
                </h1>
                <ol class="breadcrumb">
                    <li><i class="fa fa-dashboard"></i> {{ Html::linkAction('Admin\AdminController@dashboard', 'لوحه التحكم', '', []) }} </li>
                    <li class="active">{{ Html::linkAction('Admin\FavoriteController@index', 'كل التعليقات ', '', []) }}</li>
                </ol>
            </section>

        <section class="content">
         <center>
           <div style="width:500px; ">
             {{ Form::open(array('route' => array('favorite.update',$favorite->id),'method'=>'PUT','class'=>'form-horizontal')) }}
              <div class="box-body">
                 <!-- Start Input Select Idea-->
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">اختر الفئه </label>
                  <div class="col-sm-10">
                    <select class="_slct form_input" name="idea_project_id">
                   @foreach($ideas as $idea)
                    <option value="{{$idea->id}}"
                      <?php if($idea->id ==$favorite->idea_project_id){ echo "selected";}?>>
                      {{$idea->address}}
                    </option>

                   @endforeach
                  </select>
                   <!--Error Message-->
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
                    <option value="{{$user->id}}"
                      <?php if($user->id ==$favorite->user_id){ echo "selected";}?>>
                      {{ $user->first_name }}
                    </option>
                   @endforeach
                  </select>
                    <!--Error Message-->
                   @if ($errors->has('idea_project_id'))
                        <p style="color:red">{{ $errors->first('idea_project_id') }}</p>
                    @endif
                </div>
                </div>
                <!-- End Input Select Category-->
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
