<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Petani</title>

    <style>
      table, td, th {
        border: 1px solid black;
      }

      table {
        width: 100%;
        border-collapse: collapse;
      }
    </style>
</head>
<body>

    <h3>Daftar Penjualan</h3>

    <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Nomor</th>
          <th>Jumlah bal</th>
          <th>Pembayaran</th>
          <th>Nama</th>
          <th>NO Rekening</th>
          <th>Alamat</th>
          <th>Nama Ketua Kelompok</th>
          
        </tr>
        </thead>
        <tbody>
          @foreach ($daftar_penjualan as $item)
          <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->jumlah_bal }}</td>
              <td>{{ $item->pembayaran }}</td>
              <td> {{ $item->nama }} </td>
              <td> {{ $item->nomor_rekening }} </td>
              <td> {{ $item->alamat }} </td>
              <td> {{ $item->nama_ketua_kelompok }} </td> 
          </tr>
          @endforeach
        </tbody>
      </table>
</body>
</html>