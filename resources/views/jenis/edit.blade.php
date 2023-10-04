<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Ubah Data Jenis </title>
</head>
<style>
    .gambar-container {
        display: flex;
    }
    .gambar-container img {
        margin-right: 10px; /* Jarak antara gambar */
        max-width: 150px; /* Lebar maksimum gambar */
    }
</style>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')

    <div class="container"> 
        <div class="mt-4"> 
            <section class="content"> 
                <form action="{{ route('jenis.update', $jenis->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" class="form-control" id="kode_jenis" name="kode_jenis" value="{{ $jenis->kode_jenis }}" readonly>
                    <div class="mb-3">
                        <label for="nama_jenis" class="form-label">Jenis Kendaraan</label>
                        <input type="text" class="form-control" id="nama_jenis" name="nama_jenis" value="{{ $jenis->nama_jenis }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan Jenis</label>
                        <textarea class="form-control" id="keterangan" name="keterangan"> {{ $jenis->keterangan }} </textarea>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Variasi bodi (apabila tersedia)</label>
                        <textarea class="form-control" id="keterangan" name="keterangan"> {{ $jenis->variasi_bodi }} </textarea>
                    </div>
                    @if($jenisGambar->count() > 0)
                        <label for="gambar" class="form-label">Contoh Foto Kendaraan</label>
                        <div class="gambar-container">
                            @foreach($jenisGambar as $gambar)
                                <div class="mb-3">
                                    <img width="150px" src="{{ asset('foto/jenis/'. $gambar->namaFile) }}" alt="Gambar Jenis">
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p>Tidak ada gambar terkait.</p>
                    @endif
                    <div class="mb-3">
                        <label for="file_contoh_jenis" class="form-label">Gambar Contoh Jenis Kendaraan (Apabila ingin ditambahkan)</label>
                        <input type="file" class="form-control" id="file_contoh_jenis[]" name="file_contoh_jenis[]" multiple>
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                </form>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>
</html>