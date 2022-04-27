<?php 
		$id_user = Session::get('id_user');
		?>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<header id="header"><!--header-->
		<div class="header-middle" ><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="index.html"><img src="/BahanStudy//BahanStudy/images/home/logo.png" alt="" /></a>
						</div>
						
					</div>
<!-- // atas --><div class="col-sm-12">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="/main" >Home</a></li>
								<li><a href="/store">Store</a></li>
								<li><a href="/cart/{{$id_user}}">Cart</a></li>
								
								<!-- <li><a href="/contact">Contact Us</a></li> -->
							</ul>
						</div>
						@if($id_user===null)
						<div class="mainmenu pull-right">
							<a href="/signup" class="btn btn-info">Sign Up</a>
						</div>
						@else
						<div class="mainmenu pull-right">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<div class="dropdown">
  									<button class="btn btn-link dropdown-toggle " type="button" style="font-size:15px;" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{session('username')}}</button>
									<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<a href="/profile/{{$id_user}}" class="dropdown-item">
            								<i class="fas fa-user-cog"></i> Profile
        								</a>
										<div class="dropdown-divider"></div>
										<a href="/logout" class="dropdown-item">
            								<i class="fas fa-window-close"></i> Logout
          								</a>
									</form>
									</div>
								</div>
								
							</ul>
						</div>

						@endif
						
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->