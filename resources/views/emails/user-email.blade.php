<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/email-template-style.css">
    <title>Pelunasan</title>
</head>
<body>

    <div class="containerBayar">
        <p style="font-size: 15px">UC {{$details['UQ']}}</p>
        <div class="bodyBayar">
            <p>Halo, {{$details['nama']}}</p>

            <p>PT XYZ punya kabar gembira nih!</p>
            <p>Berikut ini adalah daftar pesananmu yang nanti Kami proses setelah lunas yaa,</p>
            <p>Jurusan <span style="font-weight: bold">{{$details['asal']}}-{{$details['tujuan']}}</span> | Total Harga Dengan Penumpang Sebanyak <span style="font-weight: bold">{{$details['pesan']}}</span></p>
            <hr>
            <p style="font-weight: bold">Total Harga Yang Harus Dibayar {{$details['harga']}}</p>
            <hr>
            <p>Pembayaran tagihan sebesar <span style="font-weight: bold">IDR {{$details['harga']}}</span> dapat dilakukan melalui transfer bisa dilakukan ke rekening dibawah ini dengan <span style="font-weight: bold">Deadline pada {{$details['date']}}!</span></p>
            <p style="text-align: center;">Nomer Rekening <span style="font-weight: bold">{{$details['noRek']}}</span> Atas Nama <span style="font-weight: bold">{{$details['namaRek']}}</span></p>
            <p>Klik <a href="http://127.0.0.1:8000/validasi">Validasi</a> Untuk Melakukan Validasi Pembayaran
                
            </p>

        </div>
    </div>
    
</body>
</html>