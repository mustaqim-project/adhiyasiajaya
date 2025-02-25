<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>
        @hasSection('title')
            @yield('title')
        @else
            {{ $settings['site_seo_title'] }}
        @endif
    </title>
    <meta name="description"
                content="
                @hasSection('meta_description')
        @yield('meta_description')
        @else
        {{ $settings['site_seo_description'] }}
        @endif" />
            <meta name="keywords" content="{{ $settings['site_seo_keywords'] }}" />

            <meta name="og:title" content="@yield('meta_og_title')" />
            <meta name="og:description" content="@yield('meta_og_description')" />
            <meta name="og:image"
                content="
                @hasSection('meta_og_image')
        @yield('meta_og_image')
        @else
        {{ asset($settings['site_logo']) }}
        @endif" />
    @php
        $settingpage = \App\Models\SettingLandingPage::first();
    @endphp
    <meta name="twitter:title" content="@yield('meta_tw_title')" />
    <meta name="twitter:description" content="@yield('meta_tw_description')" />
    <meta name="twitter:image" content="@yield('meta_tw_image')" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset($settings['site_favicon']) }}" type="image/png">
    <style>
        :root {
            --colorPrimary: {{ $settings['site_color'] }};
        }

        .slider_bg_1 {
            background-image: url('{{ asset(optional($settingpage)->image_slide1) }}');
        }

        .slider_bg_2 {
            background-image: url('{{ asset(optional($settingpage)->image_slide2) }}');
        }

        .cta-bg-1 {
            background-image: url('{{ asset(optional($settingpage)->image_slide2) }}');
        }

        .Estimate_area {
            background-image: url('{{ asset(optional($settingpage)->bg_contact) }}');
        }

        .bradcam_bg_1 {
            background-image: url('{{ asset(optional($settingpage)->image_header_about) }}');
        }

        .bradcam_bg_2 {
            background-image: url('{{ asset(optional($settingpage)->image_header_product) }}');
        }

        .bradcam_bg_3 {
            background-image: url('{{ asset(optional($settingpage)->image_header_contact) }}');
        }

        .btn-our-product {
            display: inline-block;
            background-color: var(--color-primary);
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            text-transform: uppercase;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-our-product:hover {
            background-color: var(--color-primary-hover);
            transform: translateY(-5px);
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-our-product:active {
            transform: translateY(0);
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .section-title {
            position: relative;
            display: inline-block;
        }

        .section-title h3 {
            font-size: 2rem;
            font-weight: 600;
            color: #333;
            margin: 0;
            padding: 0;
            transition: color 0.3s ease;
        }

        .section-title h3:hover {
            color: #007bff;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 50%;
            height: 4px;
            background: linear-gradient(90deg, #007bff, #00c6ff);
            border-radius: 2px;
            transition: width 0.4s ease, opacity 0.4s ease;
            opacity: 0.8;
        }

        .section-title:hover::after {
            width: 100%;
            opacity: 1;
        }

        @media (max-width: 768px) {
            .section-title h3 {
                font-size: 1.5rem;
            }

            .section-title::after {
                bottom: -8px;
                height: 3px;
            }
        }

        .slider_area {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }

        .swiper-container {
            width: 100%;
            height: 100%;
        }

        .swiper-wrapper {
            display: flex;
            align-items: center;
        }

        .single_slider {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .single_slider img {
            max-width: 100%;
            height: auto;
            object-fit: cover;
        }


        .swiper-button-next,
        .swiper-button-prev {
            color: #333;
            font-size: 20px;
        }

        .swiper-pagination {
            bottom: 10px !important;
        }

        @media (max-width: 768px) {
            .swiper-slide img {
                max-width: 100%;
                height: auto;
            }

            .swiper-button-next,
            .swiper-button-prev {
                display: none;
            }
        }

        .brand-item {
            display: none;
        }


        .brand-item:nth-child(-n+6) {
            display: block;
        }

        @media (min-width: 768px) {
            .brand-item {
                display: block;
            }

        }
    </style>
    <link rel="stylesheet" href="{{ asset('depan/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('depan/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('depan/css/magnific-popup.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('depan/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('depan/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('depan/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('depan/css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('depan/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('depan/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('depan/css/slicknav.css') }}">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('depan/css/style.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
</head>

<body>
    @php
        $socialLinks = \App\Models\SocialLink::where('status', 1)->get();
        $footerInfo = \App\Models\FooterInfo::where('language', getLangauge())->first();
        $footerGridOne = \App\Models\FooterGridOne::where(['status' => 1, 'language' => getLangauge()])->get();
        $footerGridTwo = \App\Models\FooterGridTwo::where(['status' => 1, 'language' => getLangauge()])->get();
        $footerGridThree = \App\Models\FooterGridThree::where(['status' => 1, 'language' => getLangauge()])->get();
        $footerGridOneTitle = \App\Models\FooterTitle::where([
            'key' => 'grid_one_title',
            'language' => getLangauge(),
        ])->first();
        $footerGridTwoTitle = \App\Models\FooterTitle::where([
            'key' => 'grid_two_title',
            'language' => getLangauge(),
        ])->first();
        $footerGridThreeTitle = \App\Models\FooterTitle::where([
            'key' => 'grid_three_title',
            'language' => getLangauge(),
        ])->first();
        $contact = \App\Models\Contact::where('language', getLangauge())->first();
        $about = \App\Models\About::where('language', getLangauge())->first();
    @endphp

    @include('frontend.layouts.header')

    @yield('content')

    @include('frontend.layouts.footer')

    <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('product') }}" method="GET">
                    <div class="modal-header">
                        <h5 class="modal-title" id="searchModalLabel">Search Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="search" class="form-control" placeholder="Search for products">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if (!empty($contact->phone))
        <a href="https://wa.me/{{ $contact->phone }}?text=Halo%20Admin,%20nama%20saya%20[Nama%20Anda],%20dari%20perusahaan%20[Nama%20Perusahaan].%20Saya%20ingin%20membahas%20tentang%20[Kebutuhan%20Anda]."
            target="_blank" class="whatsapp-float" aria-label="WhatsApp">
            <img src="https://www.dayaesa.com/whatsapp.svg" alt="WhatsApp Icon">
        </a>
    @endif
    <script src="{{ asset('depan/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('depan/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('depan/js/popper.min.js') }}"></script>
    <script src="{{ asset('depan/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('depan/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('depan/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('depan/js/ajax-form.js') }}"></script>
    <script src="{{ asset('depan/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('depan/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('depan/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('depan/js/scrollIt.js') }}"></script>
    <script src="{{ asset('depan/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('depan/js/wow.min.js') }}"></script>
    <script src="{{ asset('depan/js/nice-select.min.js') }}"></script>
    <script src="{{ asset('depan/js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('depan/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('depan/js/plugins.js') }}"></script>
    <script src="{{ asset('depan/js/slick.min.js') }}"></script>
    <script src="{{ asset('depan/js/contact.js') }}"></script>
    <script src="{{ asset('depan/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('depan/js/jquery.form.js') }}"></script>
    <script src="{{ asset('depan/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('depan/js/mail-script.js') }}"></script>
    <script src="{{ asset('depan/js/main.js') }}"></script>
    {{-- <script src="{{ asset('frontend/assets/js/index.bundle.js') }}"></script> --}}
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $('#site-language').on('change', function() {
                let languageCode = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{ route('language') }}",
                    data: {
                        language_code: languageCode
                    },
                    success: function(data) {
                        if (data.status === 'success') {
                            window.location.href = "{{ url('/') }}";
                        }
                    },
                    error: function(data) {
                        console.error(data);
                    }
                })
            })

            $('.newsletter_form').on('submit', function(e) {
                e.preventDefault();

                let $form = $(this);
                let $button = $form.find('.newsletter-button');

                $.ajax({
                    method: 'POST',
                    url: "{{ route('subscribe-productletter') }}",
                    data: $form.serialize(),
                    beforeSend: function() {
                        $button.text('Loading...');
                        $button.attr('disabled', true);
                    },
                    success: function(data) {
                        if (data.status === 'success') {
                            Toast.fire({
                                icon: 'success',
                                title: data.message
                            });
                            $form[0].reset();
                        }
                        $button.text('Subscribe');
                        $button.attr('disabled', false);
                    },
                    error: function(xhr) {
                        $button.text('Subscribe');
                        $button.attr('disabled', false);

                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            $.each(errors, function(index, value) {
                                Toast.fire({
                                    icon: 'error',
                                    title: value[0]
                                });
                            });
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'An unexpected error occurred. Please try again later.'
                            });
                        }
                    }
                });
            })
        })
    </script>

    @stack('content')

</body>

</html>
