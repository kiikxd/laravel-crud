@extends('layout')

@section('content')
<br /><br />
<div class="row justify-content-center mt-4 mb-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-dark text-white text-center">
                <h2 class="card-title mb-0">Tambah Juri</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('judges.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="id_lomba" class="form-label">Nama Lomba</label>
                        <select class="form-control" id="id_lomba" name="id_lomba" required>
                            <option value="" disabled selected>Pilih Nama Lomba</option>
                                @foreach ($contests as $contest)
                            <option value="{{ $contest->id }}">{{ $contest->nama_lomba }}</option>
                                @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Juri</label>
                        <input type="text" class="form-control" id="name" name="nama_juri" placeholder="Masukkan Nama Juri" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat Juri</label>
                        <input type="text" class="form-control" id="alamat" name="alamat_juri" placeholder="Masukkan Alamat Juri" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Juri</label>
                        <input type="email" class="form-control" id="email" name="email_juri" placeholder="Masukkan Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="handphone" class="form-label">No Handphone</label>
                        <input type="text" class="form-control" id="handphone" name="no_hp" placeholder="Masukkan No Handphone" required>
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
