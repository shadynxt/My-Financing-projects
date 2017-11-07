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
        <small> {{ Html::linkAction('Admin\ContactUsController@index', 'كل المتصلون', '', []) }} {{ count($contacts) }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> {{ Html::linkAction('Admin\AdminController@dashboard', 'لوحه التحكم', '', []) }} </li>
        <li class="active">{{ Html::linkAction('Admin\ContactUsController@index', 'كل المتصلون ', '', []) }}</li>
    </ol>
</section>
        <!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                  <h3 class="box-title">كل المتصلون</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>الاسم</th>
                          <th>البريد الالكترونى</th>
                          <th>الرساله</th>
                      </tr>
                    </thead>
                    <tbody>
                          @foreach($contacts as $contact)
                          <tr>
                          <td>
                          {{ $contact->first_name }}
                          </td>
                          <td>
                          {{ $contact->email }}
                          </td>
                          <td>
                          {{ $contact->msg }}
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
