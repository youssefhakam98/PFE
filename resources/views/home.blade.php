@extends('layouts.app')

@section('content')

<div class="content-body">

    <div class="row">
        <div class="col-xl-3 col-xxl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="widget-stat card">
                <div class="card-body p-4">
                    <div class="media ai-icon">
                        <span class="mr-3 bgl-primary text-primary">
                            <!-- <i class="ti-user"></i> -->
                            <i class="fa fa-bell" style="color: #0d6efd"></i>

                        </span>
                        <div class="media-body">
                            <h3 class="mb-0 text-black"><span class="counter ml-0">{{$reservationCount}}</span></h3>
                            <p class="mb-0" style="color:blue;">Total Resevation</p>
                            <small>4% (30 days)</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-xxl-3 col-lg-6 col-md-6 col-sm-6">
            <div class="widget-stat card">
                <div class="card-body p-4">
                    <div class="media ai-icon">
                        <span class="mr-3 bgl-primary text-primary">
                            <!-- <i class="ti-user"></i> -->
                            <i class="fa fa-bell" style="color: #0d6efd"></i>

                        </span>
                        <div class="media-body">
                            <h3 class="mb-0 text-black"><span class="counter ml-0">{{$SalesCount}}</span></h3>
                            <p class="mb-0" style="color:blue;">Total d'vents</p>
                            <small>4% (30 days)</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($product as $prod)


    <div class="d-flex justify-content-around col-md-8 col-xl-6">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="row m-b-10">
                        <div class="col-md-5 col-xxl-12">
                            <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                <div class="new-arrivals-img-contnent">
                                    <img class="img-fluid" src="{{ asset($prod->image) }}" alt=""
                                        style="height:280px;width:500px">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-xxl-12">
                            <div class="new-arrival-content position-relative">
                                <h4>{{$prod->title}}</h4>
                                <p class="price">{{$prod->price}}</p>
                                <p>Availability: <span class="item"> In stock <i
                                            class="fa fa-check-circle text-success"></i></span></p>
                                <p>Product code: <span class="item">0405689</span> </p>
                                <p>Brand: <span class="item">Lee</span></p>
                                <p class="text-content">There are many variations of passages of Lorem Ipsum available,
                                    but the majority have suffered alteration in some form, by injected humour, or
                                    randomised words which don't look even slightly believable. If you are going to use
                                    a passage of Lorem Ipsum.</p>
                                <div class="comment-review star-rating text-right">
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                    <span class="review-text">(34 reviews) / </span><a class="product-review"
                                        href="">Write a review?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endforeach



        {{--
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4 d-flex flex-column align-items-center justify-content-center">
                                    <i class="fa fa-cog fa-5x text-danger"></i>
                                    <a href="/categories" class="font-weight-bold btn btn-link">
                                        Gérer
                                    </a>
                                </div>

                                <div class="col-sm-4 d-flex flex-column align-items-center justify-content-center">
                                    <i class="fa fa-shopping-bag fa-5x text-primary"></i>
                                    <a href="/payments" class="font-weight-bold btn btn-link">
                                        Ventes
                                    </a>
                                </div>


                                <div class="col-sm-4 d-flex flex-column align-items-center justify-content-center">
                                    <i class="fa fa-clipboard-list fa-5x text-success "></i>
                                    <a href="/reports" class="font-weight-bold btn btn-link">
                                        Rapports
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}




    </div>

</div>

<?php
$date = date("Y/m/d");
$date1 = str_replace('-', '/', $date);
$dateFin = date('m-d-Y',strtotime($date1 . "+15 days"));

echo $dateFin;




?>



@endsection