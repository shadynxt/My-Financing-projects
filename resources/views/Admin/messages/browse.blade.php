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
          <small> {{ Html::linkAction('Admin\MessageController@index', 'كل الرسائل', '', []) }} {{ count($messages) }}</small>
      </h1>
      <ol class="breadcrumb">
          <li><i class="fa fa-dashboard"></i> {{ Html::linkAction('Admin\AdminController@dashboard', 'لوحه التحكم', '', []) }} </li>
          <li class="active">{{ Html::linkAction('Admin\MessageController@index', 'كل الرسائل ', '', []) }}</li>
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
                  <h3 class="box-title">كل الرسائل</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>التعليق</th>
                          <th>فكره المشروع التى تم التعليق عليها</th>
                          <th>المستخدم الذى وضع التعليق</th>
                          <th>المحادثه رقم</th>
                      </tr>
                       </thead>
                      <tbody>
                          @foreach($messages as $message)
                          <tr>
                          <td>
                          {{ $message->message }}
                          </td>
                           <td>
                          {{ App\User::find($message->user_from)->first_name }}
                          </td>
                          <td>
                          {{ App\User::find($message->user_to)->first_name }}
                          </td>
                          <td>
                          {{ $message->conversation_id }}
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
