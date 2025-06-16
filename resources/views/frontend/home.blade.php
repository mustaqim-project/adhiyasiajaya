@extends('frontend.layouts.master')

@section('content')
    <style>
        .tab-active {
            background-color: var(--primary-color, #3B82F6) !important;
            color: white !important;
        }

        .tab-inactive {
            background-color: transparent !important;
            color: #374151 !important;
        }

        .tab-inactive:hover {
            background-color: rgba(59, 130, 246, 0.1);
            color: var(--primary-color, #3B82F6);
        }

        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .fade-in {
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>


    <!-- Hero Section -->
    <section id="home" class="hero-background flex items-center justify-center text-white">
        <div class="container mx-auto px-4 text-center">
            <div class="fade-in">
                <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight text-white">
                    Professional Oilfield Equipment<br>
                    <span class="text-accent">and Parts Supplier</span>
                </h1>
                <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto opacity-90">
                    Professional, Efficient, Customer Focus, Win-win Cooperation
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="/product" class="btn-primary text-lg px-8 py-4">
                        <i class="fas fa-search mr-2"></i>Explore Products
                    </a>
                    <a href="/contact" class="text-lg px-8 py-4 text-orange-600">
                        <i class="fas fa-envelope mr-2"></i>Contact Us
                    </a>
                </div>
            </div>

            <!-- Floating Statistics -->
            <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto floating-animation">
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-accent">18+</div>
                    <div class="text-sm md:text-base opacity-80">Years Experience</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-accent">100%</div>
                    <div class="text-sm md:text-base opacity-80">API Certified</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-accent">50+</div>
                    <div class="text-sm md:text-base opacity-80">Global Partners</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl md:text-4xl font-bold text-accent">3</div>
                    <div class="text-sm md:text-base opacity-80">Cities Coverage</div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="section-padding bg-neutral">
        <div class="container mx-auto px-4">
            <!-- Heading -->
            <div class="text-center mb-16 fade-in">
                <h2 class="text-4xl md:text-5xl font-bold text-primary mb-6">
                    GET TO KNOW US BETTER
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

    <!-- Product Section -->

    <section id="products" class="section-padding bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-4xl md:text-5xl font-bold text-primary mb-6">Featured Products</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Discover our comprehensive range of professional equipment for oilfield operations
                    and pulp & paper manufacturing industries.
                </p>
            </div>

            <!-- Category Tabs -->
            <button
                class="tab-btn px-2 py-1 text-xs text-center leading-tight whitespace-normal sm:px-4 sm:py-2 sm:text-sm md:px-5 md:py-2.5 md:text-base rounded-full font-medium transition-all duration-300 {{ $index == 0 ? 'bg-primary text-white tab-active' : 'text-gray-700 tab-inactive' }}"
                data-tab="tab-{{ $category->id }}">
                {{ $category->name }}
            </button>
            <div class="flex justify-center mb-8 fade-in overflow-x-auto">
                <div class="bg-gray-100 rounded-full p-1 inline-flex flex-nowrap gap-1">
                    @foreach ($categories as $index => $category)
                        <button
                            class="tab-btn px-2 py-1 text-xs text-center leading-tight whitespace-normal sm:px-4 sm:py-2 sm:text-sm md:px-5 md:py-2.5 md:text-base rounded-full font-medium transition-all duration-300 {{ $index == 0 ? 'bg-primary text-white tab-active' : 'text-gray-700 tab-inactive' }}"
                            data-tab="tab-{{ $category->id }}">
                            {{ $category->name }}
                        </button>
                    @endforeach
                </div>
            </div>




            <!-- Tab Contents -->
            @foreach ($categories as $index => $category)
                <div id="tab-{{ $category->id }}-content" class="tab-content {{ $index != 0 ? 'hidden' : '' }}"
                    style="display: {{ $index == 0 ? 'block' : 'none' }};">



                    @if (count($category->news) > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach ($category->news as $product)
                                <a href="{{ route('product-details', $product->slug) }}">

                                    <div class="card-hover bg-white rounded-xl shadow-lg overflow-hidden border">
                                        <div
                                            class="h-48 bg-gradient-to-br from-blue-500 to-purple-500 flex items-center justify-center">
                                            @if ($product->image && file_exists(public_path($product->image)))
                                                <img src="{{ asset($product->image) }}" class="h-full w-full object-cover"
                                                    alt="{{ $product->title ?? 'Product' }}">
                                            @else
                                                <div class="text-white text-center">
                                                    <i class="fas fa-image text-4xl mb-2"></i>
                                                    <p>No Image</p>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="p-6">
                                            <h3 class="text-xl font-bold text-gray-800 mb-3">
                                                {{ $product->title ?? 'No Title' }}
                                            </h3>
                                            <p class="text-gray-600 mb-4">
                                                {!! $product->content ? Str::limit($product->content, 100) : 'No description available' !!}
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-12">
                            <div class="text-gray-400 mb-4">
                                <i class="fas fa-box-open text-6xl"></i>
                            </div>
                            <p class="text-xl text-gray-500">No products found in this category.</p>
                            <p class="text-gray-400 mt-2">Check back later for new products.</p>
                        </div>
                    @endif
                </div>
            @endforeach

            <div class="text-center mt-12 fade-in">
                <a href="{{ route('product') }}" class="btn-secondary text-lg px-8 py-4">
                    <i class="fas fa-th-large mr-2"></i>View All Products
                </a>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="section-padding bg-primary text-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-4xl md:text-5xl font-bold mb-6 accent-orange">Why Choose Us</h2>
                <p class="text-xl opacity-90 max-w-3xl mx-auto">
                    We deliver exceptional value through our commitment to quality, competitive pricing,
                    and comprehensive support services.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="text-center fade-in card-hover bg-white bg-opacity-10 rounded-xl p-8 backdrop-blur-sm">
                    <div class="w-20 h-20 bg-accent rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-industry text-3xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 accent-orange">Best Factories</h3>
                    <p class="opacity-90">
                        Partnered with world-class manufacturers to ensure top-quality equipment and reliable
                        performance.
                    </p>
                </div>

                <div class="text-center fade-in card-hover bg-white bg-opacity-10 rounded-xl p-8 backdrop-blur-sm">
                    <div class="w-20 h-20 bg-accent rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-dollar-sign text-3xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 accent-orange">Competitive Price</h3>
                    <p class="opacity-90">
                        Optimal pricing strategies that provide excellent value without compromising on quality
                        standards.
                    </p>
                </div>

                <div class="text-center fade-in card-hover bg-white bg-opacity-10 rounded-xl p-8 backdrop-blur-sm">
                    <div class="w-20 h-20 bg-accent rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-clock text-3xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 accent-orange">Shortest Lead Time</h3>
                    <p class="opacity-90">
                        Efficient supply chain management ensures rapid delivery to meet your project deadlines.
                    </p>
                </div>

                <div class="text-center fade-in card-hover bg-white bg-opacity-10 rounded-xl p-8 backdrop-blur-sm">
                    <div class="w-20 h-20 bg-accent rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-headset text-3xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 accent-orange">Technical Support</h3>
                    <p class="opacity-90">
                        Comprehensive technical assistance from our expert team throughout the equipment lifecycle.
                    </p>
                </div>

                <div class="text-center fade-in card-hover bg-white bg-opacity-10 rounded-xl p-8 backdrop-blur-sm">
                    <div class="w-20 h-20 bg-accent rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-handshake text-3xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 accent-orange">Long-term Partnerships</h3>
                    <p class="opacity-90">
                        Building lasting relationships through trust, reliability, and continuous support.
                    </p>
                </div>

                <div class="text-center fade-in card-hover bg-white bg-opacity-10 rounded-xl p-8 backdrop-blur-sm">
                    <div class="w-20 h-20 bg-accent rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-shield-alt text-3xl text-white"></i>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 accent-orange">Quality Assurance</h3>
                    <p class="opacity-90">
                        Rigorous quality control processes and API certifications guarantee superior performance.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Certifications Section -->
    <section class="section-padding bg-neutral">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-4xl md:text-5xl font-bold text-primary mb-6">Our Certifications</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    We maintain the highest industry standards with comprehensive API certifications
                    and quality assurance programs.
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                <div class="certification-badge text-center fade-in">
                    <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold text-lg">API</span>
                    </div>
                    <div class="font-semibold text-primary">API 6A</div>
                    <div class="text-sm text-gray-600">Wellhead Equipment</div>
                </div>

                <div class="certification-badge text-center fade-in">
                    <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold text-lg">API</span>
                    </div>
                    <div class="font-semibold text-primary">API 16A</div>
                    <div class="text-sm text-gray-600">Drill Through Equipment</div>
                </div>

                <div class="certification-badge text-center fade-in">
                    <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold text-lg">API</span>
                    </div>
                    <div class="font-semibold text-primary">API 16D</div>
                    <div class="text-sm text-gray-600">Control Systems</div>
                </div>

                <div class="certification-badge text-center fade-in">
                    <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold text-lg">API</span>
                    </div>
                    <div class="font-semibold text-primary">API 1502</div>
                    <div class="text-sm text-gray-600">Steel Drilling Line</div>
                </div>

                <div class="certification-badge text-center fade-in">
                    <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold text-lg">API</span>
                    </div>
                    <div class="font-semibold text-primary">API 5DP</div>
                    <div class="text-sm text-gray-600">Drill Pipe</div>
                </div>

                <div class="certification-badge text-center fade-in">
                    <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <span class="text-white font-bold text-lg">API</span>
                    </div>
                    <div class="font-semibold text-primary">API 7K</div>
                    <div class="text-sm text-gray-600">Drilling Equipment</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Customers Section -->
    <section id="customers" class="section-padding bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-4xl md:text-5xl font-bold text-primary mb-6">Our Valued Customers</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Trusted by leading companies across Indonesia and the region for their critical equipment needs.
                </p>
            </div>

            <!-- Customer Logos -->
            <div class="mb-16 fade-in">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8 items-center justify-items-center">
                    <div class="bg-gray-100 rounded-lg p-6 w-full h-24 flex items-center justify-center">
                        <span class="font-bold text-primary">APP Group</span>
                    </div>
                    <div class="bg-gray-100 rounded-lg p-6 w-full h-24 flex items-center justify-center">
                        <span class="font-bold text-primary">APRIL Group</span>
                    </div>
                    <div class="bg-gray-100 rounded-lg p-6 w-full h-24 flex items-center justify-center">
                        <span class="font-bold text-primary">Pertamina</span>
                    </div>
                    <div class="bg-gray-100 rounded-lg p-6 w-full h-24 flex items-center justify-center">
                        <span class="font-bold text-primary">Chevron</span>
                    </div>
                    <div class="bg-gray-100 rounded-lg p-6 w-full h-24 flex items-center justify-center">
                        <span class="font-bold text-primary">Total</span>
                    </div>
                    <div class="bg-gray-100 rounded-lg p-6 w-full h-24 flex items-center justify-center">
                        <span class="font-bold text-primary">Medco</span>
                    </div>
                </div>
            </div>

            <!-- Testimonials -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 fade-in">
                <div class="testimonial-card">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-accent rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <div>
                            <div class="font-semibold text-primary">Ahmad Wijaya</div>
                            <div class="text-sm text-gray-600">Operations Manager, APP Group</div>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">
                        "PT Adhya Asia Jaya has been our reliable partner for pulp and paper equipment.
                        Their technical expertise and prompt delivery have significantly improved our operational
                        efficiency."
                    </p>
                    <div class="flex text-accent">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <div class="testimonial-card">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-accent rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-user text-white"></i>
                        </div>
                        <div>
                            <div class="font-semibold text-primary">Sarah Johnson</div>
                            <div class="text-sm text-gray-600">Project Director, Chevron Indonesia</div>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">
                        "Outstanding quality and service! Their oilfield equipment meets all API standards
                        and their technical support team is always available when we need assistance."
                    </p>
                    <div class="flex text-accent">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="quote" class="section-padding bg-accent text-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- CTA Content -->
                <div class="fade-in">
                    <h2 class="text-4xl md:text-5xl font-bold mb-6">
                        Ready to find the right solution for your needs?
                    </h2>
                    <p class="text-xl mb-8 opacity-90">
                        Get in touch with our expert team for personalized consultation
                        and competitive quotations for your industrial equipment requirements.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle mr-3 text-2xl"></i>
                            <span class="text-lg">Free consultation and technical assessment</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle mr-3 text-2xl"></i>
                            <span class="text-lg">Competitive pricing and flexible terms</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle mr-3 text-2xl"></i>
                            <span class="text-lg">Fast response within 24 hours</span>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="fade-in">
                    <form id="contact-form" action="{{ route('contact.submit') }}" method="POST" class="contact-form">
                        @csrf

                        <h3 class="text-2xl font-bold text-primary mb-6">Submit Your Inquiry</h3>

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-semibold mb-2">
                                Full Name *
                            </label>
                            <input type="text" id="name" name="name" class="input-field"
                                placeholder="Enter your full name" value="{{ old('name') }}" required>
                            @error('name')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">
                                Email Address *
                            </label>
                            <input type="email" id="email" name="email" class="input-field"
                                placeholder="Enter your email address" value="{{ old('email') }}" required>
                            @error('email')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-6">
                            <label for="message" class="block text-gray-700 text-sm font-semibold mb-2">
                                Message *
                            </label>
                            <textarea id="message" name="message" rows="4" class="input-field"
                                placeholder="Tell us about your equipment needs, specifications, and any specific requirements" required>{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="w-full btn-primary text-lg py-4">
                            <i class="fas fa-paper-plane mr-2"></i>Submit Inquiry
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </section>



    <!-- JavaScript -->
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tab-btn');
            const tabContents = document.querySelectorAll('.tab-content');



            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetTabId = this.getAttribute('data-tab') + '-content';

                    // Remove active class from all buttons
                    tabButtons.forEach(btn => {
                        btn.classList.remove('tab-active', 'bg-primary', 'text-white');
                        btn.classList.add('tab-inactive', 'text-gray-700');
                        btn.style.backgroundColor = '';
                        btn.style.color = '';
                    });

                    // Add active class to clicked button
                    this.classList.remove('tab-inactive', 'text-gray-700');
                    this.classList.add('tab-active', 'bg-primary', 'text-white');
                    this.style.backgroundColor = '#3B82F6';
                    this.style.color = 'white';

                    // Hide all tab contents
                    tabContents.forEach(content => {
                        content.classList.add('hidden');
                        content.style.display = 'none';
                    });

                    // Show target content
                    const targetContent = document.getElementById(targetTabId);
                    if (targetContent) {
                        targetContent.classList.remove('hidden');
                        targetContent.style.display = 'block';

                        // Force repaint
                        targetContent.offsetHeight;
                    } else {}
                });
            });

            // Initialize first tab as active
            if (tabButtons.length > 0) {
                // Make sure first tab is properly active
                const firstTab = tabButtons[0];
                const firstTabId = firstTab.getAttribute('data-tab') + '-content';
                const firstContent = document.getElementById(firstTabId);

                if (firstContent) {
                    firstContent.classList.remove('hidden');
                    firstContent.style.display = 'block';
                }

                firstTab.classList.add('tab-active');
                firstTab.style.backgroundColor = '#3B82F6';
                firstTab.style.color = 'white';
            }
        });
    </script>


    <script>


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
