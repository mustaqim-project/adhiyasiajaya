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

    <!-- service_area -->
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
                                    <a href="{{ route('products.byCategory', $category->slug) }}">
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
    <!--/ service_area -->
@endsection
