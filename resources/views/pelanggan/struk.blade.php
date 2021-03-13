<html lang="en">

<head>
    <title>Cetak Laporan Pembayaran</title>
</head>

<body style="font-family:monospace;">

    <table>
        <tr>
            <td colspan="6" style="padding-bottom: 10px;">
                <center>STRUK PEMBAYARAN TAGIHAN LISTRIK</center>
            </td>
        </tr>
        <tr>
            <td>IDPEL</td>
            <td>: {{ $pembayaran->pelanggan->nomor_meter }}</td>
            <td></td>
            <td></td>
            <td>BL/TH</td>
            <td>: {{ substr(strtoupper($pembayaran->bulan_bayar),0,3).substr($pembayaran->tahun_bayar,2,2) }}</td>
        </tr>
        <tr>
            <td>NAMA</td>
            <td>: {{ ucfirst($pembayaran->pelanggan->nama_pelanggan) }}</td>
            <td></td>
            <td></td>
            <td>STAND METER</td>
            <td>: {{ $meter_awal.'-'.$meter_akhir }}</td>
        </tr>
        <tr>
            <td>TARIF/DAYA</td>
            <td>: {{$pembayaran->pelanggan->tarif->kode_tarif}}</td>

        </tr>
        <tr>
            <td>RP. TAG PLN</td>
            <td>: Rp. {{ number_format($pembayaran->tagihan->jumlah_bayar, 0, ',','.') }},-</td>
        </tr>
        <tr>
            <td>JFA REF</td>
            <td>: {{ strtoupper(sha1($pembayaran->id)) }}</td>
        </tr>
        <tr>
            <td colspan="6" style="padding: 8px 0px;">
                <center>PLN Menyatakan struk ini sebagai bukti pembayaran yang sah</center>
            </td>
        </tr>
        <tr>
            <td>ADMIN BANK</td>
            <td>: Rp. {{ number_format($pembayaran->biaya_admin, 0, ',','.') }},-</td>
        </tr>
        <tr>
            <td>TOTAL BAYAR</td>
            <td>: Rp. {{ number_format($pembayaran->total_bayar, 0, ',','.') }},-</td>
        </tr>
        <tr>
            <td colspan="6" align="center" style="padding-top: 5px;">TERIMA KASIH
            <td>
        </tr>
        <tr>
            <td colspan="6" align="center">Rincian Tagihan dapat diakses di www.pln.co.id, Informasi Hubungi Call Center:123</td>
        </tr>

    </table>


</body>

</html>