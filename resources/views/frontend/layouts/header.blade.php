<!-- Header Start -->
<header>
    <div class="header-area">
        <!-- Header Top Area -->


        {{-- <div style="background-color: #001133; padding: 10px 0; color: #fff; font-size: 14px;">
            <div class="container d-flex justify-content-between align-items-center">
                <div>
                    <i class="fa fa-phone mr-1"></i>  <a href="tel:{{ @$contact->phone }}" style="color: #fff; text-decoration: none;">{{ @$contact->phone }}</a>
                    <i class="fa fa-envelope ml-4 mr-1"></i> <a href="mailto:{{ @$contact->email }}" style="color: #fff; text-decoration: none;">{{ @$contact->email }}</a>
                    <li style="font-weight: bold;">
                        <a href="#" style="text-decoration: none; color: #ffffff;">GET A QUOTE <i class="fa fa-paper-plane"></i></a>
                    </li>
                </div>
            </div>
        </div> --}}



        <div class="header-top_area d-none d-lg-block" style="background-color: #001133; padding: 10px 0; color: #fff; font-size: 14px;">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Logo and Contact Info Section -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="logo">
                            <div class="short_contact_list">
                                <i class="fa fa-phone mr-1"></i>  <a href="tel:{{ @$contact->phone }}" style="color: #fff; text-decoration: none;">{{ @$contact->phone }}</a>
                                <i class="fa fa-envelope ml-4 mr-1"></i> <a href="mailto:{{ @$contact->email }}" style="color: #fff; text-decoration: none;">{{ @$contact->email }}</a>
                            </div>
                        </div>
                    </div>

                    <!-- Request Button Section -->
                    <div class="col-xl-8 col-lg-8">
                        <div class="header_right d-flex align-items-center">
                            <div class="book_btn d-none d-lg-block">
                                <a href="{{ route('contact') }}" style="text-decoration: none; color: #ffffff;">GET A QUOTE <i class="fa fa-paper-plane"></i></a>
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
                                <div>
                                    <a href="#">
                                        <img src="{{ asset($settings['site_logo']) }}" alt="Logo" class="img-fluid"
                                        width="200px">
                                    </a>
                                </div>
                                <nav>
                                    <ul id="navigation">
                                        <li style="margin-right: 20px;"><a href="{{ url('/') }}">{{ __('frontend.Home') }}</a></li>
                                        <li style="margin-right: 20px;"><a href="{{ route('about') }}">{{ __('frontend.About Us') }}</a></li>
                                        <li style="margin-right: 20px;"><a href="{{ route('product') }}">{{ __('frontend.Our Product') }}</a></li>
                                        <li style="margin-right: 20px;"><a href="{{ route('contact') }}">{{ __('frontend.Contact') }}</a></li>
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
<!-- Header End -->
