<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Daftar Mesin Kendaraan</title>
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
                <br>
                <div class = "pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('mesin.create') }}"> 
                        <i class="fa-solid fa-plus"></i>
                            Tambah Data Mesin
                    </a>
                </div>
        
                <table class="table">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode</th>
                        <th>Mesin</th>
                        <th>Jenis</th>
                    </tr>
                    </thead>
                    <tbody> 
                        @php $i = 1 @endphp
                        @foreach ($mesin as $wilayah)
                        <tr>
                            <td>{{ $i++ }} </td>
                            <td>{{ $wilayah->kode_mesin }} </td>
                            <td>{{ $wilayah->nama_mesin }} </td>
                            <td>{{ $wilayah->jenis_mesin }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>