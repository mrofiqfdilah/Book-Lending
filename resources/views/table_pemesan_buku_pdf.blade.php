<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Pemesan Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: auto;
            margin-top: 50px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        caption {
            caption-side: top;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <table>
        <caption>Table Pemesan Buku</caption>
        <thead>
            <tr>
                <th>No</th>
                        <th>Nama Buku</th>
                        <th>Nama </th>
                        <th>Kelas</th>
                        <th>Jumlah Dipinjam</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pinjaman as $no => $hasil)
            <tr>
                <td>{{ $no+1 }}</td>
                <td>{{ $hasil->buku?->namabuku ?? 'Buku Tak Tersedia' }}</td>
                <td>{{ optional($hasil->user)->name }}</td>
                <td>Kelas {{ $hasil->kelas }}</td>
                <td>{{ $hasil->entitas}} Buku</td>
                <td>{{ $hasil->tglpinjam }}</td>
                <td>{{ $hasil->tglkembali }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
