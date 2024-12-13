<!-- Footer Start -->
<footer class="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <!-- Column 1: Logo and Description -->
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <figure class="image-logo">
                            <img src="{{ asset(@$footerInfo->logo) }}" alt="Logo" class="logo-footer">
                        </figure>
                        <p>{{ @$footerInfo->description }}</p>
                        <div class="social__media mt-4">
                            <ul class="list-inline">
                                @foreach ($socialLinks as $link)
                                    <li class="list-inline-item">
                                        <a href="{{ $link->url }}"
                                            class="btn btn-social rounded text-white facebook">
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

                <!-- Column 4: Grid Three Links -->
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title"> {{ @$footerGridThreeTitle->value }}
                        </h3>
                        <ul>
                            @foreach ($footerGridThree as $gridThree)
                                <li>
                                    <a href="{{ $gridThree->url }}">{{ $gridThree->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Column 5: Newsletter -->
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
<!-- Footer End -->
