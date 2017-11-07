@include('Admin/link')


@section('header')

<body class="skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>A</b>LT</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>لوحه</b>الاداره </span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                   <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                  {{ Html::linkAction('Admin\AdminController@logout', 'تسجيل  الخروج', '', ["class"=>"hidden-xs"]) }}
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{ URL::asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                    </div>
                  </li>
                </ul>
              </li>
                    </ul>
                </div>

            </nav>
        </header>

        @section('sidebar')
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-right image">
                        <img src="{{ URL::asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                    </div>
                </div>

                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                     <li>
                       {{ Html::linkAction('Admin\AdminController@dashboard', 'لوحه التحكم', '', []) }}
                    </li>
                    <!--Start Admin pages-->
                    <li class="treeview">
                        <a href="#">
                             <i class="fa fa-users" aria-hidden="true"></i>
                            <span>المديرون</span>
                        </a>
                        <ul class="treeview-menu">
                            <li> {{ Html::linkAction('Admin\AdminController@index', 'كل المديرون', '', ['class' => 'fa fa-circle-o']) }}</li>
                            <li> {{ Html::linkAction('Admin\AdminController@create', 'اضافه مدير', '', ['class' => 'fa fa-circle-o']) }}</li>
                        </ul>
                    </li>
                      <!--End Admin pages-->
                      <!--Start User pages-->
                      <li class="treeview">
                        <a href="#">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>المستخدمون</span>
                        </a>
                        <ul class="treeview-menu">
                            <li> {{ Html::linkAction('Admin\UserController@index', 'كل المستخدمين', '', ['class' => 'fa fa-circle-o']) }}</li>
                            <li> {{ Html::linkAction('Admin\UserController@create', 'اضافه مستخدم', '', ['class' => 'fa fa-circle-o']) }}</li>
                        </ul>
                    </li>
                    <!--End User pages-->
                      <!--Start Idea pages-->
                      <li class="treeview">
                        <a href="#">
                            <i class="fa fa-lightbulb-o" aria-hidden="true"></i>
                            <span>المشاريع</span>
                        </a>
                        <ul class="treeview-menu">
                            <li> {{ Html::linkAction('Admin\IdeasController@index', 'كل الافكار', '', ['class' => 'fa fa-circle-o']) }}</li>
                            <li> {{ Html::linkAction('Admin\IdeasController@create', 'اضافه فكره', '', ['class' => 'fa fa-circle-o']) }}</li>
                        </ul>
                    </li>
                    <!--End Idea pages-->
                    <!--Start Recent The project pages-->
                     <li class="treeview">
                      <a href="#">
                         <i class="fa fa-hacker-news" aria-hidden="true"></i>
                          <span>تحديثات المشروع</span>
                      </a>
                      <ul class="treeview-menu">
                        <li> {{ Html::linkAction('Admin\RecentController@index', 'تحديثات المشروع', '', ['class' => 'fa fa-circle-o']) }}</li>
                        <li> {{ Html::linkAction('Admin\RecentController@create', 'اضافه تحديث', '', ['class' => 'fa fa-circle-o']) }}</li>
                      </ul>
                     </li>
                <!--End Recent The project page-->
                    <!--Start Contact pages-->
                      <li class="treeview">
                        <a href="#">
                           <i class="fa fa-phone" aria-hidden="true"></i>
                            <span>المتصلون بنا</span>
                        </a>
                        <ul class="treeview-menu">
                          <li> {{ Html::linkAction('Admin\ContactUsController@index', 'المتصلون بنا', '', ['class' => 'fa fa-circle-o']) }}</li>
                        </ul>
                    </li>
                   <!--End Contact pages-->

                             <!--Start Goals pages-->
                 <li class="treeview">
                  <a href="#">
                      <i class="fa fa-briefcase" aria-hidden="true"></i>
                      <span>نبذه عن الموقع</span>
                  </a>
                  <ul class="treeview-menu">
                    <li> {{ Html::linkAction('Admin\BriefController@index', 'نبذه عن الموقع', '', ['class' => 'fa fa-circle-o']) }}</li>
                  </ul>
              </li>
             <!--End Goals pages-->
                   <!--Start Category pages-->
                      <li class="treeview">
                        <a href="#">
                            <i class="fa fa-tags" aria-hidden="true"></i>
                            <span>الفئات</span>
                        </a>
                        <ul class="treeview-menu">
                          <li> {{ Html::linkAction('Admin\CategoryController@index', 'الفئات', '', ['class' => 'fa fa-circle-o']) }}</li>
                          <li> {{ Html::linkAction('Admin\CategoryController@create', 'اضافه فئه', '', ['class' => 'fa fa-circle-o']) }}</li>

                        </ul>
                    </li>
                <!--End Category pages-->
                <!--Start Comment pages-->
                       <li class="treeview">
                        <a href="#">
                         <i class="fa fa-comments" aria-hidden="true"></i>
                            <span>التعليقات</span>
                        </a>
                        <ul class="treeview-menu">
                          <li> {{ Html::linkAction('Admin\CommentController@index', 'التعليقات', '', ['class' => 'fa fa-circle-o']) }}</li>
                          <li> {{ Html::linkAction('Admin\CommentController@create', 'اضافه تعليق', '', ['class' => 'fa fa-circle-o']) }}</li>

                        </ul>
                    </li>
                   <!--End Comment pages-->
                      <!--Start Provider pages-->
                       <li class="treeview">
                        <a href="#">
                         <i class="fa fa-money" aria-hidden="true"></i>
                            <span>الداعمون</span>
                        </a>
                        <ul class="treeview-menu">
                          <li> {{ Html::linkAction('Admin\SupportController@index', 'الداعمون', '', ['class' => 'fa fa-circle-o']) }}</li>
                          <li> {{ Html::linkAction('Admin\SupportController@create',  'اضافه داعم', '', ['class' => 'fa fa-circle-o']) }}</li>

                        </ul>
                    </li>
                   <!--End Provider pages-->
                    <!--Start Cities pages-->
                       <li class="treeview">
                        <a href="#">
                         <i class="fa fa-building" aria-hidden="true"></i>
                            <span>المدن</span>
                        </a>
                        <ul class="treeview-menu">
                          <li> {{ Html::linkAction('Admin\CityController@index', 'المدن', '', ['class' => 'fa fa-circle-o']) }}</li>
                          <li> {{ Html::linkAction('Admin\CityController@create', 'اضافه مدينه', '', ['class' => 'fa fa-circle-o']) }}</li>
                        </ul>
                    </li>
                   <!--End Cities pages-->
                    <!--Start Favorite pages-->
                       <li class="treeview">
                        <a href="#">
                         <i class="fa fa-heart" aria-hidden="true"></i>
                            <span>المفضله</span>
                        </a>
                        <ul class="treeview-menu">
                          <li> {{ Html::linkAction('Admin\FavoriteController@index', 'المفضله', '', ['class' => 'fa fa-circle-o']) }}</li>
                          <li> {{ Html::linkAction('Admin\FavoriteController@create', 'اضافه مفضله', '', ['class' => 'fa fa-circle-o']) }}</li>
                        </ul>
                    </li>
                   <!--End Favorite pages-->
                    <!--Start Follow pages-->
                       <li class="treeview">
                        <a href="#">
                         <i class="fa fa-user-plus" aria-hidden="true"></i>
                            <span>المتابعون</span>
                        </a>
                        <ul class="treeview-menu">
                          <li> {{ Html::linkAction('Admin\FollowController@index', 'المتابعون', '', ['class' => 'fa fa-circle-o']) }}</li>
                          <li> {{ Html::linkAction('Admin\FollowController@create', 'اضافه متابع', '', ['class' => 'fa fa-circle-o']) }}</li>
                        </ul>
                    </li>
                   <!--End Follow pages-->
                       <!--Start Slider-->
                    <li class="treeview">
                        <a href="#">
                          <i class="fa fa-slideshare" aria-hidden="true"></i>
                            <span>الصور المتحركه</span>
                        </a>
                        <ul class="treeview-menu">
                          <li> {{ Html::linkAction('Admin\SlideController@index', 'الصور المتحركه', '', ['class' => 'fa fa-circle-o']) }}</li>
                        </ul>
                    </li>
                   <!--End Slider-->
                       <!--Start About_us pages-->
                       <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>من نحن</span>
                        </a>
                        <ul class="treeview-menu">
                          <li> {{ Html::linkAction('Admin\AboutController@index', 'من نحن', '', ['class' => 'fa fa-circle-o']) }}</li>
                        </ul>
                    </li>
                   <!--End About_us pages-->
                       <!--Start Goals pages-->
                       <li class="treeview">
                        <a href="#">
                            <i class="fa fa-bullseye" aria-hidden="true"></i>
                            <span>اهدافك</span>
                        </a>
                        <ul class="treeview-menu">
                          <li> {{ Html::linkAction('Admin\GoalsController@index', 'اهدافك', '', ['class' => 'fa fa-circle-o']) }}</li>
                        </ul>
                    </li>
                   <!--End Goals pages-->
                  <!--Start Goals pages-->
                 <li class="treeview">
                  <a href="#">
                      <i class="fa fa-briefcase" aria-hidden="true"></i>
                      <span>نبذه عن الموقع</span>
                  </a>
                  <ul class="treeview-menu">
                    <li> {{ Html::linkAction('Admin\BriefController@index', 'نبذه عن الموقع', '', ['class' => 'fa fa-circle-o']) }}</li>
                  </ul>
              </li>
             <!--End Goals pages-->
               <!--Start Conversation pages-->
                 <li class="treeview">
                  <a href="#">
                      <i class="fa fa-envelope" aria-hidden="true"></i>
                      <span>المحادثات </span>
                  </a>
                  <ul class="treeview-menu">
                    <li> {{ Html::linkAction('Admin\ConversationController@index', 'المحادثات', '', ['class' => 'fa fa-circle-o']) }}</li>
                  </ul>
              </li>
             <!--End Conversation pages-->
             <!--Start Policy pages-->
               <li class="treeview">
                <a href="#">
                  <i class ="fa fa-circle-o" aria-hidden="true"></i>
                    <span>سياسه الموقع</span>
                </a>
                <ul class="treeview-menu">
                  <li> {{ Html::linkAction('Admin\PolicyController@index', 'سياسه الموقع', '', ['class' => 'fa fa-circle-o']) }}</li>
                </ul>
            </li>
           <!--End Policy pages-->

                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        @yield('content')
        </div><!-- /.content-wrapper -->

        @section('footer')
        <footer class="main-footer">
           <div class="col s12 m12 center-align">
          <p>تصميم وبرمجة شركة <a href="http://khalijalbarmaja.com.sa/" class="cpy">خليج البرمجه </a> لتقنية المعلومات <span class="cpy">2017</span></p>
        </div>
        </footer>

    </div><!-- ./wrapper -->


    <script src="{{ URL::asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- jQuery 2.1.4 -->
    <script src="{{ URL::asset('public/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button);
    </script>

    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{ URL::asset('public/plugins/morris/morris.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ URL::asset('public/plugins/sparkline/jquery.sparkline.min.js') }}">
    </script>
    <!-- jvectormap -->
    <script src="{{ URL::asset('public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script
        src="{{ URL::asset('public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}">
    </script>
    <!-- jQuery Knob Chart -->
    <script src="{{ URL::asset('public/plugins/knob/jquery.knob.js') }}"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="{{ URL::asset('public/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- datepicker -->
    <script src="{{ URL::asset('public/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{ URL::asset('public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
    <!-- Slimscroll -->
    <script src="{{ URL::asset('public/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ URL::asset('public/plugins/fastclick/fastclick.min.js') }}"></script>
     <!-- DataTables -->
    <script src="{{ URL::asset('public/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ URL::asset('public/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

    <!-- AdminLTE App -->
    <script src="{{ URL::asset('public/dist/js/app.min.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ URL::asset('public/dist/js/pages/dashboard.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ URL::asset('public/dist/js/demo.js')}}"></script>
        <!-- page script -->

    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
</body>
</html>
