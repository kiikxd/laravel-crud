<!DOCTYPE html>
<html>
<head>
    <title>Daftar Lomba</title>
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
    <h2 style="text-align: center;">Daftar Lomba</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lomba</th>
                <th>Tanggal</th>
                <th>Lokasi Lomba</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contests as $index => $contest)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $contest->nama_lomba }}</td>
                <td>{{ $contest->tanggal_lomba }}</td>
                <td>{{ $contest->lokasi_lomba }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
