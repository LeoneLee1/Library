@extends('layout.app')

@section('title', 'Library Web')

@section('header-title')
    <a href="{{ route('book') }}" class="btn btn-danger">Kembali</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="text-primary">Detail Book</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-left">
                        <td>Title :</td>
                        <td>{{ $data->title }}</td>
                    </tr>
                    <tr class="text-left">
                        <td>Author :</td>
                        <td>{{ $data->author }}</td>
                    </tr>
                    <tr class="text-left">
                        <td>Publisher :</td>
                        <td>{{ $data->publisher }}</td>
                    </tr>
                    <tr class="text-left">
                        <td>Published Year :</td>
                        <td>{{ $data->published_year }}</td>
                    </tr>
                    <tr class="text-left">
                        <td>Status :</td>
                        <td>{{ $data->status }}</td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection
