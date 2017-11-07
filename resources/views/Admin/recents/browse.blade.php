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
          <small> {{ Html::linkAction('Admin\RecentController@index', 'كل التحديثات', '', []) }}  {{ count($recent_all) }}</small>
      </h1>
      <ol class="breadcrumb">
          <li><i class="fa fa-dashboard"></i> {{ Html::linkAction('Admin\AdminController@dashboard', 'لوحه التحكم', '', []) }} </li>
          <li class="active">{{ Html::linkAction('Admin\RecentController@index', 'كل التحديثات ', '', []) }}</li>
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
                  <h3 class="box-title"> كل التحديثات</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>التحديث</th>
                          <th>التفاعلات</th>
                      </tr>
                       </thead>
                      <tbody>
                        @if(isset($recent_all))
                          @foreach($recent_all as $recent)
                          <tr>
                          <td>
                          {{ $recent->description }}
                          </td>
                          <td>
                              {{ Html::linkAction('Admin\RecentController@edit', 'تعديل', array('id' => $recent->id ), array('class' => 'btn btn-info btn btn-small ')) }}
                              {{ Form::open(['method' => 'DELETE', 'route' => ['recent.destroy', $recent->id]]) }}
                              {{ Form::submit('حذف', [ 'class'=>' btn btn-danger btn btn-small','onclick'=>"return confirm('هل انت متاكد من الحذف?');"]) }}
                              {{ Form::close() }}
                          </td>
                          </tr>
                          @endforeach
                          @endif
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
