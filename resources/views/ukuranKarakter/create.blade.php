<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data Ukuran Karakter</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')

    <div class="container">
        <div class="mt-2"> 
            <section class="content"> 
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <form action={{ route('ukuranKarakter.store') }} method="post" enctype="multipart/form-data"> 
                    @csrf
                    <div class="mb-3">
                        <label for="status" class="form-label">Kategori Mesin</label>
                        <select name="status" id="status" class="form-control select2-multiple">
                            <option value="">Silahkan pilih ukuran terlebih dahulu!</option>
                                <option value="Pendek"> Pendek </option>
                                <option value="Panjang"> Panjang </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="fotoKarakter" class="form-label">Foto Gambar</label>
                        <input type="file" class="form-control" id="fotoKarakter" name="fotoKarakter" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Unggah Data</button>
                </form>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>
</html>