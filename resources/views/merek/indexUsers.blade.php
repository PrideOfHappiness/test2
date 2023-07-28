<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Merek (Brand) Kendaraan</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarUsers')

    <div class="container">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif 
        <div class="mt-4"> 
            <section class="content"> 
                <br>
                <form action='{{route('search')}}' method="post">
                    <div class="pull-right mb-2" class="wrapper"> 
                        @csrf
                        <label for="cari" class="form-label">Cari dengan kata kunci: </label>
                        <input type="text" class="form-control" id="cari" name="cari" placeholder="Masukkan Kata Kunci Disini" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
                Jumlah Data : {{ $jumlahMerek }} buah data.
                <table class="table">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode</th>
                        <th>Merek</th>
                        <th>Jenis</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody> 
                        @php $i = 1 @endphp
                        @foreach ($merek as $wilayah)
                        <tr>
                            <td>{{ $i++ }} </td>
                            <td>{{ $wilayah->kode_merk }} </td>
                            <td>{{ $wilayah->nama_merk }} </td>
                            <td>{{ $wilayah->jenis_merek }} </td>
                            <td> 
                                <a class="badge bg-info" href="{{ route('merek.show', $wilayah->id)}}">Detail Jenis</span></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $merek->links() !!}
            </section>
        </div>
    </div>
    @include('template/footer')
</body>