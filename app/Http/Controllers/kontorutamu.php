<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tamu;
use Carbon;

class kontorutamu extends Controller
{
    public function show()
    {
    	$tgl = Carbon\Carbon::now()->format('Y-m-d');
		$bukutamus = tamu::where('tgl', $tgl)->latest()->SimplePaginate(5);

		return view('home', compact('bukutamus'));
    }

    public function save(Request $rock)
    {
    	$this->validate($rock, [
    		'nama_tamu' => 'required',
    		'keperluan' => 'required',
            'kontak' => 'required',
            'foto' => 'required',
    	]);

        $reqfoto = $rock->foto;
        $foto      = substr($reqfoto, strpos($reqfoto, ',') + 1);
        $dekod       = base64_decode($foto);
        $nama_file = "img-".time().rand(11111,99999).".png";
        $folder = public_path('img/foto/');

        $fp = fopen($folder.$nama_file,'w');
        fwrite($fp, $dekod);
        fclose($fp);

        $tgl = Carbon\Carbon::now()->format('Y-m-d');

    	tamu::create([

    		'nama' => $rock->nama_tamu,
    		'keperluan' => $rock->keperluan,
            'kontak' => $rock->kontak,
            'tgl' => $tgl,
            'foto' => $nama_file,
    	]);

    	return back()->with('pesan', 'Data Berhasil Terinput');
    }

    public function hapus($id)
    {
    	 tamu::destroy($id);

    	 return back()->with('pesan', 'Data Berhasil Dihapus');

    }



}
