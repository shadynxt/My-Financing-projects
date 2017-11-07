@extends('Site.layouts.master')

@section('header')
    @parent
@endsection

@section('content')

   @if(Session::has('message3'))
            <script>
            // sucess message
            $(function() {
            $('.nativ_modal').show();
            });
            </script>
    @endif
<section class="full-container _content" >
      <div class="container">
        <div class="row">
          <div class="col s12 "><img src="{{ URL::asset('public/Site/img/static_hr.png')}}" alt="" data-aos="fade-down"><h4 class="title" data-aos="fade-up" data-aos-delay="600">الشروط والأحكام</h4></div>
          <hr class="main_hr">
          <div class="col s12">

           <div class="laws-sction">
             @foreach($policies as $policy)
             <p>
               {{$policy->body}}
               <span class="important-green">"lorem ipsum"</span>

             </p>
                <ol class="laws-list">
                  <h4>سياسة الموقع</h4>
              {!!$policy->site_policy!!}

                </ol>
            @endforeach
           </div>

          </div>

        </div><!-- row _content -->
      </div><!-- container _content-->
  </section><!-- section _content -->
@endsection

@section('footer')
    @parent
@endsection
