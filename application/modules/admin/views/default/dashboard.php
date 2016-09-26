<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?=base_url('assets/bootstrap-components/css/bootstrap.min.css')?>" rel="stylesheet">

		<title>Dashboard</title>
	</head>
	<body class="container">
		<div class="row">
			<?php 
				$header=array('menu_aktif'=>1);
				include('template/header.php'); 
			?>
		</div>
		<div class="row">
			
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Data Produk Terakhir</div>
					<div class="panel-body">
						<table class="table table-bordered">
							<tr>
								<th>No</th>
								<th></th>
								<th>Type</th>
								<th>Judul</th>
								<th>*</th>
							</tr>
						<?php
						$dataProduk=$allData['produkTerakhir'];
						if($dataProduk->num_rows() > 0){
						?>
										<?php
										$no=1;
										foreach($dataProduk->result() as $r){
											$id=$r->ID;
											$type=($r->type == 1)?'Produk':'Jasa';
											$judul=$r->judul;
											//$deskripsi=$r->deskripsi;
											$foto=$r->foto;
											?>
										<tr>
											<td><?=$no?></td>
											<td><?=img('uploads/produk-images/'.$foto,'','width="40px"')?></td>
											<td><?=$type?></td>
											<td><?=$judul?></td>
											<td><?=''?></td>
										</tr>
											<?php
											$no++;
										}
											?>
						<?php
						}
						?>
						</table>
					</div>
				</div>
			</div>
			
			
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">Data Lokasi Terakhir</div>
					<div class="panel-body">
						<table class="table table-bordered">
							<tr>
								<th>No</th>
								<th></th>
								<th>Nama</th>
								<th>Alamat</th>
								<th>*</th>
							</tr>
							<?php
							$dataLokasi=$allData['lokasiTerakhir'];
							if($dataLokasi->num_rows() > 0){
							?>
											<?php
											$no=1;
											foreach($dataLokasi->result() as $r){
												$id=$r->ID;
												$namaLokasi=$r->nama;
												$alamat=$r->alamat;
												$foto=$r->foto;
												?>
											<tr>
												<td><?=$no?></td>
												<td><?=img('uploads/lokasi-images/'.$foto,'','width="40px"')?></td>
												<td><?=$namaLokasi?></td>
												<td><?=$alamat?></td>
												<td><?=''?></td>
											</tr>
												<?php
												$no++;
											}
												?>
							<?php
							}
							?>
						</table>
					</div>
				</div>
			</div>
			
		</div>
		<?php include('template/footer.php')?>
	</body>
</html>