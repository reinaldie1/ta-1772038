@extends('kostumer/kostumer')

@section('content')
		<?php 
		$id_user = Session::get('id_user');
		?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<section id="form"><!--form-->
		<div class="container"> 	
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form">
						<h2>Konfirmasi Pembayaran</h2>
						<form action="/confirm/invoice/{{$id_user}}" method="post" enctype="multipart/form-data">
							@method('post')
                            {{ csrf_field() }}
							<input type="text" name="nama_kostumer"placeholder="Nama" value="{{$getKostumer->nama_kostumer}}" readonly/>
							<input type="text" name="no_tlp" id="no_tlp" placeholder="No Telepon" value="{{$getKostumer->no_tlp}}" required/>
							<input type="text" name="provinsi" id="provinsi"placeholder="Provinsi" value="{{$getKostumer->provinsi}}" required>
							<input type="text" name="kota" id="kota" placeholder="Kota" value="{{$getKostumer->kota}}" required>
							<input type="text" name="alamat_lengkap" id="alamat_lengkap" placeholder="Alamat Lengkap" value="{{$getKostumer->alamat_lengkap}}" required>
							<button type="submit" class="btn btn-default">Confirm</button>
						</form>
					</div><!--/login form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
@endsection