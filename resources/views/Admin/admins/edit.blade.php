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
        <small> {{ Html::linkAction('Admin\AdminController@index', 'كل المديرين', '', []) }} </small>
        <small> تعديل المدير </samll>
    </h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> {{ Html::linkAction('Admin\AdminController@dashboard', 'لوحه التحكم', '', []) }} </li>
        <li class="active">{{ Html::linkAction('Admin\AdminController@index', 'كل المديرين ', '', []) }}</li>
    </ol>
</section>


<section class="content">
    <center>
        <div style="width:500px; ">
            {{ Form::open(array('route' => array('Admin.update',$admin->id),'method' => 'PUT','class'=>'form-horizontal')) }}
            <div class="box-body">
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">الاسم</label>

                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="username" id="inputPassword3" value="{{ $admin->username }}">
                          @if ($errors->has('username'))
                                <p style="color:red">{{ $errors->first('username') }}</p>
                          @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">البريد الالكترونى</label>

                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="inputEmail3" value="{{ $admin->email }}">
                          @if ($errors->has('email'))
                                <p style="color:red">{{ $errors->first('email') }}</p>
                         @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">كلمه المرور</label>

                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password" id="inputPassword3" placeholder="Password" autocomplete="off">
                            @if ($errors->has('password'))
                                <p style="color:red">{{ $errors->first('password') }}</p>
                            @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">تاكيد كلمه المرور</label>

                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="password_confirmation" id="inputPassword3" placeholder="Confirmaion Password" autocomplete="off">
                           @if ($errors->has('password'))
                                <p style="color:red">{{ $errors->first('password') }}</p>
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
