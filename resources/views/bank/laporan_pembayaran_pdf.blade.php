<html lang="en">

<head>

    <title>Cetak Laporan Pembayaran</title>

    <link rel="stylesheet" href="{{ public_path('/assets/bootstrap/css/bootstrap.min.css') }}">

</head>

<body>


    <h2 class="text-center mb-2">Laporan Pembayaran Bulan {{ ucfirst($bulan) }} Tahun {{ $tahun }} Bank {{ ucfirst($bank) }}</h2>

    <table class="table table-bordered table-striped">

        <tr>
            <th>No.</th>
            <th>ID Pelanggan</th>
            <th>Nama Pelanggan</th>
            <th>Tarif/Daya</th>
            <th>Tanggal Bayar</th>
            <th>Jumlah Meter</th>
            <th>Tagihan PLN</th>
            <th>Biaya Admin</th>
            <th>Total Bayar</th>
        </tr>

        @foreach($pembayaran as $data)
        <tr>
            <td> {{ $loop->iteration }} </td>
            <td>{{ $data->pelanggan->nomor_meter }}</td>
            <td>{{ $data->pelanggan->nama_pelanggan }}</td>
            <td>{{ $data->pelanggan->tarif->kode_tarif }}</td>
            <td>{{ $data->tanggal_pembayaran }}</td>
            <td>{{ $data->tagihan->jumlah_meter }}</td>
            <td>@currency($data->tagihan->jumlah_bayar)</td>
            <td>@currency($data->biaya_admin)</td>
            <td>@currency($data->total_bayar)</td>
        </tr>
        @endforeach
    </table>


</body>

</html>