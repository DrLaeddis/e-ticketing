<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Mail;

use Storage;    

class AdminController extends Controller
{
    public function home(Request $req) {
        $cek = DB::table('tb_rute') -> get();        

        return view ('admin.admin', ['cek'=>$cek]);
    } //admin control

    public function transaksi(Request $req) {
        $pemesanan = DB::table('tb_pemesanan_tiket') -> get();

        return view ('admin.transaksi', ['pemesanan'=>$pemesanan]);
    } //transaksi contol

    public function bus(Request $req) {
        $unit = DB::table('tb_kelas_bus') ->get();

        return view ('admin.bus', ['unit'=>$unit]);
    }//bus control

    public function validasi(Request $req) {
        $validasi = DB::table('tb_pemesanan_tiket')->get();

        return view ('admin.validasi', ['validasi'=>$validasi]);
    }//validasi control

    public function delete($id) {
        DB::table('tb_kelas_bus')->where('id_bus', $id)->delete();

        return redirect ('/admin');
    }//delete function

    public function insertBus(Request $req) {
        DB::table('tb_kelas_bus')->insert([
            'kelas_bus' => $req->Kelas,
            'harga_bus' => $req->HargaBus
        ]);
        return redirect ('/admin');
    }//insert bus function

    public function valid($id) {
        DB::table('tb_pemesanan_tiket')->where('id_pemesanan', $id)->update([
            'status_pembayaran' => 'Selesai'
        ]);
        $email      = DB::table('tb_pemesanan_tiket')->where('id_pemesanan', $id)->first();
        $rutes      = DB::table('tb_rute')->where('id', $email->id_rute)->first();
        $buss       = DB::table('tb_kelas_bus')->where('id_bus', $rutes->id_kelas)->first();
        $Data       = DB::table('tb_data_diri')->where('id_pemesanan', $email->id_pemesanan)->get();
        
        $nama = '';
        $lahir = '';
        $kursi = '';
        foreach($Data as $diri) {
           $nama = $diri->nama;
           $lahir = $diri->tgl_lahir;
           $kursi = $diri->kursi;
        };
       
        $tiketjadi = [
            'UQ'        => $email->UC,
            'nama'      => $email->pemesan,
            'asal'      => $email->asal,
            'penumpang' => $email->jml_penumpang,
            'tujuan'    => $email->tujuan,
            'date'      => $email->tanggal,
            'angkatan'  => $rutes->angkatan,
            'bus'       => $buss->kelas_bus,
            'id'        => $email->id_pemesanan,
        ];
        $pnmp = [$nama];
        Mail::to($email->email)->send(new \App\mail\tiketjadi($tiketjadi));
        return redirect('/adminvalidasi');
    }

    public function invalid($id) {
        DB::table('tb_pemesanan_tiket')->where('id_pemesanan', $id)->update([
            'status_pembayaran' => 'Menunggu Pembayaran',
            'validasi' => NULL
        ]);
        $email = DB::table('tb_pemesanan_tiket')->where('id_pemesanan', $id)->first();
        
        $salahvalidasi = [
            'UQ'        => $email->UC,
            'nama'      => $email->pemesan,
            'harga'     => $email->jml_bayar,
            'asal'      => $email->asal,
            'tujuan'    => $email->tujuan,
            'pesan'     => $email->jml_penumpang,
            'date'      => $email->tanggal
        ];
        Mail::to($email->email)->send(new \App\mail\salahvalidasi($salahvalidasi));
        return redirect('/adminvalidasi');
    }

    public function admindatadiri(Request $req) {
        $dataDiri = DB::table('tb_data_diri')->get();

        return view('admin.dataDiri', ['dataDiri'=>$dataDiri]);
    }
}
