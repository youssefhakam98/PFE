<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <base href="/public">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Live Dinner Restaurant - Responsive HTML5 Template</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="cssFront/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="cssFront/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="cssFront/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="cssFront/custom.css">
    {{-- sopping card css --}}
    <link rel="stylesheet" href="cssFront/shpongCard.css">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

{{-- @guest
@if (Route::has('login'))
<li class="nav-item">
    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
</li>
@endif

@if (Route::has('register'))
<li class="nav-item">
    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
</li>
@endif

@else --}}





<body>
    <!-- Start header -->
    <header class="top-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="index.html">
                    <img src="images/logo.png" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food"
                    aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbars-rs-food">
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item active"><a class="nav-link" href="/front">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="menu.html">Menu</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown-a"
                                data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <a class="dropdown-item" href="/reservationClient">Reservation</a>
                                <a class="dropdown-item" href="stuff.html">Stuff</a>
                                <a class="dropdown+-item" href="gallery.html">Gallery</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown-a" data-toggle="dropdown">Blog</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-a">
                                <a class="dropdown-item" href="blog.html">blog</a>
                                <a class="dropdown-item" href="blog-details.html">blog Single</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            @auth
                            <a class="nav-link" href='{{url('shwoCart',Auth::user()->id)}}'>
                                Cart[{{$count}}]
                            </a>
                            @endauth

                            @guest
                            Cart[0]
                            @endguest

                        </li>
                        <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>

                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif

                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                Logout
                            </a>
                        </li>
                        @endguest

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->


    <!-- Start Menu -->
    <div class="menu-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-title text-center">
                        <h2>Special Menu</h2>
                        <p>Shopping Cart</p>
                    </div>
                </div>
            </div>


            <span class="shopp">
                <div class="Cart-Container">
                    <div class="Header">
                        <h3 class="Heading">Shopping Cart</h3>
                        <button></button>
                        {{-- <h5 class="Action" href="{{ url('removeAllCart') }}">Remove all</h5> --}}
                        @foreach ($data as $removeAllCaft)
                        <a href="{{url('removeAllCart',$removeAllCaft->id)}}"
                            class="btn btn-danger shadow btn-xs sharp mr-1"><i class="fa fa-trash text-danger"></i></a>
                        @endforeach

                    </div>



                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col"> <strong>Image</strong> </th>
                                <th scope="col"> <strong>Title</strong> </th>
                                <th scope="col"> <strong>Quantity</strong> </th>
                                <th scope="col"> <strong>Price</strong> </th>
                                {{-- <th scope="col"> <strong>Catégory</strong> </th>
                                <th scope="col"> <strong>Image</strong> </th> --}}
                                <th scope="col"> <strong>Action</strong> </th>
                            </tr>
                        </thead>
                        <tbody>
                            @auth
                            @foreach ($data as $item)
                            <tr>
                                <input type="hidden" class="delete_val" value="">

                                <th scope="row"> <img src="{{ asset($item->image) }}" class="fluid rounded"
                                        style=" width:100px; height:100px; object-fit:cover "> </th>
                                <td> {{$item->title}} </td>
                                <td> {{$item->quantity_id}} </td>
                                <td> {{$item->price}} </td>
                                {{-- <td>
                                    <div class="d-flex">

                                    </div>
                                </td> --}}
                            </tr>
                            @endforeach

                            @foreach ($deleteCart as $removeCart)
                            <tr style="position: relative; bottom: 200px; right: -730px;">
                                <td>
                                    <a href="{{url('/removeCart',$removeCart->id)}}"
                                        class="btn btn-danger shadow btn-xs sharp mr-1"><i
                                            class="fa fa-trash text-danger"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>


                    <hr>
                    <div class="checkout">
                        <div class="total">
                            <div>
                                <div class="Subtotal">Sub-Total</div>
                                <div class="items">{{$count}} items </div>
                            </div>
                            <div class="total-amount">{{$sum}}DH</div>
                        </div>
                        <button class="button">Checkout</button>
                    </div>
                </div>
            </span>

            @endauth



            <!-- End Menu -->




            <!-- Start Customer Reviews -->
            <div class="customer-reviews-box">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="heading-title text-center">
                                <h2>Customer Reviews</h2>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 mr-auto ml-auto text-center">
                            <div id="reviews" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner mt-4">
                                    <div class="carousel-item text-center active">
                                        <div class="img-box p-1 border rounded-circle m-auto">
                                            <img class="d-block w-100 rounded-circle" src="images/quotations-button.png"
                                                alt="">
                                        </div>
                                        <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Paul
                                                Mitchel</strong>
                                        </h5>
                                        <h6 class="text-dark m-0">Web Developer</h6>
                                        <p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam
                                            eu
                                            sem
                                            tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis
                                            vel,
                                            semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse
                                            varius
                                            nibh non aliquet.</p>
                                    </div>
                                    <div class="carousel-item text-center">
                                        <div class="img-box p-1 border rounded-circle m-auto">
                                            <img class="d-block w-100 rounded-circle" src="images/quotations-button.png"
                                                alt="">
                                        </div>
                                        <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Steve
                                                Fonsi</strong>
                                        </h5>
                                        <h6 class="text-dark m-0">Web Designer</h6>
                                        <p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam
                                            eu
                                            sem
                                            tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis
                                            vel,
                                            semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse
                                            varius
                                            nibh non aliquet.</p>
                                    </div>
                                    <div class="carousel-item text-center">
                                        <div class="img-box p-1 border rounded-circle m-auto">
                                            <img class="d-block w-100 rounded-circle" src="images/quotations-button.png"
                                                alt="">
                                        </div>
                                        <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Daniel
                                                vebar</strong>
                                        </h5>
                                        <h6 class="text-dark m-0">Seo Analyst</h6>
                                        <p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam
                                            eu
                                            sem
                                            tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis
                                            vel,
                                            semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse
                                            varius
                                            nibh non aliquet.</p>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#reviews" role="button" data-slide="prev">
                                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#reviews" role="button" data-slide="next">
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Customer Reviews -->

            <!-- Start Contact info -->
            <div class="contact-imfo-box">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 arrow-right">
                            <i class="fa fa-volume-control-phone"></i>
                            <div class="overflow-hidden">
                                <h4>Phone</h4>
                                <p class="lead">
                                    +01 123-456-4590
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4 arrow-right">
                            <i class="fa fa-envelope"></i>
                            <div class="overflow-hidden">
                                <h4>Email</h4>
                                <p class="lead">
                                    yourmail@gmail.com
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <i class="fa fa-map-marker"></i>
                            <div class="overflow-hidden">
                                <h4>Location</h4>
                                <p class="lead">
                                    800, Lorem Street, US
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Contact info -->






            <!-- Start Footer -->
            <footer class="footer-area bg-f">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <h3>About Us</h3>
                            <p>Integer cursus scelerisque ipsum id efficitur. Donec a dui fringilla, gravida lorem ac,
                                semper
                                magna. Aenean rhoncus ac lectus a interdum. Vivamus semper posuere dui.</p>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <h3>Subscribe</h3>
                            <div class="subscribe_form">
                                <form class="subscribe_form">
                                    <input name="EMAIL" id="subs-email" class="form_input"
                                        placeholder="Email Address..." type="email">
                                    <button type="submit" class="submit">SUBSCRIBE</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                            <ul class="list-inline f-social">
                                <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"
                                            aria-hidden="true"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"
                                            aria-hidden="true"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"
                                            aria-hidden="true"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-google-plus"
                                            aria-hidden="true"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"
                                            aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <h3>Contact information</h3>
                            <p class="lead">Ipsum Street, Lorem Tower, MO, Columbia, 508000</p>
                            <p class="lead"><a href="#">+01 2000 800 9999</a></p>
                            <p><a href="#"> info@admin.com</a></p>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <h3>Opening hours</h3>
                            <p><span class="text-color">Monday: </span>Closed</p>
                            <p><span class="text-color">Tue-Wed :</span> 9:Am - 10PM</p>
                            <p><span class="text-color">Thu-Fri :</span> 9:Am - 10PM</p>
                            <p><span class="text-color">Sat-Sun :</span> 5:PM - 10PM</p>
                        </div>
                    </div>
                </div>

                <div class="copyright">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <p class="company-name">All Rights Reserved. &copy; 2018 <a href="#">Live Dinner
                                        Restaurant</a>
                                    Design By :
                                    <a href="https://html.design/">html design</a></p>
                            </div>
                        </div>
                    </div>
                </div>

            </footer>
            <!-- End Footer -->

            <a href="#" id="back-to-top" title="Back to top" style="display: none;"><i class="fa fa-paper-plane-o"
                    aria-hidden="true"></i></a>

            <!-- ALL JS FILES -->
            <script src="jsFront/jquery-3.2.1.min.js"></script>
            <script src="jsFront/popper.min.js"></script>
            <script src="jsFront/bootstrap.min.js"></script>
            <!-- ALL PLUGINS -->
            <script src="jsFront/jquery.superslides.min.js"></script>
            <script src="jsFront/images-loded.min.js"></script>
            <script src="jsFront/isotope.min.js"></script>
            <script src="jsFront/baguetteBox.min.js"></script>
            <script src="jsFront/form-validator.min.js"></script>
            <script src="jsFront/contact-form-script.js"></script>
            <script src="jsFront/custom.js"></script>
</body>





{{-- @endguest --}}




</html>