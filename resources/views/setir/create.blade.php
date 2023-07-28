<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data Letak Setir</title>
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
                <form action={{ route('setir.store') }} method="post" enctype="multipart/form-data"> 
                    @csrf
                    <div class="mb-3">
                        <label for="status" class="form-label">Letak Setir</label>
                        <select name="status" id="status" class="form-control select2-multiple">
                            <option value="">Silahkan pilih ukuran terlebih dahulu!</option>
                                <option value="RHD"> Kanan (RHD) </option>
                                <option value="MHD"> Tengah (MHD) </option>
                                <option value="LHD"> Kiri (LHD) </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="fotoDashboard" class="form-label">Foto Gambar</label>
                        <input type="file" class="form-control" id="fotoDashboard" name="fotoDashboard" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Unggah Data</button>
                </form>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>
</html>