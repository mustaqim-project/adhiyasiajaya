@extends('frontend.layouts.master')

@section('content')
    @include('frontend.home-components.sliderarea')
    @include('frontend.home-components.ourproduct')
    @include('frontend.home-components.brand')
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
