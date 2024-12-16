@extends('frontend.layouts.master')

@section('content')
    <!-- bradcam_area -->
    <div class="bradcam_area bradcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Our Product</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area -->

    <!-- service_details_start -->

    <div class="service_details_area">
        @if (count($news) === 0)
            <div class="text-center w-100">
                <h4>{{ __('frontend.No Product Found') }} :(</h4>
            </div>
        @endif
        <div class="container">
            <div class="row">
                <!-- Category Navigation -->
                <div class="col-lg-4 col-md-4">
                    <div class="service_details_left">
                        <h3>Market Sector</h3>
                        <div class="nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            @foreach ($categories as $category)
                                <a class="nav-link {{ request('category') === $category->slug ? 'active' : '' }}"
                                    id="v-pills-{{ $category->slug }}-tab" data-toggle="pill"
                                    href="#v-pills-{{ $category->slug }}" role="tab"
                                    aria-controls="v-pills-{{ $category->slug }}"
                                    aria-selected="{{ request('category') === $category->slug ? 'true' : 'false' }}">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Tab Content -->
                <div class="col-lg-8 col-md-8">
                    <div class="tab-content" id="v-pills-tabContent">


                        {{-- @foreach ($categories as $category)
                            <div class="tab-pane fade {{ request('category') === $category->slug ? 'show active' : '' }}"
                                id="v-pills-{{ $category->slug }}" role="tabpanel"
                                aria-labelledby="v-pills-{{ $category->slug }}-tab">
                                <div class="service_details_info">
                                    <h3>{{ $category->name }}</h3>
                                    @if ($category->news->isEmpty())
                                        <div class="col-12">
                                            <p class="text-center">Product Not Found.</p>
                                        </div>
                                    @else
                                        <div class="row">

                                            <!-- Slider Section -->
                                            <div class="slider_area">
                                                <div class="swiper-container">
                                                    <div class="swiper-wrapper">
                                                        @foreach ($katalog[$category->id] as $item)
                                                            <div class="swiper-slide">
                                                                <div class="single_slider d-flex align-items-center">
                                                                    <img src="{{ $item->image ? asset($item->image) : asset('default-image.jpg') }}"
                                                                        alt="{{ $category->name }}" class="img-fluid"
                                                                        style="max-width: 100%; height: auto; object-fit: cover;" />
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <!-- Swiper Pagination -->
                                                    <div class="swiper-pagination"></div>
                                                    <!-- Swiper Navigation -->
                                                    <div class="swiper-button-next"></div>
                                                    <div class="swiper-button-prev"></div>
                                                </div>
                                            </div>
                                            <!-- End Slider Section -->
                                        </div>
                                        <div class="row">
                                            @foreach ($category->news as $news)
                                                <div class="col-md-6 col-lg-4 mb-4">
                                                    <div class="single_service">
                                                        <div class="thumb">
                                                            <img src="{{ $news->image ? asset($news->image) : asset('default-image.jpg') }}"
                                                                alt="{{ $news->title }}" class="img-fluid"
                                                                style="max-width: 100%; height: auto; object-fit: cover;" />
                                                        </div>
                                                        <div class="service_info">
                                                            <p style="font-weight: 500">
                                                                <a href="{{ route('product-details', $news->slug) }}">
                                                                    {{ $news->title }}
                                                                </a>
                                                            </p>
                                                            <p>{!! Str::limit($news->content, 200, '...') !!}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach --}}
                        @foreach ($categories as $category)
                            <div class="tab-pane fade {{ request('category') === $category->slug ? 'show active' : '' }}"
                                id="v-pills-{{ $category->slug }}" role="tabpanel"
                                aria-labelledby="v-pills-{{ $category->slug }}-tab">
                                <div class="service_details_info">
                                    <h3>{{ $category->name }}</h3>
                                    @if ($category->news->isEmpty())
                                        <div class="col-12">
                                            <p class="text-center">Product Not Found.</p>
                                        </div>
                                    @else
                                        @if (isset($katalog[$category->id]) && !$katalog[$category->id]->isEmpty())
                                            <!-- Slider Section -->
                                            <p class="text-center" style="font-size: 1.5em; font-weight:600;">Product Catalog.</p>
                                            <div class="slider_area">
                                                <div class="swiper-container">
                                                    <div class="swiper-wrapper">
                                                        @foreach ($katalog[$category->id] as $item)
                                                            <div class="swiper-slide">
                                                                <div class="single_slider d-flex align-items-center">
                                                                    <!-- Fancybox Preview -->
                                                                    <a href="{{ $item->image ? asset($item->image) : asset('default-image.jpg') }}"
                                                                        data-fancybox="gallery-{{ $category->id }}"
                                                                        data-caption="{{ $category->name }}">
                                                                        <img src="{{ $item->image ? asset($item->image) : asset('default-image.jpg') }}"
                                                                            alt="{{ $category->name }}" class="img-fluid"
                                                                            style="max-width: 100%; height: auto; object-fit: cover;" />
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <!-- Swiper Pagination -->
                                                    <div class="swiper-pagination"></div>
                                                    <!-- Swiper Navigation -->
                                                    <div class="swiper-button-next"></div>
                                                    <div class="swiper-button-prev"></div>
                                                </div>
                                            </div>

                                            <!-- End Slider Section -->
                                        @endif
                                        <div class="row mt-4">
                                            @foreach ($category->news as $news)
                                                <div class="col-md-6 col-lg-4 mb-4">
                                                    <div class="single_service">
                                                        <div class="thumb">
                                                            <img src="{{ $news->image ? asset($news->image) : asset('default-image.jpg') }}"
                                                                alt="{{ $news->title }}" class="img-fluid"
                                                                style="max-width: 100%; height: auto; object-fit: cover;" />
                                                        </div>
                                                        <div class="service_info">
                                                            <p style="font-weight: 500">
                                                                <a href="{{ route('product-details', $news->slug) }}">
                                                                    {{ $news->title }}
                                                                </a>
                                                            </p>
                                                            <p>{!! Str::limit($news->content, 200, '...') !!}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach



                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service_details_end -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Optional: Fancybox customization
            Fancybox.bind("[data-fancybox]", {
                Thumbs: {
                    autoStart: true, // Show thumbnails
                },
                Toolbar: {
                    display: ["zoom", "close"], // Show zoom and close buttons
                },
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sliders = document.querySelectorAll('.swiper-container');

            sliders.forEach(slider => {
                new Swiper(slider, {
                    loop: true,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    slidesPerView: 1,
                    spaceBetween: 30,
                });
            });
        });
    </script>
@endsection
