@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Create Katalog') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.Create Katalog') }}</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('katalog.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf


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


                    <!-- Category Field -->
                    <div class="form-group">
                        <label for="category_id">{{ __('admin.Category') }}</label>
                        <select name="category_id" id="category_id" class="form-control select2" required>
                            <option value="" disabled selected>--{{ __('admin.Select Category') }}--</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
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
