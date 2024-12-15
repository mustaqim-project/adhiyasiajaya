@extends('frontend.layouts.master')

@section('content')
    <!-- bradcam_area -->
    <div class="bradcam_area bradcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Our Product</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area -->

    {{-- <!-- service_area -->
    <div class="service_area">
        <div class="container">
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="single_service">
                            <div class="thumb">
                                <!-- Pastikan gambar ada, jika tidak tampilkan gambar default -->
                                <img src="{{ $category->image ? asset($category->image) : asset('default-image.jpg') }}"
                                     alt="{{ $category->name }}"
                                     class="img-fluid" />
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
            </div>
        </div>
    </div>
    <!--/ service_area --> --}}


      <!-- service_details_start  -->
      <div class="service_details_area">
        <div class="container">
            <div class="row">
                    <div class="col-lg-4 col-md-4">
                            <div class="service_details_left">
                                <h3>Services</h3>
                                <div class="nav nav-pills" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <a class=" active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home"
                                        role="tab" aria-controls="v-pills-home" aria-selected="true">Ocean Freight</a>
                                    <a class="" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile"
                                        role="tab" aria-controls="v-pills-profile" aria-selected="false">Land Transport</a>
                                    <a class="" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages"
                                        role="tab" aria-controls="v-pills-messages" aria-selected="false">Air Freight</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-8">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                    aria-labelledby="v-pills-home-tab">
                                    <div class="service_details_info">
                                        <h3>Service details</h3>
                                        <p>Esteem spirit temper too say adieus who direct esteem. It esteems luckily or
                                            picture
                                            placing drawing. Apartments frequently or motionless on reasonable sed do
                                            eiusmod tempor
                                            inciunt ut labore et dolore magna liqua.abore et dolore incididunt ut labore et
                                            dolore.
                                        </p>
                                        <p>Temper too say adieus who direct esteem. It esteems luckily or picture placing
                                            drawing.
                                            Apartments frequently or motionless on reasonable sed do eiusmod tempor inciunt
                                            ut
                                            labore et dolore magna liqua.abore et dolore incididunt ut labore et dolore.</p>
                                        <p>Adieus who direct esteem. It esteems luckily or picture placing drawing.
                                            Apartments
                                            frequently or motionless on reasonable sed do eiusmod tempor inciunt ut labore
                                            et dolore
                                            magna liqua.abore et dolore incididunt ut labore et dolore.</p>
                                    </div>
                                    <div class="service_thumb">
                                        <img class="img-fluid" src="img/service/service_details.png" alt="">
                                    </div>
                                    <div class="accordion_area">
                                        <div class="faq_ask">
                                            <h3>Frequently ask</h3>
                                            <div id="accordion">
                                                <div class="card">
                                                    <div class="card-header" id="headingTwo">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                                data-target="#collapseTwo" aria-expanded="false"
                                                                aria-controls="collapseTwo">
                                                                Adieus who direct esteem <span>It esteems
                                                                    luckily?</span>
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                                        data-parent="#accordion" style="">
                                                        <div class="card-body">Esteem spirit temper too say adieus who
                                                            direct esteem esteems luckily or picture placing drawing.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" id="headingOne">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                                data-target="#collapseOne" aria-expanded="false"
                                                                aria-controls="collapseOne">
                                                                Who direct esteem It esteems?
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                                        data-parent="#accordion" style="">
                                                        <div class="card-body">Esteem spirit temper too say adieus who
                                                            direct esteem esteems luckily or picture placing drawing.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" id="headingThree">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                                data-target="#collapseThree" aria-expanded="false"
                                                                aria-controls="collapseThree">
                                                                Duis consectetur feugiat auctor?
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                                        data-parent="#accordion" style="">
                                                        <div class="card-body">Esteem spirit temper too say adieus who
                                                            direct esteem esteems luckily or picture placing drawing.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="download_brochure d-flex align-items-center justify-content-between">
                                        <div class="download_left d-flex align-items-center">
                                            <div class="icon">
                                                <img src="img/svg_icon/download.svg" alt="">
                                            </div>
                                            <div class="download_text">
                                                <h3>Download Our Brochure</h3>
                                                <p>Esteem spirit temper too say adieus who direct.</p>
                                            </div>
                                        </div>
                                        <div class="download_right">
                                            <a class="boxed-btn3-line" href="#">Download Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                    aria-labelledby="v-pills-profile-tab">
                                    <div class="service_details_info">
                                        <h3>Service details</h3>
                                        <p>Esteem spirit temper too say adieus who direct esteem. It esteems luckily or
                                            picture
                                            placing drawing. Apartments frequently or motionless on reasonable sed do
                                            eiusmod tempor
                                            inciunt ut labore et dolore magna liqua.abore et dolore incididunt ut labore et
                                            dolore.
                                        </p>
                                        <p>Temper too say adieus who direct esteem. It esteems luckily or picture placing
                                            drawing.
                                            Apartments frequently or motionless on reasonable sed do eiusmod tempor inciunt
                                            ut
                                            labore et dolore magna liqua.abore et dolore incididunt ut labore et dolore.</p>
                                        <p>Adieus who direct esteem. It esteems luckily or picture placing drawing.
                                            Apartments
                                            frequently or motionless on reasonable sed do eiusmod tempor inciunt ut labore
                                            et dolore
                                            magna liqua.abore et dolore incididunt ut labore et dolore.</p>
                                    </div>
                                    <div class="service_thumb">
                                        <img class="img-fluid" src="img/service/service_details.png" alt="">
                                    </div>
                                    <div class="accordion_area">
                                        <div class="faq_ask">
                                            <h3>Frequently ask</h3>
                                            <div id="accordion">
                                                <div class="card">
                                                    <div class="card-header" id="headingTwo1">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                                data-target="#collapseTwo1" aria-expanded="false"
                                                                aria-controls="collapseTwo">
                                                                Adieus who direct esteem <span>It esteems
                                                                    luckily?</span>
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseTwo1" class="collapse" aria-labelledby="headingTwo1"
                                                        data-parent="#accordion" style="">
                                                        <div class="card-body">Esteem spirit temper too say adieus who
                                                            direct esteem esteems luckily or picture placing drawing.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" id="headingOne2">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                                data-target="#collapseOne2" aria-expanded="false"
                                                                aria-controls="collapseOne">
                                                                Who direct esteem It esteems?
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseOne2" class="collapse" aria-labelledby="headingOne2"
                                                        data-parent="#accordion" style="">
                                                        <div class="card-body">Esteem spirit temper too say adieus who
                                                            direct esteem esteems luckily or picture placing drawing.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" id="headingThree3">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                                data-target="#collapseThree3" aria-expanded="false"
                                                                aria-controls="collapseThree">
                                                                Duis consectetur feugiat auctor?
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseThree3" class="collapse" aria-labelledby="headingThree3"
                                                        data-parent="#accordion" style="">
                                                        <div class="card-body">Esteem spirit temper too say adieus who
                                                            direct esteem esteems luckily or picture placing drawing.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="download_brochure d-flex align-items-center justify-content-between">
                                        <div class="download_left d-flex align-items-center">
                                            <div class="icon">
                                                <img src="img/svg_icon/download.svg" alt="">
                                            </div>
                                            <div class="download_text">
                                                <h3>Download Our Brochure</h3>
                                                <p>Esteem spirit temper too say adieus who direct.</p>
                                            </div>
                                        </div>
                                        <div class="download_right">
                                            <a class="boxed-btn3-line" href="#">Download Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                    aria-labelledby="v-pills-messages-tab">
                                    <div class="service_details_info">
                                        <h3>Service details</h3>
                                        <p>Esteem spirit temper too say adieus who direct esteem. It esteems luckily or
                                            picture
                                            placing drawing. Apartments frequently or motionless on reasonable sed do
                                            eiusmod tempor
                                            inciunt ut labore et dolore magna liqua.abore et dolore incididunt ut labore et
                                            dolore.
                                        </p>
                                        <p>Temper too say adieus who direct esteem. It esteems luckily or picture placing
                                            drawing.
                                            Apartments frequently or motionless on reasonable sed do eiusmod tempor inciunt
                                            ut
                                            labore et dolore magna liqua.abore et dolore incididunt ut labore et dolore.</p>
                                        <p>Adieus who direct esteem. It esteems luckily or picture placing drawing.
                                            Apartments
                                            frequently or motionless on reasonable sed do eiusmod tempor inciunt ut labore
                                            et dolore
                                            magna liqua.abore et dolore incididunt ut labore et dolore.</p>
                                    </div>
                                    <div class="service_thumb">
                                        <img class="img-fluid" src="img/service/service_details.png" alt="">
                                    </div>
                                    <div class="accordion_area">
                                        <div class="faq_ask">
                                            <h3>Frequently ask</h3>
                                            <div id="accordion">
                                                <div class="card">
                                                    <div class="card-header" id="headingTwoa">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                                data-target="#collapseTwoa" aria-expanded="false"
                                                                aria-controls="collapseTwo">
                                                                Adieus who direct esteem <span>It esteems
                                                                    luckily?</span>
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseTwoa" class="collapse" aria-labelledby="headingTwoa"
                                                        data-parent="#accordion" style="">
                                                        <div class="card-body">Esteem spirit temper too say adieus who
                                                            direct esteem esteems luckily or picture placing drawing.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" id="headingOne">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                                data-target="#collapseOneb" aria-expanded="false"
                                                                aria-controls="collapseOneb">
                                                                Who direct esteem It esteems?
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseOneb" class="collapse" aria-labelledby="headingOneb"
                                                        data-parent="#accordion" style="">
                                                        <div class="card-body">Esteem spirit temper too say adieus who
                                                            direct esteem esteems luckily or picture placing drawing.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card">
                                                    <div class="card-header" id="headingThree">
                                                        <h5 class="mb-0">
                                                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                                                data-target="#collapseThreev" aria-expanded="false"
                                                                aria-controls="collapseThree">
                                                                Duis consectetur feugiat auctor?
                                                            </button>
                                                        </h5>
                                                    </div>
                                                    <div id="collapseThreev" class="collapse" aria-labelledby="headingThreev"
                                                        data-parent="#accordion" style="">
                                                        <div class="card-body">Esteem spirit temper too say adieus who
                                                            direct esteem esteems luckily or picture placing drawing.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="download_brochure d-flex align-items-center justify-content-between">
                                        <div class="download_left d-flex align-items-center">
                                            <div class="icon">
                                                <img src="img/svg_icon/download.svg" alt="">
                                            </div>
                                            <div class="download_text">
                                                <h3>Download Our Brochure</h3>
                                                <p>Esteem spirit temper too say adieus who direct.</p>
                                            </div>
                                        </div>
                                        <div class="download_right">
                                            <a class="boxed-btn3-line" href="#">Download Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
    </div>
    <!-- service_details_start  -->
@endsection
