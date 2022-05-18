<!-- View Pengisian Data Penumpang, View Setelah Form Data Diri, View Keempat-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">

    <title>Form Data Penumpang</title>
</head>
<body>
    
    @include('header.header')

    <main>
        <section class="mySection">
            <h3>Masukan Data Penumpang</h3>
            <form action="/insertpenumpang" method="POST">
                @csrf
                <div class="container-data-diri">
                    <div class="data-diri">
                        <div class="title-data">
                            <h1>Data Penumpang</h1>
                        </div>
                        <input type="hidden" name="id" value="{{$id->id_pemesanan}}">
                        <div class="body-data">
                            <div class="input-grip">
                                <label for="">Nama Lengkap</label>
                                <input type="text" name="nama" id="nama" > <br>

                                <label for="">Kontak</label>
                                <input type="text" name="kontak" id="kontak"> <br>

                                <label for="">Tanggal Lahir</label>
                                <input type="date" name="tanggal" id="tanggal"> 

                                <label for="">Catatan</label>
                                <input type="text" name="catatan" id="catatan" placeholder="Masukan Informasi Tambahan"> <br>  

                                <input type="button" value="Lihat Denah" id="myBtn"> <br> 
                                <input type="hidden" name="kursi" id="kursi">
                                <p>Kursi Yang Dipilih : <p id="code"></p> </p>  

                                <div class="tips-data-penumpang">
                                    <ul>
                                        <li>Gunakan Tombol Tambah Penumpang Untuk Menambah Tiket</li>
                                        <li>Jika Sudah Selesai Melakukan Pengisian Penumpang Tekan Tombol "Selesai"</li>
                                    </ul>
                                </div>
                                
                            </div>
                        </div>

                        
                        <?php
                           $cek = DB::table('tb_data_diri')->where('id_pemesanan',$id->id_pemesanan)->count();
                           $e = $cek + 1;
                            if($e == $id->jml_penumpang){ 
                        ?>
                                <button type="submit" name="action" value="Tambah Penumpang" class="data_penumpang_btn" disabled>Tambah Penumpang</button>
                                <button type="submit" name="action" value="Selesai" class="data_penumpang_btn">Selesai</button>
                        <?php  
                            }else{
                        ?>
                                <button type="submit" name="action" value="Tambah Penumpang" class="data_penumpang_btn">Tambah Penumpang</button> 
                                <button type="submit" name="action" value="Selesai" class="data_penumpang_btn" disabled>Selesai</button>
                        <?php
                            }
                        ?>     
                    </div>
                </div>
            </form>
            <div class="chair-choise" id="myModal">
                @if ($rute->id_kelas == '9' )
                    @include('kursi.patas')
                @elseif($rute->id_kelas == '10')
                    @include('kursi.vip')
                @else
                    @include('kursi.eksekutif')
                @endif
            </div>
            <!-- kursi -->
        </section>
    </main>

    @include('footer.footer')
    
    <script>
    // modals
// Get the modal
var modal = document.getElementById("myModal");
// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<script>
    function Kursi(val) {
        var dapatCode   = document.getElementById("kursi").value = val;
        var tryKursi    = document.getElementById("code");
        var upperCase   = dapatCode.toUpperCase();

        tryKursi.innerHTML = upperCase;
        console.log(tryKursi);
    }
</script>
</body>
</html>