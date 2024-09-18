@extends('layout')

@section('component.header')
@endsection

@section('content')
<br /><br />

<br />
<div class="row mb-4 justify-content-center align-items-center">
    <div class="col-md-11">
        <div class="card">
            <div class="card-header bg-black text-white" >
                <h2 class="card-title mb-0">Daftar Lomba</h2>
            </div>
            <div class="card-body">
                <div class="col-sm-12">
                    <a href="{{ route('contests.create') }}" class="btn btn-primary" style="margin: 5px 0; background-color:green; color:white">Create</a>
                    <a href="{{ route('print.contests') }}" class="btn btn-secondary" style="margin: 5px 0;">Print PDF</a>
                </div>
                <table class="table table-striped table-bordered table-hover">
                    <thead >
                        <tr>
                            <th>No</th>
                            <th>Nama Lomba</th>
                            <th>Tanggal</th>
                            <th>Lokasi Lomba</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                <tbody>
                    @foreach ($contests as $index => $contest)
                        <tr>
                            <td>{{ ($contests->currentPage() - 1) * $contests->perPage() + $index + 1 }}</td>
                            <td>{{ $contest->nama_lomba }}</td>
                            <td>{{ $contest->tanggal_lomba }}</td>
                            <td>{{ $contest->lokasi_lomba }}</td>
                            <td>
                                <a href="{!! route('contests.edit', $contest->id) !!}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-pencil-alt"></i> Update
                                </a>
                                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(event, this)">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </button>
                                <form method="post" action="{!! route('contests.destroy', $contest->id) !!}" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                            @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $contests->links('pagination::simple-pagination') !!}
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

            // Show confirmation dialog
            if (confirm("Apakah Anda yakin ingin menghapus item ini?")) {
                form.submit();
            }
        }
    </script>
    @endsection
