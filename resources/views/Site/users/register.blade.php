@extends('Site.layouts.master')

@section('header')

    @parent
@endsection

@section('content')
<section class="full-container _content" >
      <div class="container">
        <div class="row">
          <div class="col s12 "><img src="{{ URL::asset('public/Site/img/static_hr.png') }}" alt="" data-aos="fade-down"><h4 class="title" data-aos="fade-up" data-aos-delay="600"> تسجيل   </h4></div>
          <div class="col s12 "><h5 class="title" data-aos="fade-up" data-aos-delay="600">
            هل لديك حساب ؟ {{ Html::linkAction('Site\AuthController@login', 'تسجيل دخول','', '') }}
          </h5></div>
          <hr class="main_hr">
          <div class="col s12">
             {{ Form::open(array('url' => 'user','class'=>'col s12 reg_form right-align')) }}

              <!-- form_elem -->
              <div class="col s12 m6 form_elem bord_">
                <label class="col s12 form_lbl"> الاسم الاول  </label>
                <div class="col s12">
                  <input type="text" class="validate form_input" name="first_name" value="{{ old('first_name') }}">
                    @if ($errors->has('first_name'))
                        <p style="color:red">{{ $errors->first('first_name') }}</p>
                    @endif
                </div>
              </div><!-- / form_elem -->
              <!-- form_elem -->
              <div class="col s12 m6 form_elem">
                <label class="col s12 form_lbl">الاسم الاخير   </label>
                <div class="col s12">
                  <input type="text" class="validate form_input" name="last_name" value="{{ old('last_name') }}">
                    @if ($errors->has('last_name'))
                        <p style="color:red">{{ $errors->first('last_name') }}</p>
                    @endif
                </div>
              </div><!-- / form_elem -->
              <!-- form_elem -->
              <div class="col s12 m6 form_elem bord_">
                <label class="col s12 form_lbl">البريد الالكترونى   </label>
                <div class="col s12">
                  <input type="text" class="validate form_input" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                        <p style="color:red">{{ $errors->first('email') }}</p>
                    @endif
                </div>
              </div><!-- / form_elem -->
              <!-- form_elem -->
              <div class="col s12 m6 form_elem">
                <label class="col s12 form_lbl key-before-container">رقم الجوال   </label>
                <div class="col s12">
                  <input type="text" class="validate form_input key-before" value="00966" title="يجب ان يكون الرقم مكون من 9 خانات مبتدأ برقم 5" pattern="^009665.+\d{7}$" 
                  name="phone_number" value="{{ old('phone_number') }}">
                    @if ($errors->has('phone_number'))
                        <p style="color:red">{{ $errors->first('phone_number') }}</p>
                    @endif
                </div>
              </div><!-- / form_elem -->
              <!-- form_elem -->
              <div class="col s12 m6 form_elem bord_">
                <label class="col s12 form_lbl">كلمة المرور  </label>
                <div class="col s12">
                  <input type="password" class="validate form_input" name="password" >
                    @if ($errors->has('password'))
                        <p style="color:red">{{ $errors->first('password') }}</p><br>
                    @endif
                </div>
              </div><!-- / form_elem -->
              <!-- form_elem -->
              <div class="col s12 m6 form_elem">
                <label class="col s12 form_lbl" >تأكيد كلمة المرور   </label>
                <div class="col s12">
                  <input type="password" class="validate form_input" name="password_confirmation">
                </div>
              </div><!-- / form_elem -->

           <!-- Start Input city -->
            <div class="col s12 m6 form_elem bord_">
              <label class="col s12 form_lbl" >اختر المدينه  </label>
                <div class="col s12">
                   <select class="_slct form_input" name="city_id">
                      <option value="" selected disabled>اختر المدينه  </option>
                       @foreach($cities as $city)
                          <option value="{{ $city->id }}"> {{ $city->name }} </option>
                       @endforeach
                    </select><br>
                     @if ($errors->has('city_id'))
                        <p style="color:red">{{ $errors->first('city_id') }}</p>
                    @endif
                </div>

              </div>
          <!-- / End Input City -->
           <div class="col s12 form_elem sub">
                <div class="col s12 center">
                  <input type="submit" class="category_0" value="تسجيل">
                </div>
              </div><!-- / form_elem -->
           {{ Form::close()}}
            <!-- <hr class="main_hr rot"> -->
          </div>
        </div><!-- row _content -->
      </div><!-- container _content-->
  </section><!-- section _content -->
@endsection


@section('footer')
    @parent
@endsection
