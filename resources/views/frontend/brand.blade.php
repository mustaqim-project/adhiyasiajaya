@extends('frontend.layouts.master')

@section('content')
    <!-- bradcam_area -->
    <div class="bradcam_area bradcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Brands</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area -->

    <!-- service_details_start -->

    <div class="service_details_area">
        <div class="container">
            <div class="row">
                <!-- Category Navigation -->
                <div class="col-lg-4 col-md-4">
                    <div class="service_details_left">
                        <h3>Market Sector</h3>
                        <div class="nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            @foreach ($brands as $brand)
                                <a class="nav-link {{ request('brand') === $brand->slug ? 'active' : '' }}"
                                    id="v-pills-{{ $brand->slug }}-tab" data-toggle="pill"
                                    href="#v-pills-{{ $brand->slug }}" role="tab"
                                    aria-controls="v-pills-{{ $brand->slug }}"
                                    aria-selected="{{ request('brand') === $brand->slug ? 'true' : 'false' }}">
                                    {{ $brand->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Tab Content -->
                <div class="col-lg-8 col-md-8">
                    <div class="tab-content" id="v-pills-tabContent">

                        @foreach ($brands as $brand)
                            <div class="tab-pane fade {{ request('brand') === $brand->slug ? 'show active' : '' }}"
                                id="v-pills-{{ $brand->slug }}" role="tabpanel"
                                aria-labelledby="v-pills-{{ $brand->slug }}-tab">
                                <div class="service_details_info">
                                    <h3>{{ $brand->name }}</h3>
                                    @if ($brand->news->isEmpty())
                                        <div class="col-12">
                                            <p class="text-center">Product Not Found.</p>
                                        </div>
                                    @else
                                        <div class="row">
                                            @foreach ($brand->news as $news)
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
@endsection