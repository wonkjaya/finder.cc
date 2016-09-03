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
					foreach($detail_produkJasa as $r){
						$id=$r->ID;
						$judul=$r->judul;
						$kategori=$r->kategori;
						$lokasi=$r->lokasi;
						$deskripsi=$r->deskripsi;
						$foto_path=FCPATH.'uploads/produk-images/'.$r->foto;
						$foto=base_url('uploads/produk-images/'.$r->foto);
						$foto=(file_exists($foto_path)?$foto:base_url('assets/images/noimage.png'));
						$alamat=$r->alamat;
					}
				?>
				<table class="table" border="0">
					<tr>
						<td class="col-md-9">
							<label>Kategori</label>
							<p><?=$kategori?></p>
						</td>
						<td rowspan=2 width="30%" class="col-md-3">
							<div class="img img-rounded" style="">
								<img class="img" src="<?=$foto?>" width="100%"/>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<label>Nama Tempat</label>
							<p><?=$lokasi?></p>
						</td>
					</tr>
					<tr>
						<td colspan=2>
							<label>Alamat</label>
							<p><?=$alamat?></p>
						</td>
					</tr>
					<tr>
						<td colspan=2>
							<label>Judul</label>
							<p><?=$judul?></p>
						</td>
					</tr>
					<tr>
						<td colspan=2>
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