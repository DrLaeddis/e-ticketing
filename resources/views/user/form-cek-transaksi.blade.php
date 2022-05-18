<!-- View Cek Transaksi, View Terakhir -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title>Cek Transaksi</title>
</head>
<body>
    
    @include('header.header')

    <main>
        <section class="mySection">
            <h3>Cek Transaksi</h3>
            <div class="container-cek-transaksi">
                <div class="body-data">
                    <div class="input-grip">
                        <label for="">Nama Lengkap : </label> {{$data->pemesan}} <br>

                        <label for="">Kontak : </label> {{$data->no_hp}} <br>
                        
                        <label for="">Email : </label> {{$data->email}} <br>
                    </div>
                
                    <div class="input-grip">
                        <label for="">Jumlah Penumpang : {{$data->jml_penumpang}} </label> <br>
                        
                        <label for="">Total Bayar : </label> {{$data->jml_bayar}} <br>

                        <label for="">Catatan : </label> <br>
                    </div>
                        <a href="/forward/{{$data->id_pemesanan}}"><button>Pesan</button></a>
                        <a href="/cancel/{{$data->id_pemesanan}}"><button>Cancel</button></a>
                    </div>
                </div>
            </div>
        </section>
    </main>     

    @include('footer.footer')
    
</body>
</html>