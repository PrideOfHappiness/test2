<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Plat Nomor</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')

    <div class="container">
        <div class="mt-4"> 
            <section class="content"> 
                <form action="{{route('platNomor.update', $platNomor->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="negara" class="form-label">Kode Negara</label>
                        <input type="text" class="form-control" name="kodenegara" value={{ $platNomor->kode_negara}} readonly>
                    </div>
                    <div class="mb-3">
                        <label for="negara" class="form-label">Nama Negara</label>
                        <input type="text" class="form-control" name="namanegara" value={{ $platNomor->nama_negara}} readonly>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Kategori Plat Nomor</label>
                        <select name="status" id="status" class="form-control select2-multiple">
                            <option value="{{$angka}}">{{$huruf}}</option>
                            <option value="">Silahkan pilih kategori terlebih dahulu!</option>
                            <option value="1"> Untuk semua jenis kendaraan </option>
                            <option value="2"> Hanya untuk kendaraan non elektrifikasi (non BEV, FCEV, dll)</option>
                            <option value="3"> Hanya untuk kendaraan terelektrifikasi (non Hybrid)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Deskripsi Plat Nomor</label>
                        <textarea id="keterangan" class="form-control" name="keterangan" class="form-control" rows="4">{{ $platNomor->keterangan}}</textarea>
                    </div>
                    @if($fotoPlat->count() > 0)
                    <label for="gambar" class="form-label">Contoh Foto Plat Nomor Awal</label>
                    <div class="gambar-container">
                        @foreach($fotoPlat as $gambar)
                            <div class="mb-3">
                                <img width="150px" src="{{ asset('foto/plat_nomor/'. $gambar->namaFile) }}" alt="Gambar Plat Nomor">
                            </div>
                        @endforeach
                    </div>
                    @else
                        <p>Tidak ada gambar terkait.</p>
                    @endif
                    <div class="mb-3">
                        <label for="fotoPlatNomor" class="form-label">Foto Gambar (Apabila ingin diganti)</label>
                        <input type="file" class="form-control" id="fotoPlatNomor" name="fotoPlatNomor">
                    </div>
                    <button type="submit" class="btn btn-primary">Unggah Data</button>
                </form>
            </section>
            @include('template/footer')
        </div>
    </div>
</body>
</html>