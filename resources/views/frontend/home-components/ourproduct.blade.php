{{-- Our Product --}}
<div class="service_area" style="padding: 40px 0 40px 0">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title mb-50 text-center section-title">
                    <a href="{{ route('product') }}">
                        <h3>Market Sector</h3>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            {{-- Loop hanya untuk 5 kategori --}}
            @foreach ($categories->take(3) as $category)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="single_service">
                        <div class="thumb">
                            <img src="{{ $category->image ? asset($category->image) : asset('default-image.jpg') }}"
                                alt="{{ $category->name }}" class="img-fluid"
                                style="max-width: 100%; height: auto; object-fit: cover;" width="150px" />
                        </div>
                        <div class="service_info">
                            <h3>
                                <a href="{{ route('product', ['category' => $category->slug]) }}"
                                    class="{{ request('category') === $category->slug ? 'active' : '' }}">
                                    {{ $category->name }}
                                </a>
                            </h3>
                            <p>{{ $category->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            @endforeach


            @if ($categories->isEmpty())
                <div class="col-12">
                    <p class="text-center">No Market Sectors found.</p>
                </div>
            @endif




        </div>
        <a href="{{ route('product') }}" class="boxed-btn3" width="100%" style="display: block;">
            View More </a>
    </div>
</div>
{{-- End Our Product --}}
