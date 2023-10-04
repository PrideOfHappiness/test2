<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data Jenis</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')

    <div class="container"> 
        <div class="mt-4"> 
            <section class="content"> 
                <form action={{ route('jenis.store') }} method="post" enctype="multipart/form-data"> 
                    @csrf
                    <div class="mb-3">
                        <label for="nama_jenis" class="form-label">Jenis Kendaraan</label>
                        <input type="text" class="form-control" id="nama_jenis" name="nama_jenis" placeholder="Nama Jenis Kendaraan" required>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Deskripsi Jenis</label>
                        <textarea id="keterangan" name="keterangan" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="variasi" class="form-label">Variasi jenis bodi (apabila tersedia)</label>
                        <textarea id="variasi" name="variasi" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="file_contoh_jenis" class="form-label">Gambar Contoh Jenis Kendaraan</label>
                        <input type="file" class="form-control" id="file_contoh_jenis[]" name="file_contoh_jenis[]" required multiple>
                    </div>
                    <button type="submit" class="btn btn-primary">Unggah Data</button>
                </form>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>