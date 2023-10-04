<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Foto Kendaraan</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarUsers')

    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif 
        <div class="mt-4"> 
            <section class="content"> 
                <br>
                <div class = "pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('fotoMobil.create') }}"> 
                        <i class="fa-solid fa-plus"></i>
                            Tambah Data Mobil
                    </a>
                </div>
        
                <form action='{{route('search')}}' method="post">
                    @csrf
                    <div class="pull-right mb-2" class="wrapper"> 
                        <label for="pencarian" class="form-label">Cari berdasarkan kategori: </label>
                        <select name="pencarian" id="pencarian" class="js-example-basic-single form-control">
                            <option value="">Silahkan pilih kategori terlebih dahulu!</option>
                                <option value="kode"> Kode Gambar </option>
                                <option value="nama"> Nama Kendaraan </option>
                                <option value="other"> Lainnya</option>
                        </select>
                        <label for="cari" class="form-label">Cari dengan kata kunci: </label>
                        <input type="text" class="form-control" id="cari" name="cari" placeholder="Masukkan Kata Kunci Disini" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Merek</th>
                        <th>Nama Kendaraan</th>
                        <th>Jenis</th>
                        <th>Mesin</th>
                        <th>Plat Nomor</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody> 
                        @php $i = 1 @endphp
                        @foreach ($data as $wilayah)
                        <tr>
                            <td>{{ $wilayah->kode_foto }} </td>
                            <td>{{ $wilayah->merek->nama_merk }} </td>
                            <td>{{ $wilayah->nama_mobil }} </td>
                            <td>{{ $wilayah->jenis->nama_jenis }} </td>
                            <td>{{ $wilayah->mesin->nama_mesin }} </td>
                            <td>{{ $wilayah->platnomors }} </td>
                            <td>{{ $wilayah->for }} </td>
                            <td>
                               
                            </td>
                            <td> 
                                <form action = "{{ route('fotoMobil.destroy', $wilayah->id) }}" method="Post">
                                    <a class="badge bg-info" href="{{ route('fotoMobil.show', $wilayah->id)}}">Detail Foto</span></a>
                                    <a class="badge bg-warning" href="{{ route('fotoMobil.edit', $wilayah->id)}}">Edit Data Foto</span></a>
                                    @csrf
                                        @method("DELETE")
                                        <button type="submit" class="badge bg-danger"> Hapus Data Kendaraan</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $data->links() !!}
            </section>
        </div>
    </div>
    @include('template/footer')
</body>