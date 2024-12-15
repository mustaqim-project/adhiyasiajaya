@extends('frontend.layouts.master')

@section('content')
    <!-- slider_area_start -->
    <div class="slider_area">
        <!-- Swiper Container -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide single_slider d-flex align-items-center slider_bg_1">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-xl-8">
                                <div class="slider_text text-center animate__animated animate__fadeInLeft">
                                    <p>Indonesian Excellence</p>
                                    <h3>Your Reliable Partner in Pulp & Paper Industry</h3>
                                    <a class="boxed-btn3" href="products.html">Our Products</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 2 -->
                <div class="swiper-slide single_slider d-flex align-items-center slider_bg_2">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-xl-8">
                                <div class="slider_text text-center">
                                    <p>Global Partnerships</p>
                                    <h3>Connecting Indonesia to World-Class Solutions</h3>
                                    <a class="boxed-btn3" href="contact.html">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Swiper Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!-- slider_area_end -->



    @include('frontend.home-components.ourproduct')
    @include('frontend.home-components.aboutarea')
    @include('frontend.home-components.customerarea')
    @include('frontend.home-components.contactarea')




    <script>
        const swiper = new Swiper('.swiper-container', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script>
@endsection
