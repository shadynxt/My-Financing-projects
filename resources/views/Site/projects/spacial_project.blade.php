@extends('Site.layouts.master')

@section('header')
    @parent
@endsection

@section('content')

 @if(Session::has('message2'))
    <script>
        $(function () {
            $('.nativ_modal').show();
        });
    </script>
    @endif

    @if(Session::has('message3'))
    <script>
        $(function () {
            $('.nativ_modal').show();
        });
    </script>
    @endif

 <section class="full-container _content" style="background-image:url({{ URL::asset('public/Site/img/bg_img.png')}})">
    <div class="container">
        <div class="row">
            <div class="col s12 "><img src="{{ URL::asset('public/Site/img/static_hr.png')}}" alt="" data-aos="fade-down"><h4 class="title" data-aos="fade-up" data-aos-delay="600"> تفاصيل المشروع </h4></div>
            <!-- project_container -->
            <div class="col s12 project_container">
              @foreach($projects as $project)
                  <!-- project_rit -->
            <div class="col s12 m12 l6 project_rit">

             <!-- by mursi -->
    <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;min-height:500px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%!important;width:38px;height:38px;" src="{{asset('public/Site/img/spin.svg')}}" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:850px;position:absolute; overflow:hidden;">
          @if(!empty($images))
          @foreach($images as $image)
            <div>
                <img data-u="image" src="{{asset('public/uploads/projects/'.$image->img)}}" />
                <div data-u="thumb">
                    <img data-u="thumb" src="{{asset('public/uploads/projects/'.$image->img)}}" />
                    <div class="ti">Slide Description</div>
                </div>
            </div>
            @endforeach
            @endif
            <div>
              <img data-u="image" src="{{asset('public/uploads/projects/'.$project->basic_image)}}" />
                <div data-u="thumb">
                  <img data-u="thumb" src="{{asset('public/uploads/projects/'.$project->basic_image)}}" />
                    <div class="ti">Slide Description</div>
                </div>
            </div>
            @if(!empty($project->video))
            <div>
              <video width="320" height="240" controls>
              <source src="{{asset('public/uploads/videos/'.$project->video)}}" >
              </video>
            </div>
            @endif

            <a data-u="any" href="https://www.jssor.com" style="display:none">bootstrap slider</a>
        </div>
        <!-- Thumbnail Navigator -->
        <div data-u="thumbnavigator" class="jssort111" style="position:absolute;left:0px;bottom:0px;width:980px;height:100px;cursor:default;" data-autocenter="1" data-scale-bottom="0.75">
            <div data-u="slides">
                <div data-u="prototype" class="p">
                    <div data-u="thumbnailtemplate" class="t"></div>
                </div>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;margin-top:240px;left:25px;background:#4DB6AC" data-scale="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;margin-top:240px;right:25px;background:#4DB6AC" data-scale="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
            </svg>
        </div>
    </div>

