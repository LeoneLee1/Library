@extends('layout.app')

@section('title', 'Library Web')

@section('header-title')
    <a href="{{ route('book') }}" class="btn btn-danger">Kembali</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="text-primary">Tambah Data</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('book.insert') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title"
                        class="form-control @error('title')
                        is-invalid
                    @enderror">
                </div>
                @error('title')
                    <div class="mb-3 alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="mb-3">
                    <label for="author">Author</label>
                    <input type="text" name="author" id="author"
                        class="form-control @error('author')
                        is-invalid
                    @enderror">
                </div>
                @error('author')
                    <div class="mb-3 alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="mb-3">
                    <label for="publisher">Publisher</label>
                    <input type="text" name="publisher" id="publisher"
                        class="form-control @error('publisher')
                        is-invalid
                    @enderror">
                </div>
                @error('publisher')
                    <div class="mb-3 alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="mb-3">
                    <label for="published_year">Published Year</label>
                    <input type="number" placeholder="YYYY" name="published_year"
                        class="form-control @error('published_year')
                    is-invalid
                @enderror">
                </div>
                @error('published_year')
                    <div class="mb-3 alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
