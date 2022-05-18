<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/admin-style.css">
    <title>Admin Page</title>
</head>
<body>

    @include('header.sidenav')

    <div class="container-main-page right">
        <section class="main-section active">
            <h1>Rute Control</h1>

            <span class="add-rute">Tambah Rute</span>

            <table>
                <tr>
                    <th>ID Rute</th>
                    <th>Kode Rute</th>
                    <th>Waktu</th>
                    <th>Jalur 1</th>
                    <th>Jalur 2</th>
                    <th>Jalur 3</th>
                    <th>Jalur 4</th>
                    <th>Jalur 5</th>
                    <th>Kelas Bus</th>
                    <th>Atur Kursi</th>
                </tr>
                @foreach($cek as $cek)
                <tr>
                    <td>{{$cek -> id}}</td>
                    <td>{{$cek -> kode}}</td>
                    <td>{{$cek -> angkatan}}</td>
                    @php 
                    $kota1 = DB::table('tb_kota')->where('id', $cek -> A1)->orWhere('id', $cek -> A2)->orWhere('id', $cek -> A3)->orWhere('id', $cek -> A4)->orWhere('id', $cek -> A5)->first();
                    $kota2 = DB::table('tb_kota')->where('id', $cek -> A2)->first();
                    $kota3 = DB::table('tb_kota')->where('id', $cek -> A3)->first();
                    $kota4 = DB::table('tb_kota')->where('id', $cek -> A4)->first();
                    $kota5 = DB::table('tb_kota')->where('id', $cek -> A5)->first();
                    @endphp
                    <td>{{$kota1->nama_kota}}</td>
                    <td>{{$kota2->nama_kota}}</td>
                    <td>{{$kota3->nama_kota}}</td>
                    <td>{{$kota4->nama_kota}}</td>
                    <td>{{$kota5->nama_kota}}</td>
                    @php $kelas = DB::table('tb_kelas_bus')->where('id_bus', $cek->id_kelas)->first();@endphp
                    <td>{{$kelas->kelas_bus}}</td>
                    <td><a href="/aturkursi/{{$cek -> id}}">Atur Kursi</a></td>
                </tr>
                @endforeach
            </table>
        </section>
    </div>

</body>
</html>