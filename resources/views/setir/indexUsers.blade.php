<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Lokasi Setir Kendaraan</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="container"> 
        <div class="mt-4"> 
            <section class="content"> 
                <br>
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
                        @foreach ($location as $wilayah)
                        <tr>
                            <td>{{ $i++ }} </td>
                            <td>{{ $wilayah->location }} </td>
                            <td><img width="200px" src="{{ url('foto/letakSetir/' . $wilayah->namaFile)}}" </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>