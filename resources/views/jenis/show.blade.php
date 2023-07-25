<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Jenis </title>
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
                <div class="mb-3">
                    <label for="kode_jenis" class="form-label">Kode Jenis</label>
                    <input type="text" class="form-control" id="kode_jenis" name="kode_jenis" value="{{ $jenis->kode_jenis }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="nama_jenis" class="form-label">Jenis Kendaraan</label>
                    <input type="text" class="form-control" id="nama_jenis" name="nama_jenis" value="{{ $jenis->nama_jenis }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan Jenis</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" readonly> {{ $jenis->keterangan }} </textarea>
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
            </section>
        </div>
    </div>
    @include('template/footer')
</body>
</html>