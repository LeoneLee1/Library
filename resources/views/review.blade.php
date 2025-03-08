@extends('layout.web')

@section('content')
    <style>
        .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
        }

        .rating input {
            display: none;
        }

        .rating label {
            font-size: 2rem;
            color: #ddd;
            cursor: pointer;
        }

        .rating input:checked~label,
        .rating label:hover,
        .rating label:hover~label {
            color: gold;
        }
    </style>

    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center mb-4">Give Your Review</h2>
            <form action="{{ route('review.insert') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Title Input -->
                <div class="mb-3">
                    <label class="form-label">Book</label>
                    <select name="title" class="form-select">
                        <option value="" selected disabled>Select Book Title</option>
                        @foreach ($book as $item)
                            <option value="{{ $item->title }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Rating Input -->
                <div class="mb-3">
                    <label class="form-label">Rating:</label>
                    <div class="rating">
                        <input type="radio" name="rating" value="5" id="star5"><label for="star5">★</label>
                        <input type="radio" name="rating" value="4" id="star4"><label for="star4">★</label>
                        <input type="radio" name="rating" value="3" id="star3"><label for="star3">★</label>
                        <input type="radio" name="rating" value="2" id="star2"><label for="star2">★</label>
                        <input type="radio" name="rating" value="1" id="star1"><label for="star1">★</label>
                    </div>
                </div>

                <!-- Review Input -->
                <div class="mb-3">
                    <label for="review_text" class="form-label">Your Review:</label>
                    <textarea class="form-control" id="review_text" name="review_text" rows="4"
                        placeholder="Tulis ulasan Anda di sini..." required></textarea>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit Review</button>
                </div>
            </form>
        </div>
    </div>
@endsection
