@extends('Site.layouts.master')

@section('header')
    @parent
@endsection

@section('content')
<section class="full-container _content" style="background-image:url({{ URL::asset('public/Site/img/bg_img.png')}})">
    <div class="container">
        <div class="row">
            <div class="col s12 "><img src="{{ URL::asset('public/Site/img/static_hr.png')}}" alt="" data-aos="fade-down"><h4 class="title" data-aos="fade-up" data-aos-delay="600"> الرسائل   </h4></div>
                <div class="col s12 m12 l12 xl12">

                    <div class="col s12 m6 l5 person_list_">
                        <div class="chat_search">
				                <div class="input-field col s12">
				                <form actions="{{url('searchuser')}}" id="search_user" method="get">
				                	{!! csrf_field() !!}
				                  <input type="text" name="body" class="validate" placeholder=" بحث ">
				                  <label for="last_name"><i class="fa fa-search" aria-hidden="true"></i></label>
				              </form>
                      <script type="text/javascript">
                 // submit search form

                         var search =document.getElementById("search_user");

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
                    <div class="col s12 person_list ex3" >
                        <ul>
                        	@if(isset($users))
                             @foreach($users as $user)
                              <a href="{{ asset('choose/'.$user['user_to']) }}">
					               <li class="col s12 msg_  <?php if($id == $user['user_to']){ echo 'active';}?>" >
                                       <input type="hidden" id="prodIDStockAlert"  name="" value="">
					                    <div class="col s3">
					                     {{ Html::image('/uploads/projects/'.$user['img'],
					                     'a picture', array()) }}
					                    </div>
					                    <div class="col s7">
					                      @if($user['active'] ==1)
					                      <i class="fa fa-circle unread" aria-hidden="true"></i>
					                      @endif
					                      <h5>
					                      {{ $user['full_name'] }}
					                      </h5>
					                      <p>
					                      </p>
					                    </div>
					                    <div class="col s2">
					                      <label> </label>
					                    </div>
					               </li>
					           </a>
					           @endforeach
                              @endif
					    </ul>
                    </div>
                    </div>
                    <!--Message Content-->

		            <div class="col s12 m6 l7 chat">
		              <div class="chat_area ex3">
		              	 @if(isset($messages))
                        @foreach($messages as $message)
                        @if($message->user_from == Auth::id())
		                <div class="col s12 ">
		                  <div class="send_">
		                    <p>{{ $message->message }} </p>
		                  </div>
		                </div>
		                @else
		                <div class="col s12">
		                  <div class="reiceve_">
		                    <p>{{ $message->message }}</p>
		                  </div>
		                </div>
		                @endif
		                @endforeach
		                @endif
		              </div>

		            <form actions="{{url('support/{id}')}}" method="post"  >
		             {{ csrf_field() }}
		              <div class="col s12 write_area">
			              <div class="input-field col s9">
			                 <textarea id="textarea1" class="materialize-textarea" name="content" placeholder="اكتب هنا ......."></textarea>
			              </div>
			              <div class="col s3">
			                 <button type="submit" class="btn category_0" >ارسال</button>
			                  @if(isset($users))
                              @foreach($users as $user)
                              @if(!empty($user['conId']))
			                   <input type="hidden" name="conversation" value="{{$user['conId']}}">
			                    @endif
			                   @endforeach
                               @endif
			              </div>
		              </div>
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
