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


    <title>Cetak Laporan Tagihan</title>z
</head>

<body>


    <h2>Laporan Tagihan Bulan {{ ucfirst($bulan) }} Tahun {{ $tahun }}</h2>

    <table border="2">

        <tr>
            <th>No.</th>
            <th>ID Pelanggan</th>
            <th>Nama Pelanggan</th>
            <th>Tarif/Daya</th>
            <th>Jumlah Meter</th>
            <th>Jumlah Bayar</th>
            <th>Status</th>
        </tr>

        @php
        $i = 1
        @endphp
        @foreach($tagihan as $data)
        <tr>
            <td> {{ $i++ }} </td>
            <td>{{ $data->pelanggan->nomor_meter }}</td>
            <td>{{ ucfirst($data->pelanggan->nama_pelanggan) }}</td>
            <td>{{ $data->pelanggan->tarif->kode_tarif }}</td>
            <td>{{ $data->jumlah_meter }}</td>
            <td>Rp. {{ number_format($data->jumlah_bayar, 0, ',','.') }},-</td>
            <td>
                @if($data->status =='dibayar')
                {{ ucfirst($data->status)}}
                @else
                {{ ucfirst($data->status)}}
                @endif
            </td>
        </tr>
        @endforeach

    </table>


</body>

</html>