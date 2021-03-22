<html lang="en">

<head>

    <title>Cetak Laporan Pembayaran</title>

    <link rel="stylesheet" href="{{ public_path('/assets/bootstrap/css/bootstrap.min.css') }}">
</head>

<body>


    <h2 class="text-center mb-2">Laporan Pembayaran Bulan {{ ucfirst($bulan) }} Tahun {{ $tahun }}</h2>

    <table class="table table-bordered table-striped">

        <tr>
            <th>No.</th>
            <th>ID Pelanggan</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal Bayar</th>
            <th>Tagihan PLN</th>
            <th>Biaya Admin</th>
            <th>Total Bayar</th>
            <th>Metode Bayar</th>
        </tr>


        @foreach($pembayaran as $data)
        <tr>
            <td> {{ $loop->iteration }} </td>
            <td>{{ $data->pelanggan->nomor_meter }}</td>
            <td>{{ $data->pelanggan->nama_pelanggan }}</td>
            <td>{{ $data->tanggal_pembayaran }}</td>
            <td>@currency($data->tagihan->jumlah_bayar)</td>
            <td>@currency($data->biaya_admin)</td>
            <td>@currency($data->total_bayar)</td>
            <td>{{ $data->metode->nama_metode }}</td>
        </tr>




    </table>


</body>

</html>