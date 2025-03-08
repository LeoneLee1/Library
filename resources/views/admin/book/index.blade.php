@extends('layout.app')

@section('title', 'Library Web')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('book.create') }}" class="btn btn-primary">Tambah Data</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="table_book">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Author</th>
                        <th class="text-center">Publisher</th>
                        <th class="text-center">Published Year</th>
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
            $('#table_book').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 10,
                lengthMenu: [
                    [10, 50, 100, -1],
                    [10, 50, 100, "All"]
                ],
                ajax: '{{ route('book.json') }}',
                columns: [{
                        name: 'DT_RowIndex',
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                    {
                        data: 'title',
                        name: 'title',
                        className: 'text-center'
                    },
                    {
                        data: 'author',
                        name: 'author',
                        className: 'text-center'
                    },
                    {
                        data: 'publisher',
                        name: 'publisher',
                        className: 'text-center'
                    },
                    {
                        data: 'published_year',
                        name: 'published_year',
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
                            return '<a href="/admin/book/edit/' + data +
                                '" class="btn btn-primary">Edit</a>&nbsp;' +
                                '<a href="/admin/book/show/' +
                                data + '" class="btn btn-info">Show</a>&nbsp;' +
                                '<a href="/admin/book/delete/' + data +
                                '" class="btn btn-danger" data-confirm-delete="true">Delete</a>';
                        },
                        className: 'text-center'
                    }
                ],
            });
        });
    </script>
@endpush
