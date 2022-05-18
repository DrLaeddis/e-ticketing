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
            <h1>Control Data Pelanggan</h1>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Note</th>
                    <th>ID Pemesanan</th>
                </tr>
                @foreach($dataDiri as $dataDiri)
                <tr>
                    <td>{{$dataDiri -> id}}</td>
                    <td>{{$dataDiri -> nama}}</td>
                    <td>{{$dataDiri -> tgl_lahir}}</td>
                    <td>{{$dataDiri -> note}}</td>
                    <td>{{$dataDiri -> id_pemesanan}}</td>
                </tr>
                @endforeach
            </table>
        </section>
    </div>

</body>
</html>