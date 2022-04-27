    <?php 
		$id_user = Session::get('id_user');
		
		?>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user-alt"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <i class="dropdown-item">
            <i class=""></i> {{session('username')}}
          </i>
          <div class="dropdown-divider"></div>
          <a href="/admin/profile/{{$id_user}}" class="dropdown-item">
            <i class="fas fa-user-cog"></i> Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="/logout" class="dropdown-item">
            <i class="fas fa-window-close"></i> Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>