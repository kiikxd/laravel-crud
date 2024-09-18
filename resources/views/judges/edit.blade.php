@extends('layout')

@section('content')
<br /><br />
<div class="row justify-content-center mt-4 mb-4">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-dark text-white text-center">
                <h2 class="card-title mb-0">Edit Juri</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('judges.update',$judge->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="id_lomba" class="form-label">Nama Lomba</label>
                        <select class="form-control" id="id_lomba" name="id_lomba" required>
                            @foreach ($contests as $contest)
                                <option value="{{ $contest->id }}" {{ $judge->id_lomba == $contest->id ? 'selected' : '' }}>
                                    {{ $contest->nama_lomba }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Juri</label>
                        <input type="text" class="form-control" id="nama" name="nama_juri" value="{{ $judge->nama_juri }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat Juri</label>
                        <input type="text" class="form-control" id="alamat" name="alamat_juri" value="{{ $judge->alamat_juri }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Juri</label>
                        <input type="email" class="form-control" id="email" name="email_juri" value="{{ $judge->email_juri }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp" class="form-label">No Handphone</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $judge->no_hp }}" required>
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
