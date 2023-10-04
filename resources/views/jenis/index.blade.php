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
                            Tambah Data Jenis
                    </a>
                </div>
        
                <table class="table">
                    <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode</th>
                        <th>Jenis Kendaraan</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody> 
                        @php $i = 1 @endphp
                        @foreach ($jenis as $wilayah)
                        <tr>
                            <td>{{ $i++ }} </td>
                            <td>{{ $wilayah->kode_jenis }} </td>
                            <td>{{ $wilayah->nama_jenis }} </td>
                            <td>{{ $wilayah->keterangan }} </td>
                            <td> 
                                <form action = "{{ route('jenis.destroy', $wilayah->id) }}" method="Post">
                                    <a class="badge bg-info" href="{{ route('jenis.show', $wilayah->id)}}">Detail Jenis</span></a>
                                    <a class="badge bg-warning" href="{{ route('jenis.edit', $wilayah->id)}}">Edit Data Jenis</span></a>
                                    @csrf
                                        @method("DELETE")
                                        <button type="submit" class="badge bg-danger"> Hapus Data Jenis</button>
                                </form>
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