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
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="section_title mb-50 text-center section-title">
                            <a href="{{ route('brand') }}">
                                <h3>Brands</h3>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($brands as $brand)
                        {{-- <div class="col-md-6 col-lg-4 mb-4 brand-item"> --}}
                            <div class="single_service brand-item">
                                <a href="{{ route('brand', ['brand' => $brand->slug]) }}"
                                    class="{{ request('brand') === $brand->slug ? 'active' : '' }}">
                                     <div class="thumb" style="display: inline-block; margin: 20px;">
                                         <img src="{{ $brand->image ? asset($brand->image) : asset('default-image.jpg') }}"
                                              alt="{{ $brand->name }}"
                                              class="img-fluid"
                                              style="width: 100px; object-fit: contain;" />
                                     </div>
                                 </a>

                            </div>
                        {{-- </div> --}}
                    @endforeach
                    @if ($categories->isEmpty())
                        <div class="col-12">
                            <p class="text-center">No Brands found.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- service_details_end -->
@endsection
