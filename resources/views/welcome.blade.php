
<!doctype html>

<html lang="en">

<head>

    <!-- Basic -->
    <title>FUELIN HOME</title>

    <!-- Define Charset -->
    <meta charset="utf-8">

    <!-- Responsive Metatag -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Page Description and Author -->
    <meta name="description" content="Sulfur - Responsive HTML5 Template">
    <meta name="author" content="Shahriyar Ahmed">

    <!-- Bootstrap CSS  -->
    <link rel="stylesheet" href="{{ asset('public/bootstrap/css/bootstrap.min.css') }}" type="text/css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('public/font-awesome/css/font-awesome.min.css') }}" type="text/css">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('public/css/owl.carousel.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/css/owl.theme.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('public/css/owl.transitions.css') }}" type="text/css">

    <!-- Css3 Transitions Styles  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/animate.css') }}">

    <!-- Sulfur CSS Styles  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/style.css') }}">

    <!-- Responsive CSS Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/responsive.css') }}">


    <script src="{{ asset('public/js/modernizrr.js') }}"></script>


</head>

<body>

    <header class="clearfix">


        <!-- Start  Logo & Naviagtion  -->
        <div class="navbar navbar-default navbar-top">
            <div class="container">
                <div class="navbar-header">
                    <!-- Stat Toggle Nav Link For Mobiles -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- End Toggle Nav Link For Mobiles -->
                    <a class="navbar-brand" href="index.html">FUELIN</a>
                </div>
                <div class="navbar-collapse collapse">

                    <!-- Start Navigation List -->
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a class="active" href="index.html">Home</a>
                        </li>

                        @auth

                        @else
                            <li>
                                <a href="{{ route('login') }}"
                                    class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>
                            </li>
                            @if (Route::has('register'))
                                <li>
                                    <a href="{{ route('register') }}"
                                        class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                                </li>
                            @endif
                        @endauth


                    </ul>
                    <!-- End Navigation List -->
                </div>
            </div>
        </div>
        <!-- End Header Logo & Naviagtion -->

    </header>


    <!-- Start Header Section -->
    <div class="banner">
        <div class="overlay">
            <div class="container">
                <div class="intro-text">
                    <h1>Welcome To The <span>FUELIN</span></h1>

                </div>
            </div>
        </div>
    </div>
    <!-- End Header Section -->





    <!-- Sulfur JS File -->
    <script src="{{ asset('public/js/jquery-2.1.3.min.js') }}"></script>
    {{-- <script src="{{ asset('public/js/jquery-migrate-1.2.1.min.js') }}"></script> --}}
    <script src="{{ asset('public/bootstrap/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('public/js/script.js') }}"></script>


</body>

</html>
