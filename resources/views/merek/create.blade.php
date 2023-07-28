<!DOCTYPE html>
<html lang="en">
<head>
    @include('template/header')
    <title>Tambah Data Merek</title>
</head>
<body>
    @include('template/navbar')
    @include('template/sidebarAdmin')

    <div class="container"> 
        <div class="mt-4"> 
            <section class="content"> 
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                @endif 
                <form action={{ route('merek.store') }} method="post" enctype="multipart/form-data"> 
                    @csrf
                    <div class="mb-3">
                        <label for="nama_merk" class="form-label">Merek</label>
                        <input type="text" class="form-control" id="nama_merk" name="nama_merk" placeholder="Merek Kendaraan" required>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="nama_jenis" class="form-label">Jenis Merek</label> <br>
                        <input type="checkbox" name="jenis_merek" value="P"> Passenger Vehicles 
                        <input type="checkbox" name="jenis_merek" value="C"> Commercial Vehicles <br>
                    </div>
                    <button type="submit" class="btn btn-primary">Unggah Data</button>
                </form>
                <p6>Catatan:</p6>
                <br>
                <p6>1. Kolom "Commercial Vehicles" hanya dapat dipilih untuk merek yang memiliki lini produk khusus untuk jenis kendaraan di bawah ini:</p6>
                <br>
                <p6>Pick Up Single Cabin,</p6>
                <p6>Pick Up Double Cabin,</p6>
                <p6>Van/Minibus/Panel Van,</p6>
                <p6>Truck,</p6>
                <p6>Bis, dan</p6>
                <p6>Kendaraan dengan fungsi khusus (contoh: Ambulans, Pemadam Kebakaran)</p6>
                <br>
                <br>
                <p6>2. Untuk pengisian kolom "Commercial Vehicles" dengan merek yang sama dengan Passenger Vehiclesnya (contoh:Toyota, Hyundai, Ford, Chevrolet, VW, dll), </p6>
                <p6>dapat diisi dengan merek yang sama dengan kolom jenis merek yang berbeda. </p6>
            </section>
        </div>
    </div>
    @include('template/footer')
</body>

