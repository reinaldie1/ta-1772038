@extends('admin/admin')

@section('content')
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="font-size:60px">Tambah Jenis Bahan Baku Baru</h3>
                    </div>
                    <div class="panel">
                        <form action="/tambahBahanBaku/tambah" method="post">
                            @method('post')
                            {{ csrf_field() }}

                            <div class="panel-body">
                                <label for="nama_bahanBaku">Nama Bahan Baku:</label>
                                <input type="text" id="nama_bahanBaku" name="nama_bahanBaku" class="form-control" required><br><br>

                                <!-- <label for="jumlah_bahanBaku">Jumlah :</label>
                                <input type="number" name="jumlah_bahanBaku"  class="form-control" required><br><br> -->
                               <label for="harga_satuan_bahan">Harga satuan :</label>
                                <input type="number" name="harga_satuan_bahan"  class="form-control" required><br><br>
                                <input type="submit" class="btn btn-primary btn-lg btn-block">
                                <a href="{{ url()->previous() }}"
                                   class="btn btn-default btn-lg btn-block">Cancel</a>
                                @if (session('message')) 
                                    <br><br>
                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                         <i class="fa fa-times-circle"></i> {{session('message')}} 
                                    </div>
                                @endif
                                @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                                @endif 
                                @if ($message = Session::get('fail'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                                @endif

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
