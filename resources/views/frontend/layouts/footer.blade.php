 <!-- footer start -->
 <footer class="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Services
                        </h3>
                        <ul>
                            <li><a href="#">Air Transportation</a></li>
                            <li><a href="#">Ocean Freight</a></li>
                            <li><a href="#">Ocean Cargo</a></li>
                            <li><a href="#">Logistics</a></li>
                            <li><a href="#">Warehouse Moving</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-xl-2 col-md-6 col-lg-2">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Company
                        </h3>
                        <ul>
                            <li><a href="#">About</a></li>
                            <li><a href="#">News</a></li>
                            <li><a href="#"> Testimonials</a></li>
                            <li><a href="#"> Why Us?</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Industries
                        </h3>
                        <ul>
                            <li><a href="#">Chemicals</a></li>
                            <li><a href="#">Automotive</a></li>
                            <li><a href="#"> Consumer Goods</a></li>
                            <li><a href="#">Life Science</a></li>
                            <li><a href="#">Foreign Trade</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Get More Information!
                        </h3>

                        <form action="" class="newsletter-form">
                            <div class="input-group ">
                                <input type="text" class="form-control" name="email" placeholder="Your email address">
                                    <button class="btn btn-primary newsletter-button" type="submit">{{ __('frontend.Get Info!') }}</button>
                            </div>
                        </form>
{{--
                        <form action="#" class="newsletter_form">
                                <input type="text" class="form-control" name="email" placeholder="Your email address">
                            <button type="submit">Subscribe</button>
                        </form> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center">
                        {{ @$footerInfo->copyright }}</p>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>



<footer>
    <div class="wrapper__footer bg__footer-dark pb-0">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="widget__footer">
                        <figure class="image-logo">
                            <img src="{{ asset(@$footerInfo->logo) }}" alt="" class="logo-footer">
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
