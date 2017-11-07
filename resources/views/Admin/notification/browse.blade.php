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
        <small> {{ Html::linkAction('Admin\NotificationController@index', 'كل الاشعارات', '', []) }} {{ count($notifications) }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> {{ Html::linkAction('Admin\AdminController@dashboard', 'لوحه التحكم', '', []) }} </li>
        <li class="active">{{ Html::linkAction('Admin\NotificationController@index', 'كل الاشعارات ', '', []) }}</li>
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
                  <h3 class="box-title">كل الاشعارات</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>نوع الشعار</th>
                          <th>رقم الاشعار</th>
                          <th>نوع الاشعار</th>
                          <th>المعلومات</th>
                      </tr>
                       </thead>
                      <tbody>
                          @foreach($notifications as $notification)
                          <tr>
                          <td>
                          {{ $notification->type }}
                          </td>
                            <td>
                          {{ $notification->notifiable_id }}
                          </td>
                           <td>
                           {{ $notification->notifiable_type }}
                          </td>
                          <td>
                          {{ $notification->data }}
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
