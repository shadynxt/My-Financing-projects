@include('Site/link')


@section('header')

@if(Session::has('message'))
     <script>
    $(function() {
    $('.nativ_modal').show();
    });
     </script>
@endif


@if(Session::has('message3'))
     <script>
    $(function() {
    $('.nativ_modal').show();
    });
     </script>
@endif
<div class="row">
    <section class="full-container _header" data-aos="fade-zoom-in"
             data-aos-easing="ease-in-back"
             data-aos-delay="300"
             data-aos-offset="0" >
        <div class="container">
            <div class="row">
                <div class="col s6 right-align">
                    <!-- Authentication Links -->
                     @if (Auth::guest())
                    {{ Html::linkAction('Site\AuthController@login', 'تسجيل دخول','', [ 'class'=>"proj-top-btn to-left "]) }}
                    {{ Html::linkAction('Site\AuthController@create', 'تسجيل','', [ 'class'=>"proj-top-btn to-be-hidden"]) }}
                    @else
                    <div class="col s6 right-align">
                        <a href="#" class="profil_" style="">  <i class="fa fa-angle-down" aria-hidden="true"></i>  حسابى </a>
                        <a href="#" class="profil__" style=""><i class="fa fa-angle-up" aria-hidden="true"></i>  حسابى  </a>
                    </div>
                    @endif
                </div>
                <div class="col s6 left-align">
                    {{ Html::linkAction('Site\ProjectController@create', 'بدء المشروع','', [ 'class'=>'proj-top-btn to-left to-be-hidden']) }}
                    {{ Html::linkAction('Site\ProjectController@index', 'جميع المشاريع ','', ['class'=>'proj-top-btn']) }}
                </div>
                <div class="col s6 left-align sm-only">
                      <!-- Authentication Links -->
                     @if (Auth::guest())
                    {{ Html::linkAction('Site\AuthController@login', 'تسجيل دخول','', [ 'class'=>"proj-top-btn to-left to-be-hidden"]) }}
                    {{ Html::linkAction('Site\AuthController@create', 'تسجيل','', [ 'class'=>"proj-top-btn "]) }}
                    @else
                    {{ Form::open(array('url' => 'change','method'=>'post')) }}
                    <div class="header-categories" onclick="hideParent().toggle()"  >
                        <select class="slct" name="search2" onchange="this.form.submit()" id="hide-nav">

                          <option value=""  selected disabled>الفئات </option>
                          @foreach($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }} </option>
                          @endforeach
                        </select>
                    </div>
                    {{ Form::close() }}
                     @endif

                </div>
            </div><!-- row _header -->
        </div><!-- container _header-->
    </section><!-- section _header -->

 {{ Html::linkAction('Site\SiteController@index', '','', ['id'=>'good']) }}
    <section class="full-container _mainslider" id="parentContainer">
        <section class="_0_header"  id="childContainer">
            <nav data-aos="flip-down">
                <div class="nav-wrapper container">
                    <div class="row">
                        <a  data-activates="slide-out" class="button-collapse right small_collaps"><i class="fa fa-bars" aria-hidden="true"></i></a>


                        <a href="{{ asset('/') }}" class="brand-logo right"><img src="{{ URL::asset('public/Site/img/logo.png')}}" alt="Logo_img" class="Logo_img" data-aos="flip-right"  data-aos-delay="1200"></a>
                        <ul id="nav-mobile" class="left col m9 hide-on-med-and-down" data-aos="zoom-in" data-aos-delay="1500">
                            <li class="nav_ul">
                              {{ Html::linkAction('Site\SiteController@index', 'الرئيسية','', ['class'=>'active']) }}
                            </li>
                            <li class="nav_ul"><a href="#about_us" class="about">من نحن </a></li>
                            <li class="nav_ul"><a href="#goals"  class="goal">أهدافنا </a></li>
                            <li class="nav_ul"><a href="#recent" class="recent">أحدث المشاريع</a></li>
                            <li class="nav_ul"><a href="#most_supportive" class="most_supportive">المشاريع الأكثر دعما </a></li>
                            <li class="nav_ul">
                              {{ Html::linkAction('Site\ContactController@create', 'اتصل بنا ','', []) }}
                            </li>

                            <li class="nav_ul">
                              {{ Html::linkAction('Site\SiteController@laws', 'الشروط والأحكام','', []) }}
                            </li>

                            <li class="nav_ul"><a href="#"> </a></li>
                            <li  id="_search"><i class="fa fa-search" aria-hidden="true"></i><i class="fa fa-close" aria-hidden="true"></i>
                                  {{ Form::open(array('action' => array('Site\SiteController@search'),'method' =>'post','class'=>'search_form')) }}
                                    <input id="search" type="search" name="body" required >
                                  {{ Form::close() }}
                            </li>
                        </ul>

                        <li  id="_search" class="lee"><i class="fa fa-search" aria-hidden="true"></i><i class="fa fa-close" aria-hidden="true"></i>
                              {{ Form::open(array('action' => array('Site\SiteController@search'),'method' =>'post','class'=>'search_form')) }}
                                <input id="search" type="search"   name="body" required>
                              {{ Form::close() }}

                            </form>
                        </li>

                        <script type="text/javascript">
                          // submit search form

                                  var search =document.getElementById("search");

                                    search.onkeydown=function(evt){
                                      var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
                                      if(keyCode == 13)
                                      {
                                          document.test.submit();
                                      }
                                  }
                        </script>
                    </div>
                </div>
            </nav>

            <!-- sid nav in small screens only  -->
            <ul id="slide-out" class="side-nav">
                <li class="nav_ul center-align">
                    <a href="{{asset('/')}}" class="brand-logo brand-logo_"><img src="{{ URL::asset('public/Site/img/logo.png')}}" alt="Logo_img" class="Logo_img collapsed_logo "></a>
                </li>
                <li class="nav_ul right-align">
                    {{ Html::linkAction('Site\SiteController@index', 'الرئيسيه','', ['class'=>'active']) }}
                </li>
                <li class="nav_ul right-align"><a href="#recent" class="recent">أحدث المشاريع</a></li>
                <li class="nav_ul right-align"><a href="#most_supportive"class="most_supportive">المشاريع الأكثر دعما </a></li>
                <li class="nav_ul right-align">
                    {{ Html::linkAction('Site\ContactController@create', 'اتصل بنا ','', []) }}
                </li>
                <li class="nav_ul right-align">
                    {{ Html::linkAction('Site\SiteController@laws', 'الشروط والأحكام','', []) }}
                </li>

            </ul>
        </section><!-- section _header -->
    </section>

  @yield('content')

  @section('footer')
