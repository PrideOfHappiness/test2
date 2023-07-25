<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Jenis Kendaraan</title>
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
                        @foreach ($jenis_users as $wilayah)
                        <tr>
                            <td>{{ $i++ }} </td>
                            <td>{{ $wilayah->kode_jenis }} </td>
                            <td>{{ $wilayah->nama_jenis }} </td>
                            <td>{{ $wilayah->keterangan }} </td>
                            <td> 
                                <a class="badge bg-info" href="/users/jenis/{{$wilayah->id}}">Detail Jenis</span></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $jenis_users->links() !!}
            </section>
        </div>
    </div>
    @include('template/footer')
</body>