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


    <!-- About Us Section -->
    <section id="about" class="section-padding bg-neutral">
        <div class="container mx-auto px-4">
            <!-- Heading -->
            <div class="text-center mb-16 fade-in">
                <h2 class="text-4xl md:text-5xl font-bold text-primary mb-6">
                    About Us?
                </h2>
            </div>

            <!-- Grid Content -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                <!-- Visual Element -->
                <div class="fade-in">
                    <div class="bg-white rounded-2xl p-8 shadow-xl">
                        <div class="text-center">
                            <img src="{{ asset($settingpage->image_about) }}" alt="About Image"
                                class="mx-auto rounded-lg w-full max-w-md h-auto object-cover">
                        </div>
                    </div>
                </div>

                <!-- Dynamic Content -->
                <div class="fade-in">
                    <div class="space-y-6">
                        <div class="prose prose-lg max-w-none text-gray-600">
                            {!! @$about->content !!}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>



</section>
@endsection
