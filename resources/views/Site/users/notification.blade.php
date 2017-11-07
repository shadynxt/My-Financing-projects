@extends('Site.layouts.master')

@section('header')
    @parent
@endsection

@section('content')
 <section class="full-container _content" style="background-image:url({{ URL::asset('public/Site/img/bg_img.png')}})">
      <div class="container">
        <div class="row">
          <div class="col s12 "><img src="{{ URL::asset('public/Site/img/static_hr.png')}}" alt="" data-aos="fade-down"><h4 class="title" data-aos="fade-up" data-aos-delay="600"> الاشعارات   </h4></div>
         <!-- noti_elem -->
        @if(isset($data))
        @foreach($data as $dat )
            <a href="{{ asset('proj/'.$dat['project_id']) }}">
                      <div class="col s12 noti_elem">
                              <div class="noti_elem_ right-align">
                                <div class="col s8 m10">
                                  <span>{{ $dat['username'] }} </span>
                                  <p>{{ $dat['body'] }}</p>
                                </div>
                                <div class="col s4 m2 left-align">
                                  <label>{{ $dat['time'] }}</label>
                                  <label> {{ $dat['date'] }}</label>
                                </div>
                              </div>

                      </div><!--/ noti_elem -->
            </a>
          @endforeach
          @endif
        </div><!-- row _content -->
      </div><!-- container _content-->
  </section><!-- section _content -->
@endsection

@section('footer')
    @parent
@endsection
