<!DOCTYPE html>
<html lang="en">
<head>
	<title>P-Finder | Result</title>
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
    <!--div class="clear-top"></div-->
 <hr/>
    <?php
    if($result != false){
    	foreach($result as $r){
    		$id=$r->id;
    		$idLokasi=$r->idLokasi;
    		$judul=$r->judul;
    		$deskripsi=$r->deskripsi;
    		$foto=$r->foto;
    		$nama=$r->nama;
    		$namaLokasi =$r->namaLokasi;
    		$deskripsiLokasi =$r->deskripsiLokasi;
    		$alamat=$r->alamat;
    		$fotoObjek=$r->fotoObjek;
    	}
    }
    ?>
    <div class="container">
	    <div class="row">
	    	<div class="col-md-8" id="result">
					<div class="panel">
						<div class="panel-default panel-heading"><h3><?=isset($judul)?ucwords($judul):''?></h3></div>
						<div class="panel-body">
							<div class="col-md-3">
								<img src="<?=base_url('uploads/'.(!empty($foto)?'produk-images/'.$foto:'no-image.png'))?>" class="img img-rounded" width="200px"/>
							</div>
							<div style="margin-left:40px">
								<p><?=isset($deskripsi)?$deskripsi:''?></p>
							</div>
						</div>
					</div>	    		
	    	</div> <!--col md 8-->
	    	<div class="col-md-3" id="result">
					<div class="row">
						<div class="col-md-12">
							<img class="img img-rounded" src="<?=base_url('uploads/'.(!empty($fotoObjek)?'lokasi-images/'.$fotoObjek:'no-image.png'))?>" width="200px"/>
							<hr/>
						</div>
						<label>Nama Lokasi</label> <br/><?=isset($namaLokasi)?$namaLokasi:'Belum Tersedia'?><br/><br/>
						<label>Alamat</label> <br/><?=isset($alamat)?$alamat:'Belum Tersedia'?><br/><br/>
						<label>Deskripsi</label> <br/><?=isset($deskripsiLokasi)?$deskripsiLokasi:'Belum Tersedia'?><br/><br/>
						<label>Kontak:</label> <br/><p id="kontak"><button class="btn btn-primary btn-xs" onClick="setData(<?=$idLokasi?>)">Tampilkan Kontak</button></p>
					</div>
	    	</div><!--col md 4-->
	    </div>  
	</div>
<script src="<?=base_url('assets/js/jquery.min.js')?>"></script>
<script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
<script src="<?=base_url('assets/js/script.js')?>"></script>
<script type="text/javascript">
	function setData(id){
		$.ajax({
			method : 'GET',
			url : "<?=site_url('finder/showKontak')?>",
			data : {'id':id}
		}).done(function(msg){
			var data=JSON.parse(msg);
			for(var i=0; i <= data.length -1; i++){
				console.log(data[i].key);
				if(i === 0 ){
					$("#kontak").html("<label class='label label-success'>" + data[i].key + "</label> : " + data[i].value);
				}else{
					$("#kontak").append("<br/><label class='label label-success'>" + data[i].key + "</label> : " + data[i].value);
				}
			}
		});
	}
</script>

</body>
</html>
