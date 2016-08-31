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
				$header=array('menu_aktif'=>3);
				include('template/header.php'); 
			?>
		</div>
		<div class="row">
			<div class="panel panel-default col-md-8">
				<table class="table table-bordered">
					<tr>
						<th>#</th>
						<th>Judul</th>
						<th>Kategori</th>
						<th>Pedagang</th>
						<th>***</th>
					</tr>
					<?php
					$no=1;
					if($lokasi !== ''){
						foreach($lokasi as $r){
							$id=$r->ID;
							$nama_toko=$r->nama;
							$alamat=$r->alamat;
							$kota=$r->kota;
							$pedagang=$r->pedagang;				
					?>
					<tr>
						<td><?=$no?></td>
						<td><?=$nama_toko?></td>
						<td><?=$alamat?></td>
						<td><?=$kota?></td>
						<td><?=$pedagang?></td>
						<td>
							<?=anchor('admin/edit_produkJasa/'.$id.'/prefered_content','Edit','class="btn btn-primary btn-xs"')?>
						</td>
					</tr>
					<?php
							$no++;
						}
					}
					?>
				</table>
			</div><!--end class panel-->
			<div class="panel panel-default col-md-3 col-offset-11" style="margin-left:20px">
				<p>Untuk melihat data lebih lengkap, klik tombol detail</p>
			</div>
		</div>
		<?php include('template/footer.php')?>
	</body>
</html>