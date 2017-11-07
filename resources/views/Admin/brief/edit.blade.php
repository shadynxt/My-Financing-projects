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
        <small> {{ Html::linkAction('Admin\GoalsController@index', 'كل الاهداف', '', []) }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> {{ Html::linkAction('Admin\AdminController@dashboard', 'لوحه التحكم', '', []) }} </li>
        <li class="active">{{ Html::linkAction('Admin\GoalsController@index', 'كل الاهداف', '', []) }}</li>
    </ol>
</section>


<section class="content">
    <center>
        <div style="width:500px; ">
            {{ Form::open(array('route' => array('brief.update',$brief->id),'method' => 'PUT','class'=>'form-horizontal')) }}
            <div class="box-body">
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">العنوان</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" id="inputPassword3" value="{{ $brief->title }}">
                        @if ($errors->has('title'))
                        <p style="color:red">{{ $errors->first('title') }}</p>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">المحتوى</label>

                    <div class="col-sm-10">
                        <input type="text" name="body" class="form-control" id="inputEmail3" value="{{ $brief->body }}">
                        @if ($errors->has('body'))
                        <p style="color:red">{{ $errors->first('body') }}</p>
                        @endif
                    </div>
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">تعديل</button>
            </div>
            <!-- /.box-footer -->
            {{ Form::close()}}
        </div>
    </center>
</section>
@endsection

@section('footer')
@parent
@endsection
