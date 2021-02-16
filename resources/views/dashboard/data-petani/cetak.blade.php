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

    <h3>Daftar Petani</h3>

    <table style="">
        <thead>
        <tr>
          <th>Nomor</th>
          <th>NIK</th>
          <th>Nama</th>
          <th>NO HP</th>
          <th>alamat</th>
          <th>rt</th>
          <th>rw</th>
          <th>kecamatan</th>
          <th>nama ketua kelompok</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($users as $item)
          <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->nik }}</td>
              <td>{{ $item->nama }}</td>
              <td>{{ $item->no_hp }}</td>
              <td>{{ $item->alamat }}</td>
              <td>{{ $item->rt }}</td>
              <td>{{ $item->rw }}</td>
              <td>{{ $item->kecamatan }}</td>
              <td>{{ $item->nama_ketua_kelompok }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
</body>
</html>