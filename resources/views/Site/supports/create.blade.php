@extends('Site.layouts.master')

@section('header')
    @parent
@endsection

@section('content')

<section class="full-container _content" style="background-image:url({{ URL::asset('public/Site/img/bg_img.png')}})">
    <div class="container">
        <div class="row">
            <!--Error Message -->
             @if(Session::has('message3'))
                         <script>
                        $(function() {
                        $('.nativ_modal').show();
                        });
                         </script>
             @endif
            <div class="col s12 "><img src="{{ URL::asset('public/Site/img/static_hr.png')}}" alt="" data-aos="fade-down"><h4 class="title" data-aos="fade-up" data-aos-delay="600"> دعم المشروع </h4></div>
            <div class="col s12">
                <div class="col m1 l1 xl1 hide-on-small-only"></div>
                <form class="col s12 m10 l10 xl10 right-align support_form" actions="{{url('support/{id}')}}" method="post">
                    {{ csrf_field() }}
                    <!-- form_elem -->
                    <div class="col s12 ">
                        <h5 class="col s12 suppot_title">الخطوه الاولى - حدد مبلغ الدعم </h5>
                        <div class="col m1 l2 xl2 hide-on-small-only"></div>
                        <div class="col s12  m12 l8 xl8" style="border-bottom: 1px solid #999;padding:40px 0!important;">
                            <label class="col s12 m12 l3 form_lbl"> مبلغ المساهمه </label>
                            <div class="col s12 m12 l9">
                                <input type="text" class="validate form_input" name="amount_of_contribution" >
                                <!--Error Message-->
                                @if ($errors->has('amount_of_contribution'))
                                <p style="color:red">{{ $errors->first('amount_of_contribution') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col m1 l2 xl2 hide-on-small-only"></div>
                    </div><!-- / form_elem -->
                    <!-- form_elem -->
                    <div class="col s12 ">
                        <h5 class="col s12 suppot_title"> الخطوه الثانيه - عرف الناس عن نفسك  </h5>
                        
                        <div class="col m1 l2 xl2 hide-on-small-only"></div>
                        <div class="col s12  m12 l8 xl8" style="border-bottom: 1px solid #999; padding:40px 0!important;">
                            <div class="col s12">
                                <label class="col s12 m12 l3 form_lbl"> الاسم بالكامل  </label>
                                <div class="col s12 m12 l9">
                                    <input type="text" class="validate form_input" name="full_name">
                                    <!--Error Message-->
                                    @if ($errors->has('full_name'))
                                    <p style="color:red">{{ $errors->first('full_name') }}</p>
                                    @endif
                                </div>
                            </div><br><br><br><br>
                            <div class="col s12">
                                <label class="col s12 m12 l3 form_lbl"> البريد الالكترونى  </label>
                                <div class="col s12 m12 l9">
                                    <input type="text" class="validate form_input"  name="email">
                                    <!--Error Message-->
                                    @if ($errors->has('email'))
                                    <p style="color:red">{{ $errors->first('email') }}</p>
                                    @endif
                                    <p>
                                        <input type="checkbox" id="test5" name="active" />
                                        <label for="test5" style="transform:translateY(10px);margin-left: 10px;"></label>
                                        <span class="form_lbl"> ابقنى مجهولا  </span>
                                        <span class="col s12">
                                            فى حالة النقر هنا , لن يظهر اسمك فى لائحة الممولين   </span>
                                    </p>
                                    <!--Error Message-->
                                    @if ($errors->has('active'))
                                    <p style="color:red">{{ $errors->first('active') }}</p>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="col m1 l2 xl2 hide-on-small-only"></div>
                    </div><!-- / form_elem -->
                    <!-- form_elem -->
                    <div class="col s12 ">
                        <h5 class="col s12 suppot_title" > الخطوه الثالثه - الدفع </h5>
                        
                        <!-- form_elem -->
                        <div class="col s12">
                            <div class="col s12 suppot_acounts">
                                <a href="{{asset('payment/create')}}" type="button" name="button" class="col s12 m3 l3 button_acounts"><img src="{{ URL::asset('public/Site/img/btn0.png')}}" alt=""></a>
                                <a type="button" name="button" class="col s12 m3 l3 button_acounts"><img src="{{ URL::asset('public/Site/img/btn1.png')}}" alt=""></a>
                                <a type="button" name="button" class="col s12 m3 l3 button_acounts"><img src="{{ URL::asset('public/Site/img/btn2.png')}}" alt=""></a>
                                <a type="button" name="button" class="col s12 m3 l3 button_acounts"><img src="{{ URL::asset('public/Site/img/btn3.png')}}" alt=""></a>
                            </div>
                        </div><!-- / form_elem -->

                    </div><!-- / form_elem -->

                    <div class="col s12 form_elem sub">
                        <div class="col s12 center reg_form reg_form_">
                            <input type="submit" class="category_0" value="أكمل">
                        </div>
                    </div><!-- / form_elem -->
                </form>
                <div class="col m1 l1 xl1 hide-on-small-only"></div>

            </div>
        </div><!-- row _content -->
    </div><!-- container _content-->
</section><!-- section _content -->


@endsection

@section('footer')
    @parent
@endsection
