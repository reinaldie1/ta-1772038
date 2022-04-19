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
    <title>Cart | E-Shopper</title>
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
	<section id="cart_items">
		<div class="container">
        <div class="review-payment">
				<h2>Cart</h2>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<th class="description">Nama Tas</th>
							<th class="image">Gambar Tas</th>
							<th class="price">Harga Tas</th>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($getCart as $item)
					
						<tr>
							<td class="cart_description">
                                <h4><a href="">{{$item -> nama_tas}}</a></h4>
                            </td>
							<td class="cart_product">
                                <a href="{{asset('assets/tasRajut')}}/{{$item->gambar_tas}}" target="_blank"><img src="{{asset('assets/tasRajut')}}/{{$item->gambar_tas}}" style="height:100px;width:100px;" ></a>
                            </td>
							<td class="cart_price"><p>@currency($item->harga_tas)</p></td>
							<td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteCart{{$item->id_cart}}">Hapus</td>
							<!-- MODAL DELETE CART -->
							<div class="modal fade" id="deleteCart{{$item -> id_cart}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Dari Keranjang</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/cart/delete/{{$item->id_cart}}" method="POST" enctype="multipart/form-data">
									@method('post')
                        			{{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger">Anda yakin hapus barang dari keranjang ?</button>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>
						</tr>
						<?php
						?>
						@endforeach
                       
					</tbody>
				</table>
                @if($getCart!==[])
                <button class="btn btn-default " style="float:right;"><i class="fa fa-shopping-cart"><a href="/checkout/{{$id_user}}"></i>CHECKOUT</button>
                @elseif($getCart==[])
                <h2>Masukkan barang ke cart</h2>
                @endif
			</div>
		</div>
	</section> <!--/#cart_items-->
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
@endsection