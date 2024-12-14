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
                                    <ul id="navigation"
                                    style="display: flex; justify-content: flex-end; margin: 0; padding: 0;">
                                    <li style="margin: 0 15px;">
                                        <a href="{{ url('/') }}"
                                            style="text-transform: uppercase; font-weight: bold;">HOME</a>
                                    </li>
                                    <li style="margin: 0 15px;">
                                        <a href="{{ route('about') }}"
                                            style="text-transform: uppercase; font-weight: bold;">ABOUT US</a>
                                    </li>
                                    <li style="margin: 0 15px;">
                                        <a href="{{ route('product') }}"
                                            style="text-transform: uppercase; font-weight: bold;">PRODUCTS</a>
                                    </li>
                                    {{-- <li style="margin: 0 15px;">
                                        <a href="{{ route('catalog') }}"
                                            style="text-transform: uppercase; font-weight: bold;">CATALOG</a>
                                    </li>
                                    <li style="margin: 0 15px;">
                                        <a href="{{ route('quote') }}"
                                            style="text-transform: uppercase; font-weight: bold;">GET A QUOTE</a>
                                    </li> --}}
                                    <li style="margin: 0 15px;">
                                        <a href="{{ route('contact') }}"
                                            style="text-transform: uppercase; font-weight: bold;">CONTACT</a>
                                    </li>
                                    <li style="margin: 0 15px;">
                                        <!-- Search Button -->
                                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                            <div class="Appointment justify-content-end">
                                                <div class="search_btn">
                                                    <a data-toggle="modal" data-target="#searchModal"
                                                        href="#">
                                                        <i class="ti-search"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
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
