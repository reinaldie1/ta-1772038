@extends('kostumer/kostumer')

@section('content')
		<?php 
		$id_user = Session::get('id_user');
		$shipping_cost = 50000;
		?>
		
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Checkout</title>
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
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td></td>
							<td></td>
							<td class="price">Price</td>
						</tr>
					</thead>
					<tbody>
					@foreach($getConf as $item)
						<tr>
							<td class="cart_product">
								<a href="{{asset('assets/tasRajut')}}/{{$item->gambar_tas}}" target="_blank"><img src="{{asset('assets/tasRajut')}}/{{$item->gambar_tas}}" style="height:100px;width:100px;" ></a>
							</td>
							<td class="cart_description">
								<h4>{{ $item -> nama_tas}}</h4>
							</td>
							<td></td>
							<td></td>
							<td class="cart_price">
								<p>@currency($item -> harga_tas)</p>
							</td>
						</tr>
						@endforeach
						<tr>
							
							<td colspan="4">&nbsp;</td>
							<td colspan="2">
								
								<table class="table table-condensed total-result">
									<tr>
										<td>Cart Total</td>
										<td>@currency($getharga)</td>
									</tr>
									<tr class="shipping-cost">
										<td>Shipping Cost (JNE)</td>
										<td>@currency($shipping_cost)</td>										
									</tr>
									<tr>
										<td>Total</td>
										<td><span>@currency($getharga+$shipping_cost)</span></td>
									</tr>
									<tr>
										<td><a href="/confirm/{{$id_user}}">CONFIRM</a></td>
									</tr>
									</table>
							</td>
						</tr>
					</tbody>
				</table>
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