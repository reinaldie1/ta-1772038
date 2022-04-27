@extends('kostumer/kostumer')


@section('content')
		<?php 
		$id_user = Session::get('id_user');
		?>
    <!-- Featured Item -->
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-1">
				</div>
				<div class="col-sm-9 padding-left">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Store</h2>
						@foreach($tasRajut as $item)
						<form action="/cart/{{$id_user}}/{{$item -> id_tas}}" method="post" enctype="multipart/form-data">
						@method('post')
                        {{ csrf_field() }}
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img src="/assets/tasRajut/{{$item->gambar_tas}}" style = "height:100px;width:100px;" alt="" />
										<h2>{{$item->nama_tas}}</h2>
										<p>@currency($item->harga_tas)</p>
										<button type="submit"  data-id="{{ $item->id_tas }}" class="btn btn-default add-to-cart jumlah"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										<div class="modal fade" id="myModal" role="dialog">
    							</div>
									</div>
								</div>
							</div>
						</div>
						
						</form>
						@endforeach
						
					</div><!--features_items-->
				</div>
			</div>
			@if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong><span style=" overflow:auto;">{{ $message }}</span></strong>
            </div>
            @endif
			@if ($message = Session::get('fail'))
                <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong><span style=" overflow:auto;">{{ $message }}</span></strong>
            </div>
            @endif
		</div>
	</section>
	<!-- Close Featured Item -->
    
@endsection