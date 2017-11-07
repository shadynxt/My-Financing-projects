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
        <small> {{ Html::linkAction('Admin\RecentController@index', 'كل التعليقات', '', []) }}</small>
        <small>تعديل التعليق </small>
    </h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> {{ Html::linkAction('Admin\AdminController@dashboard', 'لوحه التحكم', '', []) }} </li>
        <li class="active">{{ Html::linkAction('Admin\RecentController@index', 'كل التعليقات ', '', []) }}</li>
    </ol>
</section>

 <section class="content">
    <center>
    <div style="width:500px; ">
       {{ Form::open(array('route' => array('recent.update',$recent->id),'enctype' => 'multipart/form-data','method'=>'PUT','class'=>'form-horizontal')) }}
            <div class="box-body">
                <!-- Start Text of recent-->
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">التحديث</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="description" id="inputPassword3" value="{{ $recent->description }}"><br>
                      @if ($errors->has('description'))
                       <p style="color:red">{{ $errors->first('description') }}</p>
                      @endif
                  </div>
                </div>
                 <!-- End Text of recent-->
                 <!-- Start Input Select Idea-->
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label"> الفكره التى تم تحديثها </label>
                  <div class="col-sm-10">
                    <select class="_slct form_input" name="project_id">
                   @foreach($ideas as $idea)
                    <option value="{{$idea->id}}"
                      <?php if($idea->id ==$recent->project_id){ echo "selected";}?>>
                      {{$idea->address}}
                    </option>
                   @endforeach
                  </select>
                    @if ($errors->has('project_id'))
                       <p style="color:red">{{ $errors->first('project_id') }}</p>
                    @endif
                </div>
                </div>
                <!-- End Input Select Idea-->
                     <!-- Start Input Select Idea-->
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label"> الفكره التى تم تحديثها </label>
                  <div class="col-sm-10">
                    {{ Html::image('public/uploads/projects/'.$recent->img, 'a picture', array('width'=>'200','height'=>'150')) }}
                    {{ Form::file('img') }}
                    @if ($errors->has('img'))
                       <p style="color:red">{{ $errors->first('img') }}</p>
                    @endif
                </div>
                </div>
                <!-- End Input Select Idea-->
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
