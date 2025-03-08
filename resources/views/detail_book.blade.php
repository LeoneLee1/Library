@extends('layout.web')

@section('content')
    <section id="courses" class="courses section">
        <div class="container">
            <div class="row mt-4">
                @foreach ($book as $item)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->title }}</h5>
                                <p class="card-text"><strong>Author:</strong> {{ $item->author }}</p>
                                <p class="card-text"><strong>Publisher:</strong> {{ $item->publisher }}</p>
                                <p class="card-text"><strong>Published Year:</strong> {{ $item->published_year }}</p>
                                <p class="card-text"><strong>Status:</strong>
                                    <span class="badge {{ $item->status == 'Available' ? 'bg-success' : 'bg-danger' }}">
                                        {{ ucfirst($item->status) }}
                                    </span>
                                </p>
                                @if ($item->status == 'Available')
                                    <form action="{{ route('detail_book.borrow') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="title" value="{{ $item->title }}">
                                        <button type="submit" class="btn btn-primary">Borrow</button>
                                    </form>
                                @else
                                    <button class="btn btn-secondary" disabled>Not Available</button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
