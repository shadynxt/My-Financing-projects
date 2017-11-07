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
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> {{ Html::linkAction('Admin\AdminController@dashboard', 'لوحه التحكم', '', []) }} </li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $adminNumber }}</h3>
                    <p>المديرين</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                {{ Html::linkAction('Admin\AdminController@index', 'المزيد', '', ['class' => 'small-box-footer']) }}
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $userNumber }}</h3>
                    <p>المستخدمين</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
                {{ Html::linkAction('Admin\UserController@index', 'المزيد', '', ['class' => 'small-box-footer']) }}
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $ideaNumber }}</h3>
                    <p>الافكار</p>
                </div>
                <div class="icon">
                    <i class="fa fa-lightbulb-o" aria-hidden="true"></i>
                </div>
                {{ Html::linkAction('Admin\IdeasController@index', 'المزيد', '', ['class' => 'small-box-footer']) }}
            </div>
        </div><!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ $commentNumber }}</h3>
                    <p>التعليقات</p>
                </div>
                <div class="icon">
                    <i class="fa fa-comments" aria-hidden="true"></i>
                </div>
                {{ Html::linkAction('Admin\CommentController@index', 'المزيد', '', ['class' => 'small-box-footer']) }}
            </div>
        </div><!-- ./col -->
    </div><!-- /.row -->
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="nav-tabs-custom">
                <!-- Tabs within a box -->
                <ul class="nav nav-tabs pull-right">
                </ul>
                <div class="tab-content no-padding">
                </div>
            </div><!-- /.nav-tabs-custom -->
        </section><!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->

    </div><!-- /.row (main row) -->

</section><!-- /.content -->



@endsection


@section('footer')
@parent
@endsection

