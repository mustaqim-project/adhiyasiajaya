{{-- @extends('frontend.layouts.master')

<!-- Setting metas -->
@section('title', $news->title)
@section('meta_description', $news->meta_description)
@section('meta_og_title', $news->meta_title)
@section('meta_og_description', $news->meta_description)
@section('meta_og_image', asset($news->image))
@section('meta_tw_title', $news->meta_title)
@section('meta_tw_description', $news->meta_description)
@section('meta_tw_image', asset($news->image))
<!-- End Setting metas -->

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
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="service_details_left">
                        <h3>Market Sector</h3>
                        <div class="nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            @foreach ($categories as $category)
                                <a class="nav-link {{ $loop->first ? 'active' : '' }}"
                                    id="v-pills-{{ $category->slug }}-tab" data-toggle="pill"
                                    href="#v-pills-{{ $category->slug }}" role="tab"
                                    aria-controls="v-pills-{{ $category->slug }}"
                                    aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="tab-content" id="v-pills-tabContent">
                        @foreach ($categories as $category)
                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                id="v-pills-{{ $category->slug }}" role="tabpanel"
                                aria-labelledby="v-pills-{{ $category->slug }}-tab">
                                <div class="service_details_info">
                                    <h3>{{ $category->name }}</h3>
                                    @foreach ($category->news as $news)
                                        <div class="col-md-6 col-lg-4 mb-4">
                                            <div class="single_service">
                                                <div class="thumb">
                                                    <img src="{{ $news->image ? asset($news->image) : asset('default-image.jpg') }}"
                                                        alt="{{ $news->title }}" class="img-fluid" />
                                                </div>
                                                <div class="service_info">
                                                    <p style="font-weight: 500"><a
                                                            href="{{ route('product-details', $news->slug) }}">{{ $news->title }}</a>
                                                    </p>
                                                    <p>{!! Str::limit($news->content, 200, '...') !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    @if ($category->news->isEmpty())
                                        <div class="col-12">
                                            <p class="text-center">Product Not Found.</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="wrap__article-detail">
                        <div class="wrap__article-detail-title">
                            <h1>{!! $news->title !!}</h1>
                        </div>
                        <hr>
                        <div class="wrap__article-detail-info">
                            <ul class="list-inline d-flex flex-wrap justify-content-start">
                                <li class="list-inline-item">
                                    {{ __('frontend.By') }}
                                    <a href="#">{{ $news->auther->name }}</a>
                                </li>
                                <li class="list-inline-item">
                                    <span class="text-dark text-capitalize ml-1">
                                        {{ date('M D, Y', strtotime($news->created_at)) }}
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span class="text-dark text-capitalize">
                                        {{ __('frontend.in') }}
                                    </span>
                                    <a href="#">{{ $news->category->name }}</a>
                                </li>
                            </ul>
                        </div>

                        <div class="wrap__article-detail-image mt-4">
                            <div class="feature-img">
                                <img src="{{ asset($news->image) }}" alt="" class="img-fluid">
                             </div>

                        </div>
                        <div class="wrap__article-detail-content">
                            <div class="total-views">
                                <div class="total-views-read">
                                    {{ convertToKFormat($news->views) }}
                                    <span>{{ __('frontend.views') }}</span>
                                </div>

                                <ul class="list-inline">
                                    <span class="share">{{ __('frontend.share on:') }}</span>
                                    <li class="list-inline-item">
                                        <a class="btn btn-social-o facebook"
                                            href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                                            target="_blank">
                                            <i class="fab fa-facebook-f"></i>
                                            <span>{{ __('frontend.facebook') }}</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-social-o twitter"
                                            href="https://twitter.com/intent/tweet?text={{ $news->title }}&url={{ url()->current() }}"
                                            target="_blank">
                                            <i class="fab fa-twitter"></i>
                                            <span>{{ __('frontend.twitter') }}</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-social-o whatsapp"
                                            href="https://wa.me/?text={{ $news->title }}%20{{ url()->current() }}"
                                            target="_blank">
                                            <i class="fab fa-whatsapp"></i>
                                            <span>{{ __('frontend.whatsapp') }}</span>
                                        </a>
                                    </li>

                                    <li class="list-inline-item">
                                        <a class="btn btn-social-o telegram"
                                            href="https://t.me/share/url?url={{ url()->current() }}&text={{ $news->title }}"
                                            target="_blank">
                                            <i class="fab fa-telegram"></i>
                                            <span>{{ __('frontend.telegram') }}</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-linkedin-o linkedin"
                                            href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}&title={{ $news->title }}"
                                            target="_blank">
                                            <i class="fab fa-linkedin"></i>
                                            <span>{{ __('frontend.linkedin') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <p class="has-drop-cap-fluid">{!! $news->content !!}</p>
                        </div>
                    </div>
                    <!-- end content article detail -->
                </div>
            </div>
        </div>
    </div>
    <!-- service_details_end -->

@endsection --}}


@extends('frontend.layouts.master')

<!-- Setting metas -->
@section('title', $news->title)
@section('meta_description', $news->meta_description)
@section('meta_og_title', $news->meta_title)
@section('meta_og_description', $news->meta_description)
@section('meta_og_image', asset($news->image))
@section('meta_tw_title', $news->meta_title)
@section('meta_tw_description', $news->meta_description)
@section('meta_tw_image', asset($news->image))
<!-- End Setting metas -->

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

    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        {{-- <div class="feature-img">
                            <img class="img-fluid" src="{{ asset($news->image) }}" alt="">
                        </div> --}}

                            <img src="{{ asset($news->image) }}" alt="" class="img-fluid" style="width:100%;">

                        <div class="blog_details">
                            <h2>{!! $news->title !!}
                            </h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li class="list-inline-item">
                                    {{ __('frontend.View :') }}
                                    {{ convertToKFormat($news->views) }}
                                </li>
                                <li class="list-inline-item">
                                    <span class="text-dark text-capitalize ml-1">
                                        {{ date('M D, Y', strtotime($news->created_at)) }}
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span class="text-dark text-capitalize">
                                        {{ __('frontend.in') }}
                                    </span>
                                    <a href="#">{{ $news->category->name }}</a>
                                </li>
                            </ul>
                            <div class="wrap__article-detail-content">
                                <div class="total-views">
                                    <ul class="list-inline">
                                        <span class="share">{{ __('frontend.share on:') }}</span>
                                        <li class="list-inline-item">
                                            <a class="btn btn-social-o facebook"
                                                href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                                                target="_blank">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="btn btn-social-o twitter"
                                                href="https://twitter.com/intent/tweet?text={{ $news->title }}&url={{ url()->current() }}"
                                                target="_blank">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="btn btn-social-o whatsapp"
                                                href="https://wa.me/?text={{ $news->title }}%20{{ url()->current() }}"
                                                target="_blank">
                                                <i class="fab fa-whatsapp"></i>
                                            </a>
                                        </li>

                                        <li class="list-inline-item">
                                            <a class="btn btn-social-o telegram"
                                                href="https://t.me/share/url?url={{ url()->current() }}&text={{ $news->title }}"
                                                target="_blank">
                                                <i class="fab fa-telegram"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a class="btn btn-linkedin-o linkedin"
                                                href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}&title={{ $news->title }}"
                                                target="_blank">
                                                <i class="fab fa-linkedin"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <p class="excert">
                                {!! $news->content !!}
                            </p>
                        </div>
                    </div>
                    <div class="navigation-top">
                        <div class="navigation-area">
                            <div class="row">
                                <div
                                    class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                    @if ($previousPost)
                                        <a href="{{ route('product-details', $previousPost->slug) }}">
                                            <span>{{ __('frontend.previous post') }}</span>
                                            {!! truncate($previousPost->title) !!}
                                        </a>
                                    @endif


                                </div>
                                <div
                                    class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                    @if ($nextPost)
                                        <a href="{{ route('product-details', $nextPost->slug) }}">
                                            <span>{{ __('frontend.next post') }}</span>
                                            {!! truncate($nextPost->title) !!}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">


                            <a data-toggle="modal" data-target="#searchModal" href="#">
                                <i class="ti-search"></i>
                            </a>


                        </aside>
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Market Sectors</h4>
                            <ul class="list cat-list">
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ route('product', ['category' => $category->slug]) }}"
                                            class="nav-link {{ request('category') === $category->slug ? 'active' : '' }}">{{ $category->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </aside>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ Blog Area end =================-->
@endsection
