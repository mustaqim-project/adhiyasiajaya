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

    {{-- <!-- service_area -->
    <div class="service_area">
        <div class="container">
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="single_service">
                            <div class="thumb">
                                <!-- Pastikan gambar ada, jika tidak tampilkan gambar default -->
                                <img src="{{ $category->image ? asset($category->image) : asset('default-image.jpg') }}"
                                     alt="{{ $category->name }}"
                                     class="img-fluid" />
                            </div>
                            <div class="service_info">
                                <h3>
                                    <a href="#">
                                        {{ $category->name }}
                                    </a>
                                </h3>
                                <p>{{ $category->deskripsi }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

                @if ($categories->isEmpty())
                    <div class="col-12">
                        <p class="text-center">No categories found.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!--/ service_area --> --}}


<!-- service_details_start  -->
<div class="service_details_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="service_details_left">
                    <h3>Market Sector</h3>
                    <div class="nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <!-- Menampilkan kategori -->
                        @foreach ($categories as $category)
                            <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="v-pills-{{ $category->slug }}-tab"
                               data-toggle="pill" href="#v-pills-{{ $category->slug }}" role="tab"
                               aria-controls="v-pills-{{ $category->slug }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                               {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8">
                <div class="tab-content" id="v-pills-tabContent">
                    <!-- Menampilkan berita berdasarkan kategori -->
                    @foreach ($categories as $category)
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                             id="v-pills-{{ $category->slug }}" role="tabpanel"
                             aria-labelledby="v-pills-{{ $category->slug }}-tab">
                            <div class="service_details_info">
                                <h3>{{ $category->name }}</h3>
                                {{-- Menampilkan berita dalam kategori ini --}}
                                @foreach ($category->news as $news)
                                    <div class="col-md-6 col-lg-4 mb-4">
                                        <div class="single_service">
                                            <div class="thumb">
                                                <img src="{{ $news->image ? asset($news->image) : asset('default-image.jpg') }}"
                                                     alt="{{ $news->title }}" class="img-fluid" />
                                            </div>
                                            <div class="service_info">
                                                <h3><a href="{{ route('news-details', $news->slug) }}">{{ $news->title }}</a></h3>
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
        </div>
    </div>
</div>
<!-- service_details_end  -->

@endsection
