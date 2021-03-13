<html lang="en">

<head>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            text-align: center;
            padding: 5px;
        }

        h2 {
            font-size: 18px;
            text-align: center
        }
    </style>


    <title>Cetak Laporan Pembayaran</title>
</head>

<body>


    <h2>Laporan Pembayaran Bulan {{ ucfirst($bulan) }} Tahun {{ $tahun }} Bank {{ ucfirst($bank) }}</h2>

    <table border="2">

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

        @php
        $i = 1
        @endphp
        @foreach($pembayaran as $data)
        <tr>
            <td> {{ $i++ }} </td>
            <td>{{ $data->pelanggan->nomor_meter }}</td>
            <td>{{ ucfirst($data->pelanggan->nama_pelanggan) }}</td>
            <td>{{ $data->pelanggan->tarif->kode_tarif }}</td>
            <td>{{ $data->tanggal_pembayaran }}</td>
            <td>{{ $data->tagihan->jumlah_meter }}</td>
            <td>Rp. {{ number_format($data->tagihan->jumlah_bayar, 0, ',','.') }},-</td>
            <td>Rp. {{ number_format($data->biaya_admin, 0, ',','.') }},-</td>
            <td>Rp. {{ number_format($data->total_bayar, 0, ',','.') }},-</td>
        </tr>
        @endforeach
    </table>


</body>

</html>