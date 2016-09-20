<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">

		<title>Kategori</title>
	</head>
	<body class="container">
		<div class="row">
			<?php 
				$header=array('menu_aktif'=>3);
				include('template/header.php'); 
			?>
		</div>
		<?php
			if(!empty($this->session->flashdata('success'))){
		?>
			<div class="alert alert-success"><?=$this->session->flashdata('success')?></div>
		<?php
		// sukses
			}
		?>
		<div class="row">
		 <div class="col-md-8">
			<div class="panel panel-default" style="min-height:400px">
				<div class="panel-heading">Kategori List</div>
				<div class="panel-body">
				 <div class="col-md-12" style="margin-bottom:20px">
					 <form class="form-inline" method="GET">
						<div class="input-group">
							<input type="text" name="kategori" class="form-control input-sm" id="kategoriName" placeholder="Kategori" style="width:200px">
							<button type="submit" class="btn btn-sm input-group-addon btn-primary" style="width:80px">Quick Add</button>
						</div>
					</form>
				 </div>
					<?php
					if($kategori !== false){
						foreach($kategori as $r){
							$id=$r->ID;
							$kategori=$r->nama;
							$deskripsi=$r->deskripsi;
								?>
							<div class="btn-group">
								<a href="#" class="btn btn-xs btn-primary"><?=$kategori?></a>
								<a href="<?=site_url('admin/delete_kategori/'.$id.'/prefered')?>" class="btn btn-xs btn-danger">X</a>
							</div>
					<?php
						}
					}
					?>
				</div>
			</div>
		</div><!--end class panel-->
			<div class="panel panel-default col-md-3 col-offset-11" style="margin-left:20px">
				<p>Untuk melihat data lebih lengkap, klik tombol detail</p>
			</div>
		</div>
		<?php include('template/footer.php')?>
	</body>
</html>