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


    <h2>Laporan Pembayaran Bulan {{ ucfirst($bulan) }} Tahun {{ $tahun }}</h2>

    <table border="2">

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

        @php
        $i = 1
        @endphp
        @foreach($pembayaran as $data)
        <tr>
            <td> {{ $i++ }} </td>
            <td>{{ $data->pelanggan->nomor_meter }}</td>
            <td>{{ ucfirst($data->pelanggan->nama_pelanggan) }}</td>
            <td>{{ $data->tanggal_pembayaran }}</td>
            <td>Rp. {{ number_format($data->tagihan->jumlah_bayar, 0, ',','.') }},-</td>
            <td>Rp. {{ number_format($data->biaya_admin, 0, ',','.') }},-</td>
            <td>Rp. {{ number_format($data->total_bayar, 0, ',','.') }},-</td>
            <td>Bank {{ ucfirst($data->metode->nama_metode) }}</td>
        </tr>
        @endforeach

    </table>


</body>

</html>