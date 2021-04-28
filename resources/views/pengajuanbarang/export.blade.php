<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1 style="text-align:center">Data Pengajuan Barang</h1>
<a href="{{ URL::to('/pendarikanbarang/pdf') }}">Export PDF</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Phone</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pengajuan as $data)
        <tr>
            <td>{{ $data->nama_pengajuan }}</td>
            <td>{{ $data->nama_barang }}</td>
            <td>{{ $data->tanggal_pengajuan }}</td>
            <td>{{ $data->qty }}</td>
            <td>{{ $data->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>