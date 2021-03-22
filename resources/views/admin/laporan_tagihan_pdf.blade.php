<html lang="en">

<head>


    <link rel="stylesheet" href="{{ public_path('/assets/bootstrap/css/bootstrap.min.css') }}">

    <title>Cetak Laporan Tagihan</title>
</head>

<body>


    <h3 class="text-center mb-2">Laporan Tagihan Bulan {{ ucfirst($bulan) }} Tahun {{ $tahun }}</h3>

    <table class="table table-bordered table-striped">

        <tr>
            <th>No.</th>
            <th>ID Pelanggan</th>
            <th>Nama Pelanggan</th>
            <th>Tarif/Daya</th>
            <th>Jumlah Meter</th>
            <th>Jumlah Bayar</th>
            <th>Status</th>
        </tr>

        @foreach($tagihan as $data)
        <tr>
            <td> {{ $loop->iteration }} </td>
            <td>{{ $data->pelanggan->nomor_meter }}</td>
            <td>{{ $data->pelanggan->nama_pelanggan }}</td>
            <td>{{ $data->pelanggan->tarif->kode_tarif }}</td>
            <td>{{ $data->jumlah_meter }}</td>
            <td>@currency($data->jumlah_bayar)</td>
            <td>
                @if ($data->status =='dibayar')
                <button class="badge badge-success">Dibayar</button>
                @else
                <button class="badge badge-danger">Belum Bayar </button>
                @endif
            </td>
        </tr>
        @endforeach

    </table>

</body>

</html>