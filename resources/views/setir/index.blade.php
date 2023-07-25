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
                <div class = "pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('jenis.create') }}"> 
                        <i class="fa-solid fa-plus"></i>
                            Tambah Data Lokasi Setir
                    </a>
                </div>