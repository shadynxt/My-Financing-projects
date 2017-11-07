@extends('Site.layouts.master')

@section('header')
    @parent
@endsection

@section('content')
<section class="full-container _content" style="background-image:url({{asset('public/Site/img/bg_img.png')}})">
   <div class="container">
     <div class="row">
       <div class="col s12 "><img src="{{ asset('public/Site/img/static_hr.png')}}" alt="" data-aos="fade-down"><h4 class="title" data-aos="fade-up" data-aos-delay="600">  الحسابات   </h4></div>
       <div class="col s12 acounts_dtls">
         <div class="col s12 m6 acounts_img">
           <img src="{{ asset('public/Site/img/acont.png')}}" alt="">
         </div>
         <div class="col s12 m6 acounts_info" style="">
           <p> رقم الحساب :  {{ $card->number }}</p>
           <p>  سيتم انتهاء الكارت ف  :{{ $card->expire_year }}</p>
           <p> اسم الحساب </p>
           <p>{{ $card->first_name }} {{ $card->last_name }}</p>
         </div>
         <div class="col s12">
           <button type="button" name="button"> تأكيد الطلب </button>
         </div>

       </div>
     </div><!-- row _content -->
   </div><!-- container _content-->
</section><!-- section _content -->
@endsection

@section('footer')
    @parent
@endsection
