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
          <a class="navbar-brand" href="index.php">P-Finder</a>
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
			<li><a href="<?=site_url('finder/login')?>" id="link-login" data-toggle='modal' data-target='.modal-login'>Login</a></li>
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
    <div class="container row" style="border:0px solid;">
	    
			<div class="row" style="margin-top:100px;">
				<div class="col-md-3 ofset-4"></div>
		    	<div class="col-md-6" id="result">
		    		<h1>Selamat Pendaftaran Sukses!!!</h1><br>	
		    		<!--p>Silahkan Buka Email Anda untuk konfirmasi Pendaftaran</p-->
		    		<p>Silahkan Login untuk Memulai Menggunakan Service Kami...</p>	    		
		    	</div>
				<div class="col-md-3"></div>
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
