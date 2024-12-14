<!-- Header Start -->
<header>
    <div class="header-area">
        <!-- Header Top Area -->
        <div class="header-top_area d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Logo and Contact Info Section -->
                    <div class="col-xl-4 col-lg-4">
                        <ul class="short_contact_list d-flex align-items-center">
                            @foreach ($socialLinks as $link)
                                <li class="social-item">
                                    <a href="{{ $link->url }}" class="social__link">
                                        <i class="{{ $link->icon }}"></i>
                                    </a>
                                </li>
                            @endforeach
                            <li class="contact-item">
                                <i class="fa fa-phone"></i>
                                <a href="tel:{{ @$contact->phone }}" class="contact-link">{{ @$contact->phone }}</a>
                            </li>
                            <li class="contact-item">
                                <i class="fa fa-envelope"></i>
                                <a href="mailto:{{ @$contact->email }}" class="contact-link">{{ @$contact->email }}</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Request Button Section -->
                    <div class="col-xl-8 col-lg-8">
                        <div class="header_right d-flex align-items-center justify-content-end">
                            <div class="book_btn">
                                <a class="boxed-btn3-line" href="{{ route('contact') }}">
                                    GET A QUOTE <i class="fa fa-paper-plane"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <style>
        .header-top_area {
            background-color: #001133;
            padding: 10px 0;
            color: #fff;
            font-size: 14px;
        }
        .short_contact_list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .short_contact_list .social-item {
            margin-right: 10px;
        }
        .contact-item {
            display: flex;
            align-items: center;
            margin-right: 15px;
        }
        .contact-item i {
            margin-right: 5px;
        }
        .contact-link {
            color: #fff;
            text-decoration: none;
        }
        .book_btn .boxed-btn3-line {
            text-decoration: none;
            color: #ffffff;
        }
        .book_btn .boxed-btn3-line:hover {
            color: #ccc;
        }
        </style>



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
                        <div class="col-xl-6 col-lg-6">
                            <div class="main-menu d-none d-lg-block">
                                <nav>
                                    <ul id="navigation" class="d-flex align-items-center"
                                        style="text-transform: uppercase; font-weight: bold; justify-content: flex-end; margin: 0; padding: 0;">

                                        <li><a href="{{ url('/') }}" class="menu-link">HOME</a></li>
                                        <li><a href="{{ route('about') }}" class="menu-link">ABOUT US</a></li>
                                        <li><a href="{{ route('product') }}" class="menu-link">PRODUCTS</a></li>
                                        <li><a href="{{ route('contact') }}" class="menu-link">CONTACT</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <!-- Search Button -->
                        <div class="col-xl-3 col-lg-3 d-none d-lg-block">
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
