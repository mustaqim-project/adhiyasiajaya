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
            @php
            $setting = App\Models\SettingLandingPage::first(); // Mengambil entri pertama
        @endphp

            <div class="card-body">

                <form action="{{ route('admin.setting_landing_page.update', ['id' => $setting->id]) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Gunakan metode PUT untuk update -->

                    <!-- ID (Hidden field) -->
                    <input type="hidden" name="id" value="{{ $setting->id }}">

                    <!-- Image Slide 1 -->
                    <div class="form-group">
                        <label for="image_slide1">{{ __('admin.Image Slide 1') }}</label>
                        <input type="file" name="image_slide1" class="form-control">
                        <input type="text" name="link_slide1" class="form-control"
                            value="{{ $setting->link_slide1 ?? '' }}"
                            placeholder="{{ __('admin.Link Slide 1') }}">
                        <textarea name="desc_slide1" class="form-control" placeholder="{{ __('admin.Description Slide 1') }}" cols="30"
                            rows="3">{{ $setting->desc_slide1 ?? '' }}</textarea>
                    </div>

                    <!-- Image Slide 2 -->
                    <div class="form-group">
                        <label for="image_slide2">{{ __('admin.Image Slide 2') }}</label>
                        <input type="file" name="image_slide2" class="form-control">
                        <input type="text" name="link_slide2" class="form-control"
                            value="{{ $setting->link_slide2 ?? '' }}"
                            placeholder="{{ __('admin.Link Slide 2') }}">
                        <textarea name="desc_slide2" class="form-control" placeholder="{{ __('admin.Description Slide 2') }}" cols="30"
                            rows="3">{{ $setting->desc_slide2 ?? '' }}</textarea>
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
