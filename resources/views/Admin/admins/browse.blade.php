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
        <small> {{ Html::linkAction('Admin\AdminController@index', 'كل المديرين', '', []) }} {{ count($admins) }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> {{ Html::linkAction('Admin\AdminController@dashboard', 'لوحه التحكم', '', []) }} </li>
        <li class="active">{{ Html::linkAction('Admin\AdminController@index', 'كل المديرين ', '', []) }}</li>
    </ol>
</section>

 <!--Success Flush-->
@if(Session::has('message'))
<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
@endif
        <!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">كل المديرين</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>الاسم</th>
                          <th>البريد الالكترونى</th>
                          <th>التفاعلات</th>
                        </tr>
                    </thead>
                    <tbody>
                          @foreach($admins as $admin)
                          <tr>
                          <td>
                          {{ $admin->username }}
                          </td>
                          <td>
                          {{ $admin->email }}
                          </td>
                          <td>
                              {{ Html::linkAction('Admin\AdminController@edit', 'تعديل', array('id' => $admin->id ), array('class' => 'btn btn-info btn btn-small ')) }}
                              {{ Form::open(['method' => 'DELETE', 'route' => ['Admin.destroy', $admin->id]]) }}
                              {{ Form::submit('حذف', [ 'class'=>' btn btn-danger btn btn-small','onclick'=>"return confirm('هل انت متاكد من الحذف?');"]) }}
                              {{ Form::close() }}
                          </td>
                          </tr>
                          @endforeach
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
@endsection

@section('footer')
@parent
@endsection
