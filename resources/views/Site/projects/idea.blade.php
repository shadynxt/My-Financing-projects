@extends('Site.layouts.master')

@section('header')
    @parent
@endsection

@section('content')
 <section class="full-container _content" style="background-image:url({{ URL::asset('public/Site/img/bg_img.png')}})">
    <div class="container">
        <div class="row">
            <div class="col s12 "><img src="{{ URL::asset('public/Site/img/static_hr.png')}}" alt="" data-aos="fade-down"><h4 class="title" data-aos="fade-up" data-aos-delay="600"> ماهى فكره مشروعك </h4></div>
            <div class="col s12">
           @if(Session::has('message2'))
               <script>
              $(function() {
              $('.nativ_modal').show();
              });
               </script>
           @endif
               @if(Session::has('message'))
           <script>
              $(function () {
                  $('.nativ_modal').show();
              });
            </script>
          @endif
                <!-- 12_ category -->
                <!-- selcted category have ".slcted" class -->
                <!-- \\\\\\\\\\\\-->
                <ul class="col s12 category" >
                    @foreach($categories_desc as $category)
                    <li class="col m3 l3 xl2 hide-on-small-only ">
                        <button type="button" name="button" data-cat-id="{{ $category->id }}" class="category_1 hoverable  "> {{ $category->name}}</button>
                    </li>
                    @endforeach
                </ul>

                <!-- 12_ category -->
                <!-- \\\\\\\\\\\\-->
                <div class="col s12">
                    <div class="col m3 l3 xl1 hide-on-small-only"></div>
                    @foreach($categories_asc as $category)
                    <div class="col m3 l3 xl2 hide-on-small-only">
                        <button type="button" data-cat-id="{{ $category->id }}" name="button" class="category_1 hoverable">{{ $category->name }}</button>
                    </div>
                    @endforeach
                    <div class="col m3 l3 xl1 hide-on-small-only"></div>
                    <!-- 12_ category end-->
                </div><!-- \\\\\\\\\\\\-->
            </div>
            <div class="col m1 l1 xl1 hide-on-small-only"></div>
            <div class="col s12 m10 l10 xl10">
                {{ Form::open(array('url' => 'project','method'=>'post','enctype' => 'multipart/form-data','class'=>'col s12 idea_form')) }}

                <!-- form_elem -->
                <div class="col s12 form_elem">
                    <label class="col s12 m12 l3 form_lbl"> عنوان المشروع </label>
                    <div class="col s12 m12 l9">
                        <input type="text" class="validate form_input" name="address">
                        <p class="validat_">دع الاسم يخبر بنفسه عن عملك .
                        </p>
                        @if ($errors->has('address'))
                        <p style="color:red">{{ $errors->first('address') }}</p>
                        @endif
                    </div>
                </div><!-- / form_elem -->
                <!-- form_elem -->
                <div class="col s12 form_elem">
                    <label  class="col s12 m12 l3 form_lbl"> الفئه  </label>
                    <div class="col s12 m12 l9">
                        <select id="catt" class="_slct form_input" name="category_id">
                            <option value="" selected disabled >اختر الفئه  </option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id}}"> {{ $category->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('category_id'))
                        <p style="color:red">{{ $errors->first('category_id') }}</p>
                        @endif
                        <p class="validat_"></p>
                    </div><!-- form_elem -->
                    <!-- form_elem -->
                    <div class="col s12 form_elem">
                        <label  class="col s12 m12 l3 form_lbl"> الرابط الخاص بالمشروع  </label>
                        <div class="col s12 m12 l9">
                            <input type="text" class="validate form_input" name="link">
                            <p class="validat_">
                            </p>
                            @if ($errors->has('category_id'))
                            <p style="color:red">{{ $errors->first('link') }}</p>
                            @endif
                        </div>
                    </div><!-- / form_elem -->
                    <!-- form_elem -->
                    <div class="col s12 form_elem count">
                        <label  class="col s12 m12 l3 form_lbl"> الفكره او الهدف  </label>
                        <div class="col s12 m12 l9">
                            <textarea  class="materialize-textarea form_input textarea_1" name="idea"></textarea>

                            <p class="validat_">
                            </p>
                            @if ($errors->has('idea'))
                            <p style="color:red">{{ $errors->first('idea') }}</p>
                            @endif
                        </div>
                    </div><!-- / form_elem -->
                    <div class="col s12 form_elem">
                        <label  class="col s12 m12 l3 form_lbl">ميزانية المشروع  </label>
                        <div class="col s12 m12 l9">
                            <input type="text" class="validate form_input" name="budget">
                            <p class="validat_">
                             كم تحتاج من المال لتحقيق مشروعك؟
                               <br>
                            </p>
                            @if ($errors->has('budget'))
                            <p style="color:red">{{ $errors->first('budget') }}</p>
                            @endif

                        </div>
                    </div><!-- / form_elem -->
                    <div class="col s12 form_elem">
                        <label  class="col s12 m12 l3 form_lbl">الصوره الاساسيه للمشروع  </label>
                        <div class="col s12 m12 l9 ">
                            <input  name="basic_image" type="file" class="file-loading input-711">
                            <p class="validat_">
                                ستكون الصوره الاساسيه للمشروع التى سوف تستخدم فى كافة صفحات الموقع وبمثابة الصوه المصغره عن المشروع
                            </p>
                            @if ($errors->has('basic_image'))
                            <p style="color:red">{{ $errors->first('basic_image') }}</p>
                            @endif
                        </div>
                    </div><!-- / form_elem -->
                    <div class="col s12 form_elem">
                        <label  class="col s12 m12 l3 form_lbl">الصور الاضافيه   </label>
                        <div class="col s12 m12 l9 ">
                            <input  name="additional_photos[]" type="file" multiple class="file-loading input-712">
                            <p class="validat_">
                                هذه هى الصور الاضافيه للمشروع التى توضح تفاصيل اكثر عن المشروع
                            </p>
                            @if ($errors->has('additional_photos'))
                            <p style="color:red">{{ $errors->first('additional_photos') }}</p>
                            @endif
                        </div>

                    </div><!-- / form_elem -->
                    <div class="col s12 form_elem">
                        <label  class="col s12 m12 l3 form_lbl">رابط فديو للمشروع   </label>
                        <div class="col s12 m12 l9 vdio_">
                            <input type="text" class="col s12 m8 validate form_input" name="youtube_link">
                            <input  name="video" type="file" class="col s12 m4 file-loading input-713">
                            <p class="validat_">
                                ضع رابط الفديو الخاص بك اذا وجد .. تذكر ليس الزامى
                            </p>
                            @if ($errors->has('video'))
                            <p style="color:red">{{ $errors->first('video') }}</p>
                            @endif
                        </div>
                    </div><!-- / form_elem -->
                    <div class="col s12 form_elem">
                        <label  class="col s12 m12 l3 form_lbl"> تاريخ انتهاء المشروع  </label>
                        <div class="col s12 m12 l9 ">

                            <input type="text" class="datepicker date form_input" name="expected_date">
                            <p class="validat_">
                                ان التاريخ المتوقع لاطلاق المشروع هو التاريخ الذى تنوى فيه اطلاق حملة التمويل لهذا المشروع على منصتنا
                            </p>
                            @if ($errors->has('expected_date'))
                            <p style="color:red">{{ $errors->first('expected_date') }}</p>
                            @endif
                        </div>
                    </div><!-- / form_elem -->

                    <div class="col s12 form_elem">
                        <label  class="col s12 m12 l3 form_lbl"> المدينه  </label>
                        <div class="col s12 m12 l9">
                            <select class="_slct form_input" name="city_id">
                                <option value="" selected disabled>المدينه   </option>
                                @foreach($cities as $city)
                                <option value="{{ $city->id}}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('city_id'))
                            <p style="color:red">{{ $errors->first('city_id') }}</p>
                            @endif
                        </div>
                        <p class="validat_"></p>
                    </div><!-- / form_elem -->
                </div>
                <div class="col s12 form_elem sub">
                    <div class="col s12 center">
                        <button type="submit" name="button" class="category_0">أكمل</button>
                    </div>
                </div><!-- / form_elem -->
                {{ Form::close() }}

            </div>
            <div class="col m1 l1 xl1 hide-on-small-only"></div>
        </div><!-- row _content -->
    </div><!-- container _content-->
</section><!-- section _content -->

<script type="text/javascript">


</script>
@endsection


@section('footer')
    @parent
@endsection
