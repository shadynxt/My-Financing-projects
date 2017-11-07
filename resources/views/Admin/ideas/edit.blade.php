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
            <small> {{ Html::linkAction('Admin\IdeasController@index',  'كل المشاريع', '', []) }}</small>
            <small>تعديل الفكره </small>
        </h1>
        <ol class="breadcrumb">
            <li><i class="fa fa-dashboard"></i> {{ Html::linkAction('Admin\AdminController@dashboard', 'لوحه التحكم', '', []) }} </li>
            <li class="active">{{ Html::linkAction('Admin\IdeasController@index', 'كل المشاريع', '', []) }}</li>
        </ol>
</section>

 <section class="content">
         <center>
           <div style="width:500px; ">
             {{ Form::open(array('route' => array('Idea.update',$idea->id),'method' => 'PUT','enctype' => 'multipart/form-data','class'=>'form-horizontal')) }}
              <div class="box-body">
               <!-- Start Address -->
                 <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label"> عنوان المشروع</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="address" id="inputPassword3" value="{{ $idea->address }}" ><br>
                       @if ($errors->has('address'))
                                <p style="color:red">{{ $errors->first('address') }}</p>
                       @endif
                  </div>
                </div>
                 <!-- End Address -->
                <!-- Start Link -->
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">الرابط الخاص بالمشروع</label>
                  <div class="col-sm-10">
                    <input type="text" name="link" class="form-control" id="inputEmail3"  value="{{ $idea->link }}"><br>
                      @if ($errors->has('link'))
                                <p style="color:red">{{ $errors->first('link') }}</p>
                      @endif
                  </div>
                </div>
               <!-- End Link -->
               <!-- Start Idea -->
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label"> الفكره او الهدف</label>
                  <div class="col-sm-10">
                    <input type="text" name="idea" class="form-control" id="inputEmail3"  value="{{ $idea->idea }}"><br>
                     @if ($errors->has('idea'))
                                <p style="color:red">{{ $errors->first('idea') }}</p>
                     @endif
                  </div>
                </div>
               <!-- End Idea -->
               <!-- Start budget -->
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">ميزانية المشروع </label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="budget" id="inputPassword3"  value="{{ $idea->budget }}"><br>
                      @if ($errors->has('budget'))
                                <p style="color:red">{{ $errors->first('budget') }}</p>
                     @endif
                  </div>
                </div>
               <!-- End budget -->
               <!-- Start Finance -->
                  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label"> التاريخ المتوقع لاطلاق المشروع  </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="expected_date" id="inputPassword3"  value="{{ $idea->expected_date }}">
                      @if ($errors->has('expected_date'))
                          <p style="color:red">{{ $errors->first('expected_date') }}</p>
                     @endif
                  </div>
                </div>
                <!-- Start Input Select City-->
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label"> المدينه </label>

                  <div class="col-sm-10">
                    <select class="_slct form_input" name="city_id">
                    <option value="" selected disabled>اختر المدينه  </option>
                   @foreach($cities as $city)
                    <option value="{{ $city->id }}"
                      <?php if($city->id == $idea->city_id) { echo "selected";}?>>
                      {{ $city->name }}
                    </option>
                   @endforeach
                  </select>
                    @if ($errors->has('city_id'))
                          <p style="color:red">{{ $errors->first('city_id') }}</p>
                    @endif
                </div>
                </div>
                <!-- End Input Select City-->

                 <div class="form-group">
                   <label for="inputPassword3" class="col-sm-2 control-label"> الصوره الاساسيه للمشروع </label>
                  <div class="col-sm-10">
                    {{ Html::image('public/uploads/projects/'.$idea->basic_image, 'a picture', array('width'=>'200','height'=>'150')) }}
                    {{ Form::file('basic_image') }}
                    @if ($errors->has('basic_image'))
                          <p style="color:red">{{ $errors->first('basic_image') }}</p>
                     @endif
                </div>
                </div>

                  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">الصور الاضافيه  </label>
                  <div class="col-sm-10">
                    <!-- If additional_photos exist  show that image -->
                    @if($idea->additional_photos !="")
                    {{ Html::image($idea->additional_photos, 'a picture', array('width'=>'200','height'=>'150')) }}
                    @endif
                    {{ Form::file('additional_photos[]') }}
                  </div>
                 </div>

                  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">رابط فديو للمشروع </label>

                  <div class="col-sm-10">
                    {!! Form::file('video') !!}
                    @if ($errors->has('video'))
                        <p style="color:red">{{ $errors->first('video') }}</p>
                    @endif
                  </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">رابط فيديو اليوتيوب </label>
                      <div class="col-sm-10">
                               <input type="text" class="form-control" name="youtube_link" id="inputPassword3" value="{{ $idea->youtube_link }}">
                                  @if ($errors->has('youtube_link'))
                                      <p style="color:red">{{ $errors->first('youtube_link') }}</p>
                                  @endif
                      </div>
               </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label"> الفئه </label>

                  <div class="col-sm-10">
                    <select class="_slct form_input" name="category_id">
                   @foreach($categories as $category)
                    <option value="{{$category->id}}"
                    <?php if( $idea->category_id == $category->id ){echo "selected";}?>>
                    {{$category->name}}
                  </option>
                   @endforeach
                  </select>
                    @if ($errors->has('category_id'))
                          <p style="color:red">{{ $errors->first('category_id') }}</p>
                     @endif
                </div>

                </div>
                <!-- Start Input Select User-->
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label"> المستخدم </label>
                  <div class="col-sm-10">
                    <select class="_slct form_input" name="user_id">
                   @foreach($users as $user)
                    <option value="{{ $user->id }}"
                    <?php if( $idea->user_id == $user->id ){echo "selected";}?>>
                     {{ $user->first_name }}
                   </option>
                   @endforeach
                  </select>
                     @if ($errors->has('user_id'))
                          <p style="color:red">{{ $errors->first('user_id') }}</p>
                     @endif
                </div>
                </div>
                  <!-- End Select User-->

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
