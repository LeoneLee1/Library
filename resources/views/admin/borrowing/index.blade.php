@extends('layout.app')

@section('title', 'Library Web')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('borrowing.create') }}" class="btn btn-primary">Tambah Data</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="table_borrowing">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Borrow Date</th>
                        <th class="text-center">Returned Date</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection

@push('after-script')
    <script>
        $(document).ready(function() {
            $('#table_borrowing').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 10,
                lengthMenu: [
                    [10, 50, 100, -1],
                    [10, 50, 100, "All"]
                ],
                ajax: '{{ route('borrowing.json') }}',
                columns: [{
                        name: 'DT_RowIndex',
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                    {
                        data: 'name',
                        name: 'name',
                        className: 'text-center'
                    },
                    {
                        data: 'title',
                        name: 'title',
                        className: 'text-center'
                    },
                    {
                        data: 'borrow_date',
                        name: 'borrow_date',
                        className: 'text-center'
                    },
                    {
                        data: 'return_date',
                        name: 'return_date',
                        className: 'text-center'
                    },
                    {
                        data: 'status',
                        name: 'status',
                        className: 'text-center'
                    },
                    {
                        name: 'action',
                        data: 'id',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return '<a href="/admin/borrowing/edit/update/' + data +
                                '" class="btn btn-danger">Return Book</a>';
                        },
                        className: 'text-center'
                    }
                ],
            });
        });
    </script>
@endpush
