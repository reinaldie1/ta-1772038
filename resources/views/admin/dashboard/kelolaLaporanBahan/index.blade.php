@extends('admin/admin')

@section('content')
<div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Laporan Bahan Baku</h3>
                    </div>
                    <div class="panel-body">
                            <h3 class="panel-title"></h3>
                            <br>
                           
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Nama Bahan</th>
                                    <th>Jumlah Bahan</th>
                                    <th>Dimasukkan pada tanggal</th>
                                    <th>Diupdate pada tanggal</th>
                                    <th>Update Tambah Bahan Baku</th>
                                    <th>Update Kurang Bahan Baku</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($lapBhn as $item)
                                <tr>
                                    <td>{{ $item -> nama_bahanBaku }}</td>
                                    <td>{{ $item -> jumlah_bahanBaku }}</td>
                                    <td>{{ $item -> created_at }}</td>
                                    <td>{{ $item -> updated_at }}</td>
                                    <td>{{ $item -> jumlah_penambahanBahan}}</td>
                                    <td>{{ $item -> jumlah_penguranganBahan}}</td>
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