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
            <h1>Kelas Bus Control</h1>

            <label for="">Tambah Data Bus</label>
            <hr>
            <form action="/insertBus" method="POST">
            @csrf 
            <label for="">Kelas Bus</label>
            <input type="text" name="Kelas" id="">
            <label for="">Harga Bus</label>
            <input type="text" name="HargaBus" id="">
            <input type="submit" value="Tambah">
            </form>

            <table>
                <tr>
                    <th>ID Bus</th>
                    <th>Kelas Bus</th>
                    <th>Harga Bus</th>
                    <th>Aksi</th>
                </tr>
                @foreach($unit as $unit)
                <tr>
                    <td>{{$unit -> id_bus}}</td>
                    <td>{{$unit -> kelas_bus}}</td>
                    <td>{{$unit -> harga_bus}}</td>
                    <td>
                    <a href="/delete/{{$unit -> id_bus}}">Hapus</a> |
                    <a href="/update/">Update</a>
                    </td>
                    
                </tr>
                @endforeach
            </table>
        </section>
    </div>

</body>
</html>