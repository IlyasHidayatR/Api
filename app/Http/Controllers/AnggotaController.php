<?php

namespace App\Http\Controllers;

use App\Anggota;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->has('cari')){
            $anggota = Anggota::all();
            $anggota = Anggota::where('nama_anggota','LIKE','%'.$request->cari.'%')->get();
        }
        else{
            $anggota = Anggota::all();
        }

        
        return view ('anggota.index', ['anggota'=>$anggota]);
    }

    public function anggotaexport(){
        $anggota = Anggota::select('kode_anggota', 'nama_anggota', 'jk_anggota', 'jurusan_anggota', 'no_telp_anggota', 'alamat_anggota')->get();
        return Excel::create('anggota',function($excel) use ($anggota){
            $excel->sheet('mysheet',function($sheet) use ($anggota){
                $sheet->fromArray($anggota);
            });
        })->download('xlsx');
            
    }

    public function anggotaimport(Request $request){
        $this->validate($request, ['file'=>'required|mimes:xls,xlsx']);
        if ($request->hasFile('file')){
            $path = $request->file('file')->getRealPath();
            $data = Excel::load($path, function($reader){})->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value){
                    $anggota = new Anggota();
                    //dd($mahasiswa);
                    $anggota->kode_anggota = $value->kode_anggota;
                    $anggota->nama_anggota = $value->nama_anggota;
                    $anggota->jk_anggota = $value->jk_anggota;
                    $anggota->jurusan_anggota = $value->jurusan_anggota;
                    $anggota->no_telp_anggota = $value->no_telp_anggota;
                    $anggota->alamat_anggota = $value->alamat_anggota;
                    $anggota->save();
                }
            }
        }
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $anggota = Anggota::all();
        return view ('anggota.create');
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
        $anggota = new Anggota;

        $anggota->kode_anggota = $request->kode_anggota;
        $anggota->nama_anggota = $request->nama_anggota;
        $anggota->jk_anggota = $request->jk_anggota;
        $anggota->jurusan_anggota = $request->jurusan_anggota;
        $anggota->no_telp_anggota = $request->no_telp_anggota;
        $anggota->alamat_anggota = $request->alamat_anggota;

        $anggota->save();
        return redirect('/anggota')->with('status', 'Data berhasil ditambah!');
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
        return view('anggota.detail',['anggota'=>$anggota]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_anggota)
    {
        //
        $anggota = Anggota::find($id_anggota);
        return view('anggota.update',['anggota'=>$anggota]);
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
        $anggota = Anggota::find($id_anggota);

        $anggota->kode_anggota = $request->kode_anggota;
        $anggota->nama_anggota = $request->nama_anggota;
        $anggota->jk_anggota = $request->jk_anggota;
        $anggota->jurusan_anggota = $request->jurusan_anggota;
        $anggota->no_telp_anggota = $request->no_telp_anggota;
        $anggota->alamat_anggota = $request->alamat_anggota;

        $anggota->save();
        return redirect('/anggota')->with('status', 'Data berhasil diUpdate!');
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
        $anggota->delete();
        return redirect('/anggota')->with('status', 'Data berhasil dihapus!');
    }
}
