@extends('kostumer/kostumer')


@section('content')
<!-- Slider -->
<section id="slider">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>G3MAR</span> CRAFT</h1>
									<h2>Tas Rajut Model 01</h2>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="/BahanStudy/images/home/girl1.jpg" class="girl img-responsive" alt="" />
									<img src="/BahanStudy/images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
								    <h1><span>G3MAR</span> CRAFT</h1>
									<h2>Tas Rajut Model 02</h2>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="/BahanStudy/images/home/girl2.jpg" class="girl img-responsive" alt="" />
									<img src="/BahanStudy/images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
								    <h1><span>G3MAR</span> CRAFT</h1>
									<h2>Tas Rajut Model 03</h2>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="/BahanStudy/images/home/girl3.jpg" class="girl img-responsive" alt="" />
									<img src="/BahanStudy/images/home/pricing.png" class="pricing" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	<!-- Close Slider -->

    <!-- Featured Item -->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-1">
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<h2>Rp. </h2>
										<p></p>
											<button data-toggle="modal" data-target="#myModal"  data-id="" class="btn btn-default add-to-cart jumlah"><i class="fa fa-shopping-cart"></i>Add to cart</button>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										
									</ul>
								</div>
							</div>
						</div>
					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
	<!-- Close Featured Item -->
@endsection