@extends('layouts.main')

@section('title','Update')
@section('judul','Edit Data')
@section('content')
    <div class="flex flex-wrap">
        <div class="w-full p-6">
        <h1><b>Daftar Peminjaman</b></h1>
            <hr>
            <h1><i><b>Input Data</b></i></h1>
            <form method="post"action="/peminjaman/update/{{$pinjam->id_peminjaman}}">
            {{method_field('put')}}
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam: </label><br>
                    <input type="date" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="tanggal_pinjam" name="tanggal_pinjam" placeholder="Masukkan tanggal pinjam" value="{{$pinjam->tanggal_pinjam}}" required>
                </div>
                <div class="form-group">
                    <label for="tanggal_kembali" class="form-label">Tanggal Kembali: </label><br>
                    <input type="date" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="tanggal_kembali" name="tanggal_kembali" placeholder="Masukkan tanggal kembali" value="{{$pinjam->tanggal_kembali}}" required>
                </div>
                <div class="form-group">
                    <label for="id_buku" class="form-label">Judul Buku: </label><br>
                    <select class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" style="width: 100" name="id_buku" id="id_buku" required>
                        <option value="{{$pinjam->id_buku}}">{{$pinjam->Buku->judul_buku}}</option>
                        @foreach($Buku as $bk)
                        <option value="{{$bk->id_buku}}">{{$bk->judul_buku}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_anggota" class="form-label">Nama Anggota: </label><br>
                    <select class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" style="width: 100" name="id_anggota" id="id_anggota" required>
                        <option value="{{$pinjam->id_anggota}}">{{$pinjam->Anggota->nama_anggota}}</option>
                        @foreach($Anggota as $ag)
                        <option value="{{$ag->id_anggota}}">{{$ag->nama_anggota}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="id_petugas" class="form-label">Nama Petugas: </label><br>
                    <select class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" style="width: 100" name="id_petugas" id="id_petugas" required>
                        <option value="{{$pinjam->id_petugas}}">{{$pinjam->Petugas->nama_petugas}}</option>
                        @foreach($Petugas as $pg)
                        <option value="{{$pg->id_petugas}}">{{$pg->nama_petugas}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" name="submit" class="md:w-full bg-gray-900 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full" style="background-color:brown; color:white;">Submit</button> <br>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="md:w-full bg-gray-900 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full" style="background-color:blue"><a href="/peminjaman" style="color:white">Kembali</a></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection