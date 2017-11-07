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
                    <small> {{ Html::linkAction('Admin\CityController@index', 'كل المدن', '', []) }}</small>
                    <small>اضافه مدينه </small>
                </h1>
                <ol class="breadcrumb">
                    <li><i class="fa fa-dashboard"></i> {{ Html::linkAction('Admin\AdminController@dashboard', 'لوحه التحكم', '', []) }} </li>
                    <li class="active">{{ Html::linkAction('Admin\CityController@index', 'كل المدن ', '', []) }}</li>
                </ol>
            </section>

 <section class="content">
         <center>
           <div style="width:500px; ">
             {{ Form::open(array('url' => 'city','class'=>'form-horizontal')) }}
              <div class="box-body">
                <!-- Start Text of city-->
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">المدينه</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="inputPassword3" placeholder="المدينه" ><br>
                        <!--Error Message-->
                   @if ($errors->has('name'))
                     <p style="color:red">{{ $errors->first('name') }}</p>
                    @endif
                  </div>
                </div>
                 <!-- End Text of city-->
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
