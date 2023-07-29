<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Data Plat Nomor Kendaraan</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')

    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif 
        <div class="mt-4"> 
            <section class="content"> 
                <form action='#' method="post">
                    <div class="pull-right mb-2" class="wrapper"> 
                        @csrf
                        <label for="cari" class="form-label">Cari dengan kata kunci: </label>
                        <input type="text" class="form-control" id="cari" name="cari" placeholder="Masukkan Kata Kunci Disini" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
                <table class="table">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode</th>
                        <th>Negara</th>
                        <th>Untuk</th>
                        <th>Foto</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody> 
                        @php $i = 1 @endphp
                        @foreach ($platNomor as $wilayah)
                        <tr>
                            <td>{{ $i++ }} </td>
                            <td>{{ $wilayah->kode_negara }} </td>
                            <td>{{ $wilayah->nama_negara }} </td>
                            <td>{{ $wilayah->for }} </td>
                            <td>
                                @if($foto->count() > 0)
                                    <label for="gambar" class="form-label">Contoh Foto Plat Nomor</label>
                                    <div class="gambar-container">
                                        @foreach($platNomorFoto as $gambar)
                                            <div class="mb-3">
                                                <img width="150px" src="{{ asset('foto/jenis/'. $gambar->namaFile) }}" alt="Gambar Jenis">
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p>Tidak ada gambar terkait.</p>
                                @endif
                            </td>
                            <td> 
                                <form action = "{{ route('platNomor.destroy', $kons->id) }}" method="Post">
                                    <a class="badge bg-info" href="{{ route('platNomor.show', $kons->id)}}">Detail Plat Nomor</span></a>
                                    <a class="badge bg-warning" href="{{ route('platNomor.edit', $kons->id)}}">Edit Data Plat Nomor</span></a>
                                    @csrf
                                        @method("DELETE")
                                        <button type="submit" class="badge bg-danger"> Hapus Data Plat Nomor</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $platNomor->links() !!}
            </section>
        </div>
    </div>
    @include('template/footer')
</body>