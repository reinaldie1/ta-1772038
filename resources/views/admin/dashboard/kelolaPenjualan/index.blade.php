@extends('admin/admin')

@section('content')
<div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Kelola Penjualan</h3>
                    </div>
                    <div class="panel-body">
                            <h3 class="panel-title"></h3>
                            <br>
                           
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Nama Tas Rajut</th>
                                    <th>Harga Tas Rajut</th>
                                    <th>Status Tas</th>
                                    <th>Nama Pembeli</th>
                                    <th>Provinsi</th>
                                    <th>Kota</th>
                                    <th>Detail Alamat</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($penjualan as $item)
                                <tr>
                                    <td>{{ $item -> order_id}}</td>
                                    <td>{{ $item -> nama_tas }}</td>
                                    <td>@currency($item -> harga_tas)</td>
                                    <td>{{ $item -> status_tas }}</td>
                                    <td>{{ $item -> nama_kostumer }}</td>
                                    <td>{{ $item -> provinsi_kostumer}}</td>
                                    <td>{{ $item -> kota_kostumer}}</td>
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