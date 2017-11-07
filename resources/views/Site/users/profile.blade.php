@extends('Site.layouts.master')

@section('header')
    @parent
@endsection

@section('content')

    @if(Session::has('message'))
            <script>
            // success message
            $(function() {
            $('.nativ_modal').show();
             });
            </script>
    @endif

  <section class="full-container _content" style="background-image:url({{ URL::asset('public/Site/img/bg_img.png')}})">
      <div class="container">
        <div class="row">
          <div class="col s12 "><img src="{{ URL::asset('public/Site/img/static_hr.png')}}" alt="" data-aos="fade-down"><h4 class="title" data-aos="fade-up" data-aos-delay="600"> الملف الشخصى    </h4></div>
          <div class="col s12 m12 l12 xl12">
            <div class="col s12 m4 l4">
              <div class="right_side">
                <h5>معلومات الملف الشخصى </h5>
                <ul>
                  <li> : عضو منذ  <br><span>{{ $user->created_at}}</span></li><hr>
                  <li>:الموقع الالكترونى  <br><span>
                    <a href="{{ $user->link_facebook }}">{{ $user->link_facebook }}</a>
                    <a href="{{ $user->link }}">{{ $user->link }}</a></span></li><hr>
                    <li>رقم  الايبان للحساب البنكى:<br><span>{{ $user->IBAN }}</span></li><hr>

                  <li class="socials"><a href="https://www.facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a><a href="https://plus.google.com/"><i class="fa fa-google-plus" aria-hidden="true"></i></a><a href="https://www.instagram.com/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                </ul>
              </div>
            </div>
            <div class="col s12 m8 l8 left_side">
              <div class="">
                <div class="col s5 m5 l2">
                  {{ Html::image('public/uploads/users/'.$user->profile_pic, 'a picture', array('width'=>'200','height'=>'150')) }}
                </div>
                <div class="col s7 m7 l10">
                  <h5>{{ $user->first_name }}</h5>
                  <a href="<?php echo asset("messageme/$user->id") ?>"> <i class="fa fa-envelope" aria-hidden="true"></i> راسلنى  </a>
                  <p>
                    {{ $user->about_you }}
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div><!-- row _content -->
      </div><!-- container _content-->
  </section><!-- section _content -->

@endsection

@section('footer')
    @parent
@endsection
