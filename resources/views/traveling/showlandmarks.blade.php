@extends('layouts.app')

@section('content')

<div class="about-main-content" style="margin-top: -25px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="content">
                    <div class="blur-bg"></div>
                    <h4>EXPLORE OUR LANDMARK</h4>
                    <div class="line-dec"></div>
                    <h2>Welcome To {{ $landmarks->name }}</h2>
                    <p>{{ $landmarks->description }}</p>
                    <div class="main-button">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->

<div class="cities-town">
    <div class="container">
        <div class="row">
            <div class="slider-content">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>{{ $city->name }}’s <em>Landmarks &amp; Milestones</em></h2>
                    </div>
                    <div class="col-lg-12">
                        <div class="owl-cites-town owl-carousel">
                            @foreach ($landmarks as $landmark)
                                <div class="item">
                                    <div class="thumb">
                                        <a href="{{ route('traveling.show.landmarks', $landmarks->id) }}">
                                            <img src="{{ asset('assets/images/'.$landmarks->image.'') }}" alt="">
                                            <h4>{{ $landmarks->name }}</h4>
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="weekly-offers">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading text-center">
                    <h2>Best Weekly Offers In Each City</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
        <div class="col-lg-12">
            <div class="owl-weekly-offers owl-carousel">
            {{-- @foreach ($cities as $city) --}}

                <div class="item">
                    <div class="thumb">
                    <img src="{{ asset('assets/images/'.$city->image.'') }}" alt="">
                    <div class="text">
                        <h4>{{ $city->name }}<br><span></span></h4>
                        <h6>{{ $city->price }}<br><span>/person</span></h6>
                        <div class="line-dec"></div>
                        <ul>
                        <li>Deal Includes:</li>
                        <li><i class="fa fa-taxi"></i> {{ $city->num_days }} Days Trip > Hotel Included</li>
                        <li><i class="fa fa-plane"></i> Airplane Bill Included</li>
                        <li><i class="fa fa-building"></i> Daily Places Visit</li>
                        </ul>
                        <div class="main-button">
                        <a href="{{ route('traveling.reservation', $city->id) }}">Make a Reservation</a>
                        </div>
                    </div>
                    </div>
                </div>

            {{-- @endforeach --}}

            </div>
        </div>
        </div>
    </div>
</div>

<div class="more-about">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 align-self-center">
                <div class="left-image">
                    <img src="{{ asset('assets/images/about-left-image.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="section-heading">
                    <h2>Discover More About Our Country</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                </div>
                <div class="row">

                    <div class="col-lg-12">
                        <div class="info-item">
                            <div class="row">
                                <div class="col-lg-6">
                                    {{-- <h4>{{ $landmarksCount }}+</h4> --}}
                                    <span>Amazing Places</span>
                                </div>
                                {{-- <div class="col-lg-6">
                                    <h4>240.580+</h4>
                                    <span>Different Check-ins Yearly</span>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>

            </div>
        </div>
    </div>
</div>

@endsection
