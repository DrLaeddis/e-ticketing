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
        <section class="main-section">
            <h1>Transaksi Control</h1>

            <table>
                <tr>
                    <th>ID Pemesanan</th>
                    <th>Tanggal</th>
                    <th>Pemesan</th>
                    <th>No Hp</th>
                    <th>Email</th>
                    <th>Asal</th>
                    <th>Tujuan</th>
                    <th>Status Pembayaran</th>
                    <th>UC</th>
                    <th>Jml Penumpang</th>
                    <th>Jml Bayar</th>
                </tr>
                @foreach($pemesanan as $ts)
                <tr>
                    <td>{{$ts->id_pemesanan}}</td>
                    <td>{{$ts->tanggal}}</td>
                    <td>{{$ts->pemesan}}</td>
                    <td>{{$ts->no_hp}}</td>
                    <td>{{$ts->email}}</td>
                    <td>{{$ts->asal}}</td>
                    <td>{{$ts->tujuan}}</td>
                    <td>{{$ts->status_pembayaran}}</td>
                    <td>{{$ts->UC}}</td>
                    <td>{{$ts->jml_penumpang}}</td>
                    <td>Rp. {{$ts->jml_bayar}}</td>
                </tr>
                @endforeach
            </table>
        </section>
    </div>

</body>
</html>