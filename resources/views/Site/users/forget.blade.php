@extends('Site.layouts.master')

@section('header')
    @parent
@endsection

@section('content')

   @if(Session::has('message3'))
            <script>
            // sucess message
            $(function() {
            $('.nativ_modal').show();
            });
            </script>
    @endif
<section class="full-container _content" >
      <div class="container">
        <div class="row">
          <div class="col s12 "><img src="{{ URL::asset('public/Site/img/static_hr.png')}}" alt="" data-aos="fade-down"><h4 class="title" data-aos="fade-up" data-aos-delay="600">نسيت كلمة المرور </h4></div>
          <hr class="main_hr">
          <div class="col s12">
            <div class="col m1 l2 xl2 hide-on-small-only"></div>
            {{ Form::open(array('url'=>'/password/email','method' => 'post','class'=>'col s12 m10 l8 xl8 reg_form right-align')) }}
              <div class="col s12 "><h5 class="title" data-aos="fade-up" data-aos-delay="600">ادخال البريد الالكترونى الذى قمت بتسجيله  </h5></div>

              <!-- form_elem -->
              <div class="col s12  form_elem">
                <label class="col s3 form_lbl" style="margin-top:0;">البريد الالكترونى   </label>
                <div class="col s9">
                  <input type="text" class="validate form_input" name="email">
                     @if ($errors->has('email'))
                          <span style="color:red">
                              <strong>{{ $errors->first('email') }}</strong>
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