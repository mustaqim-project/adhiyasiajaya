@extends('frontend.layouts.master')

<!-- Setting metas -->
@section('title', $news->title)
@section('meta_description', $news->meta_description)
@section('meta_og_title', $news->meta_title)
@section('meta_og_description', $news->meta_description)
@section('meta_og_image', asset($news->image))
@section('meta_tw_title', $news->meta_title)
@section('meta_tw_description', $news->meta_description)
@section('meta_tw_image', asset($news->image))
<!-- End Setting metas -->

@section('content')

    <!-- Breadcrumb -->
    <div class="bg-white border-b">
        <div class="container mx-auto px-4 py-4">
            <nav class="flex items-center space-x-2 text-sm text-gray-600">
                {{-- <a href="{{ route('/') }}" class="hover-accent">Home</a> --}}
                <a href="/" class="hover-accent">Home</a>
                <i class="fas fa-chevron-right text-xs"></i>
                <a href="{{ route('product') }}" class="hover-accent">Products</a>
                <i class="fas fa-chevron-right text-xs"></i>
                <span class="text-gray-400">{{ $news->title }}</span>
            </nav>
        </div>
    </div>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Product Content -->
            <article class="lg:w-2/3">
                <!-- Product Header -->
                <header class="mb-8">
                    <div class="flex items-center space-x-4 text-sm text-gray-600 mb-4">
                        <span class="custom-accent text-white px-3 py-1 rounded-full text-xs font-semibold">
                            {{ $news->category->name }}
                        </span>
                        <span><i class="far fa-calendar mr-2"></i>{{ $news->created_at->format('F d, Y') }}</span>
                        <span><i class="far fa-eye mr-2"></i>{{ number_format($news->views) }} views</span>
                    </div>

                    <h1 class="text-4xl font-bold text-primary mb-4 leading-tight">
                        {{ $news->title }}
                    </h1>

                    <p class="text-xl text-gray-600 mb-6">
                        {{ $news->excerpt }}
                    </p>

                    <!-- Author Info -->
                    <div class="flex items-center space-x-4 pb-6 border-b">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-900 to-orange-500 rounded-full flex items-center justify-center text-white font-bold">
                            <i class="fas fa-user"></i>
                        </div>
                        <div>
                            <p class="font-semibold text-primary">Technical Team</p>
                            <p class="text-sm text-gray-600">PT Adhya Asia Jaya Engineering Department</p>
                        </div>
                    </div>
                </header>

                <!-- Social Share -->
                <div class="flex items-center space-x-4 mb-8 no-print">
                    <span class="text-gray-600 font-medium">Share:</span>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" class="share-button bg-blue-600 text-white p-2 rounded-full hover:bg-blue-700">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?text={{ $news->title }}&url={{ url()->current() }}" target="_blank" class="share-button bg-blue-400 text-white p-2 rounded-full hover:bg-blue-500">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}&title={{ $news->title }}" target="_blank" class="share-button bg-blue-700 text-white p-2 rounded-full hover:bg-blue-800">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://wa.me/?text={{ $news->title }}%20{{ url()->current() }}" target="_blank" class="share-button bg-green-500 text-white p-2 rounded-full hover:bg-green-600">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <button onclick="copyToClipboard('{{ url()->current() }}')" class="share-button bg-gray-600 text-white p-2 rounded-full hover:bg-gray-700">
                        <i class="fas fa-link"></i>
                    </button>
                </div>

                <!-- Featured Image -->
                <div class="mb-8">
                    <img src="{{ asset($news->image) }}" alt="{{ $news->title }}" class="w-full h-64 md:h-96 object-cover rounded-lg shadow-lg">
                </div>

                <!-- Product Body -->
                <div class="article-content prose prose-lg max-w-none">
                    {!! $news->content !!}
                </div>

                <!-- Tags -->
                @if($news->tags)
                <div class="flex flex-wrap gap-2 my-8">
                    @foreach(explode(',', $news->tags) as $tag)
                    <span class="bg-gray-200 px-3 py-1 rounded-full text-sm text-gray-700">#{{ trim($tag) }}</span>
                    @endforeach
                </div>
                @endif

                <!-- Navigation -->
                <div class="flex justify-between items-center my-8 border-t border-b py-4">
                    @if($previousPost)
                    <a href="{{ route('product-details', $previousPost->slug) }}" class="text-primary hover:text-accent">
                        <i class="fas fa-arrow-left mr-2"></i> Previous: {{ $previousPost->title }}
                    </a>
                    @endif

                    @if($nextPost)
                    <a href="{{ route('product-details', $nextPost->slug) }}" class="text-primary hover:text-accent">
                        Next: {{ $nextPost->title }} <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                    @endif
                </div>
            </article>

            <!-- Sidebar -->
            <aside class="lg:w-1/3">
                <!-- Newsletter Signup -->
                <div class="bg-white p-6 rounded-lg shadow-md border mb-8 no-print">
                    <h3 class="text-lg font-bold text-primary mb-4">Stay Updated</h3>
                    <p class="text-gray-600 mb-4">Get the latest product updates and technical articles delivered to your inbox.</p>
                    <form class="space-y-3">
                        <input type="email" placeholder="Your email address" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <button type="submit" class="w-full custom-accent text-white py-3 rounded-lg font-semibold hover:bg-orange-600 transition-colors">
                            Subscribe
                        </button>
                    </form>
                </div>

                {{-- <!-- Related Products -->
                <div class="bg-white p-6 rounded-lg shadow-md border mb-8">
                    <h3 class="text-lg font-bold text-primary mb-6">Related Products</h3>
                    <div class="space-y-6">
                        @foreach($relatedProducts as $related)
                        <article class="related-card p-4 border rounded-lg transition-all cursor-pointer hover:shadow-md">
                            <a href="{{ route('product-details', $related->slug) }}">
                                <img src="{{ asset($related->image) }}" alt="{{ $related->title }}" class="w-full h-32 object-cover rounded mb-3">
                                <h4 class="font-semibold text-primary mb-2 hover:text-accent">{{ $related->title }}</h4>
                                <p class="text-sm text-gray-600 mb-2">{{ $related->excerpt }}</p>
                                <div class="flex items-center text-xs text-gray-500">
                                    <i class="far fa-calendar mr-1"></i>{{ $related->created_at->format('M d, Y') }}
                                </div>
                            </a>
                        </article>
                        @endforeach
                    </div>
                </div> --}}

                <!-- Categories -->
                <div class="bg-white p-6 rounded-lg shadow-md border mb-8">
                    <h3 class="text-lg font-bold text-primary mb-4">Categories</h3>
                    <div class="space-y-2">
                        @foreach($categories as $category)
                        <a href="{{ route('product', ['category' => $category->slug]) }}" class="flex justify-between items-center py-2 px-3 rounded hover:bg-gray-50 text-gray-700 hover:text-accent">
                            <span>{{ $category->name }}</span>
                            <span class="text-xs bg-gray-200 px-2 py-1 rounded-full">{{ $category->products_count }}</span>
                        </a>
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>
    </main>

    <script>
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                alert('Link copied to clipboard!');
            }, function(err) {
                console.error('Could not copy text: ', err);
            });
        }
    </script>
@endsection
