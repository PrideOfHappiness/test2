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
                    <div class="mb-3">
                        <label for="negara" class="form-label">Kode Negara</label>
                        <input type="text" class="form-control" name="negara" value={{ $platNomor->kode_negara}} readonly>
                    </div>
                    <div class="mb-3">
                        <label for="negara" class="form-label">Nama Negara</label>
                        <input type="text" class="form-control" name="negara" value={{ $platNomor->nama_negara}} readonly>
                    </div>
                    <input type="hidden" name="negara_text" id="negara_text" value="">
                    <div class="mb-3">
                        <label for="status" class="form-label">Kategori Plat Nomor</label>
                        <input type="text" class="form-control" name="status" value={{$platNomor->for}} readonly>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Deskripsi Plat Nomor</label>
                        <textarea id="keterangan" class="form-control" name="keterangan" class="form-control" rows="4" readonly>{{ $platNomor->keterangan}}</textarea>
                    </div>
                    @if($fotoPlat->count() > 0)
                    <label for="gambar" class="form-label">Contoh Foto Kendaraan</label>
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
