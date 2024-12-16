<!-- Header Start -->
<header>
    <div class="header-area">
        <!-- Header Top Area -->
        <div class="header-top_area d-none d-lg-block"
            style="background-color: #001133; padding: 10px 0; color: #fff; font-size: 14px;">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Section Rata Kiri -->
                    <div class="col-xl-6 col-lg-6">
                        <div class="short_contact_list d-flex align-items-center justify-content-start">
                            @foreach ($socialLinks as $link)
                                <a href="{{ $link->url }}" style="margin-right: 10px;">
                                    <i class="{{ $link->icon }}" style="font-size: 18px; color: #fff;"></i>
                                </a>
                            @endforeach

                            <span style="color: #fff; margin: 0 10px;">|</span>

                            <i class="fa fa-phone mr-1"></i>
                            <a href="tel:{{ @$contact->phone }}"
                                style="color: #fff; text-decoration: none; margin-right: 15px;">
                                {{ @$contact->phone }}
                            </a>

                            <span style="color: #fff; margin: 0 10px;">|</span>

                            <i class="fa fa-envelope mr-1"></i>
                            <a href="mailto:{{ @$contact->email }}" style="color: #fff; text-decoration: none;">
                                {{ @$contact->email }}
                            </a>
                        </div>
                    </div>

                    <!-- Section Rata Kanan -->
                    <div class="col-xl-6 col-lg-6">
                        <div class="header_right d-flex align-items-center justify-content-end">
                            <div class="book_btn">
                                <a class="boxed-btn3-line" href="{{ route('contact') }}"
                                    style="text-decoration: none; color: #ffffff;">
                                    GET A QUOTE <i class="fa fa-paper-plane"></i>
                                </a>
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

                        <!-- Logo -->
                        <div class="col-xl-3 col-lg-3 col-6 d-none d-lg-block">
                            <div class="logo">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset($settings['site_logo']) }}" alt="Logo" class="img-fluid"
                                        width="400px">
                                </a>
                            </div>
                        </div>

                        <!-- Main Navigation -->
                        <div class="col-xl-7 col-lg-7">
                            <div class="main-menu d-none d-lg-block">
                                <nav>
                                    <ul id="navigation" class="d-flex align-items-center"
                                        style="text-transform: uppercase; font-weight: bold; justify-content: flex-end; margin: 0; padding: 0;">
                                        <li><a href="{{ url('/') }}" class="menu-link">HOME</a></li>
                                        <li><a href="{{ route('about') }}" class="menu-link">ABOUT US</a></li>
                                        <li><a href="{{ route('product') }}" class="menu-link">PRODUCTS</a></li>
                                        <li><a href="{{ route('brand') }}" class="menu-link">BRAND</a></li>
                                        <li><a href="{{ route('contact') }}" class="menu-link">CONTACT</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <!-- Search Button -->
                        <div class="col-xl-2 col-lg-2 d-none d-lg-block">
                            <div class="search_btn text-right">
                                <a data-toggle="modal" data-target="#searchModal" href="#">
                                    <i class="ti-search"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Mobile Menu -->
                        <div class="col-12 d-lg-none">
                            <div class="mobile_menu"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->
