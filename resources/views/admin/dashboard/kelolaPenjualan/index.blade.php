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
                                    <th>Nama Tas Rajut</th>
                                    <th>Harga Tas Rajut</th>
                                    <th>Status Tas</th>
                                    <th>Nama Pembeli</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($penjualan as $item)
                                <tr>
                                    <td>{{ $item -> nama_tas }}</td>
                                    <td>{{ $item -> harga_tas }}</td>
                                    <td>{{ $item -> status_tas }}</td>
                                    <td>{{ $item -> nama_kostumer }}</td>
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