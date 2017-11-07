@extends('Site.layouts.master')

@section('header')
    @parent
@endsection

@section('content')

<section class="full-container _content" style="background-image:url({{ URL::asset('public/Site/img/bg_img.png')}})">
    <div class="container">
      <div class="row">
        <div class="col s12 "><img src="{{ URL::asset('public/Site/img/static_hr.png') }}" alt="" data-aos="fade-down"><h4 class="title" data-aos="fade-up" data-aos-delay="600">  الحسابات   </h4></div>
        <div class="col s12 acounts_dtls">
          <div class="col s12 m4 acounts_img_">
            <img src="{{ URL::asset('public/Site/img/acont.png')}}" alt="">
          </div>
          <div class="col s12 m8 acounts_info" style="">
          {{ Form::open(array('url' => 'payment','method'=>'post')) }}
              <!-- / form_elem -->
              <div class="col s12 ">
                <div class="col s12  m12">
                  <label class="col s2  form_lbl"> CARD NUMBER </label>
                  <div class="col s10 m10 l10">
                    <div class="col s3 input"><input type="text" name="first_four" value="" ></div>
                    <div class="col s3 input"><input type="text" name="second_four" value="" ></div>
                    <div class="col s3 input"><input type="text" name="third_four" value="" ></div>
                    <div class="col s3 input"><input type="text" name="fourth_four" value="" ></div>
                  </div>
                </div>

              </div><!-- / form_elem -->
              <!-- / form_elem -->
              <div class="col s12 ">
                <div class="col s12  m12">
                  <label class="col s2 form_lbl"> EXPIRY TIME </label>
                  <div class="col s10 m10 l10">
                    <div class="col s3 input"><input type="text" name="month" value="" ></div>
                    <div class="col s3 input"><input type="text" name="year" value="" ></div>
                  </div>
                </div>

              </div><!-- / form_elem -->
              <!-- / form_elem -->
              <div class="col s12 ">
                <div class="col s12  m12">
                  <label class="col s2 form_lbl"> CVC CODE </label>
                  <div class="col s10 m10 l10">
                    <div class="col s3 input"><input type="text" name="cvc" value="" ></div>
                  </div>
                </div>

              </div><!-- / form_elem -->
              <!-- / form_elem -->
              <div class="col s12 ">
                <div class="col s12  m12">
                  <label class="col s2 form_lbl">First Name </label>
                  <div class="col s10 m10 l10">
                    <div class="col s3 input"><input type="text" name="first_name" value="" ></div>
                  </div>
                </div>

              </div><!-- / form_elem -->
              <!-- / form_elem -->
              <div class="col s12 ">
                <div class="col s12  m12">
                  <label class="col s2 form_lbl">Last Name</label>
                  <div class="col s10 m10 l10">
                    <div class="col s3 input"><input type="text" name="last_name" value="" ></div>
                  </div>
                </div>

              </div><!-- / form_elem -->

          </div>
          <div class="col s12">
            <button type="submit" name="button"> تأكيد الطلب </button>
          </div>
          {{Form::close()}}

        </div>
      </div><!-- row _content -->
    </div><!-- container _content-->
</section><!-- section _content -->

@endsection

@section('footer')
    @parent
@endsection
