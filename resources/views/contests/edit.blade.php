@extends('layout')

@section('content')
<br /><br />
<div class="row justify-content-center mt-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-dark text-white text-center">
                <h2 class="card-title mb-0">Edit Lomba</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('contests.update',$contest->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lomba</label>
                        <input type="text" class="form-control" id="name" name="nama_lomba" value="{!! $contest->nama_lomba !!}" required>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal_lomba" value="{!! $contest->tanggal_lomba !!}" required>
                    </div>
                    <div class="mb-3">
                        <label for="lokasi" class="form-label">Lokasi Lomba</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi_lomba" value="{!! $contest->lokasi_lomba !!}" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    .card-header {
        background-color: #343a40;
    }

    .form-label {
        font-weight: bold;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
</style>
@endsection
