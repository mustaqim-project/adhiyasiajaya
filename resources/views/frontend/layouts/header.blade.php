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