<section class="full-container _footer" style="background-image:url({{ URL::asset('public/Site/img/footer_bg.png')}})">
    <div class="container">
        <div class="row">
            <div class="col s12 m6 xl3">
                <h4> من نحن  </h4><hr class="sm_hr0">
                @foreach($about_all as $about)
                <p class="min_about show-read-more"> {{ $about->body }}  </p>

                <!-- <p class="min_about">  </p> -->
                <a href="javascript:" data-fancybox data-src="#hidden-content2" data-aos="fade-right"  data-aos-delay="200" class="mor read-more-btn"> <i class="fa fa-angle-left" aria-hidden="true"></i> المزيد </a>
                <div style="display: none;" id="hidden-content2">
                    <div class="gift">
                        <p>
                            {{ $about->body }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="col s12 m6 xl2">
                <h4>روابط سريعة </h4><hr class="sm_hr0">
                <ul class="footer_links right-align">
                    <li>{{ Html::linkAction('Site\SiteController@index', 'الرئيسيه','', []) }}</li>
                    <li><a href="#about_us"        class="about">من نحن   </a></li>
                    <li><a href="#goals"           class="goal" > أهدافنا</a></li>
                    <li><a href="#recent"          class="recent"> أحدث المشاريع </a></li>
                    <li><a href="#most_supportive" class="most_supportive">أكثر المشاريع دعما</a></li>
                    <li>{{ Html::linkAction('Site\SiteController@laws', 'الشروط والأحكام','', []) }}</li>
                </ul>
            </div>
            <div class="col s12 m6 xl4">
                <h4>المشاريع  اﻷكثر دعما</h4><hr class="sm_hr0">
                @foreach($ideas as $idea)
                @if($idea->budget < $idea->support->sum('amount_of_contribution'))
                <a href="<?php echo asset("proj/$idea->id") ?>" >
                    <div class="singl_pro">
                        <img src="<?php echo asset("public/uploads/projects/$idea->basic_image") ?>" alt="" >
                        <p > {{ $idea->address }}
                            <br><small>{{ $idea->support->sum('amount_of_contribution') }} </small>
                        </p>
                    </div>
                </a>
                @endif
                @endforeach
            </div>
            <div class="col s12 m6 xl3 center-align">
                <h4>معرض الصور  </h4><hr class="sm_hr0">
                <ul class="right-align">
                    <li class="gallry">
                        @foreach($ideas as $idea)
                        <a href="<?php echo asset("proj/$idea->id") ?>" >
                            <img src="<?php echo asset("public/uploads/projects/$idea->basic_image") ?>"  alt="">
                        </a>
                        @endforeach
                    </li>
                    <li class="socials">
                        <a href="https://twitter.com/EdamnySA"><i class="fa fa-twitter" aria-hidden="true"></i></a><a href="https://www.facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a><a href="https://plus.google.com/"><i class="fa fa-google-plus" aria-hidden="true"></i></a><a href="https://www.instagram.com/edamny.sa/">
                          <i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </li>
                </ul>

            </div><br> <hr class="col s12">
            <div class="col s12 m12 center-align">
                <p>تصميم وبرمجة شركة <a href="http://khalijalbarmaja.com.sa/" class="cpy">خليج البرمجه </a> لتقنية المعلومات <span class="cpy">2017</span></p>
            </div>
        </div><!-- row _footer -->
    </div><!-- container _footer-->
</section><!-- section _footer -->
<!-- Start My Account-->
<div class="hom">
    <div class="col s12 ul">
        <ul class="">
            <li class="first">{{ Html::linkAction('Site\ProjectController@show', 'مشاريعي',Auth::id(), []) }}</li>
            <li>{{ Html::linkAction('Site\UserController@profile', 'الملف الشخصى',['id' => Auth::id()], []) }} </li>
            <li>{{ Html::linkAction('Site\UserController@edit', 'تعديل الاعدادات',['id' => Auth::id()], []) }} </li>
            <li>{{ Html::linkAction('Site\ConnectController@showNotification', 'الاشعارات',[], []) }} </li>
            <li>{{ Html::linkAction('Site\ConnectController@showMessage', 'الرسائل',[], []) }} </li>
            <li class="last">{{ Html::linkAction('Site\AuthController@logout', 'تسجيل الخروج','', []) }} </li>
        </ul>
    </div>
</div>
<!--End My Account-->

<!-- start Categories -->

<!-- end categories-->

<div class="nativ_modal" style="display:none">
    <div class="wiht wiht_">
        <div class="row">
       @if(Session::has('message'))
            <h5 style="color:red">{{ Session::get('message') }}</h5>
            @elseif(Session::has('message2'))
            <h5 style="color:red">{{ Session::get('message2') }}</h5>
            @elseif(Session::has('message3'))
            <h5 style="color:green">{{ Session::get('message3') }}</h5>
            @elseif(Session::has('message4'))
            <h5 style="color:red">{{ Session::get('message4') }}</h5>
            @endif
            <div class="col s12">
                <button type="button" name="button" class="category_0 cls" > ok </button>
            </div>
        </div>
    </div><!-- #hidden-content- -->
</div>

<body>


    <!-- materialize static plugin.js  -->

    <script type="text/javascript" src="{{ URL::asset('public/Site/src/js/jquery.easing.1.3.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/Site/src/js/initial.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/Site/src/js/global.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/Site/src/js/velocity.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/Site/src/js/hammer.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/Site/src/js/jquery.hammer.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/Site/src/js/character_counter.js')}}"></script>
    <!-- materialize optionally plugin.js  -->
    <script type="text/javascript" src="{{ URL::asset('public/Site/src/js/sideNav.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/Site/src/js/tabs.js')}}"></script>

    <!--  owlcarousel.js  -->
    <script type="text/javascript" src="{{ URL::asset('public/Site/src/plugin/owlcarousel/owl.carousel.min.js')}}"></script>
    <script type='text/javascript' src="{{ URL::asset('public/Site/src/plugin/pop_select/jquery.nice-select.min.js')}}"></script>

    <!--  fancybox.js  -->
    <script type="text/javascript" src="{{ URL::asset('public/Site/src/plugin/fancybox/jquery.fancybox.min.js')}}"></script>
    <!--  fileinput.js  -->
    <script type="text/javascript" src="{{ URL::asset('public/Site/src/plugin/fileinput/fileinput.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/Site/src/plugin/fileinput/fa/theme.min.js')}}"></script>

    <!--  aos_animation.js  -->
    <script type="text/javascript" src="{{ URL::asset('public/Site/src/plugin/aos_animation/aos.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/Site/src/plugin/slick/slick.min.js')}}"></script>

    <!--  custimazed script must be Imported after all plugin.js  -->
    <script type="text/javascript" src="{{ URL::asset('public/Site/src/js/bin/jav_script.js')}}"></script>
    <!--  custimazed script must be Imported after all plugin.js  -->
    <script type="text/javascript" src="{{ URL::asset('public/Site/jsDeve/custom.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/Site/src/js/jssor.slider-26.2.0.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::asset('public/Site/src/js/datedropper.js')}}"></script>
    <script>
          $(document).ready(function(){
              $('.date').dateDropper();
          })
        </script>
    <script type="text/javascript">

$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    animateOut: 'slideOutDown',
    animateIn: 'flipInX',
    items:1,
    margin:30,
    stagePadding:30,
    smartSpeed:450
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})


