<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data Mesin</title>
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
                <form action={{ route('mesin.store') }} method="post"> 
                    @csrf
                    <div class="mb-3">
                        <label for="nama_mesin" class="form-label">Mesin / Penggerak Utama  / Sumber Penggerak</label>
                        <input type="text" class="form-control" id="nama_mesin" name="nama_mesin" placeholder="Sumber Energi" required>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Kategori Mesin</label>
                        <select name="status" id="status" class="form-control select2-multiple">
                            <option value="">Silahkan pilih kategori terlebih dahulu!</option>
                                <option value="ICE"> Mesin Pembakaran Dalam / Internal Combustion Engine </option>
                                <option value="ELE"> Mesin Terelektrifikasi / Electrified Engine </option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Unggah Data</button>
                </form>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>
</html>