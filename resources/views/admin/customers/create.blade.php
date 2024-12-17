@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Our Customer') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.Create Our Customer') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.customer.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Name Field -->
                    <div class="form-group">
                        <label for="name">{{ __('admin.Name') }}</label>
                        <input
                            name="name"
                            type="text"
                            class="form-control"
                            id="name"
                            placeholder="{{ __('admin.Enter customer name') }}"
                            value="{{ old('name') }}"
                            required
                        >
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image Upload Field -->
                    <div class="form-group">
                        <label for="image">{{ __('admin.Image') }}</label>
                        <input
                            type="file"
                            name="image"
                            id="image"
                            class="form-control"
                            accept="image/*"
                            required
                        >
                        @error('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- URL Field -->
                    <div class="form-group">
                        <label for="url">{{ __('admin.URL') }}</label>
                        <input
                            name="url"
                            type="url"
                            class="form-control"
                            id="url"
                            placeholder="{{ __('admin.Enter customer URL') }}"
                            value="{{ old('url') }}"
                            required
                        >
                        @error('url')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">{{ __('admin.Create') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection
