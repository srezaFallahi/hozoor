<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Hozoor</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

{{--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">--}}
{{--    <link rel="stylesheet" href="https://cdnjs.com/libraries/bttn.css">--}}
<!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href='https://cdn.fontcdn.ir/Font/Persian/Sahel/Sahel.css' rel='stylesheet' type='text/css'>

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
<body class="grey lighten-3">

<!--Main Navigation-->
<header dir="rtl">

    <!-- Navbar -->
    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed text-center  ">

        <a class="logo-wrapper animated bounce infinite waves-effect">
            <strong style="font-family: Sahel;font-weight: bold;font-size: 150%" class="text-dark">پنل مدیریت</strong>
        </a>

        <div class="list-group list-group-flush text-right ">
            <a href="#" class="list-group-item active waves-effect">
                <i class="fas fa-chart-pie mr-3"></i> Dashboard
            </a>
            <a href="#" class="list-group-item list-group-item-action waves-effect">
                <i class="fas fa-user mr-3"></i> Profile</a>
            <a href="#" class="list-group-item list-group-item-action waves-effect">
                <i class="fas fa-table mr-3"></i> Tables</a>
            <a href="#" class="list-group-item list-group-item-action waves-effect">
                <i class="fas fa-map mr-3"></i> Maps</a>
            <a href="#" class="list-group-item list-group-item-action waves-effect">
                <i class="fas fa-money-bill-alt mr-3"></i> Orders</a>
        </div>

    </div>

    <!-- Sidebar -->

</header>
<!--Main Navigation-->

<!--Main layout-->
<main class="pt-5 mx-lg-5 col-sm-9">
    <div class="container-fluid mt-5">

        <!-- Heading -->
        <div class="card mb-4 wow fadeIn">

            <!--Card content-->
            <div class="card-body justify-content-between">

                <h4 class="mb-2 mb-sm-0 pt-1">
                    @yield('header')
                </h4>

            </div>

        </div>
        <!-- Heading -->

        <!--Grid row-->
        <div class="row wow fadeIn">

            <!--Grid column-->
            <div class="col-md-12 mb-4">
                <div class="card">
                    @yield('content')
                </div>

            </div>


        </div>
        <!--Grid column-->

    </div>
    <!--Grid row-->

    <!--Grid row-->
    <!--Grid row-->

    <!--Grid row-->


</main>
</body>
<!--Main layout-->

<!--Footer-->
<!--/.Footer-->

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{asset('js/classie.js')}}"></script>
<script type="text/javascript" src="{{asset('js/modernizr.custom.js')}}"></script>
<script type="text/javascript" src="{{asset('js/mdb.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/inter-phone.js')}}"></script>
<!-- Initializations -->
<!-- Core -->

<!-- Theme JS -->
<script type="text/javascript">
    // Animations initialization
    new WOW().init();

</script>

<!-- Charts -->

</body>

</html>
