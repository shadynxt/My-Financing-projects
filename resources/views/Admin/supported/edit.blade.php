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
          <small> {{ Html::linkAction('Admin\SupportController@index', 'كل المدعمون', '', []) }}</small>
          <small> تعديل مدعم </small>
      </h1>
      <ol class="breadcrumb">
          <li><i class="fa fa-dashboard"></i> {{ Html::linkAction('Admin\AdminController@dashboard', 'لوحه التحكم', '', []) }} </li>
          <li class="active">{{ Html::linkAction('Admin\SupportController@index', 'كل المدعمون ', '', []) }}</li>
      </ol>
  </section>
          <!--For Error validation if exist-->
           <section class="content">
                   <center>
           <div style="width:500px; ">
             {{ Form::open(array('route' => array('Supporter.update',$support->id),'method'=>'PUT','class'=>'form-horizontal')) }}
              <div class="box-body">
                <!--Start amount_of_contribution  for Supporter people-->
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">مبلغ المساهمه</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="amount_of_contribution" id="inputPassword3" value="{{$support->amount_of_contribution}}"><br>
                       @if ($errors->has('amount_of_contribution'))
                                <p style="color:red">{{ $errors->first('amount_of_contribution') }}</p>
                       @endif
                  </div>
                </div>
                <!--End amount_of_contribution  for Supporter people-->
                <!--Start Full Name for Supporter people -->
                  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label"> الاسم بالكامل</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="full_name" id="inputPassword3" value="{{ $support->full_name }}"><br>
                     @if ($errors->has('full_name'))
                                <p style="color:red">{{ $errors->first('full_name') }}</p>
                       @endif
                  </div>
                </div>
               <!--End Full Name for Supporter people -->
               <!--Start email for Supporter people -->
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">البريد الالكترونى</label>

                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="inputEmail3" value="{{ $support->email }}"><br>
                     @if ($errors->has('email'))
                                <p style="color:red">{{ $errors->first('email') }}</p>
                       @endif
                  </div>
                </div>
                <!--End Email for Supporter people -->
                <!--Start option active for Supporter people -->
                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">ابقنى مجهولا</label>
         @if($support->known =='0' )
                  <div class="col-sm-10">
                   <input type="checkbox" name="active" value="Car" id="inputEmail3">
                  </div>
        @else
                   <div class="col-sm-10">
                   <input type="checkbox" name="active" value="Car" id="inputEmail3" checked>
                  </div>
       @endif
                </div>
                <!--End option active for Supporter people -->
                <!--Start idea_project_id for Supporter people -->
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label"> فكره المشروع </label>

                  <div class="col-sm-10">
                    <select class="_slct form_input" name="idea_project_id">
                   @foreach($ideas as $idea)
                    <option value="{{$idea->id}}"
                      <?php if($idea->id == $support->idea_project_id){echo "selected";}?>>
                      {{$idea->address}}
                    </option>
                   @endforeach
                  </select>
                </div>
                </div>
                <!--End idea_project_id for Supporter people -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">تعديل</button>
              </div>
              <!-- /.box-footer -->
            {{ Form::close() }}
           </div>
            </center>
           </section>
            @endsection

    @section('footer')
    @parent
    @endsection