<!-- end by mursi -->
            </div><!-- project_rit -->
                <!-- project_lft -->
                <div class="col s12 m12 l6 project_lft">
                    <div class="col s12 h5">

                        <h5 class="col s12 m8"> {{ $project->address }} </h5>
                        <div class="lik_shar col s12 m4">
                            <ul>
                                <li><a href="<?php echo asset("messageme/$project->user_id") ?>"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                <li><a href="<?php echo asset("favor/$project->id") ?>">
                                        <i class="fa fa-heart" aria-hidden="true"></i></a></li>
                                <li data-href="http://edamny.com" data-layout="button_count" data-size="large"
                                    data-mobile-iframe="true">
                                    <a class="fb-xfbml-parse-ignore" target="_blank"
                                       href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fedamny.com%2F&amp;src=sdkpreparse">
                                        <i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
                            </ul>

                        </div>
                    </div>
                    <div class="col s12 project_txt ex3">
                        <p class=""> {{ $project->idea }} </p>
                    </div>
                    <h6 class="col s12 item_ref">من قبل
                        <a href="<?php echo asset("profile/$project->user_id") ?>">{{ $project->user->first_name }} </a>
                    </h6>
                    <!-- project_locat -->
                    <div class="col s12 project_locat">
                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> {{  $project->city->name }} </span>
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
                            <label><span class="san">
                                    <?php
                                    // to get how many days  reset
                                    $created = new Carbon\Carbon($project->expected_date);
                                    $now = Carbon\Carbon::now();
                                    echo $created->diff($now)->days;
                                    ?>
                                </span><br> يوم متبقى  </label>
                        </div>
                        <div class="col s4" >
                            <label><span class="san">{{ $project->support->count() }}</span><br> كم مساهم  </label>
                        </div>
                        <div class="col s4">
                            <label><span class="san">          <?php

                                                           if($project->support->sum('amount_of_contribution') ==0){
                                                              echo "0%";

                                                           }
                                                           else{
                                                              $width = (($project->budget)/$project->support->sum('amount_of_contribution'))*100;
                                                              $width_integer =floor($width);
                                                               echo $width_integer.'%';
                                                                }
                                               ?></span><br>  تم جمعه </label>
                        </div>
                    </div><!--/* suports section -->
                    <div class="col s12">
                        <a href="<?php echo asset("support/$project->id") ?>" class="category_0">
                            <i class="fa fa-table" aria-hidden="true"></i>
                           ادعم هذا المشروع</a>
                    </div>
                </div><!-- project_lft -->
            </div><!-- project_container -->
        </div><!-- row _content -->
    </div><!-- container _content-->
    <div class="container  project_support project_support_" style="">
        <div class="container" style="">
            <ul class="tabs">
                <li class="tab"><a class="active" href="#test1"> التعليقات </a></li>
                <li class="tab"><a href="#test2"> الداعمون </a></li>
                <li class="tab"><a href="#test3"> التحديثات </a></li>
            </ul>
        </div>
    </div>

    <!-- tabs target container -->
    <div class="container" style="padding:0;">
        <div class="row">
            <!-- comments list -->
            <div id="test1" class="col s12 comments_list">
              @if(isset($comments))
                @foreach($comments as $comment)
                <div class="col s12 project_border">

                    <div class="col s12 cmnt-detils">
                        <div class="col s3 m2">
                           <!--  @if($comment->user->profile_pic)
                           {{ Html::image('public/uploads/projects/'.$comment->user->profile_pic, 'a picture', array('width'=>'200','height'=>'150')) }}
                            @else
                           {{ Html::image('public/uploads/projects/default.png', 'a picture', array('width'=>'200','height'=>'150')) }}
                           @endif -->

                           <img src="{{asset('public/Site/img/default.png')}}" alt="" class="">
                        </div>
                        <div class="col s9 m10" style="padding: 0!important;">
                            <div class="col s12" style="padding: 0!important;">
                              @if(isset($comment->user_id))
                                <h5 class="col s12 m6">{{ App\User::find($comment->user_id)->first_name }}</h5>
                              @endif
                                <span class="col s12 m6 san"> {{ $comment->created_at}}</span>
                            </div>
                        </div>
                        <p class="col s12 m10 c_nt" style="padding: 0!important;">{{ $comment->body }}</p>
                    </div><!-- cmnt-detils -->

                </div>
                   @endforeach
                   @endif

                <div class="col s12 add_comnt">
                        {{ Form::open(array('action' => array('Site\ProjectController@comment', $project->id),'method' =>'post')) }}
                        <textarea name="body" rows="8" cols="80"></textarea>
                        <button type="submit" name="button"> اضف تعليق </button>
                         {{ Form::close()}}
                </div>
            </div><!-- / comments list -->

            <!-- suppoter list -->
            <div id="test2" class="col s12 project_comnt">
                <!-- support_elem -->
                @if(isset($supports))
                @foreach($supports as $support)
                <div class="col s12 support_elem">
                    <div class="col s8 m8 support_img">
                        <div class="support_num">
                            <h6>{{ $support->full_name}} </h6>
                            <p  class="san">{{ $support->created_at}}</p>
                        </div>
                    </div>
                    <div class="col s4 m4 support_mount">
                        <label for="" class="san">{{ $support->amount_of_contribution }}ر.س</label>
                    </div>
                </div><!-- / support_elem -->
                @endforeach
                @endif
            </div><!-- / suppoter list -->
            <!-- comments list -->
            <div id="test3" class="col s12 comments_list">
                <div class="col s12 project_border">
                    <!-- cmnt-detils -->
                    @if(isset($recent_all))
                    @foreach($recent_all as $recent)
                    <div class="col s12 cmnt-detils ">
                        <div class="col s3 m2">
                          @if(isset($recent->user_id))
                          <img src="public/uploads/projects/{{ App\User::find($recent->user_id)->profile_pic }}" alt="" class="">
                          @endif
                        </div>
                        <div class="col s9 m10" style="padding: 0!important;">
                            <div class="col s12" style="padding: 0!important;">
                              @if(isset($recent->user_id))
                                <h5 class="col s12 m6">{{ App\User::find($recent->user_id)->first_name }}</h5>
                              @endif
                                <span class="col s12 m6 san" > {{ $recent->created_at }}</span>
                            </div>
                        </div>
                        <p class="col s12 m10 c_nt" style="padding: 0!important;">{{ $recent->description }}</p>
                    </div><!-- cmnt-detils -->
                    @endforeach
                    @endif

                </div>
                @if($project->user_id == Auth::id())
                <div class="col s12 add_comnt">
                   {{ Form::open(array('action' => array('Site\ProjectController@recent', $project->id),'method' =>'post')) }}
                    <textarea name="body" rows="8" cols="80"></textarea>
                    <button type="submit" name="button"> اضف تحديث  </button>
                   {{ Form::close() }}
                </div>
                @endif
            </div><!-- / comments list -->
            <!-- suppoter list -->
        </div>
    </div><!-- tabs target container -->
</section><!-- section _content -->
<!-- End Project id-->
@endforeach

@endsection

@section('footer')
    @parent
@endsection
