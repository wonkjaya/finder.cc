<?php if(!empty($this->session->userdata('--auth'))) redirect('admin')?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>P-Finder | Daftar</title>

		<link rel="icon" href="<?=base_url('assets/css/img/icon.ico')?>" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/styles.css')?>" />

</head>

<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top" style="padding-top:10px">
      <div class="container">
         <div class="navbar-header">
          <img src="<?=base_url('assets/css/img/logo.png')?>" class="navbar-left">
          <a class="navbar-brand" href="<?=site_url()?>">P-Finder</a>
         </div>
					<?php
					if(isset($loggedin)){
					?>		  
					<div class="btn-group navbar-right" role="group" aria-label="...">
						<a href="#label" class="btn btn-default btn-lg">1</a>
						<a href="#label" class="btn btn-default btn-lg">2</a>

						<div class="btn-group" role="group">
							<button type="button" class="btn btn-default dropdown-toggle btn-lg" data-toggle="dropdown" aria-expanded="false">
								Dropdown
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu">
								<li><a href="#">Dropdown link</a></li>
								<li><a href="#">Dropdown link</a></li>
							</ul>
						</div>
					</div>		  
					<?php
					}else{
					?>
					<ul class="nav navbar-nav navbar-right hidden-xs">
						<li><a href="<?=site_url('finder/register')?>" >Daftar</a></li>
						<li><a href="#" id="link-login" data-toggle='modal' data-target='.modal-login'>Login</a></li>
					</ul>

					<?php
					}
					//echo $url;
					?>
        </div><!--/.nav-collapse -->
      </div>
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
<script src="<?=base_url('assets/js/jquery.min.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap.js')?>"></script>
<script src="<?=base_url('assets/js/script.js')?>"></script>

</body>
</html>
