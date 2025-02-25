@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Brand') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.Update Brand') }}</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Language Field -->
                    <div class="form-group">
                        <label for="language-select">{{ __('admin.Language') }}</label>
                        <select name="language" id="language-select" class="form-control select2" required>
                            <option value="" disabled>--{{ __('admin.Select') }}--</option>
                            @foreach ($languages as $lang)
                                <option value="{{ $lang->lang }}"
                                    {{ old('language', $brand->language) === $lang->lang ? 'selected' : '' }}>
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
                        <input name="name" type="text" class="form-control" id="name"
                            placeholder="{{ __('admin.Enter brand name') }}" value="{{ old('name', $brand->name) }}"
                            required>
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Status Field -->
                    <div class="form-group">
                        <label for="status">{{ __('admin.Status') }}</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="1" {{ old('status', $brand->status) == 1 ? 'selected' : '' }}>
                                {{ __('admin.Active') }}
                            </option>
                            <option value="0" {{ old('status', $brand->status) == 0 ? 'selected' : '' }}>
                                {{ __('admin.Inactive') }}
                            </option>
                        </select>
                        @error('status')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image-upload">{{ __('admin.Image') }}</label>
                        @if (!empty($brand->image))
                            <small class="form-text text-muted">
                                {{ __('admin.Current Image') }}:
                                <img src="{{ asset($brand->image) }}" alt="{{ $brand->name }}" width="100"
                                    class="img-thumbnail mt-2">
                            </small>
                        @endif
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label" class="btn btn-primary">
                                {{ __('admin.Choose File') }}
                            </label>
                            <input type="file" name="image" id="image-upload" class="form-control-file"
                                accept="image/*">
                        </div>

                        @error('image')
                            <p class="text-danger mt-2">{{ $message }}</p>
                        @enderror
                    </div>


                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">{{ __('admin.Update') }}</button>
                </form>

            </div>
        </div>
    </section>
@endsection
