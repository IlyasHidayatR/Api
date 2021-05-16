<?php

namespace App\Http\Controllers\API;

use App\Anggota;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Anggota extends Controller
{
    public function toArray($request)
    {
        return [
            'id_anggota' => $this->id_anggota,
            'kode_anggota' => $this->kode_anggota,
            'nama_anggota' => $this->nama_anggota,
            'jk_anggota' => $this->jk_anggota,
            'jurusan_anggota' => $this->jurusan_anggota,
            'no_telp_anggota' => $this->no_telp_anggota,
            'alamat_anggota' => $this->alamat_anggota,
        ]
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $anggota = Anggota::get();
        
        return response()->json($anggota);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validasi = $this->validate($request, [
            'id_anggota'         =>  'required|unique:anggota|min:4|max:4',
            'kode_anggota'       =>  'required|max:30',
            'nama_anggota'       =>  'required|max:30',
            'jk_anggota'         =>  'required|max:2',
            'jurusan_anggota'    =>   'required|max:10000',
            'no_telp_anggota'    =>  'required|max:10000',
            'alamat_anggota'     =>  'required|max:10000',
        ]);

        try{            
            $response = Anggota::create($validasi);
            return response()->json([
                'success' => true,
                'message'=>'tambah anggota success',                
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message'=>'Error',               
            ], 422);
        }                      
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_anggota)
    {
        //
        $anggota = Anggota::find($id_anggota);
        
        if (!$anggota){
            return response()->json([
                'error' => 'anggota tidak ditemukan'
            ], 404);
        }

        return response()->json($barang);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_anggota)
    {
        //
        $validasi = $this->validate($request, [            
            'kode_anggota'       =>  'required|max:30',
            'nama_anggota'       =>  'required|max:30',
            'jk_anggota'         =>  'required|max:2',
            'jurusan_anggota'    =>  'required|max:10000',
            'no_telp_anggota'    =>  'required|max:10000',
            'alamat_anggota'     =>  'required|max:10000',
        ]);

        try {            
            $response = Anggota::find($id_anggota);
            $response->update($validasi);
            return response()->json([
                'success' => true,
                'message'=>'update success',                
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message'=>'Error',                
            ],422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_anggota)
    {
        //
        $anggota = Anggota::find($id_anggota);
        $barang->delete();

        return response()->json([
            'message' => 'berhasil didelete',
        ]);
    }
}
