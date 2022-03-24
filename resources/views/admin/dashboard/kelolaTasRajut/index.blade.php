@extends('admin/admin')

@section('content')
<div class="main">
    <?php
        $id_tas = Session::get('id_tas');
    ?>
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Kelola Tas Rajut</h3>
                    </div>
                    <div class="panel-body">
                        <a href="/tambahTasRajut" class="btn btn-info">Tambah Data</a>
                    </div>
                    <div class="panel-body">
                            <h3 class="panel-title"></h3>
                            <br>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Nama Tas Rajut</th>
                                    <th>Harga Tas Rajut</th>
                                    <th>Gambar Tas Rajut</th>
                                    <th>Status Tas</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($tasRajut as $item)
                                @if($item!==[])
                                <tr>
                                <form action="/penjualan/{{$item->id_tas}}" method="post" enctype="multipart/form-data">
                                    @method('post')
                                    {{ csrf_field() }}
                                    <td>{{ $item->id_tas }}</td>
                                    <td>{{ $item->nama_tas }}</td>
                                    <td>@currency($item->harga_tas)</td>
                                    <td><a href="{{asset('assets/tasRajut')}}/{{$item->gambar_tas}}" target="_blank"><img src="{{asset('assets/tasRajut')}}/{{$item->gambar_tas}}" style="height:100px;width:100px;" ></a></td>
                                    <td>{{ $item->status_tas}}</td>
                                    <td><button type="submit" class='fas fa-shopping-basket' style='font-size:48px;color:red' ></i></td>
                                </form>
                                </tr>
                                @endif
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