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
            <h1>Validasi Control</h1>
            <table>
                <tr>
                    <th>ID Pemesanan</th>
                    <th>UC</th>
                    <th>File Validasi</th>
                    <th>Validasi</th>
                </tr>
                @foreach($validasi as $valid)
                <tr>
                    <td>{{$valid->id_pemesanan}}</td>
                    <td>{{$valid->UC}}</td>
                    @php 
                    $lihat = Storage::url('public/buktiBayar/'. $valid->validasi);
                    @endphp
                    <td><a href="{{url($lihat)}}" download>{{$valid->validasi}}</a></td>
                    <td>
                    <a href="/valid/{{$valid->id_pemesanan}}"><button>Valid</button></a> | <a href="/invalid/{{$valid->id_pemesanan}}"><button>Tidak Valid</button></a> </td>
                </tr>
                @endforeach
            </table>
        </section>
    </div>

</body>
</html>