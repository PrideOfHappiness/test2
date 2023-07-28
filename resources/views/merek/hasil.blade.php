<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Hasil Pencarian Merek Kendaraan</title>
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
            <table class="table">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode</th>
                    <th>Merek</th>
                    <th>Jenis</th>
                </tr>
                </thead>
                <tbody> 
                    @php $i = 1 @endphp
                    @foreach ($hasil as $wilayah)
                    <tr>
                        <td>{{ $i++ }} </td>
                        <td>{{ $wilayah->kode_merk }} </td>
                        <td>{{ $wilayah->nama_merk }} </td>
                        <td>{{ $wilayah->jenis_merek }} </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
</div>
@include('template/footer')
</body>