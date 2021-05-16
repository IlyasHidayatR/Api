@extends('layouts.main')

@section('title','Detail')
@section('judul','Detail')
@section('content')
    <div class="flex flex-wrap">
        <div class="w-full p-6">
            <h1><b><i>Data Anggota</i></b></h1>
            <div class="bg-gray-100 mx-auto max-w-6xl bg-white py-20 px-12 lg:px-24 shadow-xl mb-24">
                <form method="get"action="/anggota/detail/{{$anggota->id_anggota}}">
                {{ csrf_field() }}
                <label for="id" class="form-label"><b>ID:</b></label><br>
                <label for="id" class="form-label">{{$anggota->id_anggota}}</label><br>
                <label for="kode_anggota" class="form-label"><b>Kode anggota:</b></label><br>
                <label for="kode_anggota" class="form-label">{{$anggota->kode_anggota}}</label><br>
                <label for="nama_anggota" class="form-label"><b>Nama anggota:</b></label><br>
                <label for="nama_anggota" class="form-label">{{$anggota->nama_anggota}}</label><br>
                <label for="jk_anggota" class="form-label"><b>Jenis kelamin:</b></label><br>
                <label for="jk_anggota" class="form-label">{{$anggota->jk_anggota}}</label><br>
                <label for="jurusan_anggota" class="form-label"><b>Jurusan:</b></label><br>
                <label for="jurusan_anggota" class="form-label">{{$anggota->jurusan_anggota}}</label><br>
                <label for="no_telp_anggota" class="form-label"><b>Telepon:</b></label><br>
                <label for="no_telp_anggota" class="form-label">{{$anggota->no_telp_anggota}}</label><br>
                <label for="alamat_anggota" class="form-label"><b>Alamat:</b></label><br>
                <label for="alamat_anggota" class="form-label">{{$anggota->alamat_anggota}}</label><br>
                <br>
                <button type="submit" class="md:w-full bg-gray-900 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full" style="background-color:blue"><a href="/anggota" style="color:white">Kembali</a></button>
                </form>
            </div>
        </div>
    </div>
@endsection