$('select').niceSelect();

$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav',
    //  mobileFirst: true

});
$('.slider-nav').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: false,
    arrows: false,
    centerMode: true,
    focusOnSelect: true,
    //  mobileFirst: true
    responsive: [
        {
            breakpoint: 1025,
            settings: {
                slidesToShow: 4
            }
        },
        {
            breakpoint: 768,
            settings: {
                //  vertical:true,
            }
        },
        {
            breakpoint: 480,
            settings: {
                //  vertical:true,

                slidesToShow: 2
            }
        }
    ]

});
    </script>
<!-- for share post  -->
    <div id="fb-root"></div>
    <script>
        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.4&appId=241110544128";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- By mursi -->
<script type="text/javascript">
    $(document).ready(function(){
        var maxLength = 300;
        $(".show-read-more").each(function(){
            var myStr = $(this).text();
            if($.trim(myStr).length > maxLength){
                $(this).next(".read-more-btn").css("display" , "block");
            }
        });
    });
</script>
<script src="{{asset('public/js/jssor.slider-26.2.0.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_SlideshowTransitions = [
              {$Duration:800,x:0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:-0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:-0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:-0.3,$During:{$Top:[0.3,0.7]},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$SlideOut:true,$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,$Cols:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$Rows:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:0.3,$Cols:2,$During:{$Top:[0.3,0.7]},$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,y:-0.3,$Cols:2,$SlideOut:true,$ChessMode:{$Column:12},$Easing:{$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,$Rows:2,$During:{$Left:[0.3,0.7]},$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:-0.3,$Rows:2,$SlideOut:true,$ChessMode:{$Row:3},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,x:0.3,y:0.3,$Cols:2,$Rows:2,$During:{$Left:[0.3,0.7],$Top:[0.3,0.7]},$SlideOut:true,$ChessMode:{$Column:3,$Row:12},$Easing:{$Left:$Jease$.$InCubic,$Top:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,$Delay:20,$Clip:3,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,$Delay:20,$Clip:3,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,$Delay:20,$Clip:12,$Assembly:260,$Easing:{$Clip:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
              {$Duration:800,$Delay:20,$Clip:12,$SlideOut:true,$Assembly:260,$Easing:{$Clip:$Jease$.$OutCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Cols: 5,
                $Align: 390
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 980;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>

    <script type="text/javascript">jssor_1_slider_init();</script>
    <script type="text/javascript">
        function hideParent(){
                $('#parentContainer').css('height' , '115px');
                $('#childContainer').toggle()
        }
        $(document).ready(function(){
            if ( $('input[type="date"]').type != 'date' )
             { $('input[type="date"]').datepicker();}
        })
    </script>

  <script>
    $(document).ready(function(){;
              if ( $('#test').type != 'date' )
          { $('#test').datepicker();}
        });
  </script>

  <script type="text/javascript">
      $(document).ready(function(){
        $(".key-before").keydown(function(e) {
    var oldvalue=$(this).val();
    var field=this;
    setTimeout(function () {
        if(field.value.indexOf('00966') !== 0) {
            $(field).val(oldvalue);
        }
    }, 1);
});
      })
  </script>
<script type="text/javascript">
    $(document).ready(function(){
        var maxLength = 300;
        $(".show-read-more").each(function(){
            var myStr = $(this).text();
            if($.trim(myStr).length > maxLength){
                $(this).next(".read-more-btn").css("display" , "block");
            }
        });
    });
</script>

</body>
</html>
