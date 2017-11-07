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
        <small> {{ Html::linkAction('Admin\SlideController@index', 'كل الصور المتحركه', '', []) }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> {{ Html::linkAction('Admin\AdminController@dashboard', 'لوحه التحكم', '', []) }} </li>
        <li class="active">{{ Html::linkAction('Admin\SlideController@index', 'كل الصور المتحركه', '', []) }}</li>
    </ol>
</section>


<section class="content">
    <center>
        <div style="width:500px; ">
            {{ Form::open(array('route' => array('slide.update',$slide->id),'enctype' => 'multipart/form-data','method' => 'PUT','class'=>'form-horizontal')) }}
            <div class="box-body">

            <div class="form-group">
                 <label for="inputPassword3" class="col-sm-2 control-label">الصوره المتحركه </label>

                  <div class="col-sm-10">
                      {{ Html::image('public/uploads/projects/'.$slide->img, 'a picture', array('width'=>'200','height'=>'150')) }}
                      {!! Form::file('img') !!}
                      @if ($errors->has('img'))
                          <p style="color:red">{{ $errors->first('img') }}</p>
                      @endif
                 </div>
          </div>

            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">تعديل</button>
            </div>
            <!-- /.box-footer -->
            {{ Form::close()}}
        </div>
      </div>
    </center>
</section>
@endsection

@section('footer')
@parent
@endsection
