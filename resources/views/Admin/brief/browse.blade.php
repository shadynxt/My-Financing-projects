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
        <small> {{ Html::linkAction('Admin\GoalsController@index', 'كل الاهداف', '', []) }}{{ count($brief_all) }}</small>
    </h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> {{ Html::linkAction('Admin\AdminController@dashboard', 'لوحه التحكم', '', []) }} </li>
        <li class="active">{{ Html::linkAction('Admin\GoalsController@index', 'كل الاهداف', '', []) }}</li>
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
                    <h3 class="box-title">نبذه مختصره عن الموقع</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>العنوان</th>
                                <th>المحتوى</th>
                                <th>التفاعلات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($brief_all as $brief)
                            <tr>
                                <td>
                                    {{ $brief->title }}
                                </td>
                                <td>
                                    {{ $brief->body }}
                                </td>
                                <td>
                                    {{ Html::linkAction('Admin\BriefController@edit', 'تعديل', array('id' => $brief->id ), array('class' => 'btn btn-info btn btn-small ')) }}
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
