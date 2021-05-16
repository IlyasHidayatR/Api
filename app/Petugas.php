<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    //
    protected $table='petugas';
    protected $primaryKey='id_petugas';
    protected $fillable=['id_petugas', 'nama_petugas', 'jabatan_petugas', 'no_telp_petugas', 'alamat_petugas'];
    public $timestamps = false;

    public function Peminjaman()
    {
        return $this->hasMany('App\Peminjaman');
    }
}
