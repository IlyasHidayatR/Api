@extends('layouts.main')

@section('title','Create')
@section('judul','Tambah Data')
@section('content')
    <div class="flex flex-wrap">
        <div class="w-full p-6">
        <h1><b>Data Anggota</b></h1>
            <hr>
            <h1><i><b>Input Data</b></i></h1>
            <form method="post"action="/anggota">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="kode_anggota" class="form-label">Kode Anggota: </label><br>
                    <input type="text" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="kode_anggota" name="kode_anggota" placeholder="Masukkan kode anggota" value="{{old ('kode_anggota')}}" required>
                </div>
                <div class="form-group">
                    <label for="nama_anggota" class="form-label">Nama Anggota: </label><br>
                    <input type="text" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="nama_anggota" name="nama_anggota" placeholder="Masukkan nama anggota" value="{{old ('nama_anggota')}}" required>
                </div>
                <div class="form-group">
                    <label for="jk_anggota" class="form-label">Jenis Kelamin: </label><br>
                    <input type="text" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="jk_anggota" name="jk_anggota" placeholder="Masukkan jenis kelamin" value="{{old ('jk_anggota')}}" required>
                </div>
                <div class="form-group">
                    <label for="jurusan_anggota" class="form-label">Jurusan: </label><br>
                    <input type="text" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="jurusan_anggota" name="jurusan_anggota" placeholder="Masukkan nama jurusan" value="{{old ('jurusan_anggota')}}" required>
                </div>
                <div class="form-group">
                    <label for="no_telp_anggota" class="form-label">Nomor Telepon: </label><br>
                    <input type="text" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="no_telp_anggota" name="no_telp_anggota" placeholder="Masukkan nomor telepon" value="{{old ('no_telp_anggota')}}" required>
                </div>
                <div class="form-group">
                    <label for="alamat_anggota" class="form-label">Alamat: </label><br>
                    <textarea type="range" class="w-full bg-gray-200 text-black border border-gray-200 rounded py-3 px-4 mb-3" id="alamat_anggota" name="alamat_anggota" placeholder="Masukkan alamat" value="{{old ('alamat_anggota')}}" required>{{old ('alamat_anggota')}}</textarea>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" name="submit" class="md:w-full bg-gray-900 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full" style="background-color:brown; color:white;">Submit</button> <br>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="md:w-full bg-gray-900 text-white font-bold py-2 px-4 border-b-4 hover:border-b-2 border-gray-500 hover:border-gray-100 rounded-full" style="background-color:blue"><a href="/anggota" style="color:white">Kembali</a></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection