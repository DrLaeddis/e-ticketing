<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title>Form Validasi</title>
</head>
<body>
    
    @include('header.header')

    <main>
        <section class="mySection" id="menu1">
            <h3>Selamat Datang</h3>
            <p style="text-align: center;">Masukan Bukti Transfer Pembayaran Disini</p>
            <div class="container-hnt active">
                <div class="container-input">
                    <form enctype="multipart/form-data" action="/buktipembayaran" method="POST">
                        @csrf
                        <label for="">Unik Kode</label>
                        <input type="text" name="UC" placeholder="Masukan Unik kode"><br>

                        <label for="">Masukan Berkas</label>
                        <input type="file" name="berkasValidasi" id="" class="file_btn"> <br>
                        
                        <label for=""></label>
                        <input type="submit" value="Kirim" class="validasi_btn"> <br>
                    </form>
                </div>
            </div>
        </section>
    </main>

    @include('footer.footer')
    
</body>
</html>