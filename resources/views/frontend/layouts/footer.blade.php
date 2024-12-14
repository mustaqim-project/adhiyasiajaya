<style>


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
        transition: color 0.3s ease-in-out;
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
                <div class="col-xl-6 col-md-12 col-lg-6">
                    <div class="footer_widget">
                        <figure class="mb-3">
                            <img src="{{ asset(@$footerInfo->logo ?? 'default-logo.png') }}" alt="Logo Footer" class="img-fluid logo-footer" width="180">
                        </figure>
                        <p>{{ @$footerInfo->description ?? 'Default footer description.' }}</p>
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
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="footer_widget">
                        <h3 class="footer_title">{{ @$footerGridOneTitle->value ?? 'Useful Links' }}</h3>
                        <ul>
                            @foreach ($footerGridOne as $gridOne)
                                <li>
                                    <a href="{{ $gridOne->url }}" class="text-light text-decoration-none">
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
                                <a href="tel:{{ @$contact->phone }}" class="text-light text-decoration-none">
                                    {{ @$contact->phone ?? 'Default phone number' }}
                                </a>
                            </li>
                            <li>
                                <span class="me-2"><i class="fa fa-envelope"></i></span>
                                <a href="mailto:{{ @$contact->email }}" class="text-light text-decoration-none">
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
