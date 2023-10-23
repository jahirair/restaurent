<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <title>Klassy Cafe - Restaurant HTML Template</title>
    <!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/home') }}/assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('public/home') }}/assets/css/font-awesome.css">

    <link rel="stylesheet" href="{{ asset('public/home') }}/assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="{{ asset('public/home') }}/assets/css/owl-carousel.css">

    <link rel="stylesheet" href="{{ asset('public/home') }}/assets/css/lightbox.css">

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{ route('root') }}" class="logo">
                            <img src="{{ asset('public/home') }}/assets/images/klassy-logo.png"
                                align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>

                            <!--
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li>
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li>

                            @if (Route::has('login'))

                                @auth
                                    {{-- <li><a href="{{ url('/dashboard') }}"
                                            class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                                    </li> --}}
                                    <li><a href="{{ url('/logout') }}"
                                            class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Logout</a>
                                    </li>
                                    <li><a href="{{ route('mycart') }}"
                                            class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Cart[{{ $cart_count }}]</a>
                                    </li>
                                @else
                                    <li><a href="{{ route('login') }}"
                                            class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                                            in</a></li>

                                    @if (Route::has('register'))
                                        <li><a href="{{ route('register') }}"
                                                class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                        </li>
                                    @endif
                                @endauth

                            @endif

                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->



    <!-- ***** About Area Starts ***** -->

    <section class="section" id="about">
        <div class="container">
            @if (\Session::has('message'))
                <div class="alert alert-success">

                    {{ \Session::get('message') }}

                    <button type="button" class="close" data-dismiss="alert" aria-label="close"
                        style="float:right;">x</button>
                </div>
            @endif
            <div class="row">
                <div class="col-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Shipping Address</h4>
                            @if (!empty($message))
                                <div class="alert alert-success">

                                    {{ $message }}

                                    <button type="button" class="close" data-dismiss="alert" aria-label="close"
                                        style="float:right;">x</button>
                                </div>
                            @endif

                            <div class="table-responsive" style="min-height: 50vh;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Mobile</th>
                                            <th>Post Code</th>

                                        </tr>
                                    </thead>
                                    <tbody>



                                        <tr>

                                            <td>{{ $shipping_info->name }}</td>
                                            <td>{{ $shipping_info->address }}</td>
                                            <td>{{ $shipping_info->mobile }}</td>
                                            <td>{{ $shipping_info->postcode }}</td>

                                        </tr>

                                        <tr>
                                            <td colspan="1"></td>

                                            <td><a href="{{ route('storeorder') }}" class="btn btn-success">Place
                                                    Order</a>
                                            </td>
                                            <td colspan="1"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Cart Items</h4>
                            <div class="table-responsive" style="min-height: 50vh;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Pice</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>

                                        </tr>
                                    </thead>
                                    <tbody>


                                        @foreach ($cart_items as $cart_item)
                                            <tr>

                                                <td>{{ $cart_item->foodName }}</td>
                                                <td>$ {{ $cart_item->price }}</td>
                                                <td>{{ $cart_item->quantity }}</td>
                                                <td>$ {{ $cart_item->price * $cart_item->quantity }}</td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </section>
    <!-- ***** About Area Ends ***** -->



    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <div class="right-text-content">
                        <ul class="social-icons">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="logo">
                        <a href="{{ route('home') }}"><img
                                src="{{ asset('public/home') }}/assets/images/white-logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12">
                    <div class="left-text-content">
                        <p>© Copyright Klassy Cafe Co.

                            <br>Design: TemplateMo
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    {{-- <script src="{{ asset('public/home') }}/assets/js/jquery-2.1.0.min.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <!-- Bootstrap -->
    <script src="{{ asset('public/home') }}/assets/js/popper.js"></script>
    <script src="{{ asset('public/home') }}/assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="{{ asset('public/home') }}/assets/js/owl-carousel.js"></script>
    <script src="{{ asset('public/home') }}/assets/js/accordions.js"></script>
    <script src="{{ asset('public/home') }}/assets/js/datepicker.js"></script>
    <script src="{{ asset('public/home') }}/assets/js/scrollreveal.min.js"></script>
    <script src="{{ asset('public/home') }}/assets/js/waypoints.min.js"></script>
    <script src="{{ asset('public/home') }}/assets/js/jquery.counterup.min.js"></script>
    <script src="{{ asset('public/home') }}/assets/js/imgfix.min.js"></script>
    <script src="{{ asset('public/home') }}/assets/js/slick.js"></script>
    <script src="{{ asset('public/home') }}/assets/js/lightbox.js"></script>
    <script src="{{ asset('public/home') }}/assets/js/isotope.js"></script>

    <!-- Global Init -->
    <script src="{{ asset('public/home') }}/assets/js/custom.js"></script>
    <script>
        $(function() {
            var selectedClass = "";
            $("p").click(function() {
                selectedClass = $(this).attr("data-rel");
                $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("." + selectedClass).fadeOut();
                setTimeout(function() {
                    $("." + selectedClass).fadeIn();
                    $("#portfolio").fadeTo(50, 1);
                }, 500);

            });
        });
    </script>
</body>

</html>
