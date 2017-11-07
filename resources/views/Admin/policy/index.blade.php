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
                    <small> {{ Html::linkAction('Admin\CityController@index', 'كل السياسات', '', []) }} {{ count($policies) }}</small>
                </h1>
                <ol class="breadcrumb">
                    <li><i class="fa fa-dashboard"></i> {{ Html::linkAction('Admin\AdminController@dashboard', 'لوحه التحكم', '', []) }} </li>
                    <li class="active">{{ Html::linkAction('Admin\CityController@index', ' كل السياسات ', '', []) }}</li>
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
                  <h3 class="box-title"> كل السياسات</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th>الموضوع</th>
                          <th>السياسه</th>
                          <th>التفاعلات</th>
                      </tr>
                       </thead>
                      <tbody>
                          @foreach($policies as $policy)
                          <tr>
                          <td>
                          {{ $policy->body }}
                          </td>
                          <td>
                          {{ $policy->site_policy }}
                          </td>
                          <td>
                          {{ Html::linkAction('Admin\PolicyController@edit', 'تعديل', array('id' => $policy->id ), array('class' => 'btn btn-info btn btn-small ')) }}
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
