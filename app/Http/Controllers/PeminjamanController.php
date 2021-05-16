<?php

namespace App\Http\Controllers;

use App\Peminjaman;
use App\Petugas;
use App\Anggota;
use App\Buku;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
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
            $pinjam = Peminjaman::all();
            $Petugas = Petugas::all();
            $Buku = Buku::all();
            $pinjam=Peminjaman::with('Petugas', 'Buku', 'Anggota')->where('id_peminjaman','LIKE','%'.$request->cari.'%')->get();
        }
        else{
            $pinjam = Peminjaman::all();
        }

        $Petugas = Petugas::all();
        $Buku = Buku::all();
        $Anggota = Anggota::all();
        return view ('peminjaman.index', compact('Petugas','Anggota','Buku','pinjam'), ['pinjam'=>$pinjam ]);
    }

    public function peminjamanexport(){
        $peminjaman = Peminjaman::select('tanggal_pinjam', 'tanggal_kembali', 'id_buku', 'id_anggota', 'id_petugas')->get();
        return Excel::create('peminjaman',function($excel) use ($peminjaman){
            $excel->sheet('mysheet',function($sheet) use ($peminjaman){
                $sheet->fromArray($peminjaman);
            });
        })->download('xlsx');
            
    }

    public function peminjamanimport(Request $request){
        $this->validate($request, ['file'=>'required|mimes:xls,xlsx']);
        if ($request->hasFile('file')){
            $path = $request->file('file')->getRealPath();
            $data = Excel::load($path, function($reader){})->get();
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value){
                    $peminjaman = new Peminjaman();
                    //dd($mahasiswa);
                    $peminjaman->tanggal_pinjam = $value->tanggal_pinjam;
                    $peminjaman->tanggal_kembali = $value->tanggal_kembali;
                    $peminjaman->id_buku = $value->id_buku;
                    $peminjaman->id_anggota = $value->id_anggota;
                    $peminjaman->id_petugas = $value->id_petugas;
                    $peminjaman->save();
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
        $pinjam = Peminjaman::all();
        $Petugas = Petugas::all();
        $Buku = Buku::all();
        $Anggota = Anggota::all();
        return view('peminjaman.create',compact('Petugas', 'Buku', 'Anggota'));
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
        $peminjaman = new Peminjaman;
        //dd ($mahasiswa);
        $peminjaman->tanggal_pinjam = $request->tanggal_pinjam;
        $peminjaman->tanggal_kembali = $request->tanggal_kembali;
        $peminjaman->id_buku = $request->id_buku;
        $peminjaman->id_anggota = $request->id_anggota;
        $peminjaman->id_petugas = $request->id_petugas;

        $peminjaman->save();
        return redirect('/peminjaman')->with('status', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_peminjaman)
    {
        //
        $Petugas = Petugas::all();
        $Buku = Buku::all();
        $Anggota = Anggota::all();
        $pinjam = Peminjaman::with('Petugas', 'Buku', 'Anggota')->find($id_peminjaman);
        return view('peminjaman.detail',compact('pinjam', 'Petugas', 'Buku', 'Anggota'),['pinjam'=>$pinjam]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_peminjaman)
    {
        //
        $Petugas = Petugas::all();
        $Buku = Buku::all();
        $Anggota = Anggota::all();
        $pinjam = Peminjaman::with('Petugas', 'Buku', 'Anggota')->find($id_peminjaman);
        return view('peminjaman.update',compact('pinjam', 'Petugas', 'Buku', 'Anggota'),['pinjam'=>$pinjam]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_peminjaman)
    {
        //
        $Petugas = Petugas::all();
        $Buku = Buku::all();
        $Anggota = Anggota::all();
        $peminjaman = Peminjaman::with('Petugas', 'Buku', 'Anggota')->find($id_peminjaman);
        $peminjaman->tanggal_pinjam = $request->tanggal_pinjam;
        $peminjaman->tanggal_kembali = $request->tanggal_kembali;
        $peminjaman->id_buku = $request->id_buku;
        $peminjaman->id_anggota = $request->id_anggota;
        $peminjaman->id_petugas = $request->id_petugas;

        $peminjaman->save();
        return redirect('/peminjaman')->with('status', 'Data berhasil diUpdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_peminjaman)
    {
        //
        $Petugas = Petugas::all();
        $Buku = Buku::all();
        $Anggota = Anggota::all();
        $pinjam = Peminjaman::with('Petugas', 'Buku', 'Anggota')->find($id_peminjaman);
        $pinjam->delete();
        return redirect('/peminjaman')->with('status', 'Data berhasil dihapus!');
    }
}
