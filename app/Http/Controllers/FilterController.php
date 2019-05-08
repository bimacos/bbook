<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\tamu;

class FilterController extends Controller
{
    public function tanggal()
    {
        return view('pages.filtertanggal');
    }

    public function result_tanggal(Request $req)
    {
        $awal = $req->tgl_awal;
        $akhir = $req->tgl_akhir;
        $result = DB::select("SELECT * FROM tamus WHERE tgl BETWEEN '$awal' AND '$akhir'");

        return view('pages.tglresult',['result' => $result,'tgl_awal' => $awal, 'tgl_akhir' => $akhir]);
    }

    public function orang_tua()
    {
        $ortu = tamu::where('status', 'Orang Tua')->latest()->simplePaginate(5);

        return view('filter_ortu', compact('ortu'));
    }

    public function alumni()
    {
        $alumni = tamu::where('status', 'Alumni')->latest()->simplePaginate(5);

        return view('filter_alumni', compact('alumni'));
    }

    public function pengunjung()
    {
        $pengunjung = tamu::where('status', 'Pengunjung')->latest()->simplePaginate(5);

        return view('filter_pengunjung', compact('pengunjung'));
    }

    public function carisemua(Request $req)
    {
        $id = $req->search;

        $cari = tamu::where('nama', 'LIKE', '%'.$id.'%')->latest()->SimplePaginate(5);

        return view('cari.carisemua',['cari' => $cari, 'kk' => $id]);
    }

    public function carialumni(Request $req)
    {
        $id = $req->search;

        $cari = tamu::where('status', 'Alumni')->where('nama', 'LIKE', '%'.$id.'%')->latest()->SimplePaginate(5);

        return view('cari.carialumni',['cari' => $cari, 'kk' => $id]);
    }

    public function cariortu(Request $req)
    {
        $id = $req->search;

        $cari = tamu::where('status', 'Orang Tua')->where('nama', 'LIKE', '%'.$id.'%')->latest()->SimplePaginate(5);

        return view('cari.cariortu',['cari' => $cari, 'kk' => $id]);
    }

    public function caripengunjung(Request $req)
    {
        $id = $req->search;

        $cari = tamu::where('status', 'Pengunjung')->where('nama', 'LIKE', '%'.$id.'%')->latest()->SimplePaginate(5);

        return view('cari.caripengunjung',['cari' => $cari, 'kk' => $id]);
    }

     public function hapus($id)
    {
         tamu::destroy($id);

         return back()->with('pesan', 'Data Berhasil Dihapus');

    }

        public function edit($id)
    {
        $data = tamu::where('id',$id)->get();
        return view('pages.tgledit',['result'=>$data,'id'=>$id]);
    }

    public function update(Request $request , $id)
    {
        $tgl = Date('Y-m-d');
        tamu::where('id',$id)->update([
        'nama'=>$request->nama_tamu,
        'keperluan'=>$request->keperluan,
        'kontak'=>$request->kontak,

        ]);
        return redirect('filter_tanggal')->with('pesan','Data Berhasil DiUpdate');

    }
}
