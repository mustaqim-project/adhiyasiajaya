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

    <!-- bradcam_area  -->
    <div class="bradcam_area bradcam_area2  bradcam_bg_2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Ocean Freight</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <!-- service_details_start  -->
    <div class="service_details_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="service_details_left">
                        <h3>Services</h3>
                        <div class="nav nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class=" active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
                                aria-controls="v-pills-home" aria-selected="true">Ocean Freight</a>
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

    <!-- Estimate_area start  -->
    <div class="Estimate_area overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-5">
                    <div class="Estimate_info">
                        <h3>Get free Estimate</h3>
                        <p>Esteem spirit temper too say adieus who direct esteem. It look estee luckily or picture
                            placing.</p>
                        <a href="#" class="boxed-btn3">+10 672 457 356</a>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-7">
                    <div class="form">
                        <form action="#">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="input_field">
                                        <input type="text" placeholder="Your name">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="input_field">
                                        <input type="email" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="input_field">
                                        <select class="wide">
                                            <option data-display="Product type">Product type</option>
                                            <option value="1">small</option>
                                            <option value="2">standard</option>
                                            <option value="3">high</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="input_field">
                                        <select class="wide">
                                            <option data-display="Product size">Product size</option>
                                            <option value="1">M</option>
                                            <option value="2">L</option>
                                            <option value="3">Xl</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="input_field">
                                        <select class="wide">
                                            <option data-display="City of departure">City of departure</option>
                                            <option value="1">departure</option>
                                            <option value="2">departure</option>
                                            <option value="3">departure</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="input_field">
                                        <select class="wide">
                                            <option data-display="Delivery city">City of departure</option>
                                            <option value="1">Delivery</option>
                                            <option value="2">Delivery</option>
                                            <option value="3">Delivery</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="input_field">
                                        <textarea placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="input_field">
                                        <button class="boxed-btn3-line" type="submit">Send Estimate</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Estimate_area end  -->

    <!-- contact_location  -->
    <div class="contact_location">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="location_left">
                        <div class="logo">
                            <a href="index.html">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                        <ul>
                            <li><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                            <li><a href="#"> <i class="fa fa-google-plus"></i> </a></li>
                            <li><a href="#"> <i class="fa fa-twitter"></i> </a></li>
                            <li><a href="#"> <i class="fa fa-youtube"></i> </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3">
                    <div class="single_location">
                        <h3> <img src="img/icon/address.svg" alt=""> Location</h3>
                        <p>600/D, Kings road, Green lane
                            NewYork-2563</p>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3">
                    <div class="single_location">
                        <h3> <img src="img/icon/support.svg" alt=""> Location</h3>
                        <p>+10 267 3563 4562 <br>
                            support@logistico.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ contact_location  -->

@endsection

@push('content')
    <script>
        $(document).ready(function() {
            $('.delete-msg').on('click', function(e) {
                e.preventDefault();
                let id = $(this).data('id');
                Swal.fire({
                    title: '{{ __('frontend.Are you sure?') }}',
                    text: "{{ __("frontend.You won'\t be able to revert this!") }}",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '{{ __('frontend.Yes, delete it!') }}'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            method: 'DELETE',
                            url: "{{ route('news-comment-destroy') }}",
                            data: {
                                id: id
                            },
                            success: function(data) {
                                if (data.status === 'success') {
                                    Swal.fire(
                                        'Deleted!',
                                        data.message,
                                        'success'
                                    )
                                    window.location.reload();
                                } else if (data.status === 'error') {
                                    Swal.fire(
                                        'Error!',
                                        data.message,
                                        'error'
                                    )
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });


                    }
                })
            })

        })
    </script>
@endpush
