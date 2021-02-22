<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pengeluaran</title>
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
    <h1>Laporan Pengeluaran</h1>

    <table id="example1" class="table table-bordered table-striped">
      <thead>
      <tr>
        <th>Nomor</th>
        <th>laku</th>
        <th>Total</th>
        <th>Nama</th>
        <th>Tanggal</th>
      </tr>
      </thead>
      <tbody>
        @foreach ($hasil_penjualan as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            @php
                $pr = Illuminate\Support\Facades\DB::table("laku_detail")
                  ->join("great", "laku_detail.great_id", "=", "great.id")
                  ->where("laku_detail.hasil_penjualan_id", $item->id)
                  ->select(
                    "laku_detail.id",
                    "laku_detail.jumlah",
                    "great.nama"
                    )
                  ->get();
            @endphp
            <td>
              @foreach ($pr as $item2)
                  {{ $item2->nama }} : {{ $item2->jumlah }} <br>
              @endforeach
            </td>
            <td>Rp. {{ $item->total }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ date ('d-M-Y', strtotime($item->created_at)) }}</td>
        </tr>
        @endforeach
      </tbody>
      <tfoot>
        <tr>
            <th colspan="1" style="text-align:right">Total : Semuanya</th>
            <th colspan="3">Rp. {{ $total }}</th>
        </tr>
    </tfoot>
    

    </table>
    
</body>
</html>