@extends('frontend.layouts.master')

@section('content')
<section>

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_bg_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>About Us</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

<!-- chose_area  -->
<div class="chose_area ">
    <div class="container">
        <div class="features_main_wrap">
            <div class="row  align-items-center">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div class="about_image">
                        <img src="{{ asset($settingpage->image_about) }}" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="features_info">
                        <h3>About Us?</h3>
                        {!! @$about->content !!}

                        <div class="about_btn">
                            <a class="boxed-btn3-line" href="{{ route('contact') }}">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ chose_area  -->





</section>
@endsection
