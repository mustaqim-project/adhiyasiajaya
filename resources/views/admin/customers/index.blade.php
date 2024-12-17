@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Our Customers') }}</h1>
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.All Customers') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.customer.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> {{ __('admin.Create new') }}
                    </a>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="customer-table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>{{ __('admin.Name') }}</th>
                                <th>{{ __('admin.Image') }}</th>
                                <th>{{ __('admin.URL') }}</th>
                                <th>{{ __('admin.Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td>{{ $customer->id }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>
                                        @if ($customer->image)
                                            <img src="{{ asset('storage/'.$customer->image) }}" alt="{{ $customer->name }}" width="50">
                                        @else
                                            {{ __('admin.No Image') }}
                                        @endif
                                    </td>
                                    <td><a href="{{ $customer->url }}" target="_blank">{{ $customer->url }}</a></td>
                                    <td>
                                        <a href="{{ route('admin.customer.edit', $customer->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin.customer.destroy', $customer->id) }}" class="btn btn-danger delete-item"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $("#customer-table").dataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [2, 3]
            }]
        });
    </script>
@endpush
