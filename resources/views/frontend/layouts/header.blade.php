<!-- Header Start -->
<header>
    <div class="header-area">
        <!-- Header Top Area -->


        <div class="header-top_area d-none d-lg-block"
            style="background-color: #001133; padding: 10px 0; color: #fff; font-size: 14px;">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Logo and Contact Info Section -->
                    <div class="col-xl-4 col-lg-4">
                        <div class="logo">
                            <div class="short_contact_list">
                                <i class="fa fa-phone mr-1"></i> <a href="tel:{{ @$contact->phone }}"
                                    style="color: #fff; text-decoration: none;">{{ @$contact->phone }}</a>
                                <i class="fa fa-envelope ml-4 mr-1"></i> <a href="mailto:{{ @$contact->email }}"
                                    style="color: #fff; text-decoration: none;">{{ @$contact->email }}</a>
                            </div>
                        </div>
                    </div>

                    <!-- Request Button Section -->
                    <div class="col-xl-8 col-lg-8">
                        <div class="header_right d-flex align-items-center">
                            <div class="book_btn d-none d-lg-block">
                                <a href="{{ route('contact') }}" style="text-decoration: none; color: #ffffff;">GET A
                                    QUOTE <i class="fa fa-paper-plane"></i></a>
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
                    <div class="row align-items-center justify-content-between">

                        <!-- Logo -->
                        <div class="col-xl-3 col-lg-3 col-6">
                            <div class="logo">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset($settings['site_logo']) }}" alt="Logo" class="img-fluid"
                                        width="180px">
                                </a>
                            </div>
                        </div>

                        <!-- Mobile Menu Toggle -->
                        <div class="col-6 d-lg-none text-end">
                            <button class="mobile-menu-toggle">
                                <i class="ti-menu"></i>
                            </button>
                        </div>

                        <!-- Main Navigation -->
                        <div class="col-xl-9 col-lg-9 d-none d-lg-block">
                            <div class="main-menu">
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
                                        <li style="margin: 0 15px;">
                                            <a href="{{ route('catalog') }}"
                                                style="text-transform: uppercase; font-weight: bold;">CATALOG</a>
                                        </li>
                                        <li style="margin: 0 15px;">
                                            <a href="{{ route('quote') }}"
                                                style="text-transform: uppercase; font-weight: bold;">GET A QUOTE</a>
                                        </li>
                                        <li style="margin: 0 15px;">
                                            <a href="{{ route('contact') }}"
                                                style="text-transform: uppercase; font-weight: bold;">CONTACT</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <!-- Mobile Navigation -->
                        <div class="mobile-menu d-lg-none" style="display: none;">
                            <nav>
                                <ul id="mobile-navigation" style="list-style: none; padding: 0; margin: 0;">
                                    <li>
                                        <a href="{{ url('/') }}">HOME</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('about') }}">ABOUT US</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('product') }}">PRODUCTS</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('catalog') }}">CATALOG</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('quote') }}">GET A QUOTE</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact') }}">CONTACT</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Toggle Script -->
        <script>
            document.querySelector('.mobile-menu-toggle').addEventListener('click', function() {
                const mobileMenu = document.querySelector('.mobile-menu');
                mobileMenu.style.display = mobileMenu.style.display === 'block' ? 'none' : 'block';
            });
        </script>

        <!-- Responsive CSS -->
        <style>
            #sticky-header {
                position: sticky;
                top: 0;
                z-index: 1000;
                background: #fff;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }

            .main-header-area {
                padding: 10px 0;
            }

            .mobile-menu {
                background-color: #fff;
                padding: 10px;
            }

            .mobile-menu ul li {
                margin: 10px 0;
            }

            .mobile-menu ul li a {
                text-transform: uppercase;
                font-weight: bold;
                color: #333;
                text-decoration: none;
            }

            .mobile-menu ul li a:hover {
                color: #007bff;
            }

            .mobile-menu-toggle {
                background: none;
                border: none;
                font-size: 24px;
                cursor: pointer;
                color: #333;
            }

            @media (max-width: 991px) {
                .main-menu {
                    display: none;
                }
            }
        </style>

    </div>
</header>
<!-- Header End -->
