<!-- Estimate_area start  -->
<div class="Estimate_area overlay">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-5">
                <div class="Estimate_info">
                    <h3>Get Request</h3>
                    <p>Esteem spirit temper too say adieus who direct esteem. It look estee luckily or picture
                        placing.</p>
                    <a href="tel:{{ @$contact->phone }}" class="boxed-btn3">
                        {{ @$contact->phone ?? '00-0000-0000-0000' }}
                    </a>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-7">
                <div class="form">
                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group form-group-name">
                                    <label>{{ __('frontend.Your email') }} <span class="required"></span></label>
                                    <input type="email" class="form-control" name="email" required="">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group form-group-name">
                                    <label>{{ __('frontend.Subject') }} <span class="required"></span></label>
                                    <input type="text" class="form-control" name="subject" required="">
                                    @error('subject')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('frontend.Your message') }} </label>
                                    <textarea class="form-control" rows="8" name="message"></textarea>
                                    @error('message')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <button type="submit" class="btn btn-primary">{{ __('frontend.Submit') }}</button>
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
