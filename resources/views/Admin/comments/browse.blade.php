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
                    <small> {{ Html::linkAction('Admin\CommentController@index', 'كل التعليقات', '', []) }}  {{ count($comments) }}</small>
                </h1>
                <ol class="breadcrumb">
                    <li><i class="fa fa-dashboard"></i> {{ Html::linkAction('Admin\AdminController@dashboard', 'لوحه التحكم', '', []) }} </li>
                    <li class="active">{{ Html::linkAction('Admin\CommentController@index', 'كل التعليقات ', '', []) }}</li>
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
                          <th>التعليق</th>
                          <th>فكره المشروع التى تم التعليق عليها</th>
                          <th>المستخدم الذى وضع التعليق</th>
                          <th>التفاعلات</th>
                      </tr>
                       </thead>
                      <tbody>
                          @foreach($comments as $comment)
                          <tr>
                          <td>
                          {{ $comment->body }}
                          </td>
                           <td>
                           {{ App\Idea::find($comment->idea_project_id)->address }}
                          </td>
                          <td>
                          {{ App\User::find($comment->user_id)->first_name }}
                          </td>
                          <td>
                              {{ Html::linkAction('Admin\CommentController@edit', 'تعديل', array('id' => $comment->id ), array('class' => 'btn btn-info btn btn-small ')) }}
                              {{ Form::open(['method' => 'DELETE', 'route' => ['Comment.destroy', $comment->id]]) }}
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
