<!DOCTYPE html>
<html>
<head>
    <title>Daftar Peserta</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: #343a40;
            color: white;
        }
        td {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 class="text-align: center;">Daftar Peserta IFC</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lomba</th>
                <th>Nama Peserta</th>
                <th>Jurusan</th>
                <th>Email Peserta</th>
                <th>No Handphone</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($participants as $index => $participant)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $participant->contest->nama_lomba }}</td>
                    <td>{{ $participant->nama_peserta }}</td>
                    <td>{{ $participant->jurusan }}</td>
                    <td>{{ $participant->email_peserta }}</td>
                    <td>{{ $participant->no_hp }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
