@extends('layout.app')

@section('title', 'Library Web')

@section('header-title')
    <a href="{{ route('book') }}" class="btn btn-danger">Kembali</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="text-primary">Edit Data</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title"
                        class="form-control @error('title')
                        is-invalid
                    @enderror"
                        value="{{ $book->title }}">
                </div>
                <div class="mb-3">
                    @error('title')
                        <div class="mb-3 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="author">Author</label>
                    <input type="text" name="author" id="author" class="form-control" value="{{ $book->author }}">
                </div>
                <div class="mb-3">
                    <label for="publisher">Publisher</label>
                    <input type="text" name="publisher" id="publisher" class="form-control"
                        value="{{ $book->publisher }}">
                </div>
                <div class="mb-3">
                    <label for="published_year">Published Year</label>
                    <input type="number" name="published_year" class="form-control" value="{{ $book->published_year }}">
                </div>
                <div class="mb-3">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="{{ $book->status }}" selected>{{ $book->status }}</option>
                        <option value="Available">Available</option>
                        <option value="Borrowed">Borrowed</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
