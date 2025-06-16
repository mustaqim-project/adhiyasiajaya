@extends('frontend.layouts.master')

@section('content')
    <section>

        <!-- bradcam_area  -->
        <div class="bradcam_area bradcam_bg_1">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="bradcam_text text-center">
                            <h3>About Us</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ bradcam_area  -->

        <!-- chose_area  -->
        <div class="chose_area ">
            <div class="container">
                <div class="features_main_wrap">
                    <div class="row  align-items-center">
                        <div class="col-xl-5 col-lg-5 col-md-6">
                            <div class="about_image">
                                <img src="{{ asset($settingpage->image_about) }}" alt="">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6">
                            <div class="features_info">
                                <h3>About Us?</h3>
                                {!! @$about->content !!}

                                <div class="about_btn">
                                    <a class="boxed-btn3-line" href="{{ route('contact') }}">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ chose_area  -->


        <!-- About Us Section -->
        <section id="about" class="section-padding bg-neutral">
            <div class="container mx-auto px-4">
                <!-- Heading -->
                <div class="text-center mb-16 fade-in">
                    <h2 class="text-4xl md:text-5xl font-bold text-primary mb-6">
                        About Us?
                    </h2>
                </div>

                <!-- Grid Content -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

                    <!-- Visual Element -->
                    <div class="fade-in">
                        <div class="bg-white rounded-2xl p-8 shadow-xl">
                            <div class="text-center">
                                <img src="{{ asset($settingpage->image_about) }}" alt="About Image"
                                    class="mx-auto rounded-lg w-full max-w-md h-auto object-cover">
                            </div>
                        </div>
                    </div>

                    <!-- Dynamic Content -->
                    <div class="fade-in">
                        <div class="space-y-6">
                            <div class="prose prose-lg max-w-none text-gray-600">
                                {!! @$about->content !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>



    </section>
    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const closeMobileMenu = document.getElementById('close-mobile-menu');

        // Toggle mobile menu
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.add('active');
            document.body.style.overflow = 'hidden'; // Prevent scrolling when menu is open
        });

        closeMobileMenu.addEventListener('click', () => {
            mobileMenu.classList.remove('active');
            document.body.style.overflow = ''; // Re-enable scrolling
        });

        // Close menu when clicking on a link
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.remove('active');
                document.body.style.overflow = '';
            });
        });

        // Fade in animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.fade-in').forEach(el => {
            observer.observe(el);
        });


        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const headerHeight = document.querySelector('header').offsetHeight;
                    const targetPosition = target.offsetTop - headerHeight;

                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                }
            });
        });

        // Contact form submission
        document.getElementById('contact-form').addEventListener('submit', function(e) {
            e.preventDefault();

            // Get form data
            const formData = {
                name: document.getElementById('name').value,
                company: document.getElementById('company').value,
                email: document.getElementById('email').value,
                message: document.getElementById('message').value
            };

            // Simple validation
            if (!formData.name || !formData.company || !formData.email || !formData.message) {
                alert('Please fill in all required fields.');
                return;
            }

            // Simulate form submission
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Submitting...';
            submitBtn.disabled = true;

            setTimeout(() => {
                alert('Thank you for your inquiry! We will get back to you within 24 hours.');
                this.reset();
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 2000);
        });

        // Add scroll effect to header
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 100) {
                header.classList.add('shadow-2xl');
            } else {
                header.classList.remove('shadow-2xl');
            }
        });

        // Initialize animations
        document.addEventListener('DOMContentLoaded', () => {
            // Trigger initial fade-in for elements in viewport
            const initialElements = document.querySelectorAll('.fade-in');
            initialElements.forEach(el => {
                const rect = el.getBoundingClientRect();
                if (rect.top < window.innerHeight) {
                    el.classList.add('visible');
                }
            });
        });
    </script>
@endsection
