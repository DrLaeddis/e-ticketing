<!-- View Pengisian Data Diri, View Setelah fom-find-tiket, View Ketiga -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title>Form Data Diri</title>
</head>
<body>

    @include('header.header')

    <main>
        <section class="mySection">
            <h3>Masukan Data Diri Anda Untuk Informasi Tiket</h3>
            <form action="/insertdata" method="POST">
                @csrf
            <div class="container-data-diri">
                <div class="data-diri">
                    <div class="title-data">
                        <h1>Data Diri</h1>
                    </div>

                    <div class="body-data">
                        <div class="input-grip">
                            <label for="">Nama</label>
                            <input type="text" name="nama" id="nama" placeholder="Masukan Nama"> <br>

                            <label for="">Contact</label>
                            <input type="text" name="kontak" id="kontak" placeholder="Masukan No Hp"> <br>

                            <label for="">Email</label>
                            <input type="email" name="email" id="email" placeholder="Email"> <br>

                            <label for="">Alamat</label>
                            <input type="text" name="alamat" id="alamat" placeholder="Alamat"> <br>

                            
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit">Pesan</button>
            </form>
        </section>
    </main>

    @include('footer.footer')
    
</body>
</html>