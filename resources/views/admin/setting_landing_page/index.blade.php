@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Setting Landing Page') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.Setting Landing Page') }}</h4>
            </div>

            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                    <!-- Add dynamic tabs if needed for different languages -->
                </ul>
                <div class="tab-content tab-bordered" id="myTab3Content">
                    @php
                        $setting = SettingLandingPage::first(); // Get the first setting
                    @endphp
                    <div class="tab-pane fade show {{ $loop->index === 0 ? 'active' : '' }}" id="home-{{ $language->lang }}"
                        role="tabpanel" aria-labelledby="home-tab2">
                        <div class="card-body">
                            <form action="{{ route('admin.footer-info.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <!-- Logo Field -->
                                <div class="form-group">
                                    <img src="{{ asset(@$setting->logo) }}" width="100px" alt=""><br>
                                    <label for="logo">{{ __('admin.Logo') }}</label>
                                    <input type="file" name="logo" class="form-control">
                                </div>

                                <!-- Short Description Field -->
                                <div class="form-group">
                                    <label for="description">{{ __('admin.Short Description') }}</label>
                                    <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{ @$setting->description }}</textarea>
                                </div>

                                <!-- Copyright Text Field -->
                                <div class="form-group">
                                    <label for="copyright">{{ __('admin.Copyright text') }}</label>
                                    <input type="text" name="copyright" class="form-control" value="{{ @$setting->copyright }}">
                                </div>

                                <!-- Image Slide 1 -->
                                <div class="form-group">
                                    <label for="image_slide1">{{ __('admin.Image Slide 1') }}</label>
                                    <input type="file" name="image_slide1" class="form-control">
                                    <input type="text" name="link_slide1" class="form-control" value="{{ @$setting->link_slide1 }}" placeholder="{{ __('admin.Link Slide 1') }}">
                                    <textarea name="desc_slide1" class="form-control" placeholder="{{ __('admin.Description Slide 1') }}" cols="30" rows="3">{{ @$setting->desc_slide1 }}</textarea>
                                </div>

                                <!-- Image Slide 2 -->
                                <div class="form-group">
                                    <label for="image_slide2">{{ __('admin.Image Slide 2') }}</label>
                                    <input type="file" name="image_slide2" class="form-control">
                                    <input type="text" name="link_slide2" class="form-control" value="{{ @$setting->link_slide2 }}" placeholder="{{ __('admin.Link Slide 2') }}">
                                    <textarea name="desc_slide2" class="form-control" placeholder="{{ __('admin.Description Slide 2') }}" cols="30" rows="3">{{ @$setting->desc_slide2 }}</textarea>
                                </div>

                                <!-- Image About -->
                                <div class="form-group">
                                    <label for="image_about">{{ __('admin.Image About') }}</label>
                                    <input type="file" name="image_about" class="form-control">
                                </div>

                                <!-- Background Contact -->
                                <div class="form-group">
                                    <label for="bg_contact">{{ __('admin.Background Contact') }}</label>
                                    <input type="file" name="bg_contact" class="form-control">
                                </div>

                                <!-- Image Header About -->
                                <div class="form-group">
                                    <label for="image_header_about">{{ __('admin.Image Header About') }}</label>
                                    <input type="file" name="image_header_about" class="form-control">
                                </div>

                                <!-- Image Header Product -->
                                <div class="form-group">
                                    <label for="image_header_product">{{ __('admin.Image Header Product') }}</label>
                                    <input type="file" name="image_header_product" class="form-control">
                                </div>

                                <!-- Image Header Contact -->
                                <div class="form-group">
                                    <label for="image_header_contact">{{ __('admin.Image Header Contact') }}</label>
                                    <input type="file" name="image_header_contact" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-primary">{{ __('admin.Save') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                Toast.fire({
                    icon: 'error',
                    title: "{{ $error }}"
                });
            @endforeach
        @endif
    </script>
@endpush