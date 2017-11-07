@extends('Site.layouts.master')

@section('header')
    @parent
@endsection

@section('content')
<section class="full-container _content" style="background-image:url({{ URL::asset('public/Site/img/bg_img.png')}})">
    <div class="container">
        <div class="row">
            <div class="col s12 "><img src="{{ URL::asset('public/Site/img/static_hr.png')}}" alt="" data-aos="fade-down"><h4 class="title" data-aos="fade-up" data-aos-delay="600"> الرسائل   </h4></div>
                 <div class="col s12">
                 	<h3 style="color:#aaa;margin-top:40px;"><i class="fa fa-info-circle" aria-hidden="true"></i> المشروع غير موجود </h3>
                 </div>
            </div>
        </div><!-- row _content -->
    </div><!-- container _content-->
</section><!-- section _content -->

@endsection


@section('footer')
    @parent
@endsection
