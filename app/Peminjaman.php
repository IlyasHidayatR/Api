<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    //
    protected $table='peminjaman';
    protected $primaryKey='id_peminjaman';
    protected $fillable=['id_peminjaman', 'tanggal_pinjam', 'tanggal_kembali', 'id_buku', 'id_anggota', 'id_petugas'];
    public $timestamps = false;

    public function Anggota()
    {
        return $this->belongsTo('App\Anggota', 'id_anggota');
    }

    public function Buku()
    {
        return $this->belongsTo('App\Buku', 'id_buku');
    }
    
    public function Petugas()
    {
        return $this->belongsTo('App\Petugas', 'id_petugas');
    }
}
