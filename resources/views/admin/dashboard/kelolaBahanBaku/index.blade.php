@extends('admin/admin')


@section('content')
@if ($message = Session::get('success'))
   <p>{{ $message }}</p>
@endif
<div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Kelola Bahan Baku</h3>
                    </div>
                    <div class="panel-body">
                        <a href="/tambahBahanBaku" class="btn btn-info">Tambah Bahan</a>
                    </div>
                    <div class="panel-body">
                            <h3 class="panel-title"></h3>
                            <br>
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Bahan Baku</th>
                                    <th>Jumlah (Gulung)</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bahanBaku as $item)
                                <tr>
                                    <td>{{ $item -> nama_bahanBaku}}</td>
                                    <td>{{ $item -> jumlah_bahanBaku}}</td>
                                    <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#updateModalTambah{{$item->nama_bahanBaku}}" >+ <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#updateModalKurang{{$item->nama_bahanBaku}}">-
                                    </td>
                                </tr>
                                <!-- MODAL PENAMBAHAN BAHAN BAKU -->
                                    <div class="modal fade" id="updateModalTambah{{$item -> nama_bahanBaku}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Penambahan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <span id="date01" style="padding-left:10px;"></span>
                                            <script>
                                                n =  new Date();
                                                y = n.getFullYear();
                                                m = n.getMonth() + 1;
                                                d = n.getDate();
                                                hours = n.getHours();
                                                mnt = n.getMinutes();
                                                sec = n.getSeconds();
                                                document.getElementById("date01").innerHTML = d + "/" + m + "/" + y + " " + hours + ":" + mnt + ":" + sec;
                                            </script>
                                        <div class="modal-body">
                                            <form action="/updateBahanBaku/penambahan/{{$item->nama_bahanBaku}}" method="POST" enctype="multipart/form-data">
                                                @method('post')
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                <label for="nama_bahanBaku">Nama Bahan Baku:</label>
                                                <input type="text" value="{{$item -> nama_bahanBaku}}" readonly>
                                                </div>
                                                <div class="form-group">
                                                <label for="jumlah_bahanBaku">Tambah Bahan Baku:</label>
                                                <input type="number" value="{{$item -> jumlah_bahanBaku}}" id="tambah" name="tambah">
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- MODAL PENGURANGAN BAHAN BAKU -->
                                    <div class="modal fade" id="updateModalKurang{{$item -> nama_bahanBaku}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Pengurangan</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <span id="date02" style="padding-left:10px;"></span>
                                            <script>
                                                n =  new Date();
                                                y = n.getFullYear();
                                                m = n.getMonth() + 1;
                                                d = n.getDate();
                                                hours = n.getHours();
                                                mnt = n.getMinutes();
                                                sec = n.getSeconds();
                                                document.getElementById("date02").innerHTML = d + "/" + m + "/" + y + " " + hours + ":" + mnt + ":" + sec;
                                            </script>
                                        <div class="modal-body">
                                            <form action="/updateBahanBaku/pengurangan/{{$item->nama_bahanBaku}}" method="POST" enctype="multipart/form-data">
                                                @method('post')
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                <label for="nama_bahanBaku">Nama Bahan Baku:</label>
                                                <input type="text" value="{{$item -> nama_bahanBaku}}" readonly>
                                                </div>
                                                <div class="form-group">
                                                <label for="jumlah_bahanBaku">Pengurangan Bahan Baku:</label>
                                                <input type="number" value="" id="kurang" name="kurang">
                                                </div>
                                                <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                
                                        </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
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
