<!-- View Setelah welcome.blade.php, View Kedua -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title>Form Find Tiket</title>
</head>
<body>

    @include('header.header')

    <main>
        <section class="mySection">
            <h3>Cari Tiket Anda Disini</h3>
            <div class="rules">
                <div class="container-rules">
                    <h4>Nama Kota Asal, Kota Asal - Kota Tujuan</h4>
                    <p>{{session()->get("tanggal")}} | {{session()->get("jml")}} Orang</p>
                    <p>Silahkan Hubungi Pihak PO Jika Semua Tiket Habis</p>
                    <ul>
                        <li>1. Datang Setidaknya 15 menit sebelum bus berangkat</li>
                        <li>2. Persiapkan semua barang agar tidak ada yang tertinggal</li>
                    </ul>
                </div>
            </div>

            <div class="detail-tiket">
                <div class="container-detail-tiket">
                    <table>
                        <tr>
                            <th>Kode Rute</th>
                            <th>Waktu</th>
                            <th>Rute</th>
                            <th>Kelas</th>
                            <th>Harga</th>
                            <th>Ketersediaan Kursi</th>
                            <th></th>
                        </tr>

                    @foreach ($cek as $cek)
                        <tr>    
                                <td>{{$cek -> kode}}</td>
                                <td>{{$cek -> angkatan}}</td>
                                <td>{{session()->get("asal")}}-{{session()->get('tujuan')}}</td>
                                @php
                                $waa    = DB::table('tb_kelas_bus')->where('id_bus', $cek->id_kelas)->first();
                                $harga  = $waa->harga_bus + $price * session()->get("jml");
                                @endphp
                                <td>{{$waa->kelas_bus}}</td>
                                <td>IDR.{{$harga}}</td>
                                <td>
                                            
                                    @php 
                                        $patas = DB::table('tb_kursi_patas')->where('tanggal',session()->get("tanggal"))->where('id_rute', $cek->id)->count();
                                        $vip = DB::table('tb_kursi_vip')->where('tanggal',session()->get("tanggal"))->where('id_rute', $cek->id)->count();
                                        $exe = DB::table('tb_kursi_eksekutif')->where('tanggal',session()->get("tanggal"))->where('id_rute', $cek->id)->count();

                                        if($patas == null && $vip == null && $exe == null) {
                                            echo 'Kursi Tersedia';
                                        }else{
                                            if($patas != null) {
                                                $cheq = DB::table('tb_kursi_patas')->where('tanggal',session()->get("tanggal"))->where('id_rute', $cek->id)->first();
                                                if ($cheq->total_kursi == '0'){
                                                    echo 'Kursi Habis';
                                                }else{
                                                    $total = $cheq->total_kursi - session()->get('jml');
                                                    if ($total == '0'){
                                                        echo 'Kursi Habis';
                                                    }else{
                                                        echo 'Kursi Tersedia';
                                                    }
                                                }
                                            }elseif($vip != null) {
                                                $cheq = DB::table('tb_kursi_vip')->where('tanggal',session()->get("tanggal"))->where('id_rute', $cek->id)->first();
                                                if ($cheq->total_kursi == '0'){
                                                    echo 'Kursi Habis';
                                                }else{
                                                    $total = $cheq->total_kursi - session()->get('jml');
                                                    if ($total == '0'){
                                                        echo 'Kursi Habis';
                                                    }else{
                                                        echo 'Kursi Tersedia';
                                                    }
                                                }
                                            }elseif($exe != null) {
                                                $cheq = DB::table('tb_kursi_eksekutif')->where('tanggal',session()->get("tanggal"))->where('id_rute', $cek->id)->first();
                                                if ($cheq->total_kursi == '0'){
                                                    echo 'Kursi Habis';
                                                }else{
                                                    $total = $cheq->total_kursi - session()->get('jml');
                                                    if ($total == '0'){
                                                        echo 'Kursi Habis';
                                                    }else{
                                                        echo 'Kursi Tersedia';
                                                    }
                                                }
                                            }
                                        }
                                    @endphp
                                
                                </td>
                                <td>
                                    <form action="/pesan" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$cek->id}}">
                                    <input type="hidden" name="harga" value="{{$harga}}">
                                    <input type="hidden" name="UQ" value="{{uniqid()}}">
                                    <button type="submit">Pesan</button>
                                    </form>
                                     
                                </td>
                        </tr>
                        @endforeach
                        
                    </table>
                </div>
            </div>

        </section>
    </main>

    @include('footer.footer')
    
</body>
</html>