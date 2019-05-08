<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tamu extends Model
{
	protected $fillable = [
	'nama','keperluan','kontak','tgl','foto'
    ];
}
