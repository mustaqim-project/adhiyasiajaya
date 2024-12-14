{{-- <!-- Footer Start -->
<footer class="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <!-- Column 1: Logo and Description -->
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <figure class="image-logo">
                            <img src="{{ asset(@$footerInfo->logo) }}" alt="Logo" class="logo-footer" width="175px">
                        </figure>
                        <p>{{ @$footerInfo->description }}</p>
                        <div class="social__media mt-4">
                            <ul class="list-inline">
                                @foreach ($socialLinks as $link)
                                    <li class="list-inline-item">
                                        <a href="{{ $link->url }}" class="btn btn-social rounded text-white facebook">
                                            <i class="{{ $link->icon }}"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Column 2: Grid One Links -->
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">{{ @$footerGridOneTitle->value }}</h3>
                        <ul>
                            @foreach ($footerGridOne as $gridOne)
                                <li><a href="{{ $gridOne->url }}">{{ $gridOne->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Column 3: Grid Two Links -->
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">{{ @$footerGridTwoTitle->value }}</h3>
                        <ul>
                            @foreach ($footerGridTwo as $gridTwo)
                                <li><a href="{{ $gridTwo->url }}">{{ $gridTwo->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Column 4: Newsletter -->
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">Get More Information!</h3>
                        <form action="#" class="newsletter_form">
                            <input type="email" placeholder="Enter your email" name="email" required>
                            <button type="submit" class="newsletter-button">Get Info!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright Section -->
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center">{{ @$footerInfo->copyright }}</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer End --> --}}


<!-- Footer Start -->

<style>
    :root {
        --primaryColor: #007bff; /* Warna utama */
        --secondaryColor: #4c4f56; /* Warna sekunder */
        --bgFooter: #020e28; /* Warna latar belakang footer */
        --bgFooterBottom: #010a20; /* Warna bagian bawah footer */
        --textColor: #fff; /* Warna teks */
    }

    .footer {
        background-color: var(--bgFooter);
        padding: 40px 0;
        color: var(--textColor);
    }

    .footer .footer_top .footer_widget .footer_title {
        font-size: 20px;
        font-weight: bold;
        color: var(--primaryColor);
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .footer .footer_top .footer_widget ul {
        list-style: none;
        padding: 0;
    }

    .footer .footer_top .footer_widget ul li a {
        color: var(--textColor);
        text-decoration: none;
        transition: all 0.3s ease-in-out;
    }

    .footer .footer_top .footer_widget ul li a:hover {
        color: var(--primaryColor);
        text-decoration: underline;
    }

    .footer .footer_top .social__media ul {
        padding: 0;
        margin: 0;
        list-style: none;
        display: flex;
        gap: 10px;
    }

    .footer .footer_top .social__media ul li a {
        background-color: var(--secondaryColor);
        color: var(--textColor);
        width: 40px;
        height: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50%;
        transition: transform 0.3s ease, background-color 0.3s ease;
    }

    .footer .footer_top .social__media ul li a:hover {
        background-color: var(--primaryColor);
        transform: scale(1.1);
    }

    .footer .copy-right_text {
        background-color: var(--bgFooterBottom);
        padding: 10px 0;
        text-align: center;
    }

    .footer .copy-right_text .footer_border {
        border-top: 1px solid var(--secondaryColor);
        margin-bottom: 10px;
    }

    .footer .copy-right_text p {
        font-size: 14px;
        color: var(--textColor);
        margin: 0;
    }

    @media (max-width: 768px) {
        .footer .footer_top .footer_widget {
            margin-bottom: 30px;
        }
    }
</style>

<footer class="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <!-- Column 1: Logo and Description -->
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="footer_widget">
                        <figure class="image-logo mb-3">
                            <img src="{{ asset(@$footerInfo->logo) }}" alt="Logo" class="logo-footer" width="180px">
                        </figure>
                        <p class="mb-3">{{ @$footerInfo->description }}</p>
                        <div class="social__media mt-4">
                            <ul>
                                @foreach ($socialLinks as $link)
                                    <li>
                                        <a href="{{ $link->url }}" class="btn btn-social">
                                            <i class="{{ $link->icon }}"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Column 2: Grid One Links -->
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="footer_widget">
                        <h3 class="footer_title">{{ @$footerGridOneTitle->value }}</h3>
                        <ul>
                            @foreach ($footerGridOne as $gridOne)
                                <li>
                                    <a href="{{ $gridOne->url }}">{{ $gridOne->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Column 3: Contact Info -->
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="footer_widget">
                        <h3 class="footer_title">Contact Us</h3>
                        <p>PT. Daya Esa Mulya Mandiri</p>
                        <p>Jl. Ciputat Raya No. 3B, Kebayoran Lama Utara, Jakarta 12240</p>
                        <p><a href="tel:+62217290467">+62 21-7290467</a></p>
                        <p><a href="tel:+62217292930">+62 21-7292930</a></p>
                        <p><a href="mailto:sales@dayaesa.com">sales@dayaesa.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright Section -->
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border"></div>
            <p>{{ @$footerInfo->copyright }}</p>
        </div>
    </div>
</footer>

<!-- Footer End -->



{{--
<section class="wrapper__section p-0">
    <div class="wrapper__section__components">
        <!-- Footer -->
        <footer>
            <div class="wrapper__footer bg__footer-dark pb-0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="widget__footer">
                                <figure class="image-logo">
                                    <img src="{{ asset(@$footerInfo->logo) }}" alt="" class="logo-footer" width="175px">
                                </figure>

                                <p>{{ @$footerInfo->description }}</p>


                                <div class="social__media mt-4">
                                    <ul class="list-inline">
                                        @foreach ($socialLinks as $link)
                                        <li class="list-inline-item">
                                            <a href="{{ $link->url }}" class="btn btn-social rounded text-white facebook">
                                                <i class="{{ $link->icon }}"></i>
                                            </a>
                                        </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget__footer">
                                <div class="dropdown-footer">
                                    <h4 class="footer-title">
                                        {{ @$footerGridOneTitle->value }}
                                        <span class="fa fa-angle-down"></span>
                                    </h4>

                                </div>

                                <ul class="list-unstyled option-content is-hidden">

                                    @foreach ($footerGridOne as $gridOne)
                                    <li>
                                        <a href="{{ $gridOne->url }}">{{ $gridOne->name }}</a>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget__footer">
                                <div class="dropdown-footer">
                                    <h4 class="footer-title">
                                        {{ @$footerGridTwoTitle->value }}
                                        <span class="fa fa-angle-down"></span>
                                    </h4>

                                </div>
                                <ul class="list-unstyled option-content is-hidden">

                                    @foreach ($footerGridTwo as $gridTwo)
                                    <li>
                                        <a href="{{ $gridTwo->url }}">{{ $gridTwo->name }}</a>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="widget__footer">
                                <div class="dropdown-footer">
                                    <h4 class="footer-title">
                                        {{ @$footerGridThreeTitle->value }}
                                        <span class="fa fa-angle-down"></span>
                                    </h4>

                                </div>

                                <ul class="list-unstyled option-content is-hidden">
                                    @foreach ($footerGridThree as $gridThree)
                                    <li>
                                        <a href="{{ $gridThree->url }}">{{ $gridThree->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer bottom -->
            <div class="wrapper__footer-bottom bg__footer-dark">
                <div class="container ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="border-top-1 bg__footer-bottom-section">
                                <p class="text-white text-center">
                                    {{ @$footerInfo->copyright }}</p>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </footer>
    </div>
</section> --}}
