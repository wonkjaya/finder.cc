<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">

		<title>Data Produk & Jasa</title>
	</head>
	<body class="container">
		<div class="row">
			<?php 
				$header=array('menu_aktif'=>2);
				include('template/header.php'); 
			?>
		</div>
		<div class="row">
			<div class="panel panel-default col-md-8">
				<?php
					$n=1;
					foreach($detail_lokasi as $r){
					 if($n == 1){
						$id=$r->ID;
						$nama=$r->nama;
						$alamat=$r->alamat;
						$kota=$r->kota;
						$deskripsi=$r->deskripsi;
					 }
					 $n++;
					}
				?>
				<table class="table" border="0">
					<tr>
						<td class="col-md-9">
							<label>Nama</label>
							<p><?=$nama?></p>
						</td>
					</tr>
					<tr>
						<td>
							<label>Alamat</label>
							<p><?=$alamat?></p>
						</td>
					</tr>
					<tr>
						<td>
							<label>Kota</label>
							<p><?=$kota?></p>
						</td>
					</tr>
					<tr>
						<td>
							<label>Deskripsi</label>
							<p><?=$deskripsi?></p>
						</td>
					</tr>
					<tr>
						<td colspan=2>
							<br>
							<a href="#" class="btn btn-warning" onclick="history.back()"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>
							<?=anchor('admin/edit_produkJasa/'.$id.'/prefered_content','Edit','class="btn btn-default"')?>
						</td>
					</tr>
				</table>
			</div><!--end class panel-->
			<div class="panel panel-default col-md-3 col-offset-11" style="margin-left:20px">
				<p>Untuk melihat data lebih lengkap, klik tombol detail</p>
			</div>
		</div>
		<?php include('template/footer.php')?>
	</body>
</html>