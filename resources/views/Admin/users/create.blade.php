@extends('Admin.layouts.master')

@section('header')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('content')


  <!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
       {{ Html::linkAction('Admin\AdminController@dashboard', 'لوحه التحكم', '', []) }}
        <small> {{ Html::linkAction('Admin\UserController@index', 'كل المستخدمين', '', []) }}</small>
        <small>اضافه  مستخدم </small>
    </h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> {{ Html::linkAction('Admin\AdminController@dashboard', 'لوحه التحكم', '', []) }} </li>
        <li class="active">{{ Html::linkAction('Admin\UserController@index', 'كل المستخدمين ', '', []) }}</li>
    </ol>
</section>

 <section class="content">
  <center>
    <div style="width:500px; ">
      {{ Form::open(array('url' => 'User','enctype' => 'multipart/form-data','class'=>'form-horizontal')) }}
        <div class="box-body">
         <!-- Start Input First Name-->
          <div class="form-group">
             <label for="inputPassword3" class="col-sm-2 control-label"> الاسم الاول </label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="first_name" id="inputPassword3" placeholder="الاسم الاول" ><br>
                      @if ($errors->has('first_name'))
                       <p style="color:red">{{ $errors->first('first_name') }}</p>
                      @endif
              </div>
          </div>
            <!-- End Input First Name-->
              <!-- Start Input Last  Name-->
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label"> الاسم الاخير </label>
             <div class="col-sm-10">
                    <input type="text" class="form-control" name="last_name" id="inputPassword3" placeholder="الاسم الاخير" ><br>
                      @if ($errors->has('last_name'))
                        <p style="color:red">{{ $errors->first('last_name') }}</p>
                      @endif
            </div>
          </div>
                <!-- End Input Last  Name-->
                 <!-- Start Input Email -->
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">البريد الالكترونى</label>
              <div class="col-sm-10">
                <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="البريد الالكترونى"><br>
                       @if ($errors->has('email'))
                       <p style="color:red">{{ $errors->first('email') }}</p>
                      @endif
              </div>
          </div>
            <!-- End Input  Email-->
            <!-- Start Input Phone Number -->
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label"> رقم الجوال</label>
              <div class="col-sm-10">
                <input type="text" name="phone_number" class="form-control" id="inputEmail3" placeholder="رقم الجوال"><br>
                         @if ($errors->has('phone_number'))
                             <p style="color:red">{{ $errors->first('phone_number') }}</p>
                          @endif
              </div>
          </div>
                <!-- End Input Phone Number -->
                <!-- Start Input Password  -->
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">كلمه المرور</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" id="inputPassword3" placeholder="كلمه المرور"><br>
                        @if ($errors->has('password'))
                            <p style="color:red">{{ $errors->first('password') }}</p>
                        @endif
                </div>
         </div>
                <!-- End Input Password -->
                 <!-- End Input Password -->
         <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">تاكيد كلمه المرور</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password_confirmation" id="inputPassword3" placeholder="تاكيد كلمه المرور">
                </div>
         </div>



        <!-- Start Input About You -->
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label"> عن شخصيتك </label>
              <div class="col-sm-10">
                <input type="text" name="about_you" class="form-control" id="inputEmail3" placeholder=" عن شخصيتك"><br>
                         @if ($errors->has('about_you'))
                             <p style="color:red">{{ $errors->first('about_you') }}</p>
                          @endif
              </div>
        </div>
        <!-- End Input  About You  -->

        <!-- Start Input Link -->
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label"> الرابط</label>
              <div class="col-sm-10">
                <input type="text" name="link" class="form-control" id="inputEmail3" placeholder="لينك"><br>
                         @if ($errors->has('link'))
                             <p style="color:red">{{ $errors->first('link') }}</p>
                          @endif
              </div>
        </div>
        <!-- End Input Link -->
        <!-- Start Input IBAN -->
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">  رقم الايبان للحساب البنكى</label>
              <div class="col-sm-10">
                <input type="text" name="IBAN" class="form-control" id="inputEmail3" placeholder="رقم الايبان للحساب الشخصى"><br>
                         @if ($errors->has('IBAN'))
                             <p style="color:red">{{ $errors->first('IBAN') }}</p>
                          @endif
              </div>
        </div>
        <!-- End Input IBAN -->
        <!-- Start Input link_facebook -->
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">رابط الفيس </label>
              <div class="col-sm-10">
                <input type="text" name="link_facebook" class="form-control" id="inputEmail3" placeholder="لينك الفيس"><br>
                         @if ($errors->has('link_facebook'))
                             <p style="color:red">{{ $errors->first('link_facebook') }}</p>
                          @endif
              </div>
        </div>
        <!-- End Input link_facebook -->
        <!-- Start Input bank_name-->
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">اسم البنك </label>
              <div class="col-sm-10">
                <input type="text" name="bank_name" class="form-control" id="inputEmail3" placeholder="اسم البنك"><br>
                         @if ($errors->has('bank_name'))
                             <p style="color:red">{{ $errors->first('bank_name') }}</p>
                          @endif
              </div>
        </div>
        <!-- End Input bank_name -->
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label"> الصوره الشخصيه </label>
              <div class="col-sm-10">
                    {{ Form::file('profile_pic') }}
              </div>
        </div>
                <!-- Start Input Select City-->
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label"> الفئه </label>
              <div class="col-sm-10">
                <select class="_slct form_input" name="city_id">
                   <option value="" selected disabled>اختر المدينه  </option>
                      @foreach($cities as $city)
                          <option value="{{ $city->id }}"> {{ $city->name }} </option>
                      @endforeach
                </select>
                      @if ($errors->has('city_id'))
                           <p style="color:red">{{ $errors->first('city_id') }}</p>
                      @endif
              </div>
          </div>
                <!-- End Input Select City-->
       </div>
         <!-- /.box-body -->
       <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">اضافه</button>
        </div>
         <!-- /.box-footer -->
      {{ Form::close() }}
    </div>
  </center>
</section>
@endsection

@section('footer')
@parent
@endsection
