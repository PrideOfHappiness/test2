<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Lokasi Setir Kendaraan</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')

    <div class="container"> 
        <div class="mt-4"> 
            <section class="content"> 
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <br>
                <div class = "pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('setir.create') }}"> 
                        <i class="fa-solid fa-plus"></i>
                            Tambah Data Lokasi Setir
                    </a>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Letak Setir</th>
                        <th>Foto Contoh</th>
                    </tr>
                    </thead>
                    <tbody> 
                        @php $i = 1 @endphp
                        @foreach ($data as $wilayah)
                        <tr>
                            <td>{{ $i++ }} </td>
                            <td>{{ $wilayah->getLocation() }} 
                            </td>
                            <td><img width="200px" src="{{ url('foto/letakSetir/' . $wilayah->namaFile)}}"> </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>