@section('content')
<h1>Customer List</h1>
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
    @foreach($s as $data)
      <tr>
        <td>{{ $data->kode_barang }}</td>
        <td>{{ $data->nama_barang }}</td>
        <td>{{ $data->tanggal_expire }}</td>
        <td>{{ $data->qty }}</td>
        <td>{{ $data->status }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection