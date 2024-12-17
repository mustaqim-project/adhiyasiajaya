@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Katalog') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.All Katalogs') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.katalog.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> {{ __('admin.Create new') }}
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-katalog">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>{{ __('admin.Category') }}</th>
                                    <th>{{ __('admin.Image') }}</th>
                                    <th>{{ __('admin.Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($katalogs as $katalog)
                                    <tr>
                                        <td>{{ $katalog->id }}</td>
                                        <td>{{ $katalog->category->name ?? 'N/A' }}</td> <!-- Menampilkan kategori -->
                                        <td>
                                            <img src="{{ asset($katalog->image) }}" width="50" alt="Image">
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.katalog.edit', $katalog->id) }}" class="btn btn-primary"><i
                                                    class="fas fa-edit"></i></a>
                                            <a href="{{ route('admin.katalog.destroy', $katalog->id) }}" class="btn btn-danger delete-item"><i
                                                    class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $("#table-katalog").dataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [2, 3]
            }]
        });
    </script>
@endpush
