<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
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

    <meta name="twitter:title" content="@yield('meta_tw_title')" />
    <meta name="twitter:description" content="@yield('meta_tw_description')" />
    <meta name="twitter:image" content="@yield('meta_tw_image')" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset($settings['site_favicon']) }}" type="image/png">
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-iconpicker.min.css') }}"> --}}
    <style>
        :root {
            --colorPrimary: {{ $settings['site_color'] }};
        }
    </style>

    <!-- CSS here -->
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

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


    <style>
        /* Styling untuk area Get in Touch */
        .contact_action_area {
            background-color: #f9f9f9;
            padding: 60px 0;
        }

        .contact-title {
            font-size: 32px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .contact_form {
            background-color: #fff;
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .contact_form .form-group {
            margin-bottom: 20px;
        }

        .contact_form input,
        .contact_form textarea {
            width: 100%;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            color: #333;
            transition: all 0.3s ease;
        }

        .contact_form input:focus,
        .contact_form textarea:focus {
            border-color: #007bff;
            outline: none;
        }

        .contact_form textarea {
            resize: vertical;
        }

        .button-contactForm {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 15px 30px;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button-contactForm:hover {
            background-color: #0056b3;
        }

        @media (max-width: 767px) {
            .contact_form {
                padding: 20px;
            }

            .contact-title {
                font-size: 28px;
            }
        }


        .service_grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
        }

        .single_category {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .single_category:hover {
            transform: translateY(-10px);
        }

        .thumb img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .service_info h3 a {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            text-decoration: none;
            display: block;
            margin: 10px 0;
        }

        .service_info p {
            color: #777;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .btn_learn_more {
            background-color: #007bff;
            color: #fff;
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
        }

        .btn_learn_more:hover {
            background-color: #0056b3;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .service_grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 768px) {
            .service_grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .service_grid {
                grid-template-columns: 1fr;
            }
        }

        /* Styling untuk ikon WhatsApp yang mengambang */
        .whatsapp-float {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            border-radius: 50%;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease;
        }

        .whatsapp-float:hover {
            transform: scale(1.1);
        }

        .whatsapp-float img {
            width: 60px;
            /* Ukuran ikon */
            height: 60px;
            object-fit: cover;
            border-radius: 50%;
        }

        /* Responsif untuk perangkat mobile */
        @media (max-width: 767px) {
            .whatsapp-float img {
                width: 50px;
                /* Ukuran ikon lebih kecil di perangkat mobile */
                height: 50px;
            }
        }


        /* Animasi dengan keyframes */
        @keyframes slideIn {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        /* Styling untuk slider animasi */
        .slider_area .swiper-slide .slider_text {
            animation: slideIn 1.5s ease-in-out;
        }

        .single_category {
            animation: fadeIn 1.5s ease-in-out;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .single_category:hover {
            transform: translateY(-10px);
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.15);
        }

        /* Tombol animasi hover */
        .boxed-btn3,
        .btn_learn_more {
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .boxed-btn3:hover,
        .btn_learn_more:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        /* Animasi fade-in untuk About Us */
        .chose_area .features_info,
        .chose_area .about_image img {
            animation: fadeIn 2s ease-in-out;
        }

        /* Animasi pada carousel customer */
        .service_active .single_category {
            animation: fadeIn 1.2s ease-in-out;
        }

        /* Animasi Get a Quote form */
        .contact_action_area form {
            animation: fadeIn 1.5s ease;
        }

        .product_area {
            padding: 50px 20px;
            background-color: #f9f9f9;
        }

        .product_area .section_title {
            margin-bottom: 50px;
        }

        .section_title h3 {
            font-size: 2rem;
            text-transform: uppercase;
            color: #333;
        }

        .product_grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .single_category {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .single_category:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .thumb {
            height: 180px;
            overflow: hidden;
        }

        .thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .product_info {
            padding: 20px;
            text-align: center;
        }

        .product_info h3 {
            font-size: 1.2rem;
            color: #333;
            margin-bottom: 10px;
        }

        .product_info p {
            font-size: 0.9rem;
            color: #555;
            margin-bottom: 15px;
        }

        .btn_learn_more {
            display: inline-block;
            padding: 10px 20px;
            font-size: 0.9rem;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .btn_learn_more:hover {
            background-color: #0056b3;
        }
    </style>
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
    @endphp

    <!-- Header -->
    @include('frontend.layouts.header')

    <!-- Content -->
    @yield('content')

    <!-- Footer -->
    @include('frontend.layouts.footer')

    <!-- Modal -->
    <!-- Search Modal -->
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
    {{-- <div class="modal fade custom_search_pop" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="serch_form">
                    <input type="text" placeholder="search">
                    <button type="submit">search</button>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- WhatsApp Floating Icon -->
    @if (!empty($contact->phone))
        <a href="https://wa.me/{{ $contact->phone }}" target="_blank" class="whatsapp-float" aria-label="WhatsApp">
            <img src="https://www.dayaesa.com/whatsapp.svg" alt="WhatsApp Icon">
        </a>
    @endif



    <!-- JS here -->
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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


        // Add csrf token in ajax request
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            /** change language **/
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

            /** Subscribe Newsletter**/
            $('.newsletter_form').on('submit', function(e) {
                e.preventDefault();

                let $form = $(this);
                let $button = $form.find('.newsletter-button');

                $.ajax({
                    method: 'POST',
                    url: "{{ route('subscribe-newsletter') }}",
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
