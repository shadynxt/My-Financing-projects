@extends('Site.layouts.master')

@section('header')
    @parent
@endsection

@section('content')

 <section class="full-container _content" style="background-image:url({{ URL::asset('public/Site/img/bg_img.png')}})">
      <div class="container">
        <div class="row">
          <div class="col s12 "><img src="{{ URL::asset('public/Site/img/static_hr.png')}}" alt="" data-aos="fade-down"><h4 class="title" data-aos="fade-up" data-aos-delay="600"> اعدادات الحساب   </h4></div>
          <div class="col s12">
           {{ Form::open(array('route' => array('site.update',$user->id),'enctype' => 'multipart/form-data','method' => 'PUT','class'=>'col s12 m12 l12 xl12 right-align setting_form')) }}
              <div class="row">
                                  <!-- form_elem -->
              <div class="col s12 m6 form_elem">
                <label class="col s12 form_lbl"> الاسم الاول  </label>
                <div class="col s12">
                  <input type="text" class="validate form_input" name="first_name" value="{{ $user->first_name }}">
                   @if ($errors->has('first_name'))
                     <p style="color:red">{{ $errors->first('first_name') }}</p>
                   @endif
                </div>
              </div><!-- / form_elem -->
              <!-- form_elem -->
              <div class="col s12 m6 form_elem">
                <label class="col s12 form_lbl">الاسم الاخير   </label>
                <div class="col s12">
                  <input type="text" class="validate form_input" name="last_name" value="{{ $user->last_name }}">
                    @if ($errors->has('last_name'))
                     <p style="color:red">{{ $errors->first('last_name') }}</p>
                   @endif
                </div>
              </div><!-- / form_elem -->
              </div>
              <div class="row">
                <!-- form_elem -->
              <div class="col s12 m6 form_elem">
                <label class="col s12 form_lbl">البريد الالكترونى   </label>
                <div class="col s12">
                  <input type="text" class="validate form_input" name="email" value="{{ $user->email }}">
                   @if ($errors->has('email'))
                     <p style="color:red">{{ $errors->first('email') }}</p>
                   @endif
                </div>
              </div><!-- / form_elem -->
              <!-- form_elem -->
              <div class="col s12 m6 form_elem">
                <label class="col s12 form_lbl"> رقم الجوال   </label>
                <div class="col s12">
                  <input type="text" class="validate form_input" name="phone_number" value="{{ $user->phone_number }}">
                    @if ($errors->has('email'))
                     <p style="color:red">{{ $errors->first('email') }}</p>
                   @endif
                </div>
              </div><!-- / form_elem -->
              </div>


              <div class="row">
                              <!-- form_elem -->
              <div class="col s12 m6 form_elem">
                <label class="col s12 form_lbl"> الصوره الشخصيه </label>
                <div class="col s12">
                  <input  name="profile_pic" type="file" class="file-loading input-714 form_input">
                </div>
              </div><!-- / form_elem -->
              <!-- form_elem -->
              <div class="col s12 m6 form_elem">
                <label class="col s12 form_lbl"> عن نفسك  </label>
                <div class="col s12">
                  <textarea id="textarea1" class="materialize-textarea form_input" name="about_you" value="{{ $user->about_you }}"></textarea>
                </div>
              </div><!-- / form_elem -->
              </div>

              <div class="row">
                <!-- form_elem -->
              <div class="col s12 m6 pull-m3 form_elem">
                <label class="col s12 form_lbl"> المدينه </label>
                <div class="col s12">
                  <select class="_slct form_input" name="city_id">
                    <option value="" selected> اختر الفئه</option>
                    @foreach($cities as $city )
                    <option value="{{ $city->id }}"<?php
                    if($city->id ==$user->city_id )
                    {echo "selected";}?>>
                      {{ $city->name }}
                    </option>
                    @endforeach
                  </select>
                </div>
              </div><!-- / form_elem -->

              </div>

              <div class="row">
               <!-- form_elem -->
              <div class="col s12 m6 form_elem">
                <label class="col s12 form_lbl"> رابط الموقع الالكترونى*     </label>
                <div class="col s12">
                  <input type="text" class="validate form_input" name="link" value="{{ $user->link }}">
                </div>
              </div><!-- / form_elem -->

                    <!-- form_elem -->
              <div class="col s12 m6 form_elem">
                <label class="col s12 form_lbl"> رابط الفيس بوك الشخصى*  </label>
                <div class="col s12">
                  <input type="text" class="validate form_input" name="link_facebook" value="{{ $user->link_facebook }}">
                </div>
              </div><!-- / form_elem -->

              </div>

              <div class="row">

                <div class="col s12 m6 form_elem">
                <label class="col s12 form_lbl">   أسم البنك  </label>
                <div class="col s12">
                  <input type="text" name="bank_name" class="validate form_input" name="IBAN-BANK" value="{{ $user->bank_name }}">
                </div>
              </div><!-- / form_elem -->

                 <!-- form_elem -->
              <div class="col s12 m6 form_elem">
                <label class="col s12 form_lbl">   رقم الايبان للحساب البنكى  </label>
                <div class="col s12">
                  <input type="text" class="validate form_input" name="IBAN" value="{{ $user->IBAN }}">
                </div>
              </div><!-- / form_elem -->
              </div>


          <div class="row">
            <div class="col s12 form_elem sub">
                <div class="col s12 center">
                  <input type="submit" class="category_0" value="حفظ">
                </div>
              </div>
          </div>
              <!-- / form_elem -->
          {{ Form::close() }}

          </div>
          <!-- pass_word chang -->
          <div class="col s12">
           <form class="col s12 m12 l12 xl12 right-align setting_form" action="/change/{{Auth::id()}}" method="get">
              <!-- form_elem -->
              <div class="col s12 m6 form_elem">
                <label class="col s12 form_lbl"> كلمة المرور القديمه* </label>
                <div class="col s12">
                  <input type="password" class="validate form_input" name="old_pass">
                </div>
              </div><!-- / form_elem -->
              <!-- form_elem -->
              <div class="col s12 m6 form_elem">
                <label class="col s12 form_lbl">كلمة المرور الجديده*   </label>
                <div class="col s12">
                  <input type="password" class="validate form_input" name="password">
                   @if ($errors->has('password'))
                     <p style="color:red">{{ $errors->first('password') }}</p>
                   @endif
                </div>
              </div><!-- / form_elem -->
              <div class="col s12 m6 form_elem">
                <label class="col s12 form_lbl"> تأكيد كلمة المرور*    </label>
                <div class="col s12">
                  <input type="password" class="validate form_input" name="password_confirmation">
                </div>
              </div><!-- / form_elem -->
              <div class="col s12 form_elem sub">
                <div class="col s12 center">
                  <input type="submit" class="category_0" value="حفظ">
                </div>
              </div><!-- / form_elem -->
           <form>

          </div>
        </div><!-- row _content -->
      </div><!-- container _content-->
  </section><!-- section _content -->

@endsection

@section('footer')
    @parent
@endsection
