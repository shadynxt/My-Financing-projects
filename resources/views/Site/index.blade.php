@extends('Site.layouts.master')

@section('header')
    @parent
@endsection

@section('content')

<section class="full-container _mainslider mob-dis-none">
    <div class="owl-carousel owl-theme owl-carousel-1" data-aos="fade-zoom-in"
         data-aos-easing="ease-in-back"
         data-aos-delay="300"
         data-aos-offset="0" >
        @foreach($sliders as $slider)
        <div class="item" style="">
            <img src="public/uploads/projects/{{ $slider->img }}  " alt="" class="sliderimg" >
        </div>
        @endforeach
    </div>
    <div class="slider_txt">
        <div class="">
            @foreach($brief_all as $brief)
            <h3 data-aos="fade-up" data-aos-delay="1200"> {{ $brief->title }} </h3>
            <p>{{ $brief->body }}
            </p>
            @endforeach
            <a class="waves-effect btn-flat" data-aos="fade-left"  data-aos-delay="1200" href="project/create"> ابدأ الآن </a>
        </div>
    </div>

</section>
<section class="full-container about_section _content mob-dis-none" id="about_us">
    <div class="container">
        <div class="static_num" data-aos="fade-right">
            <span data-aos="fade-down" data-aos-delay="800">2</span>
        </div>
        <div class="row">
            <div class="col s12 m12 center-align">

                <div class="col s12 lit-pad-top"><img src="{{ URL::asset('public/Site/img/static_hr.png')}}" alt="" data-aos="fade-down"><h4 class="title" data-aos="fade-up" data-aos-delay="600">من نحن  </h4></div>
                @foreach($about_all as $about)
                <div class="col s12 m4">
                    <img src="public/uploads/projects/{{$about->img}}" alt=""class="about_img">
                </div>
                <div class="col s12 m8">

                    <h3 class="about_head">موقع <b>{{ $about->title }}</b> <hr class="sm_hr"><img data-aos="fade-left"  data-aos-delay="600" src="{{ URL::asset('public/Site/img/walk.png')}}" alt="" class="walk"></h3>

                    <p class="show-read-more">
                        {{ $about->body }}
                    </p>
                    <a data-fancybox data-src="#hidden-content_" href="javascript:;" class="btn left btn-larg read-more-btn" data-aos="fade-right"  data-aos-delay="200">اقرأ المزيد   </a>
                    <div style="display: none;" id="hidden-content_">
                        <div class="gift">
                            <p>  {{ $about->body}}
                            </p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div><!-- row _content -->
        </div><!-- container _content-->
