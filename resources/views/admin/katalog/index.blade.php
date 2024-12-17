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
                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                    @foreach ($languages as $language)
                        <li class="nav-item">
                            <a class="nav-link {{ $loop->index === 0 ? 'active' : '' }}" id="home-tab2" data-toggle="tab"
                                href="#home-{{ $language->lang }}" role="tab" aria-controls="home"
                                aria-selected="true">{{ $language->name }}</a>
                        </li>
                    @endforeach
                </ul>

                <div class="tab-content tab-bordered" id="myTab3Content">
                    @php
                        $katalogs = \App\Models\Katalog::with('category')->orderByDesc('id')->get();
                    @endphp
                    <div class="tab-pane fade show {{ $loop->index === 0 ? 'active' : '' }}"
                        id="home-{{ $language->lang }}" role="tabpanel" aria-labelledby="home-tab2">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-{{ $language->lang }}">
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
                                                    <img src="{{ asset('storage/'.$katalog->image) }}" width="50" alt="Image">
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
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        @foreach ($languages as $language)
            $("#table-{{ $language->lang }}").dataTable({
                "columnDefs": [{
                    "sortable": false,
                    "targets": [2, 3]
                }]
            });
        @endforeach
    </script>
@endpush
