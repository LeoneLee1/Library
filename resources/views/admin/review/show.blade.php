@extends('layout.app')

@section('title', 'Library Web')

@section('header-title')
    <a href="{{ route('user') }}" class="btn btn-danger">Kembali</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="text-primary">Detail User</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-left">
                        <td>Rating :</td>
                        <td>
                            @php
                                $a = $data->rating;
                                for ($i = 1; $i < $a; $i++) {
                                    echo '<i class="fa fa-star"></i>';
                                }
                            @endphp
                        </td>
                    </tr>
                    <tr class="text-left">
                        <td>Deskripsi :</td>
                        <td>{{ $data->review_text }}</td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection
