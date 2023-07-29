<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data Plat Nomor</title>
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
                <form action={{ route('platNomor.store') }} method="post" enctype="multipart/form-data"> 
                    @csrf
                    <div class="mb-3">
                        <label for="negara" class="form-label">Kode dan Negara</label>
                        <select name="negara" id="negara" class="form-control select2-multiple">
                            <option value="">Silahkan pilih negara terlebih dahulu!</option>
                            @foreach($kode_negara as $neg)
                                <option value="{{$neg->id}}" data-text="{{$neg->nama_negara}}"> {{ $neg->negara }} </option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="negara_text" id="negara_text" value="">
                    <div class="mb-3">
                        <label for="status" class="form-label">Kategori Plat Nomor</label>
                        <select name="status" id="status" class="form-control select2-multiple">
                            <option value="">Silahkan pilih kategori terlebih dahulu!</option>
                            <option value="1"> Untuk semua jenis kendaraan </option>
                            <option value="2"> Hanya untuk kendaraan non elektrifikasi (non BEV, FCEV, dll)</option>
                            <option value="3"> Hanya untuk kendaraan terelektrifikasi (non Hybrid)</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Deskripsi Plat Nomor</label>
                        <textarea id="keterangan" name="keterangan" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="fotoPlatNomor" class="form-label">Foto Gambar</label>
                        <input type="file" class="form-control" id="fotoPlatNomor" name="fotoPlatNomor" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Unggah Data</button>
                </form>
            </section>
        </div>
    </div>
    @include('template/footer')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const negaraDropdown = document.getElementById('negara');
            const negaraText = document.getElementById('negara_text');
    
            negaraDropdown.addEventListener('change', function () {
                const selectedOption = negaraDropdown.options[negaraDropdown.selectedIndex];
                const selectedText = selectedOption.getAttribute('data-text');
                negaraText.value = selectedText;
            });
        });
    </script>    
</body>
</html>
