<!-- View Cari Tiket, View Pertama -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title>E-Ticketing</title>
</head>
<body>

    @include('header.header')

    <main>
        <!-- Home & Ticket -->
        <section class="mySection" id="menu1">
            <h3>Selamat Datang</h3>
            <p style="text-align: center;">Silahkan Melakukan Pemesanan Tiket Dengan Form Dibawah Ini</p>
            <div class="container-hnt">
                <div class="container-input">
                    <form action="/tiket" method="POST">
                    @csrf
                        <label for="">Tanggal</label>
                        <input type="date" name="tanggal"><br>

                        <label for="">Penumpang</label>
                        <input type="number" min="0" id="number" placeholder="Jumlah Penumpang" name="penumpang" required><br>

                        <label for="">Kota Asal</label> <br>
                        <select class="custom-select form-control" name="KotaAsal" required>
                            <option hidden>--Pilih Kota--</option>
                            @foreach ($data as $asal)
                                <option value={{$asal->id}}>{{$asal->nama_kota}}</option>
                            @endforeach
                        </select> <br>

                        <label for="">Kota Tujuan</label> <br>
                        <select class="custom-select form-control" name="KotaTujuan" required>
                            <option hidden>--Pilih Kota--</option>
                            @foreach ($data as $tujuan)
                                <option value={{$tujuan->id}}>{{$tujuan->nama_kota}}</option>
                            @endforeach
                        </select> <br>

                        <label for="">Kelas Bus</label> <br> 
                        <select class="custom-select form-control" name="kelas" required>
                            <option hidden value="0">--Pilih Kelas Bus--</option>
                            <option value="0">Pilih semua kelas bus</option>
                            @foreach ($kelas as $bus)
                                <option value={{$bus->id_bus}}>{{$bus->kelas_bus}}</option>
                            @endforeach
                        </select> <br>

                        <label for=""></label>
                        <input type="submit" value="Cari Tiket">
                    </form>
                </div>
            </div>
        </section>
    </main>

    @include('footer.footer')

    <script src="./js/script.js"></script>

</body>
</html>