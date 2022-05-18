<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/kursi-style.css">
    <title>Kursi</title>
</head>
<body>
    <div class="main-container-kursi">
        <div class="container-kursi">
            <table id="kursi">
                <tr>
                    <th>Seat</th>
                    <th>Seat</th>
                    <th></th>
                    <th>Seat</th>
                    <th>Seat</th>
                </tr>
                <tr>
                @php
                    $cek = DB::table('tb_kursi_vip')->where('tanggal', session()->get("tanggal"))->where('id_rute',$rute->id)->first();
                @endphp
                @if($cek->a1 == null)
                    <td><button name="seat" value="a1" class="btnPilih" onclick="Kursi(this.value)">A1</td>
                    @else
                    <td><button name="seat" value="a1" class="btnPilihMati">A1</td>
                    @endif

                @if($cek->b1 == null)
                    <td><button name="seat" value="b1" class="btnPilih" onclick="Kursi(this.value)">B1</td>
                    @else
                    <td><button name="seat" value="b1" class="btnPilihMati">B1</td>
                    @endif

                    <td></td>
                    
                    @if($cek->c1 == null)
                    <td><button name="seat" value="c1" class="btnPilih" onclick="Kursi(this.value)">C1</td>
                    @else
                    <td><button name="seat" value="c1" class="btnPilihMati">C1</td>
                    @endif
                    
                    @if($cek->d1 == null)
                    <td><button name="seat" value="d1" class="btnPilih" onclick="Kursi(this.value)">D1</td>
                    @else
                    <td><button name="seat" value="d1" class="btnPilihMati">D1</td>
                    @endif
                </tr>

                <tr>
                @if($cek->a2 == null)
                    <td><button name="seat" value="a2" class="btnPilih" onclick="Kursi(this.value)">A2</td>
                    @else
                    <td><button name="seat" value="a2" class="btnPilihMati">A2</td>
                    @endif
                    
                    @if($cek->b2 == null)
                    <td><button name="seat" value="b2" class="btnPilih" onclick="Kursi(this.value)">B2</td>
                    @else
                    <td><button name="seat" value="b2" class="btnPilihMati">B2</td>
                    @endif
                    
                    <td></td>
                    
                    @if($cek->c2 == null)
                    <td><button name="seat" value="c2" class="btnPilih" onclick="Kursi(this.value)">C2</td>
                    @else
                    <td><button name="seat" value="c2" class="btnPilihMati">C2</td>
                    @endif
                    
                    @if($cek->d2 == null)
                    <td><button name="seat" value="d2" class="btnPilih" onclick="Kursi(this.value)">D2</td>
                    @else
                    <td><button name="seat" value="d2" class="btnPilihMati">D2</td>
                    @endif
                </tr>

                <tr>
                @if($cek->a3 == null)
                    <td><button name="seat" value="a3" class="btnPilih" onclick="Kursi(this.value)">A3</td>
                    @else
                    <td><button name="seat" value="a3" class="btnPilihMati">A3</td>
                    @endif

                @if($cek->b3 == null)
                    <td><button name="seat" value="b3" class="btnPilih" onclick="Kursi(this.value)">B3</td>
                    @else
                    <td><button name="seat" value="b3" class="btnPilihMati">B3</td>
                    @endif
                    
                    <td></td>
                    
                    @if($cek->c3 == null)
                    <td><button name="seat" value="c3" class="btnPilih" onclick="Kursi(this.value)">C3</td>
                    @else
                    <td><button name="seat" value="c3" class="btnPilihMati">C3</td>
                    @endif
                    
                    @if($cek->d3 == null)
                    <td><button name="seat" value="d3" class="btnPilih" onclick="Kursi(this.value)">D3</td>
                    @else
                    <td><button name="seat" value="d3" class="btnPilihMati">D3</td>
                    @endif
                </tr>

                <tr>
                @if($cek->a4 == null)
                    <td><button name="seat" value="a4" class="btnPilih" onclick="Kursi(this.value)">A4</td>
                    @else
                    <td><button name="seat" value="a4" class="btnPilihMati">A4</td>
                    @endif
                    
                    @if($cek->b4 == null)
                    <td><button name="seat" value="b4" class="btnPilih" onclick="Kursi(this.value)">B4</td>
                    @else
                    <td><button name="seat" value="b4" class="btnPilihMati">B4</td>
                    @endif

                    <td></td>
                    
                    @if($cek->c4 == null)
                    <td><button name="seat" value="c4" class="btnPilih" onclick="Kursi(this.value)">C4</td>
                    @else
                    <td><button name="seat" value="c4" class="btnPilihMati">C4</td>
                    @endif
                    
                    @if($cek->d4 == null)
                    <td><button name="seat" value="d4" class="btnPilih" onclick="Kursi(this.value)">D4</td>
                    @else
                    <td><button name="seat" value="d4" class="btnPilihMati">D4</td>
                    @endif
                </tr>

                <tr>
                @if($cek->a5 == null)
                    <td><button name="seat" value="a5" class="btnPilih" onclick="Kursi(this.value)">A5</td>
                    @else
                    <td><button name="seat" value="a5" class="btnPilihMati">A5</td>
                    @endif

                @if($cek->b5 == null)
                    <td><button name="seat" value="b5" class="btnPilih" onclick="Kursi(this.value)">B5</td>
                    @else
                    <td><button name="seat" value="b5" class="btnPilihMati">B5</td>
                    @endif
                    
                    <td></td>
                    
                    @if($cek->c5 == null)
                    <td><button name="seat" value="c5" class="btnPilih" onclick="Kursi(this.value)">C5</td>
                    @else
                    <td><button name="seat" value="c5" class="btnPilihMati">C5</td>
                    @endif
                    
                    @if($cek->d5 == null)
                    <td><button name="seat" value="d5" class="btnPilih" onclick="Kursi(this.value)">D5</td>
                    @else
                    <td><button name="seat" value="d5" class="btnPilihMati">D5</td>
                    @endif
                </tr>

                <tr>
                @if($cek->a6 == null)
                    <td><button name="seat" value="a6" class="btnPilih" onclick="Kursi(this.value)">A6</td>
                    @else
                    <td><button name="seat" value="a6" class="btnPilihMati">A6</td>
                    @endif

                @if($cek->d6 == null)
                    <td><button name="seat" value="d6" class="btnPilih" onclick="Kursi(this.value)">B6</td>
                    @else
                    <td><button name="seat" value="d6" class="btnPilihMati">B6</td>
                    @endif
                    
                    <td></td>
                    
                    @if($cek->c6 == null)
                    <td><button name="seat" value="c6" class="btnPilih" onclick="Kursi(this.value)">C6</td>
                    @else
                    <td><button name="seat" value="c6" class="btnPilihMati">C6</td>
                    @endif
                    
                    @if($cek->d6 == null)
                    <td><button name="seat" value="d6" class="btnPilih" onclick="Kursi(this.value)">D6</td>
                    @else
                    <td><button name="seat" value="d6" class="btnPilihMati">D6</td>
                    @endif
                </tr>
                <tr>
                    <td>Jalan</td>
                    <td>Masuk</td>
                    <td></td>
                    @if($cek->c7 == null)
                    <td><button name="seat" value="c7" class="btnPilih" onclick="Kursi(this.value)">C7</td>
                    @else
                    <td><button name="seat" value="c7" class="btnPilihMati">C7</td>
                    @endif
                    
                    @if($cek->d7 == null)
                    <td><button name="seat" value="d7" class="btnPilih" onclick="Kursi(this.value)">D7</td>
                    @else
                    <td><button name="seat" value="d7" class="btnPilihMati">D7</td>
                    @endif
                </tr>

                <tr>
                @if($cek->a7 == null)
                    <td><button name="seat" value="a7" class="btnPilih" onclick="Kursi(this.value)">A7</td>
                    @else
                    <td><button name="seat" value="a7" class="btnPilihMati">A7</td>
                    @endif

                @if($cek->b7 == null)
                    <td><button name="seat" value="b7" class="btnPilih" onclick="Kursi(this.value)">B7</td>
                    @else
                    <td><button name="seat" value="b7" class="btnPilihMati">B7</td>
                    @endif
                    
                    <td></td>
                    
                    @if($cek->c8 == null)
                    <td><button name="seat" value="c8" class="btnPilih" onclick="Kursi(this.value)">C8</td>
                    @else
                    <td><button name="seat" value="c8" class="btnPilihMati">C8</td>
                    @endif
                    
                    @if($cek->d8 == null)
                    <td><button name="seat" value="d8" class="btnPilih" onclick="Kursi(this.value)">D8</td>
                    @else
                    <td><button name="seat" value="d8" class="btnPilihMati">D8</td>
                    @endif
                </tr>

                <tr>
                @if($cek->a8 == null)
                    <td><button name="seat" value="a8" class="btnPilih" onclick="Kursi(this.value)">A8</td>
                    @else
                    <td><button name="seat" value="a8" class="btnPilihMati">A8</td>
                    @endif

                @if($cek->b8 == null)
                    <td><button name="seat" value="b8" class="btnPilih" onclick="Kursi(this.value)">B8</td>
                    @else
                    <td><button name="seat" value="b8" class="btnPilihMati">B8</td>
                    @endif
                    
                    <td></td>
                    
                    @if($cek->c9 == null)
                    <td><button name="seat" value="c9" class="btnPilih" onclick="Kursi(this.value)">C9</td>
                    @else
                    <td><button name="seat" value="c9" class="btnPilihMati">C9</td>
                    @endif
                    
                    @if($cek->d9 == null)
                    <td><button name="seat" value="d9" class="btnPilih" onclick="Kursi(this.value)">D9</td>
                    @else
                    <td><button name="seat" value="d9" class="btnPilihMati">D9</td>
                    @endif
                </tr>

                <tr>
                @if($cek->a9 == null)
                    <td><button name="seat" value="a9" class="btnPilih" onclick="Kursi(this.value)">A9</td>
                    @else
                    <td><button name="seat" value="a9" class="btnPilihMati">A9</td>
                    @endif

                @if($cek->b9 == null)
                    <td><button name="seat" value="b9" class="btnPilih" onclick="Kursi(this.value)">B9</td>
                    @else
                    <td><button name="seat" value="b9" class="btnPilihMati">B9</td>
                    @endif
                    
                    <td></td>
                    
                    @if($cek->c10 == null)
                    <td><button name="seat" value="c10" class="btnPilih" onclick="Kursi(this.value)">C10</td>
                    @else
                    <td><button name="seat" value="c10" class="btnPilihMati">C10</td>
                    @endif
                    
                    @if($cek->d10 == null)
                    <td><button name="seat" value="d10" class="btnPilih" onclick="Kursi(this.value)">D10</td>
                    @else
                    <td><button name="seat" value="d10" class="btnPilihMati">D10</td>
                    @endif
                </tr>
                <tr>
                @if($cek->a10 == null)
                    <td><button name="seat" value="a10" class="btnPilih" onclick="Kursi(this.value)">A10</td>
                    @else
                    <td><button name="seat" value="a10" class="btnPilihMati">A10</td>
                    @endif

                @if($cek->b10 == null)
                    <td><button name="seat" value="b10" class="btnPilih" onclick="Kursi(this.value)">B10</td>
                    @else
                    <td><button name="seat" value="b10" class="btnPilihMati">B10</td>
                    @endif
                    
                    <td></td>
                    <td>Kamar</td>
                    <td>kecil</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>