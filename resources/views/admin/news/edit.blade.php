@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Product') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.Update Product') }}</h4>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">{{ __('admin.Language') }}</label>
                        <select name="language" id="language-select" class="form-control select2">
                            <option value="">--{{ __('admin.Select') }}--</option>
                            @foreach ($languages as $lang)
                                <option {{ $lang->lang === $news->language ? 'selected' : '' }} value="{{ $lang->lang }}">
                                    {{ $lang->name }}</option>
                            @endforeach
                        </select>
                        @error('language')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">{{ __('admin.Category') }}</label>
                        <select name="category" id="category" class="form-control select2">
                            <option value="">--{{ __('admin.Select') }}---</option>
                            @foreach ($categories as $category)
                                <option {{ $category->id === $news->category_id ? 'selected' : '' }}
                                    value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">{{ __('admin.Brand') }}</label>
                        <select name="brand" id="brand" class="form-control select2">
                            <option value="">--{{ __('admin.Select') }}---</option>
                            @foreach ($brands as $brand)
                                <option {{ $brand->id === $news->brand_id ? 'selected' : '' }}
                                    value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                        @error('brand')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="">{{ __('admin.Image') }}</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">{{ __('admin.Choose File') }}</label>
                            <input type="file" name="image" id="image-upload">
                        </div>
                        @error('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">{{ __('admin.Title') }}</label>
                        <input name="title" value="{{ $news->title }}" type="text" class="form-control"
                            id="name">
                        @error('title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">{{ __('admin.Content') }}</label>
                        <!--<div id="editor-container"></div>-->
                        <textarea name="content" id="content" class="d-none">{{ $news->content }}</textarea>
                        @error('content')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="">{{ __('admin.Tags') }}</label>
                        <input name="tags" type="text"
                            value="{{ formatTags($news->tags()->pluck('name')->toArray()) }}"
                            class="form-control inputtags">
                        @error('tags')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">{{ __('admin.Meta Title') }}</label>
                        <input name="meta_title" value="{{ $news->meta_title }}" type="text" class="form-control"
                            id="name">
                        @error('meta_title')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">{{ __('admin.Meta Description') }}</label>
                        <textarea name="meta_description" class="form-control">{{ $news->meta_description }}</textarea>
                        @error('meta_description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="control-label">{{ __('admin.Status') }}</div>
                                <label class="custom-switch mt-2">
                                    <input {{ $news->status === 1 ? 'checked' : '' }} value="1" type="checkbox"
                                        name="status" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>

                        {{-- @if (canAccess(['news status', 'news all-access']))
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="control-label">{{ __('admin.Is Breaking Product') }}</div>
                                    <label class="custom-switch mt-2">
                                        <input {{ $news->is_breaking_news == 1 ? 'checked' : '' }} value="1"
                                            type="checkbox" name="is_breaking_news" class="custom-switch-input">
                                        <span class="custom-switch-indicator"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="control-label">{{ __('admin.Show At Slider') }}</div>
                                    <label class="custom-switch mt-2">
                                        <input {{ $news->show_at_slider === 1 ? 'checked' : '' }} value="1"
                                            type="checkbox" name="show_at_slider" class="custom-switch-input">
                                        <span class="custom-switch-indicator"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">

                                <div class="form-group">
                                    <div class="control-label">{{ __('admin.Show At Popular') }}</div>
                                    <label class="custom-switch mt-2">
                                        <input {{ $news->show_at_popular === 1 ? 'checked' : '' }} value="1"
                                            type="checkbox" name="show_at_popular" class="custom-switch-input">
                                        <span class="custom-switch-indicator"></span>
                                    </label>
                                </div>
                            </div>
                        @endif --}}

                    </div>

                    <button type="submit" class="btn btn-primary">{{ __('admin.Update') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <link href="https://cdn.jsdelivr.net/npm/quill@1.3.6/dist/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/quill@1.3.6/dist/quill.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var quill = new Quill('#editor-container', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{
                            'font': []
                        }, {
                            'size': []
                        }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{
                            'color': []
                        }, {
                            'background': []
                        }],
                        [{
                            'script': 'sub'
                        }, {
                            'script': 'super'
                        }],
                        [{
                            'header': '1'
                        }, {
                            'header': '2'
                        }, 'blockquote', 'code-block'],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }, {
                            'indent': '-1'
                        }, {
                            'indent': '+1'
                        }],
                        [{
                            'direction': 'rtl'
                        }, {
                            'align': []
                        }],
                        ['link', 'image', 'video', 'formula'],
                        ['clean']
                    ]
                }
            });

            // Set the content of the editor to the value from the textarea
            const content = document.querySelector('textarea[name=content]');
            quill.root.innerHTML = content.value;

            const form = document.querySelector('form');
            form.onsubmit = function() {
                content.value = quill.root.innerHTML;
            };

            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.type === 'childList' && mutation.target === quill.root) {
                        content.value = quill.root.innerHTML;
                    }
                });
            });

            observer.observe(quill.root, {
                childList: true
            });
        });
    </script>

<script>
    $(document).ready(function() {
        // Set background image for the image preview
        $('.image-preview').css({
            "background-image": "url({{ asset($news->image) }})",
            "background-size": "cover",
            "background-position": "center center"
        });

        // Handle language selection change
        $('#language-select').on('change', function() {
            let lang = $(this).val();

            // Fetch news category
            $.ajax({
                method: 'GET',
                url: "{{ route('admin.fetch-news-category') }}",
                data: { lang: lang },
                success: function(data) {
                    $('#category').html("");
                    $('#category').append(`<option value="">---{{ __('admin.Select') }}---</option>`);
                    $.each(data, function(index, data) {
                        $('#category').append(`<option value="${data.id}">${data.name}</option>`);
                    });
                },
                error: function(error) {
                    console.log(error);
                }
            });

            // Fetch news brand
            $.ajax({
                method: 'GET',
                url: "{{ route('admin.fetch-news-brand') }}",
                data: { lang: lang },
                success: function(data) {
                    $('#brand').html("");
                    $('#brand').append(`<option value="">---{{ __('admin.Select') }}---</option>`);
                    $.each(data, function(index, data) {
                        $('#brand').append(`<option value="${data.id}">${data.name}</option>`);
                    });
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>

@endpush
