@extends('frontend.layouts.master')

@section('content')
    <!-- Contact Header -->
    <section class="quick-contact">
        <div class="container">
            <h2 class="accent-orange">Contact Us</h2>
            <p>Let's discuss your industrial equipment needs and how we can serve you better</p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container">
            <div class="contact-grid">
                <!-- Contact Form -->
                <div class="contact-form fade-in">
                    <h2>Send Us a Message</h2>
                    <p class="subtitle">Fill out the form below and we'll get back to you within 24 hours</p>
                    <form id="contactForm" action="{{ route('contact.submit') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="fullName" class="form-label">Full Name <span class="required">*</span></label>
                            <input type="text" id="fullName" name="fullName" class="form-input" value="{{ old('fullName') }}" required>
                            @error('fullName')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="company" class="form-label">Company Name <span class="required">*</span></label>
                            <input type="text" id="company" name="company" class="form-input" value="{{ old('company') }}" required>
                            @error('company')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email Address <span class="required">*</span></label>
                            <input type="email" id="email" name="email" class="form-input" value="{{ old('email') }}" required>
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" id="phone" name="phone" class="form-input" value="{{ old('phone') }}">
                            @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="subject" class="form-label">Subject <span class="required">*</span></label>
                            <select id="subject" name="subject" class="form-input" required>
                                <option value="">Select a subject</option>
                                <option value="product-inquiry" {{ old('subject') == 'product-inquiry' ? 'selected' : '' }}>Product Inquiry</option>
                                <option value="quote-request" {{ old('subject') == 'quote-request' ? 'selected' : '' }}>Quote Request</option>
                                <option value="technical-support" {{ old('subject') == 'technical-support' ? 'selected' : '' }}>Technical Support</option>
                                <option value="partnership" {{ old('subject') == 'partnership' ? 'selected' : '' }}>Partnership Opportunity</option>
                                <option value="general" {{ old('subject') == 'general' ? 'selected' : '' }}>General Question</option>
                            </select>
                            @error('subject')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="message" class="form-label">Message <span class="required">*</span></label>
                            <textarea id="message" name="message" class="form-input form-textarea" rows="5" placeholder="Please describe your inquiry in detail..." required>{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="submit-btn">
                            <i class="fas fa-paper-plane"></i> Send Message
                        </button>
                    </form>
                </div>

                <!-- Contact Info -->
                <div class="contact-info fade-in">
                    <h2>Get in Touch</h2>

                    <div class="info-item">
                        <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div class="info-content">
                            <h3>Head Office</h3>
                            <p>{{ @$contact->address ?? 'Jl. Industri Raya No. 123, Bekasi Industrial Area, Bekasi 17530, Indonesia' }}</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon"><i class="fas fa-phone"></i></div>
                        <div class="info-content">
                            <h3>Phone & WhatsApp</h3>
                            <p>Phone: <a href="tel:{{ @$contact->phone ?? '+62218901234' }}">{{ @$contact->phone ?? '+62 21 8901 234' }}</a><br>
                               WhatsApp: <a href="https://wa.me/{{ @$contact->whatsapp ?? '6281234567890' }}" target="_blank">{{ @$contact->whatsapp ?? '+62 812 3456 7890' }}</a>
                            </p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon"><i class="fas fa-envelope"></i></div>
                        <div class="info-content">
                            <h3>Email</h3>
                            <p>
                                <a href="mailto:{{ @$contact->email ?? 'info@example.com' }}">{{ @$contact->email ?? 'info@example.com' }}</a>
                            </p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon"><i class="fas fa-clock"></i></div>
                        <div class="info-content">
                            <h3>Business Hours</h3>
                            <p>Mon - Fri: 8:00 AM - 5:00 PM<br>Sat: 8:00 AM - 12:00 PM<br>Sun: Closed</p>
                        </div>
                    </div>

                    <div class="social-links">
                        <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- <!-- Map -->
    <section class="map-section">
        <div class="container">
            <h2>Find Our Location</h2>
            <div class="map-container">
                <iframe class="map-frame" src="https://www.google.com/maps/embed?pb=!1m18!1m12..." loading="lazy" allowfullscreen></iframe>
            </div>
        </div>
    </section> --}}

    <!-- Quick Contact -->
    <section class="quick-contact">
        <div class="container">
            <h2 class="accent-orange">Need Immediate Assistance?</h2>
            <p>Our team is ready to help you with your industrial equipment needs</p>
            <div class="quick-buttons">
                <a href="https://wa.me/{{ @$contact->phone ?? '6281234567890' }}" class="quick-btn" target="_blank">
                    <i class="fab fa-whatsapp"></i> WhatsApp Us
                </a>
                <a href="mailto:{{ @$contact->email ?? 'info@example.com' }}" class="quick-btn">
                    <i class="fas fa-envelope"></i> Email Us
                </a>
            </div>
        </div>
    </section>
@endsection
