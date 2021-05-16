<template>
    <div>
        <table class="bg-white text-gray-900 w-full shadow-none">
                <thead>
                    <tr>
                    <th class="bg-blue-700 text-white p-2">No.</th>
                    <th class="bg-blue-700 text-white p-2">Kode Anggota</th>
                    <th class="bg-blue-700 text-white p-2">Nama Anggota</th>
                    <th class="bg-blue-700 text-white p-2">Jenis Kelamin</th>
                    <th class="bg-blue-700 text-white p-2">Jurusan</th>
                    <th class="bg-blue-700 text-white p-2">Telepon</th>
                    <th class="bg-blue-700 text-white p-2">Alamat</th>
                    <th class="bg-blue-700 text-white p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <tr class="bg-blue-100 text-blue-900" v-for="anggota in anggotas" :key="anggota.key">
                <!-- $loop->iteration -->
                    <th class="p-2">{{anggota.id_anggota}}.</th>
                    <th class="p-2">{{anggota.kode_anggota}}</th>
                    <th class="p-2">{{anggota.nama_anggota}}</th>
                    <th class="p-2">{{anggota.jk_anggota}}</th>
                    <th class="p-2">{{anggota.jurusan_anggota}}</th>
                    <th class="p-2">{{anggota.no_telp_anggota}}</th>
                    <th class="p-2">{{anggota.alamat_anggota}}</th>
                    <th class="p-2">
                        <button type="submit" class="border" style="background-color:aqua"><a href="/anggota/detail/{{$ag->id_anggota}}" style="color:white">detail</a></button>
                        <button type="submit" class="border" style="background-color:green"><a href="/anggota/update/{{$ag->id_anggota}}" style="color:white">edit</a></button>
                        <form action="/anggota/{{$ag->id_anggota}}" method="post" class="inline border" style="background-color:red; color:white">
                            {{method_field('delete')}}
                            {{ csrf_field() }}
                            <button type="submit" class="badge badge-danger">delete</button>
                        </form>
                        </th>
                </tr>
                </tbody>
            </table>
    </div>   
</template>
<script>
export default {
    data(){
        return {
            anggotas:[]
        };
    },
    methods: {
        axios:get('/anggotas').then(respo => {
            this.anggotas = respo.data.data;
        })
    }
}
</script>