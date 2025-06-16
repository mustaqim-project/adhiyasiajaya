    <header class="bg-white shadow-lg sticky top-0 z-50 no-print">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between py-4">
                <!-- Logo -->
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-primary rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-xl">AAJ</span>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold primary-blue" style="margin-bottom: 0;">PT ADHYA ASIA JAYA</h1>
                        <p class="text-sm text-gray-600" style="margin: 0;">We Serve You Better</p>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <nav class="desktop-menu">
                    <ul class="flex items-center space-x-8">
                        <li><a href="/" class="nav-link">Home</a></li>
                        <li><a href="/about" class="nav-link">About Us</a></li>
                        <li><a href="/product" class="nav-link">Products</a></li>
                        {{-- <li><a href="/customer" class="nav-link">Customers</a></li> --}}
                        {{-- <li><a href="blog.html" class="nav-link">Blog</a></li> --}}
                        {{-- <li><a href="contact.html" class="nav-link">Contact</a></li> --}}
                        <li><a href="/contact" class="btn-primary">Get a Quote</a></li>
                    </ul>
                </nav>

                <!-- Mobile Menu Button -->
                <button class="mobile-menu-btn text-2xl primary-blue" id="mobile-menu-btn">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </header>

     <!-- Mobile Menu -->
    <div class="mobile-menu lg:hidden" id="mobile-menu">
        <div class="p-4">
            <button class="absolute top-4 right-4 text-gray-700" id="close-mobile-menu">
                <i class="fas fa-times text-xl"></i>
            </button>
            <div class="mt-12 space-y-2">
                <a href="#home" class="block px-4 py-3 text-lg text-gray-700 hover:bg-gray-100">Home</a>
                <a href="#about" class="block px-4 py-3 text-lg text-gray-700 hover:bg-gray-100">About Us</a>
                <a href="#products" class="block px-4 py-3 text-lg text-gray-700 hover:bg-gray-100">Products</a>
                <a href="#customers" class="block px-4 py-3 text-lg text-gray-700 hover:bg-gray-100">Customers</a>
                <a href="#contact" class="block px-4 py-3 text-lg text-gray-700 hover:bg-gray-100">Contact</a>
                <a href="#quote" class="block px-4 py-3 text-lg bg-accent-orange text-white rounded-md mt-4">Get a
                    Quote</a>
            </div>
        </div>
    </div>
