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
    <div class="blog_page_search">
        <form action="{{ route('product') }}" method="GET">
            <div class="row">
                <div class="col-lg-5">
                    <input type="text" placeholder="Type here" value="{{ request()->search }}" name="search">
                </div>
                <div class="col-lg-4">
                    <select name="category">
                        <option value="">{{ __('frontend.All') }}</option>
                        @foreach ($categories as $category)
                            <option {{ $category->slug === request()->category ? 'selected' : '' }}
                                value="{{ $category->slug }}">{{ $category->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="col-lg-3">
                    <button type="submit">{{ __('frontend.search') }}</button>
                </div>
            </div>
        </form>
    </div>

    <aside class="wrapper__list__article ">
        @if (request()->has('category'))
            <h4 class="border_section">{{ __('frontend.Category') }}: {{ request()->category }}</h4>
        @endif

        <div class="row">
            @foreach ($news as $post)
                <div class="col-lg-6">
                    <!-- Post Article -->
                    <div class="article__entry">
                        <div class="article__image">
                            <a href="{{ route('product-details', $post->slug) }}">
                                <img src="{{ asset($post->image) }}" alt="" class="img-fluid">
                            </a>
                        </div>
                        <div class="article__content">
                            <div class="article__category">
                                {{ $post->category->name }}
                            </div>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <span class="text-primary">
                                        {{ __('frontend.by') }} {{ $post->auther->name }}
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span class="text-dark text-capitalize">
                                        {{ date('M d, Y', strtotime($post->created_at)) }}
                                    </span>
                                </li>

                            </ul>
                            <h5>
                                <a href="{{ route('product-details', $post->slug) }}">
                                    {!! truncate($post->title) !!}
                                </a>
                            </h5>
                            <p>
                                {!! truncate($post->content, 100) !!}
                            </p>
                            <a href="{{ route('product-details', $post->slug) }}"
                                class="btn btn-outline-primary mb-4 text-capitalize"> {{ __('frontend.read more') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
            @if (count($product) === 0)
                <div class="text-center w-100">
                    <h4>{{ __('frontend.No Product Found') }} :(</h4>
                </div>
            @endif
        </div>

    </aside>
    <!-- service_details_start -->
    <div class="service_details_area">
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service_details_end -->
@endsection
