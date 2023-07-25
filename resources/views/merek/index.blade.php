<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Jenis Kendaraan</title>
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
                    <a class="btn btn-success" href="{{ route('jenis.create') }}"> 
                        <i class="fa-solid fa-plus"></i>
                            Tambah Data Merek
                    </a>
                </div>
        
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
                                <a class="badge bg-info" href="{{ route('jenis.show', $wilayah->id)}}">Detail Jenis</span></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $jenis->links() !!}
            </section>
        </div>
    </div>
    @include('template/footer')
</body>