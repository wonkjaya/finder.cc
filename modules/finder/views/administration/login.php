<?php if(!empty($this->session->userdata('--auth'))) redirect('admin')?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>P-Finder | Daftar</title>

		<link rel="icon" href="<?=base_url('assets/default/css/img/icon.ico')?>" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="<?=base_url('assets/bootstrap-components/css/bootstrap.min.css')?>" />
		<link rel="stylesheet" type="text/css" href="<?=base_url('assets/default/css/styles.css')?>" />

</head>

<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	      	<span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
          <img src="<?=base_url('assets/default/css/img/logo.png')?>" class="navbar-brand visible-xs">
          <a class="navbar-brand" href="<?=site_url()?>">P-Finder</a>
          <!--div class="input-group input-group-lg" style="max-width:400px">
			  <!--span class="info input-group-addon btn visible-xs" style="background:#6C1BD8;color:#fff;width: 50px;" id="submit">Go</span-->
			  <!--input type="text" class="form-control" autocomplete="off" placeholder="Cari Info Pedagang atau Jasa Sekarang" style="font-size:11px" id="q" onkeyup="tekan_tombol();">
			  <span class="info input-group-addon btn " id="submit">Go</span>
			  <span class="input-group-btn glyphicon" id="minimized-menu"></span>
		  </div-->
        </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <?php
			if(isset($loggedin)){
			?>
			<ul class="nav navbar-nav navbar-right">
		        <li><a href="#">Link</a></li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
		          	<span class="glyphicon glyphicon-th"></span> <?=$username?> <span class="caret"></span>
		          </a>
		          <ul class="dropdown-menu" role="menu">
		            <li><a href="#">Profil Saya</a></li>
		            <li><a href="#">Aktivitas Saya</a></li>
		            <li class="divider"></li>
		            <li><a href="<?=site_url('logout')?>">Logout</a></li>
		          </ul>
		        </li>
		    </ul>
		    <?php
			}else{
		    ?>
		    <ul class="nav navbar-nav navbar-right">
		        <li><a href="<?=site_url('finder/register')?>" >Daftar</a></li>
				<li><a href="#" id="link-login" data-toggle='modal' data-target='.modal-login'>Login</a></li>
		    </ul>
		    <?php
			}
		    ?>
			
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
<!---END OF HEADER-->
    <!-- Begin page content -->
    <!--div class="clear-top"></div>
    <hr/-->
    	<div class="col-md-4 col-md-offset-8" style="padding-top:100px">
    	  <div class="row col-md-9">
		  		<h2>Masuk Akun</h2><br>
		  		<?=!empty($this->session->flashdata('error'))?'<div class="alert alert-danger">Username & Password Salah</div>':''?>
					<form class="form-horizontal" method="POST">
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-12 ">Username</label>
							<div class="col-sm-12">
							  <input name="email" type="email" class="form-control" placeholder="example@finder.com" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-12">Password</label>
							<div class="col-sm-12">
							  <input name="password" type="password" class="form-control" placeholder="*****" autocomplete="off">
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-4 col-sm-12">
							  <button type="submit" class="btn btn-default" id="submit-tombol" data-loading-text="Loading...">Masuk</button>
							  <a href="<?=site_url('finder/register')?>" class="btn btn-primary">Daftar Sekarang</a>
							</div>
						</div>
					</form>
				</div>
    	</div>
		
<?php
 //$this->load->view('includes/ketentuan.php');
 //$this->load->view('includes/modal.login.php');
?>
<script src="<?=base_url('assets/jquery-components/js/jquery.min.js')?>"></script>
<script src="<?=base_url('assets/bootstrap-components/js/bootstrap.min.js')?>"></script>
<script src="<?=base_url('assets/default/js/script.js')?>"></script>

</body>
</html>
