@extends('Site.layouts.master')

@section('header')
    @parent
@endsection

@section('content')
<section class="full-container _content _all" style="background-image:url({{ URL::asset('public/Site/img/bg_img.png')}})">
      <div class="container">
        <div class="row">
            <div class="col s12 "><img src="{{ URL::asset('public/Site/img/static_hr.png') }}" alt="" data-aos="fade-down"><h4 class="title" data-aos="fade-up" data-aos-delay="600"> جميع المشاريع   </h4></div>
            <div class="col s12">
              <div class="col m2 s12 hide-on-small-only"></div>


              <div class="col m4 s12 padd-50">
              {{ Form::open(array('url' => 'change','method'=>'post')) }}

                <select class="slct" name="search"  onchange="this.form.submit()">
                  <option value="" selected disabled>تصفح </option>
                  <option value="finish_soon" >مشاريع تنتهي قريبا </option>
                  <option value="new">مشاريع انتهت </option>
                  <option value="all">جميع المشاريع </option>
                </select>
              </div>
              <div class="col m4 s12 padd-50">
                <select class="slct" name="search2"  onchange="this.form.submit()">
                  <option value="" selected disabled>الفئات </option>
                  @foreach($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }} </option>
                  @endforeach
                </select>
              </div>
          @if(isset($projects))
          @foreach($projects as $project)
            <a href="{{ asset('proj/'.$project->id) }}">
              <div class="col s12 m6 l6 xl3 no_padd">
                <!-- slider_item -->
                <div class="item">
                    <img src="<?php echo asset("public/uploads/projects/$project->basic_image")?>"  alt="" class="project_img">

                  <!-- likes_section -->
                  <div class="col s12 liks">
                    <div class="col s4" style="border-left: 1px solid #bbb;">
                      <span>{{ $project->favorite->count() }}</span>   <i class="fa fa-heart" aria-hidden="true"></i>
                    </div>
                    <div class="col s4" style="border-left: 1px solid #bbb;">
                      <span>{{ $project->comment->count() }}</span>   <i class="fa fa-comment" aria-hidden="true"></i>
                    </div>
                    <div class="col s4">
                      <span>{{ $project->views }}</span> <i class="fa fa-eye" aria-hidden="true"></i>
                    </div>
                  </div><!-- likes_section -->
                  <!-- project_details -->
                  <div class="col s12 project_details">
                    <h6>{{ $project->address }} </h6>
                    <h6 class="item_ref">من قبل
                      <a href="<?php echo asset("profile/$project->user_id")?>">{{ $project->user->first_name }} </a>
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
                               else
                               {
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
                      $created                                          = new Carbon\Carbon($project->expected_date);
                      $now                                              = Carbon\Carbon::now();
                       echo $created->diff($now)->days;
                    ?>
                  </span> يوم متبقى </label>
                    </div>
                    <div class="col s4" >
                      <label><span>{{ $project->support->count() }}</span> مساهم </label>
                    </div>
                    <div class="col s4">
                      <label><span>          <?php

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
              </div><!-- /* col. of item -->
            </a>
            @endforeach
            @endif
            {{ Form::close() }}
            </div>
          </div>
        </div><!-- row _content -->
       {!! $projects->links() !!}
      </div><!-- container _content-->
  </section><!-- section _content -->

@endsection

@section('footer')
    @parent
@endsection
