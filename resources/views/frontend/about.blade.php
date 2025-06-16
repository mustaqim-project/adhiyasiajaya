@extends('frontend.layouts.master')

@section('content')
<section>


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
