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

    <div class="service_details_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title mb-50 text-center section-title">
                        <h3>Brands</h3>
                    </div>
                </div>
            </div>

            <!-- Brand List -->
            <div class="row" id="brand-list">
                @foreach ($brands as $brand)
                    <div class="single_service brand-product">
                        <a href="javascript:void(0)" class="brand-link" data-slug="{{ $brand->slug }}">
                            <div class="thumb" style="display: inline-block; margin: 20px;">
                                <img src="{{ $brand->image ? asset($brand->image) : asset('default-image.jpg') }}"
                                    alt="{{ $brand->name }}" class="img-fluid"
                                    style="width: 100px; object-fit: contain;" />
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- News Container -->
            <div class="row mt-4" id="news-container">
                <!-- Data dari AJAX akan ditampilkan di sini -->
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.brand-link').on('click', function() {
                let brandSlug = $(this).data('slug');

                $.ajax({
                    url: '{{ route('brand') }}',
                    type: 'GET',
                    data: {
                        brand: brandSlug
                    },
                    success: function(response) {
                        console.log(response);
                        let newsContainer = $('#news-container');
                        newsContainer.empty();

                        if (response.data.length > 0) {
                            $.each(response.data, function(index, news) {
                                // Use JavaScript to build the URL dynamically
                                let productDetailsUrl = '{{ route('product-details', ':slug') }}'.replace(':slug', news.slug);

                                newsContainer.append(`
                                    <div class="col-md-6 col-lg-4 mb-4">
                                        <div class="single_service">
                                            <div class="thumb">
                                                <img src="${news.image}" alt="${news.title}" class="img-fluid" style="max-width: 100%; height: auto; object-fit: cover;" />
                                            </div>
                                            <div class="service_info">
                                                <p style="font-weight: 500">
                                                    <a href="${productDetailsUrl}">${news.title}</a>
                                                </p>
                                                <p>${news.content}</p>
                                            </div>
                                        </div>
                                    </div>
                                `);
                            });
                        } else {
                            newsContainer.html('<p class="text-center">No news found for this brand.</p>');
                        }
                    },
                    error: function() {
                        alert('Failed to fetch data. Please try again.');
                    }
                });
            });
        });
    </script>

@endsection

