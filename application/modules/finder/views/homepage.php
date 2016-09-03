<!DOCTYPE html>
<html lang="en">
<head>
	<title>P-Finder | Search</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="icon" href="<?=base_url('assets/css/img/icon.ico')?>" type="image/x-icon">
		<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/styles.css')?>" />
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
          <a class="navbar-brand hidden-xs" href="#">P-Finder</a>
          <img src="<?=base_url('assets/css/img/logo.png')?>" class="navbar-brand visible-xs">
          <div class="input-group input-group-lg" style="max-width:400px">
			  <!--span class="info input-group-addon btn visible-xs" style="background:#6C1BD8;color:#fff;width: 50px;" id="submit">Go</span-->
			  <input type="text" class="form-control" autocomplete="off" placeholder="Cari Info Pedagang atau Jasa Sekarang" style="font-size:11px" id="q" onkeyup="tekan_tombol();">
			  <span class="info input-group-addon btn " id="submit">Go</span>
			  <span class="input-group-btn glyphicon" id="minimized-menu"></span>
		  </div>
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
    <div class="clear-top"></div>
    <hr/>
    <div class="container">
	    <div class="row">
	    	<div class="col-md-6" id="result">
	    	
	    		
	    	</div>
	    </div>  
	</div>
<script src="<?=base_url('assets/js/jquery.min.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
<script src="<?=base_url('assets/js/script.js')?>"></script>
<script type="text/javascript">
	check_get_default();

	function check_get_default(){
		var get="<?php echo (isset($_GET['q']))?$_GET['q']:''; ?>";
		if(get !== ""){
			search_res(get)
		}
	}

	$("#submit").click(function(){
		var q=$("#q").val()
		if(q !== ""){
			search_res(q)
		}
	});

	function tekan_tombol(){
		var q=$("#q").val()
		if(q !== ""){
			search_res(q)
		}
	}

	function search_res($q){
		$.ajax({
			url		: "<?=site_url('search')?>", // lihat routing.php
			method	: 'GET',
			data	: {
						q 	: $q
			}
		}).done(function(msg){
			$("#result").html(msg)
			add_url('?q=' + $q )
		});
	}

	function add_url($url){
		var stateObj = { foo: "bar" };
		history.pushState(stateObj, "page 2", $url);
	}
</script>
</body>
</html>
