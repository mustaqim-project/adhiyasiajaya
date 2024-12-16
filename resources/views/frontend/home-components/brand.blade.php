{{-- Our Product --}}
<div class="service_area" style="padding: 40px 0 40px 0">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title mb-50 text-center section-title">
                    <a href="{{ route('brand') }}">
                        <h3>Brands</h3>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($brands->take(9) as $brand)
                <div class="col-md-6 col-lg-4 mb-4 brand-item">
                    <div class="single_service">
                        <a href="{{ route('brand', ['brand' => $brand->slug]) }}"
                            class="{{ request('brand') === $brand->slug ? 'active' : '' }}">
                            <div class="thumb">
                                <img src="{{ $brand->image ? asset($brand->image) : asset('default-image.jpg') }}"
                                    alt="{{ $brand->name }}" class="img-fluid"
                                    style="max-width: 100%; height: auto; object-fit: cover;" width="150" />
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
            @if ($categories->isEmpty())
                <div class="col-12">
                    <p class="text-center">No Brands found.</p>
                </div>
            @endif
        </div>

        <a href="{{ route('brand') }}" class="boxed-btn3" width="100%" style="display: block;">
            View More </a>
    </div>
</div>
{{-- End Our Product --}}
