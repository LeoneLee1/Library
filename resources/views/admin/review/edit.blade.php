@extends('layout.app')

@section('title', 'Library Web')

@section('header-title')
    <a href="{{ route('review.admin') }}" class="btn btn-danger">Kembali</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="text-primary">Edit Data</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('review.update', $review->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name">Rating</label>
                    <input type="number" name="rating" id="rating" max="5"
                        class="form-control @error('rating')
                        is-invalid
                    @enderror"
                        value="{{ $review->rating }}">
                </div>
                <div class="mb-3">
                    @error('rating')
                        <div class="mb-3 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="review_text">Deskripsi</label>
                    <textarea name="review_text" id="review_text" cols="30" rows="10" class="form-control">{{ $review->review_text }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
