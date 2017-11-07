@extends('Site.layouts.master')

@section('header')
    @parent
@endsection

@section('content')

<section class="full-container _content" style="background-image:url({{ URL::asset('public/Site/img/bg_img.png')}})" >
    <div class="container">
        <div class="row">
            <div class="col s12 "><img src="{{ URL::asset('public/Site/img/static_hr.png')}}" alt="" data-aos="fade-down"><h4 class="title" data-aos="fade-up" data-aos-delay="600">اتصل بنا </h4></div>
            <hr class="main_hr">
            <div class="col s12">
                <div class="col m1 l2 xl2 hide-on-small-only"></div>
                {{ Form::open(array('url' => 'contact','class'=>'col s12 m10 l8 xl8  contact_form right-align')) }}
                <div class="input-field col s6">
                    <input placeholder="الاسم الاول" type="text" class="validate" name="first_name">
                    @if ($errors->has('first_name'))
                    <p style="color:red">{{ $errors->first('first_name') }}</p>
                    @endif
                </div>
                <div class="input-field col s6">
                    <input placeholder="الاسم الاخير " type="text" class="validate" name="last_name">
                    @if ($errors->has('last_name'))
                    <p style="color:red">{{ $errors->first('last_name') }}</p>
                    @endif
                </div>
                <div class="input-field col s6">
                    <input placeholder="البريد الاليكترونى " type="text" class="validate" name="email">
                    @if ($errors->has('email'))
                    <p style="color:red">{{ $errors->first('email') }}</p>
                    @endif
                </div>
                <div class="input-field col s6 key-before-container">
                    <input placeholder="رقم الجوال " type="text" class="key-before validate" name="phone_number">
                    @if ($errors->has('phone_number'))
                    <p style="color:red">{{ $errors->first('phone_number') }}</p>
                    @endif
                </div>
                <div class="input-field col s12">
                    <textarea placeholder="الرساله "  class="materialize-textarea" name="msg"></textarea>
                    @if ($errors->has('msg'))
                    <p style="color:red">{{ $errors->first('msg') }}</p>
                    @endif
                </div>
                <button type="submit" name="button" class="category_0">ارسال </button>
                <!-- <div class="col s1 form_elem sub">
                  <div class="col s12 center">
                  </div>
                </div> -->
                {{ Form::close() }}
                <div class="col m1 l2 xl2 hide-on-small-only"></div>

                <!-- <hr class="main_hr rot"> -->

            </div>

        </div><!-- row _content -->
    </div><!-- container _content-->
</section><!-- section _content -->

@endsection

@section('footer')
    @parent
@endsection