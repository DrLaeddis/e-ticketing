<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bukti-serah-bayar-style.css">
    <title>Pelunasan</title>
</head>
<body>

    <div class="containerBayar">
    @php 
    $Data = DB::table('tb_data_diri')->where('id_pemesanan', $tiketjadi['id'])->get();
    $lahir = DB::table('tb_data_diri')->where('id_pemesanan', $tiketjadi['id'])->pluck('tgl_lahir'); 
    @endphp
    @foreach ($Data as $diri)
        <div class="bodyBayar">
            <h2>PT XYZ</h2>
            <p>UC {{$tiketjadi['UQ']}}</p>
            <hr><p>Tanggal Berangkat: {{$tiketjadi['date']}}</p>
            <p>Nama Penumpang: {{$diri->nama}}      | Tanggal Lahir: {{$diri->tgl_lahir}}</p> 
            <p>Angkatan: {{$tiketjadi['angkatan']}} | Asal: {{$tiketjadi['asal']}} | Tujuan: {{$tiketjadi['tujuan']}}</p>
            <p>Kelas Bus: {{$tiketjadi['bus']}}     | Tempat Duduk: {{$diri->kursi}}</p>
            <hr><p>Tiket Hanya Berlaku Sesuai Dengan Jadwal Yang Dipesan. Jika Tidak Sesuai Maka Tiket Ini Akan Hangus.</p>
        </div>
    @endforeach
    </div>
    
</body>
</html>