@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Category') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.Create Category') }}</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Language Field -->
                    <div class="form-group">
                        <label for="language-select">{{ __('admin.Language') }}</label>
                        <select name="language" id="language-select" class="form-control select2" required>
                            <option value="" disabled selected>--{{ __('admin.Select') }}--</option>
                            @foreach ($languages as $lang)
                                <option value="{{ $lang->lang }}" {{ old('language') == $lang->lang ? 'selected' : '' }}>
                                    {{ $lang->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('language')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Name Field -->
                    <div class="form-group">
                        <label for="name">{{ __('admin.Name') }}</label>
                        <input
                            name="name"
                            type="text"
                            class="form-control"
                            id="name"
                            placeholder="{{ __('admin.Enter brand name') }}"
                            value="{{ old('name') }}"
                            required
                        >
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Show at Nav Field -->
                    {{-- <div class="form-group">
                        <label for="show_at_nav">{{ __('admin.Show at Nav') }}</label>
                        <select name="show_at_nav" id="show_at_nav" class="form-control" required>
                            <option value="0" {{ old('show_at_nav') == '0' ? 'selected' : '' }}>{{ __('admin.No') }}</option>
                            <option value="1" {{ old('show_at_nav') == '1' ? 'selected' : '' }}>{{ __('admin.Yes') }}</option>
                        </select>
                        @error('show_at_nav')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div> --}}

                    <!-- Status Field -->
                    <div class="form-group">
                        <label for="status">{{ __('admin.Status') }}</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>{{ __('admin.Active') }}</option>
                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>{{ __('admin.Inactive') }}</option>
                        </select>
                        @error('status')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Image Upload Field (Optional) -->
                    <div class="form-group">
                        <label for="image">{{ __('admin.Image') }}</label>
                        <input
                            type="file"
                            name="image"
                            id="image"
                            class="form-control"
                            accept="image/*"
                        >
                        @error('image')
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
