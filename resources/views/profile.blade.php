@extends('layout.web')

@section('content')
    <div class="container mt-5">
        <div class="card shadow p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-user-circle fa-2x text-primary me-3"></i>
                    <h2 class="mb-0">User Profile</h2>
                </div>
                <a href="{{ route('logout') }}" class="btn btn-danger">
                    <i class="fas fa-sign-out-alt me-1"></i> Logout
                </a>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3 p-3 bg-light rounded">
                        <strong><i class="fas fa-user me-2"></i>Name:</strong> {{ Auth::user()->name }}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3 p-3 bg-light rounded">
                        <strong><i class="fas fa-envelope me-2"></i>Email:</strong> {{ Auth::user()->email }}
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <div class="d-flex align-items-center mb-3">
                    <i class="fas fa-book fa-2x text-success me-3"></i>
                    <h3 class="mb-0">Borrowed Books</h3>
                </div>

                @if ($book_borrowed === null || collect($book_borrowed)->isEmpty())
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>No books borrowed at the moment.
                    </div>
                @else
                    <div class="list-group">
                        @foreach ($book_borrowed as $book)
                            <div class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1"><strong>{{ $book->title }}</strong></h5>
                                    <a href="{{ route('borrowing.update', $book->id) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-undo me-1"></i> Return Book
                                    </a>
                                </div>
                                <p class="mb-1">by {{ $book->author }}</p>
                                <small class="text-muted">
                                    <i class="far fa-calendar-alt me-1"></i> Borrowed on: {{ $book->borrow_date }}
                                </small>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
