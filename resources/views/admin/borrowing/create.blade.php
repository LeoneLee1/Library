@extends('layout.app')

@section('title', 'Library Web')

@section('header-title')
    <a href="{{ route('borrowing') }}" class="btn btn-danger">Kembali</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="text-primary">Tambah Data</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('borrowing.insert') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title">Title</label>
                    <select name="title" id="title"
                        class="form-select @error('title')
                        is-invalid
                    @enderror">
                        <option value="" selected disabled>Pilih</option>
                        @foreach ($book as $item)
                            <option value="{{ $item->title }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
                @error('title')
                    <div class="mb-3 alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
