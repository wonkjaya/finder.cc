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
		<?php
			if(!empty($this->session->flashdata('success'))){
		?>
			<div class="alert alert-success"><?=$this->session->flashdata('success')?></div>
		<?php
		// sukses
			}
		?>
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
					if($dagangan !== false){
						foreach($dagangan as $r){
							$id=$r->ID;
							$judul=$r->judul;
							$kategori=$r->kategori;
							$pedagang=$r->pedagang;				
					?>
					<tr>
						<td><?=$no?></td>
						<td><?=$judul?></td>
						<td><?=$kategori?></td>
						<td><?=$pedagang?></td>
						<td>
							<?=anchor('admin/edit_produkJasa/'.$id.'/prefered_content',
								'<i class="visible-xs glyphicon glyphicon-pencil"></i><span class="hidden-xs">Edit</span>',
								'class="btn btn-primary btn-xs"')?>

							<?=anchor('admin/detail_produkJasa/'.$id.'/prefered_content',
								'<i class="visible-xs glyphicon glyphicon-eye-open"></i><span class="hidden-xs">Detail</span>',
								'class="btn btn-default btn-xs"')?>
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