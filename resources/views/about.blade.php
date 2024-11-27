@extends('layouts.master-layouts')
@section('title') @lang('translation.dashboards') @endsection
@section('css')

    {{-- <link href="{{ URL::asset('assets/libs/swiper/swiper.min.css') }}" rel="stylesheet"> --}}

@endsection
@section('content')
 <!-- About Start -->
 <div class="container-fluid about py-5">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-5">
                        <div class="h-100" style="border: 50px solid; border-color: transparent #137b18 transparent #137b18;">
                            <img src="img/about-img.jpg" class="img-fluid w-100 h-100" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7" style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url(img/about-img-1.png);">
                        <h5 class="section-about-title pe-3">About Us</h5>
                        <h1 class="mb-4">Welcome to <span class="text"  style="color: #137b18;" >WAYANAD</span></h1>
                        <p class="mb-4">Welcome to Wayanad Tourism. We bring you the beauty and charm of Wayanad, Kerala. Explore misty mountains, lush forests, and stunning waterfalls. Experience adventure with trekking, zip-lining, and wildlife tours. Discover the ancient Edakkal Caves and the region’s rich history.</p>
                        <p class="mb-4">At Wayanad Tourism, we offer authentic and memorable travel experiences. Enjoy natures beauty and the peaceful surroundings. Immerse yourself in local culture and traditions. Whether for adventure or relaxation, Wayanad has something for everyone. Come, explore, and create lasting memories with us.






                        </p>
                        <div class="row gy-2 gx-4 mb-4">
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right me-2" style="color: #137b18;"></i>First Class Flights</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right me-2" style="color: #137b18;"></i>Handpicked Hotels</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right me-2" style="color: #137b18;"></i>5 Star Accommodations</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right me-2" style="color: #137b18;"></i>Latest Model Vehicles</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right me-2" style="color: #137b18;"></i>150 Premium City Tours</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right me-2" style="color: #137b18;"></i>24/7 Service</p>
                            </div>
                        </div>
                        <a class="btn btn-primary rounded-pill py-3 px-5 mt-2" href="">Read More</a>
                    </div>
                </div>
            </div>
        </div>
<!-- About End -->
 @endsection