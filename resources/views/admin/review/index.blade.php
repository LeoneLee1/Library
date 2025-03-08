@extends('layout.app')

@section('title', 'Library Web')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('review.create') }}" class="btn btn-primary">Tambah Data</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="table_review">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Rating</th>
                        <th class="text-center">Description</th>
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
            $('#table_review').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 10,
                lengthMenu: [
                    [10, 50, 100, -1],
                    [10, 50, 100, "All"]
                ],
                ajax: '{{ route('review.json') }}',
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
                        data: 'rating',
                        name: 'rating',
                        className: 'text-center'
                    },
                    {
                        data: 'review_text',
                        name: 'review_text',
                        className: 'text-center'
                    },
                    {
                        name: 'action',
                        data: 'id',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return '<a href="/admin/review/edit/' + data +
                                '" class="btn btn-primary">Edit</a>&nbsp;' +
                                '<a href="/admin/review/show/' +
                                data + '" class="btn btn-info">Show</a>&nbsp;' +
                                '<a href="/admin/review/delete/' + data +
                                '" class="btn btn-danger" data-confirm-delete="true">Delete</a>';
                        },
                        className: 'text-center'
                    }
                ],
            });
        });
    </script>
@endpush
