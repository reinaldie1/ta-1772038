@extends('admin/admin')

@section('content')
<div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Kelola Kostumer</h3>
                    </div>
                    <!-- <div class="panel-body">
                        <a href="/tambahKostumer" class="btn btn-info">Tambah Kostumer</a>
                    </div> -->
                    <div class="panel-body">
                            <h3 class="panel-title"></h3>
                            <br>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Nama Kostumer</th>
                                    <th>Email</th>
                                    <th>Nomor Telepon</th>
                                    <th>Provinsi</th>
                                    <th>Kota</th>
                                    <th>Alamat Detail</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($kostumer as $item)
                                <tr>
                                    <td>{{ $item -> nama_kostumer}}</td>
                                    <td>{{ $item -> email}}</td>
                                    <td>{{ $item -> no_tlp}}</td>
                                    <td>{{ $item -> provinsi}}</td>
                                    <td>{{ $item -> kota}}</td>
                                    <td>{{ $item -> alamat_lengkap}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                                <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection