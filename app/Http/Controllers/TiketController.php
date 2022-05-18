<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Mail;

use Storage;

class TiketController extends Controller
{
    public function index() {
        $prov   = DB::table('tb_kota')->get();
        $kelas  = DB::table('tb_kelas_bus')->get();
        return view('user.welcome', ['data' => $prov],['kelas'=>$kelas]);
    }

    public function tiket(Request $req) {

        $asal   = DB::table('tb_rute')->where('A1',$req->KotaAsal)->orWhere('A2',$req->KotaAsal)->orWhere('A3',$req->KotaAsal)->orWhere('A4',$req->KotaAsal)->orWhere('A5',$req->KotaAsal)->pluck('id');
        $tujuan = DB::table('tb_rute')->where('A1',$req->KotaTujuan)->orWhere('A2',$req->KotaTujuan)->orWhere('A3',$req->KotaTujuan)->orWhere('A4',$req->KotaTujuan)->orWhere('A5',$req->KotaTujuan)->pluck('id');
        
        $a = DB::table('tb_kota')->where('id',$req->KotaAsal)->first();
        $b = DB::table('tb_kota')->where('id',$req->KotaTujuan)->first();

        if($a->id_provinsi == $b->id_provinsi) {
            $z = DB::table('tb_provinsi')->where('id_provinsi',$a->id_provinsi)->first();
            $price = $z->harga;
            if($req->kelas == '0') {
                $rute = DB::table('tb_rute')->whereIn('id',$asal)->whereIn('id',$tujuan)->get();
            }else{
                $rute = DB::table('tb_rute')->whereIn('id',$asal)->whereIn('id',$tujuan)->where('id_kelas', $req->kelas)->get();
            }
        }elseif($a->id_provinsi == '1' && $b->id_provinsi == '3' || $a->id_provinsi == '3' && $b->id_provinsi == '1'){
            $z = DB::table('tb_provinsi')->where('id_provinsi','1')->first();
            $x = DB::table('tb_provinsi')->where('id_provinsi','2')->first();
            $c = DB::table('tb_provinsi')->where('id_provinsi','3')->first();
            $price = $z->harga + $x->harga + $c->harga;
            if($req->kelas == '0') {
                $rute = DB::table('tb_rute')->whereIn('id',$asal)->whereIn('id',$tujuan)->get();
            }else{
                $rute = DB::table('tb_rute')->whereIn('id',$asal)->whereIn('id',$tujuan)->where('id_kelas', $req->kelas)->get();
            }
        }else{
            $z = DB::table('tb_provinsi')->where('id_provinsi',$a->id_provinsi)->first();
            $c = DB::table('tb_provinsi')->where('id_provinsi',$b->id_provinsi)->first();
            $price = $z->harga + $c->harga;
            if($req->kelas == '0') {
                $rute = DB::table('tb_rute')->whereIn('id',$asal)->whereIn('id',$tujuan)->get();
            }else{
                $rute = DB::table('tb_rute')->whereIn('id',$asal)->whereIn('id',$tujuan)->where('id_kelas', $req->kelas)->get();
            }
        }
        $namaa  = DB::table('tb_kota')->where('id',$req->KotaAsal)->first();
        $namaaa = DB::table('tb_kota')->where('id',$req->KotaTujuan)->first();
        $req->session()->put("asal", $namaa->nama_kota);
        $req->session()->put("tujuan", $namaaa->nama_kota);
        $req->session()->put("tanggal", $req->tanggal);
        $req->session()->put("jml", $req->penumpang);

        return view ('user.form-find-tiket', ['cek'=>$rute], compact('price')); //untuk mengarahkan ke web yang diinginkan
    }
    
    public function data() {
        if(session()->has("asal")) {
            return view ('user.form-data-diri');
        }else{
            $id = DB::table('tb_pemesanan_tiket')->where('UC',session()->get("UQ"))->first();
            $rute = DB::table('tb_rute')->where('id', $id->id_rute)->first();
            return view ('user.form-data-penumpang', compact('id'), compact('rute'));
        }
    }

    public function pesan(Request $req) {
        $req->session()->put("id_rute",$req->id);
        $req->session()->put("jml_bayar", $req->harga);
        $req->session()->put("UQ", $req->UQ);
        return redirect ('/data');
    }   

    public function insertdata(Request $req) {
        DB::table('tb_pemesanan_tiket')->insert([
            'tanggal'           => session()->get("tanggal"),
            'pemesan'           => $req->nama,
            'no_hp'             => $req->kontak,
            'email'             => $req->email,
            'asal'              => session()->get("asal"),
            'tujuan'            => session()->get("tujuan"),
            'status_pembayaran' => "sedang memesan",
            'UC'                => session()->get("UQ"),
            'jml_penumpang'     => session()->get("jml"),
            'jml_bayar'         => session()->get("jml_bayar"),
            'id_rute'           => session()->get("id_rute")
        ]);
        $kurs = DB::table('tb_rute')->where('id', session()->get("id_rute"))->first();
        if ($kurs->id_kelas == 9){
            $cek = DB::table('tb_kursi_patas')->where('tanggal', session()->get("tanggal"))->count();
            if($cek == null){
                DB::table('tb_kursi_patas')->insert([
                    'tanggal' => session()->get("tanggal"),
                    'id_rute' => session()->get("id_rute"),
                    'total_kursi'=> '45'
                ]);
                $req->session()->forget(["asal","tujuan"]);
                return redirect('/data');
            }else{
                $req->session()->forget(["asal","tujuan"]);
                return redirect('/data');
            }
        }elseif($kurs->id_kelas == 10){
            $cek = DB::table('tb_kursi_vip')->where('tanggal', session()->get("tanggal"))->count();
            if($cek == null){
                DB::table('tb_kursi_vip')->insert([
                    'tanggal' => session()->get("tanggal"),
                    'id_rute' => session()->get("id_rute"),
                    'total_kursi' => '40'
                ]);
                $req->session()->forget(["asal","tujuan"]);
                return redirect('/data');
            }else{
                $req->session()->forget(["asal","tujuan"]);
                return redirect('/data');
            }
        }else{
            $cek = DB::table('tb_kursi_eksekutif')->where('tanggal', session()->get("tanggal"))->count();
            if($cek == null){
                DB::table('tb_kursi_eksekutif')->insert([
                    'tanggal' => session()->get("tanggal"),
                    'id_rute' => session()->get("id_rute"),
                    'total_kursi' => '36'
                ]);
                $req->session()->forget(["asal","tujuan"]);
                return redirect('/data');
            }else{
                $req->session()->forget(["asal","tujuan"]);
                return redirect('/data');
            }
        }
    }

