<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Hozoor</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href='https://cdn.fontcdn.ir/Font/Persian/Sahel/Sahel.css' rel='stylesheet' type='text/css'>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.10/css/mdb.min.css" rel="stylesheet">

    <!--sidebar-->
    <link href="{{asset('fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/admin.css')}}" rel="stylesheet">
    <link href="{{asset('js/chartZoom.js')}}" rel="script">
    <!-- Icons -->


    <!-- Theme CSS -->
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/component.css')}}" rel="stylesheet">
    <link href="{{asset('css/default.css')}}" rel="stylesheet">
    <link href="{{asset('css/font.css')}}" rel="stylesheet">
    <link href="{{asset('css/inter-phone.css')}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{asset('css/mdb.min.css')}}" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="{{asset('css/style.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/date-picker.css')}}" rel="stylesheet">

    <style>

        #chartdiv {
            width: 100%;
            height: 500px;
        }

        .map-container iframe {
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            position: absolute;
        }
    </style>
</head>
<body class="grey  lighten-3">
<div id="wrapper" dir="ltr">

    <!--Main Navigation-->
    <header>


        <!-- Navbar -->
        <!-- Sidebar -->

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion flex-wrap-reverse"
            id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon rotate-n-15 ">
                    <i class="fas fa-laugh-wink animated bounce infinite"></i>
                </div>
{{--                @permission('manager-controller')--}}
                <div class="sidebar-brand-text mx-3">Be Happy </div>
{{--                @endpermission--}}
{{--                @permission('student-controller')--}}
{{--                <div class="sidebar-brand-text mx-3">پنل مدیریت</div>--}}
{{--                @endpermission--}}
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link text-right" href="">
                    <span style="font-family: Sahel;font-weight: bold;font-size: 18px">داشبورد</span>
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading text-right">
                مدیریت
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            @permission('teacher-controller')

            <li class="nav-item float-left">
                <a class="nav-link collapsed text-right" href="#" data-toggle="collapse" data-target="#collapseTwo"
                   aria-expanded="true" aria-controls="collapseTwo">
                    <span style="font-family: Sahel;font-weight: bold;font-size: 15px">معلمین</span>
                    <i class="fas fa-chalkboard-teacher"></i>

                </a>

                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2  collapse-inner rounded">
                        <h6 class="collapse-header">:</h6>
                        <a class="collapse-item text-right" href="{{route('teacher.create')}}"
                           style="font-family: Sahel;font-weight: bolder;font-size: 15px"> اضافه کردن<i
                                class="fas fa-user-plus"></i> </a>
                        <a class="collapse-item text-right"
                           href="{{route('teacher.show',Auth::user()->userable->userable_id)}}"
                           style="font-family: Sahel;font-weight: bolder;font-size: 15px"> نمایش معلمین
                            <i class="fas fa-users"> </i></a>
                    </div>
                </div>
            </li>
            @endpermission
            <!-- Nav Item - Utilities Collapse Menu -->
            @permission('teacher-controller')
            <li class="nav-item">
                <a class="nav-link  text-right collapsed" href="" data-toggle="collapse"
                   data-target="#collapseUtilities"
                   aria-expanded="true" aria-controls="collapseUtilities">
                    <span>دانش آموزان</span>
                    <i class="fas fa-user-graduate"></i>
                </a>
                <div id="collapseUtilities" class="collapse" aria-expanded="false" aria-labelledby="headingUtilities"
                     data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item text-right" href="{{route('student.create')}}">اضافه کردن<i
                                class="fas fa-user-plus"></i> </a>
                        <a class="collapse-item text-right"
                           href="{{route('student.show',Auth::user()->userable->userable_id)}}">نمایش دانش آموزان <i
                                class="fas fa-users"></i>
                        </a>
                    </div>
                </div>
            </li>
            @endpermission
            @permission('teacher-controller')

            <li class="nav-item">
                <a class="nav-link text-right" href="{{route('grade.show',Auth::user()->userable->userable_id)}}">
                    <span style="font-family: Sahel;font-weight: bold;">مقطع</span>
                    <i class="fas fa-graduation-cap"></i>
                </a>
            </li>
            @endpermission
            @permission('student-controller')

            <li class="nav-item">
                <a class="nav-link text-right" href="{{route('class.show',Auth::user()->userable->userable_id)}}">
                     <span
                         style="font-family: Sahel;font-weight: bold;">کلاس</span>
                    <i class="fas fa-chalkboard"></i></a>
            </li>
            @endpermission
            @permission('Manager-controller')

            <li class="nav-item">
                <a class="nav-link text-right" href="{{route('show-all-manager')}}">
                     <span
                         style="font-family: Sahel;font-weight: bold;"> مدیران </span>
                    <i class="fas fa-chalkboard"></i></a>
            </li>
            @endpermission
            <!-- Divider -->

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed text-right" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <span>خروج</span>
                    <i class="fas fa-sign-out-alt"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </li>

            <!-- Nav Item - Charts -->
        {{--            <li class="nav-item ">--}}
        {{--                <form action="{{route('dayIndex')}}" method="post">--}}
        {{--                    @csrf--}}
        {{--                <a class="nav-link text-right" href="{{route('dayIndex')}}">--}}
        {{--                    <i class="fas fa-fw fa-chart-area"></i>--}}
        {{--                    <span--}}
        {{--                        style="font-family: Sahel;font-weight: bold;">نمودار ها </span></a>--}}
        {{--            </li>--}}

        <!-- Nav Item - Tables -->


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>

        <!-- Sidebar -->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="pt-5 mx-lg-5 col-sm-9">
        <div class="row">

            <!--Grid column-->
            <div class="col-md-12 mb-4">
                <div class="card">
                    @if(Session::has('massage'))
                        <div class="alert alert-primary float-right text-right" role="alert">
                            {{Session::get('massage')}}
                        </div>
                    @endif
                    @yield('content')

                </div>

            </div>

        </div>
    @yield('out-card')

    <!--Grid column-->


    </main>
</div>


<!--Main layout-->

<!--Footer-->
<!--/.Footer-->

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
<!-- Bootstrap core JavaScript -->
{{--    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>--}}
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{asset('js/classie.js')}}"></script>
<script type="text/javascript" src="{{asset('js/modernizr.custom.js')}}"></script>
<script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/inter-phone.js')}}"></script>
<!-- JQuery -->
<!-- Initializations -->
<!-- Core -->
<script src="{{asset('jquery/jquery.min.js')}}"></script>
<script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('jquery-easing/jquery.easing.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>
<script src="{{asset('js/persian-date.js')}}"></script>
<script src="{{asset('js/persian-datepicker.js')}}"></script>
@yield('script')
<!-- Theme JS -->
<script type="text/javascript">
    // Animations initialization
    new WOW().init();

</script>
<script>
    var temp;
    type = "text/javascript" >
        $(document).ready(function () {
            $(".date").pDatepicker();


        });
    $('.formatter-example').persianDatepicker({
        observer: false,
        format: 'YYYY/MM/DD',
        altField: '.observer-example-alt',
        onSelect: function (unix) {

            return unix;
        }

    });

</script>
<script src="http://code.highcharts.com/highcharts.js"></script>
{{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>--}}

<!-- Charts -->
</body>
</html>

