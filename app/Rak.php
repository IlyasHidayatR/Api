<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    //
    protected $table='rak';
    protected $primaryKey='id_rak';
    protected $fillable=['id_rak', 'nama_rak', 'lokasi_rak', 'id_buku'];
    public $timestamps = false;
}
