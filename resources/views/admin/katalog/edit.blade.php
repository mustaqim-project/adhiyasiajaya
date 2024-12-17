@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Katalog') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.Update Katalog') }}</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.katalog.update', $katalog->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')


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
                        @if ($katalog->image)
                            <small class="form-text text-muted">
                                {{ __('admin.Current Image') }}:
                                <img src="{{ asset($katalog->image) }}" alt="{{ $katalog->category->name }}" width="100">
                            </small>
                        @endif
                        @error('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Category Field -->
                    <div class="form-group">
                        <label for="category_id">{{ __('admin.Category') }}</label>
                        <select name="category_id" id="category_id" class="form-control select2" required>
                            <option value="" disabled>--{{ __('admin.Select Category') }}--</option>
                            @foreach ($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id', $katalog->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
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
