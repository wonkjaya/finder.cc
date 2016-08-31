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
			<table class="">
				<tr>
					<th>#<th>
					<th>Judul<th>
					<th>Kategori<th>
					<th>Pedagang<th>
					<th>***<th>
				</tr>
				<?php
				$no=1;
				if($dagangan !== ''){
					foreach($dagangan as $r){
						$judul=$r->judul;
						$kategori=$r->kategori;
						$pedagang=$r->pedagang;				
				?>
				<tr>
					<td><?=$no?></td>
					<td><?=$judul?></td>
					<td><?=$kategori?></td>
					<td><?=$pedagang?></td>
					<td><?=anchor('','Edit','class="btn btn-primary btn-xs"')?></td>
				</tr>
				<?php
						$no++;
					}
				}
				?>
			</table>
		</div>
		<?php include('template/footer.php')?>
	</body>
</html>