@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Our Customer') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.Update Our Customer') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.customer.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Name Field -->
                    <div class="form-group">
                        <label for="name">{{ __('admin.Name') }}</label>
                        <input
                            name="name"
                            type="text"
                            class="form-control"
                            id="name"
                            placeholder="{{ __('admin.Enter customer name') }}"
                            value="{{ old('name', $customer->name) }}"
                            required
                        >
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image Upload (Optional) -->
                    <div class="form-group">
                        <label for="image">{{ __('admin.Image') }}</label>
                        <input
                            type="file"
                            name="image"
                            id="image"
                            class="form-control"
                            accept="image/*"
                        >
                        @if ($customer->image)
                            <small class="form-text text-muted">
                                {{ __('admin.Current Image') }}:
                                <img src="{{ asset($customer->image) }}" alt="{{ $customer->name }}" width="100">
                            </small>
                        @endif
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
                            value="{{ old('url', $customer->url) }}"
                            required
                        >
                        @error('url')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">{{ __('admin.Update') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection
