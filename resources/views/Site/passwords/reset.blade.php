@extends('Site.layouts.master')
@section('header')
    @parent
@endsection

@section('content')
<section class="full-container _content" >
      <div class="container">
        <div class="row">
          <div class="col s12 "><img src="{{ URL::asset('public/Site/img/static_hr.png')}}" alt="" data-aos="fade-down"><h4 class="title" data-aos="fade-up" data-aos-delay="600">كلمه المرور الجديده </h4></div>
          <hr class="main_hr">
          <div class="col s12">
            <div class="col m1 l2 xl2 hide-on-small-only"></div>
            {{ Form::open(array('url'=>'/password/reset','method' => 'post','class'=>'col s12 m10 l8 xl8 right-align')) }}

             <input type="hidden" name="token" value="{{ $user->token }}">
             <input type="hidden" name="id" value="{{ $user->id }}">

              <!-- form_elem -->
              <div class="col s12  form_elem">
                <label class="col s3 form_lbl" style="margin-top:0;">كلمه المرور </label>
                <div class="col s9">
                  <input type="text" class="validate form_input" name="password">
                     @if ($errors->has('password'))
                          <span style="color:red">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                    @endif
                </div>
              </div><!-- / form_elem -->
             <div class="col s12  form_elem">
                <label class="col s3 form_lbl" style="margin-top:0;">تاكيد كلمه المرور </label>
                <div class="col s9">
                  <input type="text" class="validate form_input" name="password_confirmation">
                     @if ($errors->has('password'))
                          <span style="color:red">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                    @endif
                </div>
              </div><!-- / form_elem -->
              <div class="col s12 form_elem sub_">
                <div class="col s12">
                  <input type="submit" class="category_0" value="ارسال ">
                </div>
              </div><!-- / form_elem -->
            {{ Form::close() }}
            <div class="col m1 l2 xl2 hide-on-small-only"></div>

        </div>

        </div><!-- row _content -->
      </div><!-- container _content-->
  </section><!-- section _content -->
@endsection

@section('footer')
    @parent
@endsection
