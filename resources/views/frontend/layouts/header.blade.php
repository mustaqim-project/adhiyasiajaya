<!-- Header Start -->
<header>
    <div class="header-area">
        <!-- Header Top Area -->
        <div class="header-top_area d-none d-lg-block" style="background-color: #001133; padding: 10px 0; color: #fff; font-size: 14px;">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Social Media Links, Phone & Email Section -->
                    <div class="col-xl-4 col-lg-4 d-flex justify-content-start align-items-center">
                        <div class="short_contact_list">
                            @foreach ($socialLinks as $link)
                                <a href="{{ $link->url }}" style="margin-right: 15px;">
                                    <i class="{{ $link->icon }}" style="font-size: 20px; color: #fff;"></i>
                                </a>
                            @endforeach

                            <i class="fa fa-phone mr-2"></i>
                            <a href="tel:{{ @$contact->phone }}" style="color: #fff; text-decoration: none; margin-right: 15px;">
                                {{ @$contact->phone }}
                            </a>
                            <i class="fa fa-envelope mr-2"></i>
                            <a href="mailto:{{ @$contact->email }}" style="color: #fff; text-decoration: none;">
                                {{ @$contact->email }}
                            </a>
                        </div>
                    </div>

                    <!-- Request Button Section -->
                    <div class="col-xl-4 col-lg-4 d-flex justify-content-end">
                        <div class="header_right d-flex align-items-center">
                            <div class="book_btn">
                                <a class="boxed-btn3-line" href="{{ route('contact') }}" style="text-decoration: none; color: #ffffff; padding: 10px 25px; border-radius: 5px; border: 2px solid #ffffff;">
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
