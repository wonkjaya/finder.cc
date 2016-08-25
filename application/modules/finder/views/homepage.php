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
    <nav class="navbar navbar-default navbar-fixed-top" style="padding-top:10px">
      <div class="container">
         <div class="navbar-header">
          <a class="navbar-brand hidden-xs" href="#">P-Finder</a>
          <img src="<?=base_url('assets/css/img/logo.png')?>" class="navbar-brand visible-xs">
          <div class="input-group input-group-lg" style="max-width:400px">
			  <!--span class="info input-group-addon btn visible-xs" style="background:#6C1BD8;color:#fff;width: 50px;" id="submit">Go</span-->
			  <input type="text" class="form-control" autocomplete="off" placeholder="Cari Info Pedagang atau Jasa Sekarang" style="font-size:11px" id="q" onkeyup="tekan_tombol();">
			  <span class="info input-group-addon btn " id="submit">Go</span>
			  <span class="input-group-btn glyphicon" id="minimized-menu">
			  	<div class="visible-xs glyphicon glyphicon-menu-hamburger">
			  		<ul class="dropdown-menu" role="menu">
				      <li><a href="#">Dropdown link</a></li>
				      <li><a href="#">Dropdown link</a></li>
				    </ul>
			  	</div>
			  </span>
		  </div>
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
		include("includes/modal.login.php");
		}
		?>
        </div><!--/.nav-collapse -->
      </div>
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
<script src="<?=base_url('assets/js/bootstrap.js')?>"></script>
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
			url		: "search.php",
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
