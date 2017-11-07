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
            <small> {{ Html::linkAction('Admin\PolicyController@index', 'كل السياسات', '', []) }}</small>
            <small> تعديل السياسه </small>
        </h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i> {{ Html::linkAction('Admin\AdminController@dashboard', 'لوحه التحكم', '', []) }} </li>
            <li class="active">{{ Html::linkAction('Admin\PolicyController@index', ' كل السياسات', '', []) }}</li>
        </ol>
</section>

 <section class="content">
         <center>
           <div style="width:500px; ">
             {{ Form::open(array('route' => array('policy.update',$policy->id),'method' => 'PUT','enctype' => 'multipart/form-data','class'=>'form-horizontal')) }}
              <div class="box-body">
               <!-- Start Address -->
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label"> عنوان المشروع</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="body" id="inputPassword3" value="{{ $policy->body }}" ><br>
                       @if ($errors->has('body'))
                                <p style="color:red">{{ $errors->first('body') }}</p>
                       @endif
                  </div>
                </div>
                 <!-- End Address -->
                  <!-- Start Address -->
                <div class="form-group">
                 <div>
                   <textarea class="textarea" placeholder="Message" name="site_policy"
                             style="width: 100%; height: 125px; font-size: 14px;
                             line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                             {{$policy->site_policy}}
                  </textarea>
                  @if ($errors->has('site_policy'))
                           <p style="color:red">{{ $errors->first('site_policy') }}</p>
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
