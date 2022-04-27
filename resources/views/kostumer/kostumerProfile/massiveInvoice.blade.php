@extends('kostumer/kostumer')
@section('content')
<?php 
    $id_user = Session::get('id_user');
?>
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<!-- Main -->
<style>
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #04AA6D;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>
</head>
<body>

<div class="sidebar">
  <a href="/profile/{{$id_user}}">Profile</a>
  <a href="/invoice/{{$id_user}}">Transaction Report</a>
  <a href="/all/invoice/{{$id_user}}">Invoices</a>
</div>

<div class="content">
<div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Transaction Report</h3>
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
                                    <th>Order ID</th>
                                    <th>Nama Tas</th>
                                    <th>Harga Tas</th>
                                    <th>Tanggal Pembelian</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($getInvoices as $item)
                                <tr>
                                    <td>{{$item -> order_id}}</td>
                                    <td>{{$item -> nama_tas}}</td>
                                    <td>@currency($item -> harga_tas)</td>
                                    <td>{{$item -> created_at}}</td>
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
</div>


@endsection