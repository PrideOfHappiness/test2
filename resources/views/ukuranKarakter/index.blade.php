<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Ukuran Karakter Foto</title>
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
                    <a class="btn btn-success" href="{{ route('ukuranKarakter.create') }}"> 
                        <i class="fa-solid fa-plus"></i>
                            Tambah Data Ukuran Karakter
                    </a>
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Ukuran</th>
                        <th>Foto</th>
                    </tr>
                    </thead>
                    <tbody> 
                        @php $i = 1 @endphp
                        @foreach ($ukuranKarakter as $wilayah)
                        <tr>
                            <td>{{ $i++ }} </td>
                            <td>{{ $wilayah->ukuran }} </td>
                            <td><img width="150px" src="{{ url('foto/ukuran/' . $wilayah->namaFile)}}"> </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>