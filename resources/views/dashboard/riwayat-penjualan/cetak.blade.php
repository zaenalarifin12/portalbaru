<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>riwayat penjualan</title>

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
    
    <h1>Riwayat Penjualan</h1>
    
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nomor</th>
                    <th>NIK</th>
                    <th>nama</th>
                    <th>jumlah bal</th>
                    <th>Pembayaran</th>
                    <th>Total</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($hasil as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nik }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->jumlah_bal }}</td>
                        <td>{{ $item->pembayaran }}</td>
                        <td>Rp. {{ $item->total }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                        <th colspan="5" style="text-align:right">Total : Semuanya</th>
                        <th colspan="1">Rp. {{ $totalSemua }}</th>
                    </tr>
                </tfoot>

                </table>
              </div>
            </div>
          </div>
          

</body>
</html>