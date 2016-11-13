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
				<li><a href="<?=site_url('finder/login')?>" id="link-login">Login</a></li>
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
    <div class="container row" style="border:0px solid;">
	    <?php
	    if(!isset($sukses)){
	    ?>
		    	<div class="col-md-6" style="padding-top: 30px;" id="result">
		    		<h1>Pendaftaran Baru</h1><br>
					<form class="form-horizontal" method="POST">
					  <div class="form-group">
					    <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
					    <div class="col-sm-5">
					      <input name="firstName" type="text" class="form-control" id="first" placeholder="Nama Depan" autocomplete="off">
					    </div>
					    <div class="col-sm-5">
					      <input name="lastName" type="text" class="form-control" id="last" placeholder="Nama Belakang" autocomplete="off">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
					    <div class="col-sm-10">
					      <input name="email" type="email" class="form-control" id="email" placeholder="Email" autocomplete="off">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
					    <div class="col-sm-10">
					      <input name="password" type="password" class="form-control" id="password" placeholder="Password">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="inputPassword3" class="col-sm-2 control-label">Konfirmasi</label>
					    <div class="col-sm-10">
					      <input name="password-confirm" type="password" class="form-control" id="confirm" placeholder="Password" onkeyup="cocokan()">
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <div class="checkbox">
					        <label>
					          <input type="checkbox" name="setuju" id="setuju" onchange="get_state();"> Saya Setuju dengan <a href="#ketentuan-privasi" data-toggle="modal" data-target=".bs-example-modal-lg">ketentuan privasi</a>
					        </label>
					      </div>
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-primary" id="submit-tombol" data-loading-text="Loading...">Daftar</button>
					      <label class="alert alert-danger" id="alert-daftar"><?php echo (isset($error))?$error:'Lengkapi dengan benar';?></label>
					    </div>
					  </div>
					</form>
		    		
		    	</div>
		    </div>  
		<?php
		}
		?>
<?php
 $this->load->view('includes/ketentuan.php');
 //$this->load->view('includes/modal.login.php');
?>
<script src="<?=base_url('assets/jquery-components/js/jquery.min.js')?>"></script>
<script src="<?=base_url('assets/bootstrap-components/js/bootstrap.min.js')?>"></script>
<script src="<?=base_url('assets/default/js/script.js')?>"></script>
<script type="text/javascript">
	$("#submit-tombol").attr("type","button");

	function get_state(){
		var setuju=$('#setuju:checked').val()
		var cocok = cocokan()
		if (setuju === 'on' & cocok === true) {
			$("#submit-tombol").attr("type","submit");
			//console.log(setuju)
		}else{
			$("#submit-tombol").attr("type","button");
		}
	}

	function cocokan(){
		var pass1=$("#password").val();
		var pass2=$("#confirm").val();
		if(pass1 !== pass2 || pass1 === ""){
			//console.log('tidak cocok')
			//$("#alert-daftar").html("Password tidak cocok.")
			$("#submit-tombol").attr("type","button");
		}else{
			$("#submit-tombol").attr("type","submit");
			return true
		}
	}

	$('#submit-tombol').on('click', function () {
	    var $btn = $(this).button('loading')
	    setTimeout(200)
	    $btn.button('reset')
	})
</script>
</body>
</html>
