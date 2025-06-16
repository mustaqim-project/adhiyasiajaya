@extends('frontend.layouts.master')

@section('content')
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

                    <form id="contactForm">
                        <div class="form-group">
                            <label for="fullName" class="form-label">Full Name <span class="required">*</span></label>
                            <input type="text" id="fullName" name="fullName" class="form-input" required>
                        </div>

                        <div class="form-group">
                            <label for="company" class="form-label">Company Name <span class="required">*</span></label>
                            <input type="text" id="company" name="company" class="form-input" required>
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email Address <span class="required">*</span></label>
                            <input type="email" id="email" name="email" class="form-input" required>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" id="phone" name="phone" class="form-input">
                        </div>

                        <div class="form-group">
                            <label for="subject" class="form-label">Subject <span class="required">*</span></label>
                            <select id="subject" name="subject" class="form-input" required>
                                <option value="">Select a subject</option>
                                <option value="product-inquiry">Product Inquiry</option>
                                <option value="quote-request">Quote Request</option>
                                <option value="technical-support">Technical Support</option>
                                <option value="partnership">Partnership Opportunity</option>
                                <option value="general">General Question</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="message" class="form-label">Message <span class="required">*</span></label>
                            <textarea id="message" name="message" class="form-input form-textarea" rows="5"
                                placeholder="Please describe your inquiry in detail..." required></textarea>
                        </div>

                        <button type="submit" class="submit-btn">
                            <i class="fas fa-paper-plane"></i> Send Message
                        </button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="contact-info fade-in">
                    <h2>Get in Touch</h2>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="info-content">
                            <h3>Head Office</h3>
                            <p>Jl. Industri Raya No. 123<br>
                                Bekasi Industrial Area<br>
                                Bekasi 17530, West Java, Indonesia</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="info-content">
                            <h3>Phone & WhatsApp</h3>
                            <p>Phone: <a href="tel:+62218901234">+62 21 8901 234</a><br>
                                WhatsApp: <a href="https://wa.me/6281234567890" target="_blank">+62 812 3456 7890</a>
                            </p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="info-content">
                            <h3>Email</h3>
                            <p>General: <a
                                    href="/cdn-cgi/l/email-protection#97fef9f1f8d7f6f3ffeef6f6e4fef6fdf6eef6b9f4f8fa"><span
                                        class="__cf_email__"
                                        data-cfemail="234a4d454c6342474b5a4242504a4249425a420d404c4e">[email&#160;protected]</span></a><br>
                                Sales: <a
                                    href="/cdn-cgi/l/email-protection#e49785888197a485808c9d8585978d858e859d85ca878b89"><span
                                        class="__cf_email__"
                                        data-cfemail="0675676a63754667626e7f6767756f676c677f672865696b">[email&#160;protected]</span></a>
                            </p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="info-content">
                            <h3>Business Hours</h3>
                            <p>Monday - Friday: 8:00 AM - 5:00 PM<br>
                                Saturday: 8:00 AM - 12:00 PM<br>
                                Sunday: Closed</p>
                        </div>
                    </div>

                    <div class="social-links">
                        <a href="#" class="social-link" title="LinkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="social-link" title="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-link" title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="social-link" title="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-link" title="YouTube">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Map Section -->
    <section class="map-section">
        <div class="container">
            <h2>Find Our Location</h2>
            <div class="map-container">
                <iframe class="map-frame"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126920.31516282222!2d106.99003827163956!3d-6.238824699999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e698b742c687b7%3A0x5c2bc40d5d8b8d75!2sBekasi%2C%20West%20Java%2C%20Indonesia!5e0!3m2!1sen!2sid!4v1703123456789!5m2!1sen!2sid"
                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </section>

    <!-- Quick Contact CTA -->
    <section class="quick-contact">
        <div class="container">
            <h2 class="accent-orange">Need Immediate Assistance?</h2>
            <p>Our team is ready to help you with your industrial equipment needs</p>
            <div class="quick-buttons">
                <a href="https://wa.me/6281234567890" class="quick-btn" target="_blank">
                    <i class="fab fa-whatsapp"></i> WhatsApp Us
                </a>
                <a href="tel:+62218901234" class="quick-btn">
                    <i class="fas fa-phone"></i> Call Now
                </a>
                <a href="/cdn-cgi/l/email-protection#6013010c0513200104081901011309010a0119014e030f0d"
                    class="quick-btn">
                    <i class="fas fa-envelope"></i> Email Us
                </a>
            </div>
        </div>
    </section>
@endsection
