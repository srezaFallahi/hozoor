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
<div id="wrapper" dir="rtl">

    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <!-- Sidebar -->

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion flex-wrap-reverse"
            id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin2.blade.php">
                <div class="sidebar-brand-icon rotate-n-15 ">
                    <i class="fas fa-laugh-wink animated bounce infinite"></i>
                </div>
                <div class="sidebar-brand-text mx-3">پنل مدیریت</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link text-right" href="admin2.blade.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span style="font-family: Sahel;font-weight: bold;font-size: 18px">داشبورد</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading text-right">
                مدیریت
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item float-left">
                <a class="nav-link collapsed text-right" href="#" data-toggle="collapse" data-target="#collapseTwo"
                   aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span style="font-family: Sahel;font-weight: bold;font-size: 15px">معلمین</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2  collapse-inner rounded">
                        {{--                            <h6 class="collapse-header">:</h6>--}}
                        <a class="collapse-item text-right" href="{{route('teacher.create')}}"
                           style="font-family: Sahel;font-weight: bolder;font-size: 15px"><i
                                class="fas fa-user-plus"></i> اضافه کردن</a>
                        <a class="collapse-item text-right" href="{{route('teacher.show',1)}}"
                           style="font-family: Sahel;font-weight: bolder;font-size: 15px"><i
                                class="fas fa-users"></i> نمایش معلمین</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link  text-right collapsed" href="" data-toggle="collapse"
                   data-target="#collapseUtilities"
                   aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-user-graduate"></i> <span>دانش آموزان</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-expanded="false" aria-labelledby="headingUtilities"
                     data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item text-right" href="{{route('student.create')}}"><i
                                class="fas fa-user-plus"></i> اضافه کردن </a>
                        <a class="collapse-item text-right" href="{{route('student.show',1)}}"> <i
                                class="fas fa-users"></i>
                            نمایش دانش آموزان</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link text-right" href="{{route('grade.show',1)}}">
                    <i class="fas fa-graduation-cap"></i>
                    <span style="font-family: Sahel;font-weight: bold;">مقطع</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-right" href="{{route('class.show',1)}}">
                    <i class="fas fa-chalkboard"></i> <span
                        style="font-family: Sahel;font-weight: bold;">کلاس</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                grade
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed text-right" href="#" data-toggle="collapse"
                   data-target="#collapsePages"
                   aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse text-right" aria-labelledby="headingPages"
                     data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item ">
                <a class="nav-link text-right " href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link text-right" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

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

<!-- Charts -->
</body>
</html>

