@extends('layouts.main')

@section('title','Detail')
@section('judul','Detail')
@section('content')
    <div class="flex flex-wrap">
        <div class="w-full p-6">
            <h1><b><i>Data Peminjaman</i></b></h1>
            <div class="bg-gray-100 mx-auto max-w-6xl bg-white py-20 px-12 lg:px-24 shadow-xl mb-24">
                <form method="get"action="/peminjaman/detail/{{$pinjam->id_peminjaman}}">
                {{ csrf_field() }}
                <label for="id" class="form-label"><b>ID:</b></label><br>
                <label for="id" class="form-label">{{$pinjam->id_peminjaman}}</label><br>
                <label for="tanggal_pinjam" class="form-label"><b>Tanggal Peminjaman:</b></label><br>
                <label for="tanggal_pinjam" class="form-label">{{$pinjam->tanggal_pinjam}}</label><br>
                <label for="tanggal_kembali" class="form-label"><b>Tanggal Pengembalian:</b></label><br>
                <label for="tanggal_kembali" class="form-label">{{$pinjam->tanggal_kembali}}</label><br>
                <label for="id_buku" class="form-label"><b>Judul Buku:</b></label><br>
                <label for="id_buku" class="form-label">{{$pinjam->Buku->judul_buku}}</label><br>
                <label for="id_anggota" class="form-label"><b>Nama Anggota Peminjaman:</b></label><br>
                <label for="id_anggota" class="form-label">{{$pinjam->Anggota->nama_anggota}}</label><br>
                <label for="id_petugas" class="form-label"><b>Nama Petugas:</b></label><br>
                <label for="id_petugas" class="form-label">{{$pinjam->Petugas->nama_petugas}}</label><br>
                <br>
                <button type="submit" class="md:w-full bg-gray-900 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full" style="background-color:blue"><a href="/peminjaman" style="color:white">Kembali</a></button>
                </form>
            </div>
        </div>
    </div>
@endsection