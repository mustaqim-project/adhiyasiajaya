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

    .search-box {
        width: 100%;
        padding: 12px 16px 12px 48px;
        border: 2px solid #e2e8f0;
        border-radius: 12px;
        font-size: 16px;
        transition: all 0.3s ease;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='%236b7280'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z'%3E%3C/path%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: 16px center;
        background-size: 20px;
    }

    .search-box:focus {
        outline: none;
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .light-bg {
        background: #f8fafc;
    }
</style>


 <!-- Page Header -->
    <section class="page-header">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl md:text-5xl font-bold mb-4 accent-orange">Our Products</h1>
            <p class="text-xl opacity-90 max-w-2xl mx-auto">
                Comprehensive range of API certified oilfield equipment and pulp & paper machinery
            </p>
        </div>
    </section>

    <!-- Search and Filter Section -->
    <section class="py-8 light-bg">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <!-- Search Bar -->
                <div class="mb-6">
                    <div class="relative">
                        <input type="text" id="searchInput" placeholder="Search products..." class="search-box pl-12">
                    </div>
                </div>

                <!-- Category Filters -->
                <div class="flex flex-wrap gap-4 justify-center">
                    <button class="filter-btn tab-btn tab-active" data-tab="all">
                        All Products
                    </button>

                    @foreach ($categories as $category)
                    <button class="filter-btn tab-btn tab-inactive" data-tab="category-{{ $category->id }}">
                        {{ $category->name }}
                    </button>
                    @endforeach
                </div>

                <!-- Results Count -->
                <div class="mt-4 text-center">
                    <span id="resultsCount" class="text-gray-600">Showing all products</span>
                </div>
            </div>
        </div>
    </section>

<!-- Product Section -->
<section id="products" class="section-padding bg-white">
    <div class="container mx-auto px-4">
        <!-- All Products Tab -->
        <div id="all-content" class="tab-content" style="display: block;">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="allProductsGrid">
                @foreach ($categories as $category)
                    @foreach ($category->news as $product)
                        <div class="product-card" data-category="category-{{ $category->id }}" data-name="{{ strtolower($product->title ?? '') }}" data-description="{{ strtolower(strip_tags($product->content ?? '')) }}">
                            <a href="{{ route('product-details', $product->slug) }}">
                                <div class="card-hover bg-white rounded-xl shadow-lg overflow-hidden border">
                                    <div class="h-48 bg-gradient-to-br from-blue-500 to-purple-500 flex items-center justify-center">
                                        @if ($product->image && file_exists(public_path($product->image)))
                                            <img src="{{ asset($product->image) }}" class="h-full w-full object-cover" alt="{{ $product->title ?? 'Product' }}">
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
                                            {!! $product->content ? Str::limit(strip_tags($product->content), 100) : 'No description available' !!}
                                        </p>
                                        <!-- Category Badge -->
                                        <div class="flex items-center justify-between">

                                            <span class="text-blue-600 font-semibold">
                                                View Details <i class="fas fa-arrow-right ml-1"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>

        <!-- Category-specific Tab Contents -->
        @foreach ($categories as $category)
            <div id="category-{{ $category->id }}-content" class="tab-content hidden">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    @foreach ($category->news as $product)
                        <div class="product-card category-product" data-category="category-{{ $category->id }}" data-name="{{ strtolower($product->title ?? '') }}" data-description="{{ strtolower(strip_tags($product->content ?? '')) }}">
                            <a href="{{ route('product-details', $product->slug) }}">
                                <div class="card-hover bg-white rounded-xl shadow-lg overflow-hidden border">
                                    <div class="h-48 bg-gradient-to-br from-blue-500 to-purple-500 flex items-center justify-center">
                                        @if ($product->image && file_exists(public_path($product->image)))
                                            <img src="{{ asset($product->image) }}" class="h-full w-full object-cover" alt="{{ $product->title ?? 'Product' }}">
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
                                            {!! $product->content ? Str::limit(strip_tags($product->content), 100) : 'No description available' !!}
                                        </p>
                                        <div class="flex items-center justify-between">

                                            <span class="text-blue-600 font-semibold">
                                                View Details <i class="fas fa-arrow-right ml-1"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        <!-- No Results Message -->
        <div id="noResults" class="text-center py-12 hidden">
            <div class="text-gray-400 text-6xl mb-4">
                <i class="fas fa-search"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-600 mb-2">No products found</h3>
            <p class="text-gray-500">Try adjusting your search criteria or browse all products</p>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');
    const searchInput = document.getElementById('searchInput');
    const resultsCount = document.getElementById('resultsCount');
    const noResults = document.getElementById('noResults');

    let currentTab = 'all';
    let currentSearchTerm = '';

    // Tab functionality
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetTab = this.getAttribute('data-tab');

            // Update current tab
            currentTab = targetTab;

            // Update button styles
            tabButtons.forEach(btn => {
                btn.classList.remove('tab-active');
                btn.classList.add('tab-inactive');
            });

            this.classList.remove('tab-inactive');
            this.classList.add('tab-active');

            // Hide all tab contents
            tabContents.forEach(content => {
                content.style.display = 'none';
            });

            // Show target content
            const targetContent = document.getElementById(targetTab + '-content');
            if (targetContent) {
                targetContent.style.display = 'block';
            }

            // Apply search filter to new tab
            applySearchFilter();
        });
    });

    // Search functionality
    searchInput.addEventListener('input', function(e) {
        currentSearchTerm = e.target.value.toLowerCase();
        applySearchFilter();
    });

    // Apply search filter function
    function applySearchFilter() {
        let visibleCount = 0;
        let hasResults = false;

        // Get current active tab content
        const activeTabContent = document.getElementById(currentTab + '-content');
        if (!activeTabContent) return;

        const productCards = activeTabContent.querySelectorAll('.product-card');

        productCards.forEach(card => {
            const name = card.getAttribute('data-name') || '';
            const description = card.getAttribute('data-description') || '';

            // Check if product matches search term
            const matchesSearch = currentSearchTerm === '' ||
                              name.includes(currentSearchTerm) ||
                              description.includes(currentSearchTerm);

            if (matchesSearch) {
                card.style.display = 'block';
                visibleCount++;
                hasResults = true;
            } else {
                card.style.display = 'none';
            }
        });

        // Update results count
        updateResultsCount(visibleCount);

        // Show/hide no results message
        if (!hasResults && currentSearchTerm !== '') {
            noResults.classList.remove('hidden');
        } else {
            noResults.classList.add('hidden');
        }
    }

    // Update results count display
    function updateResultsCount(count) {
        let message = '';

        if (currentSearchTerm && currentTab === 'all') {
            message = `Showing ${count} products for "${currentSearchTerm}"`;
        } else if (currentSearchTerm && currentTab !== 'all') {
            const categoryName = getCategoryDisplayName(currentTab);
            message = `Showing ${count} ${categoryName} products for "${currentSearchTerm}"`;
        } else if (currentTab === 'all') {
            message = `Showing all ${count} products`;
        } else {
            const categoryName = getCategoryDisplayName(currentTab);
            message = `Showing ${count} ${categoryName} products`;
        }

        resultsCount.textContent = message;
    }

    // Get display name for category
    function getCategoryDisplayName(tabId) {
        const button = document.querySelector(`[data-tab="${tabId}"]`);
        return button ? button.textContent.trim() : tabId;
    }

    // Initialize
    applySearchFilter();
});
</script>

@endsection
