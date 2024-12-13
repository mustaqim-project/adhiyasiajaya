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

    <meta name="description" content="
        @hasSection('meta_description')
            @yield('meta_description')
        @else
            {{ $settings['site_seo_description'] }}
        @endif" />
    <meta name="keywords" content="{{ $settings['site_seo_keywords'] }}" />

    <meta name="og:title" content="@yield('meta_og_title')" />
    <meta name="og:description" content="@yield('meta_og_description')" />
    <meta name="og:image" content="
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

    <style>
        :root {
            --colorPrimary: {{ $settings['site_color'] }};
        }
    </style>

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('depan/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('depan/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('depan/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('depan/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('depan/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('depan/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('depan/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('depan/css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('depan/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('depan/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('depan/css/slicknav.css') }}">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="{{ asset('depan/css/style.css') }}">
</head>

<body>
    @php
        $socialLinks = \App\Models\SocialLink::where('status', 1)->get();
        $footerInfo = \App\Models\FooterInfo::where('language', getLangauge())->first();
        $footerGridOne = \App\Models\FooterGridOne::where(['status' => 1, 'language' => getLangauge()])->get();
        $footerGridTwo = \App\Models\FooterGridTwo::where(['status' => 1, 'language' => getLangauge()])->get();
        $footerGridThree = \App\Models\FooterGridThree::where(['status' => 1, 'language' => getLangauge()])->get();
        $footerGridOneTitle = \App\Models\FooterTitle::where(['key' => 'grid_one_title', 'language' => getLangauge()])->first();
        $footerGridTwoTitle = \App\Models\FooterTitle::where(['key' => 'grid_two_title', 'language' => getLangauge()])->first();
        $footerGridThreeTitle = \App\Models\FooterTitle::where(['key' => 'grid_three_title', 'language' => getLangauge()])->first();
        $contact = \App\Models\Contact::where('language', getLangauge())->first();
    @endphp

    <!-- Header -->
    {{-- @include('frontend.layouts.header') --}}
<!-- Header Start -->
<header>
    <div class="header-area">
        <!-- Header Top Area -->
        <div class="header-top_area d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-4 col-lg-4">
                        <div class="logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset($settings['site_logo']) }}" alt="Logo" class="img-fluid">
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-8">
                        <div class="header_right d-flex align-items-center">
                            <div class="short_contact_list">
                                <ul>
                                    <li>
                                        <a href="mailto:{{ @$contact->email }}">
                                            <i class="fa fa-envelope"></i> {{ @$contact->email }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="tel:{{ @$contact->phone }}">
                                            <i class="fa fa-phone"></i> {{ @$contact->phone }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="book_btn d-none d-lg-block">
                                <a class="boxed-btn3-line" href="{{ route('contact') }}">Claim Your Quote!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sticky Header -->
        <div id="sticky-header" class="main-header-area">
            <div class="container">
                <div class="header_bottom_border">
                    <div class="row align-items-center">

                        <!-- Mobile Logo -->
                        <div class="col-12 d-block d-lg-none">
                            <div class="logo">
                                <a href="index.html">
                                    <img src="{{ asset($settings['site_logo']) }}" alt="Logo" class="img-fluid">
                                </a>
                            </div>
                        </div>

                        <!-- Main Navigation -->
                        <div class="col-xl-9 col-lg-9">
                            <div class="main-menu d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{ url('/') }}">{{ __('frontend.Home') }}</a></li>
                                        <li><a href="{{ route('about') }}">{{ __('frontend.About Us') }}</a></li>
                                        <li><a href="{{ route('product') }}">{{ __('frontend.Our Product') }}</a></li>
                                        <li><a href="{{ route('contact') }}">{{ __('frontend.Contact') }}</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <!-- Search Button -->
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                            <div class="Appointment justify-content-end">
                                <div class="search_btn">
                                    <a data-toggle="modal" data-target="#searchModal" href="#">
                                        <i class="ti-search"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Search Modal -->
                        <div class="modal fade" id="searchModal" tabindex="-1" role="dialog"
                            aria-labelledby="searchModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form action="{{ route('product') }}" method="GET">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="searchModalLabel">Search Product</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" name="search" class="form-control"
                                                placeholder="Search for products">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->
    <!-- Content -->
    @yield('content')

    <!-- Footer -->
    @include('frontend.layouts.footer')

    <!-- Modal -->
    <div class="modal fade custom_search_pop" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="serch_form">
                    <input type="text" placeholder="search">
                    <button type="submit">search</button>
                </div>
            </div>
        </div>
    </div>

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
    <script src="{{ asset('frontend/assets/js/index.bundle.js') }}"></script>
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
