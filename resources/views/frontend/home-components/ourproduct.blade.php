{{-- Our Product --}}
<div class="service_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title mb-50 text-center">
                    <a href="{{ route('product') }}">
                        <h3>Market Sector</h3>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            {{-- Fetch only 5 categories --}}
            @foreach ($categories->take(5) as $category)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="single_service">
                        <div class="thumb">
                            <img
                                src="{{ $category->image ? asset($category->image) : asset('default-image.jpg') }}"
                                alt="{{ $category->name }}"
                                class="img-fluid"
                                style="max-width: 100%; height: auto; object-fit: cover;" />
                        </div>
                        <div class="service_info">
                            <h3><a href="#">{{ $category->name }}</a></h3>
                            <p>{{ $category->deskripsi ?? 'No description available.' }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

            {{-- No categories fallback --}}
            @if ($categories->isEmpty())
                <div class="col-12">
                    <p class="text-center mt-4 mb-4">No categories found.</p>
                </div>
            @endif

            {{-- Our Product Button --}}
            <div class="col-12 text-center mt-4">
                <a href="{{ route('product') }}" class="btn btn-primary btn-our-product">
                    Our Product
                </a>
            </div>
        </div>
    </div>
</div>
{{-- End Our Product --}}
