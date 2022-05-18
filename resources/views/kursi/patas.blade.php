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
        <h3>Patas</h3>
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
                    $cek = DB::table('tb_kursi_patas')->where('tanggal', session()->get("tanggal"))->where('id_rute',$rute->id)->first();
                @endphp
                @if($cek->a1 == null)
                    <td><button name="seat" value="a1" class="btnPilih" onclick="Kursi(this.value)">A1</button></td>
                @else
                    <td><button name="seat" value="a1" class="btnPilihMati" >A1</button></td>
                @endif

                @if($cek->b1 == null)
                    <td><button name="seat" value="b1" class="btnPilih" onclick="Kursi(this.value)">B1</button></td>
                @else
                    <td><button name="seat" value="b1" class="btnPilihMati" >B1</button></td>
                @endif

                    <td></td>

                @if($cek->c1 == null)
                    <td><button name="seat" value="c1" class="btnPilih" onclick="Kursi(this.value)">C1</button></td>
                @else
                    <td><button name="seat" value="c1" class="btnPilihMati">C1</button></td>
                @endif
                
                @if($cek->d1 == null)
                    <td><button name="seat" value="d1" class="btnPilih" onclick="Kursi(this.value)">D1</button></td>
                @else
                    <td><button name="seat" value="d1" class="btnPilihMati">D1</button></td>
                @endif
                </tr>

                <tr>
                @if($cek->a2 == null)
                    <td><button name="seat" value="a2" class="btnPilih" onclick="Kursi(this.value)">A2</button></td>
                @else
                    <td><button name="seat" value="a2" class="btnPilihMati">A2</button></td>
                @endif

                @if($cek->b2 == null)
                    <td><button name="seat" value="b2" class="btnPilih" onclick="Kursi(this.value)">B2</button></td>
                @else
                    <td><button name="seat" value="b2" class="btnPilihMati">B2</button></td>
                @endif
                    
                    <td></td>

                @if($cek->c2 == null)
                    <td><button name="seat" value="c2" class="btnPilih" onclick="Kursi(this.value)">C2</button></td>
                @else
                    <td><button name="seat" value="c2" class="btnPilihMati">C2</button></td>
                @endif

                @if($cek->d2 == null)
                    <td><button name="seat" value="d2" class="btnPilih" onclick="Kursi(this.value)">D2</button></td>
                @else
                    <td><button name="seat" value="d2" class="btnPilihMati">D2</button></td>
                @endif
                </tr>

                <tr>
                @if($cek->a3 == null)
                    <td><button name="seat" value="a3" class="btnPilih" onclick="Kursi(this.value)">A3</button></td>
                @else
                    <td><button name="seat" value="a3" class="btnPilihMati">A3</button></td>
                @endif

                @if($cek->b3 == null)
                    <td><button name="seat" value="b3" class="btnPilih" onclick="Kursi(this.value)">B3</button></td>
                @else
                    <td><button name="seat" value="b3" class="btnPilihMati">B3</button></td>
                @endif

                    <td></td>

                @if($cek->c3 == null)  
                    <td><button name="seat" value="c3" class="btnPilih" onclick="Kursi(this.value)">C3</button></td>
                @else
                    <td><button name="seat" value="c3" class="btnPilihMati">C3</button></td>
                @endif


                @if($cek->d3 == null)
                    <td><button name="seat" value="d3" class="btnPilih" onclick="Kursi(this.value)">D3</button></td>
                @else
                    <td><button name="seat" value="d3" class="btnPilihMati">D3</button></td>
                @endif
                </tr>

                <tr>
                @if($cek->a4 == null)
                    <td><button name="seat" value="a4" class="btnPilih" onclick="Kursi(this.value)">A4</button></td>
                    @else
                    <td><button name="seat" value="a4" class="btnPilihMati">A4</button></td>
                    @endif

                    @if($cek->b4 == null)
                    <td><button name="seat" value="b4" class="btnPilih" onclick="Kursi(this.value)">B4</button></td>
                    @else
                    <td><button name="seat" value="b4" class="btnPilihMati">B4</button></td>
                    @endif
                    
                    <td></td>
                    
                    @if($cek->c4 == null)
                    <td><button name="seat" value="c4" class="btnPilih" onclick="Kursi(this.value)">C4</button></td>
                    @else
                    <td><button name="seat" value="c4" class="btnPilihMati">C4</button></td>
                    @endif

                    @if($cek->d4 == null)
                    <td><button name="seat" value="d4" class="btnPilih" onclick="Kursi(this.value)">D4</button></td>
                    @else
                    <td><button name="seat" value="d4" class="btnPilihMati">D4</button></td>
                    @endif
                </tr>

                <tr>
                @if($cek->a5 == null)
                    <td><button name="seat" value="a5" class="btnPilih" onclick="Kursi(this.value)">A5</button></td>
                    @else
                    <td><button name="seat" value="a5" class="btnPilihMati">A5</button></td>
                    @endif

                    @if($cek->b5 == null)
                    <td><button name="seat" value="b5" class="btnPilih" onclick="Kursi(this.value)">B5</button></td>
                    @else
                    <td><button name="seat" value="b5" class="btnPilihMati">B5</button></td>
                    @endif

                    <td></td>

                    @if($cek->c5 == null)
                    <td><button name="seat" value="c5" class="btnPilih" onclick="Kursi(this.value)">C5</button></td>
                    @else
                    <td><button name="seat" value="c5" class="btnPilihMati">C5</button></td>
                    @endif

                    @if($cek->d5 == null)
                    <td><button name="seat" value="d5" class="btnPilih" onclick="Kursi(this.value)">D5</button></td>
                    @else
                    <td><button name="seat" value="d5" class="btnPilihMati">D5</button></td>
                    @endif
                </tr>

                <tr>
                @if($cek->a6 == null)
                    <td><button name="seat" value="a6" class="btnPilih" onclick="Kursi(this.value)">A6</button></td>
                    @else
                    <td><button name="seat" value="a6" class="btnPilihMati">A6</button></td>
                    @endif

                    @if($cek->b6 == null)
                    <td><button name="seat" value="b6" class="btnPilih" onclick="Kursi(this.value)">B6</button></td>
                    @else
                    <td><button name="seat" value="b6" class="btnPilihMati">B6</button></td>
                    @endif

                    <td></td>

                    @if($cek->c6 == null)
                    <td><button name="seat" value="c6" class="btnPilih" onclick="Kursi(this.value)">C6</button></td>
                    @else
                    <td><button name="seat" value="c6" class="btnPilihMati">C6</button></td>
                    @endif

                    @if($cek->d6 == null)
                    <td><button name="seat" value="d6" class="btnPilih" onclick="Kursi(this.value)">D6</button></td>
                    @else
                    <td><button name="seat" value="d6" class="btnPilihMati">D6</button></td>
                    @endif
                </tr>

                <tr>
                @if($cek->a7 == null)
                    <td><button name="seat" value="a7" class="btnPilih" onclick="Kursi(this.value)">A7</button></td>
                    @else
                    <td><button name="seat" value="a7" class="btnPilihMati">A7</button></td>
                    @endif

                    @if($cek->b7 == null)
                    <td><button name="seat" value="b7" class="btnPilih" onclick="Kursi(this.value)">B7</button></td>
                    @else
                    <td><button name="seat" value="b7" class="btnPilihMati">B7</button></td>
                    @endif

                    <td></td>

                    @if($cek->c7 == null)
                    <td><button name="seat" value="c7" class="btnPilih" onclick="Kursi(this.value)">C7</button></td>
                    @else
                    <td><button name="seat" value="c7" class="btnPilihMati">C7</button></td>
                    @endif

                    @if($cek->d7 == null)
                    <td><button name="seat" value="d7" class="btnPilih" onclick="Kursi(this.value)">D7</button></td>
                    @else
                    <td><button name="seat" value="d7" class="btnPilihMati">D7</button></td>
                    @endif
                </tr>

                <tr>
                @if($cek->a8 == null)
                    <td><button name="seat" value="a8" class="btnPilih" onclick="Kursi(this.value)">A8</button></td>
                    @else
                    <td><button name="seat" value="a8" class="btnPilihMati">A8</button></td>
                    @endif

                    @if($cek->b8 == null)
                    <td><button name="seat" value="b8" class="btnPilih" onclick="Kursi(this.value)">B8</button></td>
                    @else
                    <td><button name="seat" value="b8" class="btnPilihMati">B8</button></td>
                    @endif

                    <td></td>

                    @if($cek->c8 == null)
                    <td><button name="seat" value="c8" class="btnPilih" onclick="Kursi(this.value)">C8</button></td>
                    @else
                    <td><button name="seat" value="c8" class="btnPilihMati">C8</button></td>
                    @endif

                    @if($cek->d8 == null)
                    <td><button name="seat" value="d8" class="btnPilih" onclick="Kursi(this.value)">D8</button></td>
                    @else
                    <td><button name="seat" value="d8" class="btnPilihMati">D8</button></td>
                    @endif
                </tr>

                <tr>
                @if($cek->a9 == null)
                    <td><button name="seat" value="a9" class="btnPilih" onclick="Kursi(this.value)">A9</button></td>
                    @else
                    <td><button name="seat" value="a9" class="btnPilihMati">A9</button></td>
                    @endif

                    @if($cek->b9 == null)
                    <td><button name="seat" value="b9" class="btnPilih" onclick="Kursi(this.value)">B9</button></td>
                    @else
                    <td><button name="seat" value="b9" class="btnPilihMati">B9</button></td>
                    @endif

                    <td></td>

                    @if($cek->c9 == null)
                    <td><button name="seat" value="c9" class="btnPilih" onclick="Kursi(this.value)">C9</button></td>
                    @else
                    <td><button name="seat" value="c9" class="btnPilihMati">C9</button></td>
                    @endif

                    @if($cek->d9 == null)
                    <td><button name="seat" value="d9" class="btnPilih" onclick="Kursi(this.value)">D9</button></td>
                    @else
                    <td><button name="seat" value="d9" class="btnPilihMati">D9</button></td>
                    @endif
                </tr>
                <tr>
                @if($cek->a10 == null)
                    <td><button name="seat" value="a10" class="btnPilih" onclick="Kursi(this.value)">A10</button></td>
                    @else
                    <td><button name="seat" value="a10" class="btnPilihMati">A10</button></td>
                    @endif

                    @if($cek->b10 == null)
                    <td><button name="seat" value="b10" class="btnPilih" onclick="Kursi(this.value)">B10</button></td>
                    @else
                    <td><button name="seat" value="b10" class="btnPilihMati">B10</button></td>
                    @endif

                    <td></td>

                    @if($cek->c10 == null)
                    <td><button name="seat" value="c10" class="btnPilih" onclick="Kursi(this.value)">C10</button></td>
                    @else
                    <td><button name="seat" value="c10" class="btnPilihMati">C10</button></td>
                    @endif

                    @if($cek->d10 == null)
                    <td><button name="seat" value="d10" class="btnPilih" onclick="Kursi(this.value)">D10</button></td>
                    @else
                    <td><button name="seat" value="d10" class="btnPilihMati">D10</button></td>
                    @endif
                </tr>

                <tr>
                @if($cek->a11 == null)
                    <td><button name="seat" value="a11" class="btnPilih" onclick="Kursi(this.value)">A11</button></td>
                    @else
                    <td><button name="seat" value="a11" class="btnPilihMati">A11</button></td>
                    @endif

                    @if($cek->b11 == null)
                    <td><button name="seat" value="b11" class="btnPilih" onclick="Kursi(this.value)">B11</button></td>
                    @else
                    <td><button name="seat" value="b11" class="btnPilihMati">B11</button></td>
                    @endif

                    @if($cek->c11 == null)
                    <td><button name="seat" value="c11" class="btnPilih" onclick="Kursi(this.value)">C11</button></td>
                    @else
                    <td><button name="seat" value="c11" class="btnPilihMati">C11</button></td>
                    @endif

                    @if($cek->d11 == null)
                    <td><button name="seat" value="d11" class="btnPilih" onclick="Kursi(this.value)">D11</button></td>
                    @else
                    <td><button name="seat" value="d11" class="btnPilihMati">D11</button></td>
                    @endif

                    @if($cek->e11 == null)
                    <td><button name="seat" value="e11" class="btnPilih" onclick="Kursi(this.value)">E11</button></td>
                    @else
                    <td><button name="seat" value="e11" class="btnPilihMati">E11</button></td>
                    @endif
                </tr>
            </table>
        </div>
    </div>
</body>
</html>