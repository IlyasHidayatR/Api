<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    //
    protected $table='pengembalian';
    protected $primaryKey='id_pengembalian';
    protected $fillable=['id_pengembalian', 'tanggal_pengembalian', 'denda', 'id_buku', 'id_anggota', 'id_petugas'];
    public $timestamps = false;
}
