@extends('layout')

@section('component.header')
@endsection

@section('content')
<br /><br />

<br />
<div class="row mb-4 justify-content-center align-items-center">
    <div class="col-md-11">
        <div class="card">
            <div class="card-header bg-black text-white">
                <h2 class="card-title mb-0">Juri IFC</h2>
            </div>
            <div class="card-body">
                <div class="col-sm-12">
                    <a href="{{ route('judges.create') }}" class="btn" style="margin: 5px 0; background-color:green; color:white">Create</a>
                </div>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lomba</th>
                            <th>Nama Juri</th>
                            <th>Alamat</th>
                            <th>Email Juri</th>
                            <th>No Handphone</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($judges as $index => $judge)
                            <tr>
                                <td>{{ ($judges->currentPage() - 1) * $judges->perPage() + $index + 1 }}</td>
                                <td>{{ $judge->contest->nama_lomba }}</td>
                                <td>{{ $judge->nama_juri }}</td>
                                <td>{{ $judge->alamat_juri }}</td>
                                <td>{{ $judge->email_juri }}</td>
                                <td>{{ $judge->no_hp }}</td>
                                <td>
                                    <a href="{!! route('judges.edit', $judge->id) !!}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-pencil-alt"></i> Update
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(event, this)">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                    <form method="post" action="{!! route('judges.destroy', $judge->id) !!}" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $judges->links('pagination::simple-pagination') !!}
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    h1 {
        font-family: 'Arial', sans-serif;
    }

    .table thead th {
        background-color: #343a40;
        color: white;
    }

    .table tbody tr:hover {
        background-color: #f1f1f1;
        transition: background-color 0.3s;
    }

    .btn {
        margin: 0 5px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    .modal-header {
        background-color: #dc3545;
        color: white;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }
</style>

<script>
    function confirmDelete(event, element) {
        event.preventDefault();
        const form = element.nextElementSibling;

        // Tampilkan dialog konfirmasi
        if (confirm("Apakah Anda yakin ingin menghapus item ini?")) {
            form.submit();
        }
    }
</script>
@endsection