    public function insertpenumpang(Request $req) {
        switch ($req->input('action')) {
            case 'Selesai':
                DB::table('tb_data_diri')->insert([
                    'nama' => $req->nama,
                    'tgl_lahir' => $req->tanggal,
                    'note' => $req->catatan,
                    'id_pemesanan' => $req->id,
                    'kursi' => $req->kursi
                ]);
                $patas = DB::table('tb_kursi_patas')->where('tanggal',session()->get("tanggal"))->where('id_rute', session()->get("id_rute"))->count();
                $vip = DB::table('tb_kursi_vip')->where('tanggal',session()->get("tanggal"))->where('id_rute', session()->get("id_rute"))->count();
                $exe = DB::table('tb_kursi_eksekutif')->where('tanggal',session()->get("tanggal"))->where('id_rute', session()->get("id_rute"))->count();
                if($patas != null) {
                    $kursi = DB::table('tb_kursi_patas')->where('tanggal',session()->get("tanggal"))->where('id_rute', session()->get("id_rute"))->first();
                    $total = $kursi->total_kursi - session()->get("jml");
                    DB::table('tb_kursi_patas')->where('tanggal',session()->get("tanggal"))->where('id_rute', session()->get("id_rute"))->update([
                        $req->kursi => '1',
                        'total_kursi' => $total
                    ]);
                }elseif($vip != null) {
                    $kursi = DB::table('tb_kursi_vip')->where('tanggal',session()->get("tanggal"))->where('id_rute', session()->get("id_rute"))->first();
                    $total = $kursi->total_kursi - session()->get("jml");
                    DB::table('tb_kursi_vip')->where('tanggal',session()->get("tanggal"))->where('id_rute', session()->get("id_rute"))->update([
                        $req->kursi => '1',
                        'total_kursi' => $total
                    ]);
                }elseif($exe != null) {
                    $kursi = DB::table('tb_kursi_eksekutif')->where('tanggal',session()->get("tanggal"))->where('id_rute', session()->get("id_rute"))->first();
                    $total = $kursi->total_kursi - session()->get("jml");
                    DB::table('tb_kursi_eksekutif')->where('tanggal',session()->get("tanggal"))->where('id_rute', session()->get("id_rute"))->update([
                        $req->kursi => '1',
                        'total_kursi' => $total
                    ]);
                }

                session()->forget(["id_rute", "tanggal"]);
                return redirect('/checkout');
                break;
            case 'Tambah Penumpang':
                DB::table('tb_data_diri')->insert([
                    'nama' => $req->nama,
                    'tgl_lahir' => $req->tanggal,
                    'note' => $req->catatan,
                    'id_pemesanan' => $req->id,
                    'kursi' => $req->kursi
                ]);

                $patas = DB::table('tb_kursi_patas')->where('tanggal',session()->get("tanggal"))->where('id_rute', session()->get("id_rute"))->count();
                $vip = DB::table('tb_kursi_vip')->where('tanggal',session()->get("tanggal"))->where('id_rute', session()->get("id_rute"))->count();
                $exe = DB::table('tb_kursi_eksekutif')->where('tanggal',session()->get("tanggal"))->where('id_rute', session()->get("id_rute"))->count();
                if($patas != null) {
                    $kursi = DB::table('tb_kursi_patas')->where('tanggal',session()->get("tanggal"))->where('id_rute', session()->get("id_rute"))->first();
                    $total = $kursi->total_kursi - session()->get("jml");
                    DB::table('tb_kursi_patas')->where('tanggal',session()->get("tanggal"))->where('id_rute', session()->get("id_rute"))->update([
                        $req->kursi => '1',
                        'total_kursi' => $total
                    ]);
                }elseif($vip != null) {
                    $kursi = DB::table('tb_kursi_vip')->where('tanggal',session()->get("tanggal"))->where('id_rute', session()->get("id_rute"))->first();
                    $total = $kursi->total_kursi - session()->get("jml");
                    DB::table('tb_kursi_vip')->where('tanggal',session()->get("tanggal"))->where('id_rute', session()->get("id_rute"))->update([
                        $req->kursi => '1',
                        'total_kursi' => $total
                    ]);
                }elseif($exe != null) {
                    $kursi = DB::table('tb_kursi_eksekutif')->where('tanggal',session()->get("tanggal"))->where('id_rute', session()->get("id_rute"))->first();
                    $total = $kursi->total_kursi - session()->get("jml");
                    DB::table('tb_kursi_eksekutif')->where('tanggal',session()->get("tanggal"))->where('id_rute', session()->get("id_rute"))->update([
                        $req->kursi => '1',
                        'total_kursi' => $total
                    ]);
                }
                return redirect('/data');
                break;
        }

        
    }
    public function checkout() {
        $data = DB::table('tb_pemesanan_tiket')->where('UC', session()->get("UQ"))->first();
        return view('user.form-cek-transaksi', compact('data'));
    }

    public function forward($id) {
        DB::table('tb_pemesanan_tiket')->where('id_pemesanan', $id)->update([
            'status_pembayaran' => "menunggu pembayaran"
        ]);
        session()->flush();
        $rekening   = DB::table('tb_rekening')->where('id_rekening', '1')->first();
        $email      =   DB::table('tb_pemesanan_tiket')->where('id_pemesanan', $id)->first();
        $details    = [
            'title'     => 'Mail From PT XYZ',
            'body'      => 'This is form testing email',
            'UQ'        => $email->UC,
            'nama'      => $email->pemesan,
            'harga'     => $email->jml_bayar,
            'asal'      => $email->asal,
            'tujuan'    => $email->tujuan,
            'pesan'     => $email->jml_penumpang,
            'date'      => $email->tanggal,
            'noRek'     => $rekening->nomer_rekening,
            'namaRek'   => $rekening->nama_rekening
        ];
        Mail::to($email->email)->send(new \App\mail\detailbayarmail($details));
        return redirect('/');
    }

    public function cancel($id) {
        session()->flush();
        DB::table('tb_pemesanan_tiket')->where('id_pemesanan',$id)->delete();
        return redirect('/');
    }

    public function validasi(Request $req) {
        return view ('/user.form-user-validasi');
    }

    public function bayar(Request $req) {
        $bukti  = $req->berkasValidasi;
        $nama   = $bukti->getClientOriginalName();
        Storage::putFileAs('public/buktiBayar', $bukti, $nama);

        DB::table('tb_pemesanan_tiket')->where('UC', $req->UC)->update([
            'status_pembayaran' => 'Menunggu Validasi',
            'validasi' => $nama
        ]);
        return redirect('/');
    }

}

// patas 45
// vip 40
// eksekutif 36
