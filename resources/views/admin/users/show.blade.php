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
                        <td>Nama :</td>
                        <td>{{ $data->name }}</td>
                    </tr>
                    <tr class="text-left">
                        <td>Email :</td>
                        <td>{{ $data->email }}</td>
                    </tr>
                    <tr class="text-left">
                        <td>Role :</td>
                        <td>{{ $data->role }}</td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection
