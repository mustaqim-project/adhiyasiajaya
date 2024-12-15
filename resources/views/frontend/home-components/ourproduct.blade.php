{{-- Our Product --}}

<div class="service_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title mb-50 text-center">
                    <h3>
                        Market Sector
                    </h3>
                </div>
            </div>
        </div>
        <div class="row">
            {{-- Ambil hanya 5 kategori --}}
            @foreach ($categories as $category)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="single_service">
                        <div class="thumb">
                            <!-- Pastikan gambar ada, jika tidak tampilkan gambar default -->
                            <img src="{{ $category->image ? asset($category->image) : asset('default-image.jpg') }}"
                                alt="{{ $category->name }}" class="img-fluid" />
                        </div>
                        <div class="service_info">
                            <h3>
                                <a href="#">
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
                    <p class="text-center">No categories found.</p>
                </div>
            @endif

            <div class="col-md-6 col-lg-4">
                <div class="single_service">
                    <div class="service_info">
                        <button class="btn-our-product">
                            Our Product
                        </button>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
{{-- End Our Product --}}