</section><!-- section _content -->
<section class="full-container _goals _content mob-dis-none" id="goals">
    <div class="container">
        <div class="static_num" data-aos="fade-right">
            <span data-aos="fade-down" data-aos-delay="800">3</span>
        </div>
        <div class="row">
            <div class="col s12 "><img src="{{ URL::asset('public/Site/img/static_hr.png')}}" alt="" data-aos="fade-down"><h4 class="title" data-aos="fade-up" data-aos-delay="600">أهدافنا </h4></div>
            @foreach($goals as $goal)
            <div class="col s12 m6 l6">
                <div class="goal_elem">
                    <div class="col s12 m12 l5 goal_icon valign-wrapper">
                        <img src="public/uploads/projects/{{ $goal->img }}" alt="">
                    </div>
                    <div class="col s12 m12 l7 goal_text">
                        <h5>{{  $goal->title }}</h5>
                        <p>
                            {{ $goal->body }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div><!-- row _content -->
    </div><!-- container _content-->
</section><!-- section _content -->

<section class="full-container about_section _content support white-bg" id="most_supportive">
    <div class="container">
        <div class="static_num" data-aos="fade-right">
            <span data-aos="fade-down" data-aos-delay="800">4</span>
        </div>
        <div class="row">
            <div class="col s12 "><img src="{{ URL::asset('public/Site/img/static_hr.png')}}" alt="" data-aos="fade-down"><h4 class="title" data-aos="fade-up" data-aos-delay="600">المشاريع الأكثر دعماً</h4></div>
            <div class="col s12">
                <!-- slider start -->
                @if($number_projects > 4)
                <div class="owl-carousel owl-theme owl-carousel-2">
                    <!-- slider_item -->
                    @foreach($projects as $project)
                    @if($project->budget < $project->support->sum('amount_of_contribution'))
                    <div class="col l3 m3 s12 project-item" style="width: 100%">
                    <a href="<?php echo asset("proj/$project->id") ?>">
                        <div class="item">
                                <img src="{{ asset('public/uploads/projects/'.$project->basic_image )}}" alt="" class="project_img">

                            <!-- project_details -->
                            <div class="col s12 project_details">
                                <h6>{{ $project->address }} </h6>
                                <h6 class="item_ref">من قبل
                                    <a href="<?php echo asset("profile/$project->user_id") ?>">{{ $project->user->first_name }}</a>
                                </h6>
                                <p>
                                    {{ $project->idea }}
                                </p>
                            </div><!-- /* project_details -->
                            <!-- project_locat -->
                            <div class="col s12 project_locat">
                                <span><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $project->city->name }}</span>
                                <div class="progress">
                                   <?php

                                             if($project->support->sum('amount_of_contribution') ==0){
                                                echo '<div class="determinate" style="width: 0%"></div>';

                                             }
                                             else{
                                                $width = (($project->budget)/$project->support->sum('amount_of_contribution'))*100;
                                                $width_integer =floor($width);
                                                 echo "<div class='determinate'
                                                 style='width: $width_integer%'></div>";
                                                  }
                                 ?>
                                </div>
                            </div><!-- /* project_locat -->
                            <!-- suports section -->
                            <div class="suports">
                                <div class="col s4" >
                                    <label><span>
                                            <?php
                                            // to get how many days  reset
                                            $created = new Carbon\Carbon($project->expected_date);
                                            $now = Carbon\Carbon::now();
                                            echo $created->diff($now)->days;
                                            ?>
                                        </span> يوم متبقى </label>
                                </div>
                                <div class="col s4" >
                                    <label><span>{{ $project->support->count() }}</span> مساهم </label>
                                </div>
                                <div class="col s4">
                                    <label><span>                    <?php

                                                                   if($project->support->sum('amount_of_contribution') ==0){
                                                                      echo "0%";

                                                                   }
                                                                   else{
                                                                      $width = (($project->budget)/$project->support->sum('amount_of_contribution'))*100;
                                                                      $width_integer =floor($width);
                                                                       echo $width_integer.'%';
                                                                        }
                                                       ?>
                                                     </span>تم تحصيله </label>
                                </div>
                            </div><!--/* suports section -->

                        </div><!-- /* slider_item -->
                    </a>
                    </div>
                    @endif
                    @endforeach
                </div><!-- slider end -->
                @else
                <div class="_all_">
                    @foreach($projects as $project)
                    @if($project->budget < $project->support->sum('amount_of_contribution'))
                    <!--item .col -->
                    <a href="<?php echo asset("proj/$project->id") ?>">
                        <div class="col l4 m2 s12">
                            <div class="item">
                                <img src="{{ asset('public/uploads/projects/'.$project->basic_image )}}" alt="" class="project_img">

                                <!-- project_details -->
                                <div class="col s12 project_details">
                                    <h6>{{ $project->address }} </h6>
                                    <h6 class="item_ref">من قبل
                                        <a href="<?php echo asset("profile/$project->user_id") ?>">{{ $project->user->first_name }} </a>
                                    </h6>
                                    <p>
                                        {{ $project->idea }}
                                    </p>
                                </div><!-- /* project_details -->
                                <!-- project_locat -->
                                <div class="col s12 project_locat">
                                    <span><i class="fa fa-map-marker" aria-hidden="true"></i>{{ $project->city->name }} </span>
                                    <div class="progress">
                                     <?php

                                             if($project->support->sum('amount_of_contribution') ==0){
                                                echo '<div class="determinate" style="width: 0%"></div>';

                                             }
                                             else{
                                                $width = (($project->budget)/$project->support->sum('amount_of_contribution'))*100;
                                                $width_integer =floor($width);
                                                 echo "<div class='determinate'
                                                 style='width: $width_integer%'></div>";
                                                  }
                                 ?>
                                   </div>
                                </div><!-- /* project_locat -->
                                <!-- suports section -->
                                <div class="suports">
                                    <div class="col s4" >
                                        <label><span>
                                                <?php
                                                // to get how many days  reset
                                                $created = new Carbon\Carbon($project->expected_date);
                                                $now = Carbon\Carbon::now();
                                                echo $created->diff($now)->days;
                                                ?>
                                            </span> يوم متبقى </label>
                                    </div>
                                    <div class="col s4" >
                                        <label><span>{{ $project->support->count() }}</span> مساهم </label>
                                    </div>
                                    <div class="col s4">
                                        <label><span>                    <?php

                                                                       if($project->support->sum('amount_of_contribution') ==0){
                                                                          echo "0%";

                                                                       }
                                                                       else{
                                                                          $width = (($project->budget)/$project->support->sum('amount_of_contribution'))*100;
                                                                          $width_integer =floor($width);
                                                                           echo $width_integer.'%';
                                                                            }
                                                           ?></span>تم تحصيله </label>
                                    </div>
                                </div><!--/* suports section -->
                            </div><!-- /* slider_item -->
                        </div><!--item .col -->
                    </a>
                    @endif
                    @endforeach
                </div><!--item container -->
                @endif
            </div><!-- col. _content -->
        </div><!-- row _content -->
    </div><!-- container _content-->
</section><!-- section _content -->


<section class="full-container about_section _content grey-bg" id="recent">
    <div class="container">
        <div class="static_num" data-aos="fade-right">
            <span data-aos="fade-down" data-aos-delay="800">5</span>
        </div>
        <div class="row">
            <div class="col s12 "><img src="{{ URL::asset('public/Site/img/static_hr.png')}}" alt="" data-aos="fade-down"><h4 class="title" data-aos="fade-up" data-aos-delay="600">أحدث المشاريع</h4></div>
            <div class="col s12">
                <!-- slider start -->
                @if($number_projects > 4)
                <div class="owl-carousel owl-theme owl-carousel-2">
                    <!-- slider_item -->
                    @foreach($projects as $project)
                    <div class="col l3 m3 s12 project-item" style="width: 100%">
                    <a href="<?php echo asset("proj/$project->id") ?>">
                        <div class="item">
                         <img src="{{ asset('public/uploads/projects/'.$project->basic_image )}}" alt="" class="project_img">

                            <!-- project_details -->
                            <div class="col s12 project_details">
                                <h6>{{ $project->address }} </h6>
                                <h6 class="item_ref">من قبل
                                    <a href="{{ asset('profile/'.$project->user_id) }}  "> {{ $project->user->first_name }} </a>
                                </h6>
                                <p>
                                    {{ $project->idea }}
                                </p>
                            </div><!-- /* project_details -->
                            <!-- project_locat -->
                            <div class="col s12 project_locat">
                                <span><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $project->city->name }} </span>
                                <div class="progress">
                                <?php

                                             if($project->support->sum('amount_of_contribution') ==0){
                                                echo '<div class="determinate" style="width: 0%"></div>';

                                             }
                                             else{
                                                $width = (($project->budget)/$project->support->sum('amount_of_contribution'))*100;
                                                $width_integer =floor($width);
                                                 echo "<div class='determinate'
                                                 style='width: $width_integer%'></div>";
                                                  }
                                 ?>
                                </div>
                            </div><!-- /* project_locat -->
                            <!-- suports section -->
                            <div class="suports">
                                <div class="col s4" >
                                    <label><span>
                                            <?php
                                            // to get how many days  reset
                                            $created = new Carbon\Carbon($project->expected_date);
                                            $now = Carbon\Carbon::now();
                                            echo $created->diff($now)->days;
                                            ?>
                                        </span> يوم متبقى </label>
                                </div>
                                <div class="col s4" >
                                    <label><span>{{ $project->support->count() }}</span> مساهم </label>
                                </div>
                                <div class="col s4">
                                    <label><span>
                                      <?php

                                                 if($project->support->sum('amount_of_contribution') ==0){
                                                    echo "0%";

                                                 }
                                                 else{
                                                    $width = (($project->budget)/$project->support->sum('amount_of_contribution'))*100;
                                                    $width_integer =floor($width);
                                                     echo $width_integer.'%';
                                                      }
                                     ?>
                                    </span>تم تحصيله </label>
                                </div>
                            </div><!--/* suports section -->

                        </div><!-- /* slider_item -->
                    </a>
                    </div>
                    @endforeach
                </div><!-- slider end -->
                @else
                <!-- slider_item -->
                <div class="_all_">
                    @foreach($projects as $project)
                    <!--item .col -->
                    <div class="col l3 m3 s12 project-item" style="width: 100%">
                    <a href="<?php echo asset("proj/$project->id") ?>">
                        <div class="col l4 m2 s12">
                            <div class="item">
                                <img src="{{ asset('public/uploads/projects/'.$project->basic_image )}}" alt="" class="project_img">

                                <!-- project_details -->
                                <div class="col s12 project_details">
                                    <h6>{{ $project->address }} </h6>
                                    <h6 class="item_ref">من قبل
                                        <a href="<?php echo asset("profile/$project->user_id") ?>">{{ $project->user->first_name }} </a>
                                    </h6>
                                    <p>
                                        {{ $project->idea }}
                                    </p>
                                </div><!-- /* project_details -->
                                <!-- project_locat -->
                                <div class="col s12 project_locat">
                                    <span><i class="fa fa-map-marker" aria-hidden="true"></i>{{ $project->city->name }} </span>
                                    <div class="progress">
                                        <?php

                                             if($project->support->sum('amount_of_contribution') ==0){
                                                echo '<div class="determinate" style="width: 0%"></div>';

                                             }
                                             else{
                                                $width = (($project->budget)/$project->support->sum('amount_of_contribution'))*100;
                                                $width_integer =floor($width);
                                                 echo "<div class='determinate'
                                                 style='width: $width_integer%'></div>";
                                                  }
                                       ?>
                                    </div>
                                </div><!-- /* project_locat -->
                                <!-- suports section -->
                                <div class="suports">
                                    <div class="col s4" >
                                        <label><span>
                                                <?php
                                                // to get how many days  reset
                                                $created = new Carbon\Carbon($project->expected_date);
                                                $now = Carbon\Carbon::now();
                                                echo $created->diff($now)->days;
                                                ?>
                                            </span>
                                            كم يوم متبقي
                                        </label>
                                    </div>
                                    <div class="col s4" >
                                        <label><span>{{ $project->support->count()}}</span> مساهم </label>
                                    </div>
                                    <div class="col s4">
                                        <label><span>                    <?php

                                                                       if($project->support->sum('amount_of_contribution') ==0){
                                                                          echo "0%";

                                                                       }
                                                                       else{
                                                                          $width = (($project->budget)/$project->support->sum('amount_of_contribution'))*100;
                                                                          $width_integer =floor($width);
                                                                           echo $width_integer.'%';
                                                                            }
                                                           ?>
                                                         </span>تم تحصيله </label>
                                    </div>
                                </div><!--/* suports section -->

                            </div><!-- /* slider_item -->
                        </div><!--item .col -->
                    </a>
                    </div>
                    @endforeach
                </div><!--item container -->
                @endif
            </div><!-- col. _content -->
        </div><!-- row _content -->
    </div><!-- container _content-->
</section><!-- section _content -->



@endsection


@section('footer')
    @parent
@endsection
