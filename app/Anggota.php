<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    //
    protected $table='anggota';
    protected $primaryKey='id_anggota';
    protected $fillable=['id_anggota', 'kode_anggota', 'nama_anggota', 'jk_anggota', 'jurusan_anggota', 'no_telp_anggota', 'alamat_anggota'];
    public $timestamps = false;

    public function Peminjaman()
    {
        return $this->hasMany('App\Peminjaman');
    }

}
