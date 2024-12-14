{{-- <!-- Header Start -->
<header>
    <div class="header-area">
        <!-- Header Top Area -->
        <div class="header-top_area d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Logo and Contact Info Section -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="logo">
                            <div class="short_contact_list">
                                <ul class="d-flex">
                                    <!-- Email Link -->
                                    <li class="mr-4">
                                        <i class="fa fa-envelope"></i>
                                        <a href="mailto:{{ @$contact->email }}">
                                           {{ @$contact->email }}
                                        </a>
                                    </li>
                                    <!-- Phone Link -->
                                    <li>
                                        <i class="fa fa-phone"></i>
                                        <a href="tel:{{ @$contact->phone }}">
                                          {{ @$contact->phone }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Request Button Section -->
                    <div class="col-xl-8 col-lg-8">
                        <div class="header_right d-flex align-items-center">
                            <div class="book_btn d-none d-lg-block">
                                <a class="boxed-btn3-line" href="{{ route('contact') }}">Request Now</a>
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
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset($settings['site_logo']) }}" alt="Logo" class="img-fluid"
                                        width="180px">
                                </a>
                            </div>
                        </div>

                        <!-- Main Navigation -->
                        <div class="col-xl-9 col-lg-9">
                            <div class="main-menu d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">

                                        <li>
                                            <figure class="image-logo">
                                                <img src="{{ asset(@$footerInfo->logo) }}" alt="Logo"
                                                    class="logo-footer" width="180px">
                                            </figure>
                                        </li>
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
<!-- Header End --> --}}
<!-- Header Start -->
<header>
    <!-- Top Contact Info -->
    <div style="background-color: #001133; padding: 10px 0; color: #fff; font-size: 14px;">
        <div class="container d-flex justify-content-between align-items-center">
            <div>
                <i class="fa fa-phone mr-1"></i>  <a href="tel:{{ @$contact->phone }}">{{ @$contact->phone }}</a>
                <i class="fa fa-envelope ml-4 mr-1"></i> <a href="mailto:{{ @$contact->email }}" style="color: #fff; text-decoration: none;">{{ @$contact->email }}</a>
                <li style="font-weight: bold;">
                    <a href="#" style="text-decoration: none; color: #000;">GET A QUOTE <i class="fa fa-paper-plane"></i></a>
                </li>
            </div>
        </div>
    </div>

    <!-- Navigation Area -->
    <div class="container">
        <div class="d-flex justify-content-between align-items-center py-3">
            <!-- Logo -->
            <div>
                <a href="#">
                    <img src="{{ asset($settings['site_logo']) }}" alt="Logo" class="img-fluid"
                    width="200px">
                </a>
            </div>

            <!-- Navigation Menu -->
            <nav>
                <ul style="list-style: none; margin: 0; padding: 0; display: flex;">
                    {{-- <li style="margin-right: 20px;"><a href="#" style="text-decoration: none; color: #000;">HOME</a></li>
                    <li style="margin-right: 20px;"><a href="#" style="text-decoration: none; color: #000;">ABOUT US</a></li>
                    <li style="margin-right: 20px;"><a href="#" style="text-decoration: none; color: #000;">PRODUCTS</a></li>
                    <li style="margin-right: 20px;"><a href="#" style="text-decoration: none; color: #000;">CATALOG</a></li>
                    <li style="margin-right: 20px;"><a href="#" style="text-decoration: none; color: #000;">CONTACT</a></li>
 --}}

                    <li style="margin-right: 20px;"><a href="{{ url('/') }}">{{ __('frontend.Home') }}</a></li>
                    <li style="margin-right: 20px;"><a href="{{ route('about') }}">{{ __('frontend.About Us') }}</a></li>
                    <li style="margin-right: 20px;"><a href="{{ route('product') }}">{{ __('frontend.Our Product') }}</a></li>
                    <li style="margin-right: 20px;"><a href="{{ route('contact') }}">{{ __('frontend.Contact') }}</a></li>
                </ul>
            </nav>

            <!-- Social Media Links -->
            <div>
                <a href="#" style="color: #000; margin-right: 10px;"><i class="fa fa-facebook"></i></a>
                <a href="#" style="color: #000; margin-right: 10px;"><i class="fa fa-instagram"></i></a>
                <a href="#" style="color: #000;"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->
