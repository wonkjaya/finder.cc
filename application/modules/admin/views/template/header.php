<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?=site_url()?>"><i class="glyphicon glyphicon-map-marker" style="color:red"></i> FINDER</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="<?=($header['menu_aktif']==1)?'active':'';?>">
        	<a href="<?=site_url('admin')?>"><i class="glyphicon glyphicon-home"></i> Home</a>
        </li>
        <li class="<?=($header['menu_aktif']==2)?'active':'';?>">
        	<a href="<?=site_url('admin/dagangan')?>"><i class="glyphicon glyphicon-shopping-cart"></i> Produk & Jasa</a>
        </li>
        <li class="dropdown <?=($header['menu_aktif']==3)?'active':'';?>">
        	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        		<i class="glyphicon glyphicon-map-marker"></i> Tempat <span class="caret"></span>
        	</a>
        	<ul class="dropdown-menu">
            <li><a href="<?=site_url('admin/list_lokasi')?>">Daftar Lokasi</a></li>
            <li><a href="<?=site_url('admin/new_lokasi')?>">New Lokasi</a></li>
          </ul>
        </li>
      </ul>
      <!--form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form-->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?=site_url('admin/new_post')?>"><i class="glyphicon glyphicon-bullhorn"></i> New Post</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          	<i class="glyphicon glyphicon-user"></i> <?=($this->session->userdata('--auth')['email'])?$this->session->userdata('--auth')['email']:''?>
          	<span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="#">Profilku</a></li>
            <li><a href="#">Pengaturan</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>