@extends('admin/admin')

@section('content')
<div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Laporan Tas</h3>
                    </div>
                    <div class="panel-body">
                            <h3 class="panel-title"></h3>
                            <br>
                           
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Nama Tas Rajut</th>
                                    <th>Harga Tas Rajut</th>
                                    <th>Gambar Tas Rajut</th>
                                    <th>Tanggal Dimasukkan</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($lapTas as $item)
                                <tr>
                                    <td>{{ $item -> nama_tas }}</td>
                                    <td>{{ $item -> harga_tas }}</td>
                                    <td><a href="{{asset('assets/tasRajut')}}/{{$item->gambar_tas}}" target="_blank"><img src="{{asset('assets/tasRajut')}}/{{$item->gambar_tas}}" style="height:100px;width:100px;" ></a></td>
                                    <td>{{ $item -> created_at }}</td>
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