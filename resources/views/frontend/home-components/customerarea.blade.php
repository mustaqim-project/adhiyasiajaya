<div class="service_area" style="padding: 40px 0; background-color: #cedbf3 !important;">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title mb-50 text-center">
                    <h3>
                        Our Customer
                    </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="service_active owl-carousel">
                    @foreach ($customers as $customer )

                    <div class="single_service">
                        <div class="thumb">
                            <img src="<img src="{{ asset($customer->image) }}" alt="">" alt="">
                        </div>
                        <div class="service_info">
                            <h3><a href="{{ $customer->url }}">{{ $customer->name }}</a></h3>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
