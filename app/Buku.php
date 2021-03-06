<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    //
    protected $table='buku';
    protected $primaryKey='id_buku';
    protected $fillable=['id_buku', 'kode_buku', 'judul_buku', 'penulis_buku', 'penerbit_buku', 'tahun_penerbit', 'stok'];
    public $timestamps = false;

    public function Peminjaman()
    {
        return $this->hasMany('App\Peminjaman');
    }
}
