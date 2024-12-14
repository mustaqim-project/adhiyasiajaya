@extends('frontend.layouts.master')

@section('content')
    <!-- slider_area_start -->
    <div class="slider_area">
        <!-- Swiper Container -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <!-- Slide 1 -->
                <div class="swiper-slide single_slider d-flex align-items-center slider_bg_1">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-xl-8">
                                <div class="slider_text text-center">
                                    <p>Indonesian Excellence</p>
                                    <h3>Your Reliable Partner in Pulp & Paper Industry</h3>
                                    <a class="boxed-btn3" href="products.html">Our Products</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="swiper-slide single_slider d-flex align-items-center slider_bg_2">
                    <div class="container">
                        <div class="row align-items-center justify-content-center">
                            <div class="col-xl-8">
                                <div class="slider_text text-center">
                                    <p>Global Partnerships</p>
                                    <h3>Connecting Indonesia to World-Class Solutions</h3>
                                    <a class="boxed-btn3" href="contact.html">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <!-- Swiper Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!-- slider_area_end -->


    <div class="service_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title mb-50 text-center">
                        <h3>Our Product</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="service_grid">
                        <!-- Single Category -->
                        <div class="single_category">
                            <div class="thumb">
                                <img src="https://asset.kompas.com/crops/dD9uTk_-ef4kegb1_TYy3Wpiz40=/24x0:824x533/750x500/data/photo/2022/02/20/6211f3d476f3e.jpg"
                                    alt="Chemicals">
                            </div>
                            <div class="service_info">
                                <h3><a href="product_details.html">Chemicals</a></h3>
                                <p>High-quality chemicals for the Pulp & Paper industry.</p>
                                <a href="product_details.html" class="btn_learn_more">Learn More</a>
                            </div>
                        </div>
                        <!-- Single Category -->
                        <div class="single_category">
                            <div class="thumb">
                                <img src="https://asset.kompas.com/crops/dD9uTk_-ef4kegb1_TYy3Wpiz40=/24x0:824x533/750x500/data/photo/2022/02/20/6211f3d476f3e.jpg"
                                    alt="Machinery & Parts">
                            </div>
                            <div class="service_info">
                                <h3><a href="product_details.html">Machinery & Parts</a></h3>
                                <p>Reliable machinery and parts for optimized production.</p>
                                <a href="product_details.html" class="btn_learn_more">Learn More</a>
                            </div>
                        </div>
                        <!-- Single Category -->
                        <div class="single_category">
                            <div class="thumb">
                                <img src="https://asset.kompas.com/crops/dD9uTk_-ef4kegb1_TYy3Wpiz40=/24x0:824x533/750x500/data/photo/2022/02/20/6211f3d476f3e.jpg"
                                    alt="Laboratory Instruments">
                            </div>
                            <div class="service_info">
                                <h3><a href="product_details.html">Laboratory Instruments</a></h3>
                                <p>Advanced testing instruments for accurate analysis.</p>
                                <a href="product_details.html" class="btn_learn_more">Learn More</a>
                            </div>
                        </div>
                        <!-- Single Category -->
                        <div class="single_category">
                            <div class="thumb">
                                <img src="https://asset.kompas.com/crops/dD9uTk_-ef4kegb1_TYy3Wpiz40=/24x0:824x533/750x500/data/photo/2022/02/20/6211f3d476f3e.jpg"
                                    alt="Stockist Items">
                            </div>
                            <div class="service_info">
                                <h3><a href="product_details.html">Stockist Items</a></h3>
                                <p>Readily available products from trusted suppliers.</p>
                                <a href="product_details.html" class="btn_learn_more">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    {{-- <div class="transportaion_area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title mb-50 text-center">
                        <h3>
                            Market Sectors
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single_transport">
                        <div class="icon">
                            <img src="https://asset.kompas.com/crops/dD9uTk_-ef4kegb1_TYy3Wpiz40=/24x0:824x533/750x500/data/photo/2022/02/20/6211f3d476f3e.jpg" alt="Pulp & Paper Industry">
                        </div>
                        <h3>Pulp & Paper Industry</h3>
                        <p>Providing chemicals, machinery, and laboratory instruments to enhance production efficiency.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single_transport">
                        <div class="icon">
                            <img src="https://asset.kompas.com/crops/dD9uTk_-ef4kegb1_TYy3Wpiz40=/24x0:824x533/750x500/data/photo/2022/02/20/6211f3d476f3e.jpg" alt="Manufacturing">
                        </div>
                        <h3>Manufacturing</h3>
                        <p>Supplying high-quality equipment and parts for diverse industrial manufacturing needs.</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single_transport">
                        <div class="icon">
                            <img src="https://asset.kompas.com/crops/dD9uTk_-ef4kegb1_TYy3Wpiz40=/24x0:824x533/750x500/data/photo/2022/02/20/6211f3d476f3e.jpg" alt="Research & Development">
                        </div>
                        <h3>Research & Development</h3>
                        <p>Supporting laboratories with advanced testing instruments and solutions.</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


    <div class="service_area" style="background-color: rgb(255, 255, 255)">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="section_title mb-50 text-center">
                        <h3>
                            Our Customer
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="service_active owl-carousel">
                        <div class="single_category">
                            <div class="thumb">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVA18_ofxfkZJmXY0TMHQLkkIv3GXcv8rmyg&s"
                                    alt="APP Group" width="180px">
                            </div>
                            <div class="service_info">
                                <h3><a href="#">APP Group</a></h3>
                            </div>
                        </div>
                        <div class="single_category">
                            <div class="thumb">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ9JOtXW_2BTkrNacxEKzqcC_vLQgNDDk-7iw&s"
                                    alt="APRIL Group" width="180px">
                            </div>
                            <div class="service_info">
                                <h3><a href="#">APRIL Group</a></h3>
                            </div>
                        </div>
                        <div class="single_category">
                            <div class="thumb">
                                <img src="https://media.licdn.com/dms/image/v2/D4E0BAQF4cdabJF0DHQ/company-logo_200_200/company-logo_200_200/0/1686619480470/dayasa_aria_prima_logo?e=2147483647&v=beta&t=T8WjLPQdIc1ILMuZM6SomN0UF80O4RBdPSYH0wMrEGU"
                                    alt="DAYASA ARIA PRIMA" width="180px">
                            </div>
                            <div class="service_info">
                                <h3><a href="#">DAYASA ARIA PRIMA</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- chose_area  -->
    <div class="chose_area" style="background-color: #f0e5e5">
        <div class="container">
            <div class="features_main_wrap">
                <div class="row  align-items-center">
                    <div class="col-xl-5 col-lg-5 col-md-6">
                        <div class="about_image">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQoxX5Y_tFFAdfN84VkJ9iyB4Ux3nBdjLQmbQ&s" alt="">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="features_info">
                            <h3>About Us</h3>
                            <p>PT. Adhya Asia Jaya was established in June 2023. The founders have been engaged in the Pulp
                                & Paper Industry for 18 years. As an Indonesian private-owned company, we specialize in the
                                supply of chemicals, machinery & parts, and laboratory testing instruments to the Indonesia
                                Pulp & Paper Industry.</p>
                            <p>We serve as an Agent, Distributor, and Stockist for companies from Austria, Hong Kong/USA,
                                Singapore, Australia, Italy, Canada, and China, catering to the entire Indonesian market.
                                With a presence in 3 cities, we ensure comprehensive coverage of the Indonesia Pulp & Paper
                                market.</p>
                            <ul>
                                <li> Long-term partnerships with global and local partners. </li>
                                <li> Committed to supporting customer needs with quality products and services. </li>
                                <li> Creating value for customers and principals through innovation and reliability. </li>
                            </ul>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ chose_area  -->





    <!-- contact_action_area  -->
    <div class="contact_action_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                </div>
                <div class="col-lg-8">
                    <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm"
                        novalidate="novalidate">
                        <div class="row">
                            <h2 class="contact-title">Get a Quote</h2>

                            <div class="col-12">
                                <div class="form-group">
                                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" message"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="name" id="name" type="text"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
                                        placeholder="Enter your name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input class="form-control valid" name="email" id="email" type="email"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'"
                                        placeholder="Email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="subject" id="subject" type="text"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'"
                                        placeholder="Enter Subject">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /contact_action_area  -->



    <script>
        $(document).ready(function() {
            $(".customer_slider").owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 3000,
                nav: true,
                dots: false
            });
        });
    </script>

    <script>
        var swiper = new Swiper('.slider_area .swiper-container', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script>
@endsection
