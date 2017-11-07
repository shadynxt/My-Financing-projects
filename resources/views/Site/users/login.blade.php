@extends('Site.layouts.master')

@section('header')
    @parent
@endsection

@section('content')
<section class="full-container _content" >
    <div class="container">
         <div class="row">
              <div class="col s12 "><img src="{{ URL::asset('public/Site/img/static_hr.png')}}" alt="" data-aos="fade-down"><h4 class="title" data-aos="fade-up" data-aos-delay="600"> تسجيل دخول </h4></div>
          <!-- <div class="col s12 "><h5 class="title" data-aos="fade-up" data-aos-delay="600"> هل لديك حساب ؟ <a href="#">تسجيل دخول </a> </h5></div> -->
          <hr class="main_hr">
          <div class="col s12">
            <div class="col s12 m6  bord_">
           @if(Session::has('message'))
            <script>
            // success message
            $(function() {
            $('.nativ_modal').show();
             });
            </script>
           @endif
              <form class="reg_form right-align" action="login" method="post">
                <!-- form_elem -->
                 {!! csrf_field() !!}
                <div class="col s12 form_elem">
                  <label class="col s12 form_lbl">البريد الالكترونى او رقم الجوال  </label>
                  <div class="col s12">
                    <input type="text" class="validate form_input"  name="email">
                  </div>
                </div><!-- / form_elem -->
                        <!-- form_elem -->
                        <div class="col s12 form_elem">
                          <label class="col s12 form_lbl">كلمة المرور  </label>
                              <div class="col s12">
                                <input type="password" class="validate form_input"  name="password">
                              </div>
                        </div><!-- / form_elem -->
                        <div class="col s12 form_elem">
                          <div class="col s2 chk">
                              <input type="checkbox" class="filled-in" id="filled-in-box"  name="remember_me"/>
                              <label for="filled-in-box"></label>
                          </div>
                          <span class="col s9 form_lbl">تذكرنى   </span>
                         </div><!-- / form_elem -->
                <div class="col s12 form_elem">
                  <div class="col s12 center">
                    <input type="submit" class="category_0 dis_category xs-hidden" value="او " disabled>
                  </div>
                </div><!-- / form_elem -->
                <div class="col s12 form_elem sub">
                  <div class="col s12" style="margin-top:-10px">
                    <button type="submit" name="button" class="category_0">تسجيل</button>
                  </div>
                </div><!-- / form_elem -->
              </form>
              <div class="col s12 form_elem sub">
                <div class="col s12" style=" text-align: right;
margin-right: 35px;margin-top:-20px">
                  <a href="{{ url('forget') }}"> نسيت كلمة السر ؟</a>
                </div>
              </div><!-- / form_elem -->
            </div>
                <div class="col s12 m6 reg_form right-align">
                    <div class="col s12 form_elem">
                      <div class="col s12">
                        <a href="{{ asset('login/facebook') }}" class="col s12 center facbok facbok_"> تسجيل الدخول عبر الفيس بوك  <i class="fa fa-facebook" aria-hidden="true"></i></a>
                      </div>
                    </div><!-- / form_elem -->
               <div class="col s12 form_elem">
                        <div class="col s12">
                          <a href="{{ asset('login/twitter')}}" class="col s12 center facbok tweet">تسجيل الدخول عبر تويتر   <i class="fa fa-twitter" aria-hidden="true"></i></a>
                        </div>
               </div><!-- / form_elem -->
            </form>
          </div>
          </div>
        </div><!-- row _content -->
    </div><!-- container _content-->
</section><!-- section _content -->
@endsection

@section('footer')
    @parent
@endsection
