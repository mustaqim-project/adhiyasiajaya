
<footer class="footer" style="color: black;">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <!-- Column 1: Logo and Description -->
                <div class="col-xl-6 col-md-12 col-lg-6">
                    <div class="footer_widget">
                        <figure class="mb-3">
                            <img src="{{ asset(@$footerInfo->logo ?? 'default-logo.png') }}" alt="Logo Footer"
                                class="img-fluid logo-footer" width="500px">
                        </figure>
                        <p style="font-size:1em;">{{ @$footerInfo->description ?? 'Default footer description.' }}</p>
                        <div class="social__media mt-4">
                            <ul>
                                @foreach ($socialLinks as $link)
                                    <li>
                                        <a href="{{ $link->url }}" class="social__link">
                                            <i class="{{ $link->icon }}"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Column 2: Grid One Links -->
                <div class="col-xl-2 col-md-5 col-lg-2">
                    <div class="footer_widget">
                        <h3 class="footer_title">{{ @$footerGridOneTitle->value ?? 'Useful Links' }}</h3>
                        <ul>
                            @foreach ($footerGridOne as $gridOne)
                                <li>
                                    <a href="{{ $gridOne->url }}" class="text-decoration-none">
                                        {{ $gridOne->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- Column 3: Contact Info -->
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="footer_widget">
                        <h3 class="footer_title">Contact Us</h3>
                        <ul>
                            <li class="mb-2">
                                <span class="me-2"><i class="fa fa-home"></i></span>
                                {{ @$contact->address ?? 'Default address' }}
                            </li>
                            <li class="mb-2">
                                <span class="me-2"><i class="fa fa-phone"></i></span>
                                <a href="tel:{{ @$contact->phone }}" class="text-decoration-none">
                                    {{ @$contact->phone ?? 'Default phone number' }}
                                </a>
                            </li>
                            <li>
                                <span class="me-2"><i class="fa fa-envelope"></i></span>
                                <a href="mailto:{{ @$contact->email }}" class="text-decoration-none">
                                    {{ @$contact->email ?? 'default@email.com' }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright Section -->
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border"></div>
            <p>{{ @$footerInfo->copyright ?? 'Default copyright text.' }}</p>
        </div>
    </div>
</footer>
