<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
		<!--link href="<?=base_url('assets/css/tokenfield.min.css')?>" rel="stylesheet">
		<link href="<?=base_url('assets/css/jquery-ui.css')?>" rel="stylesheet"-->

		<title>Data Produk & Jasa</title>
	</head>
	<body class="container">
		<div class="row">
			<?php 
			$header=array('menu_aktif'=>3);
			include('template/header.php'); ?>
		</div><!--end row head-->
		<div class="row">
<!--KONTEN AWAL-->
		<?=form_open_multipart()?>
			<div class="panel panel-default col-md-8">
				<div class="panel-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Nama Tempat / Perusahaan</label>
							<input type="text" name="lokasiNama" class="form-control" placeholder="Masukkan Nama Tempat / Perusahaan">
						</div>
						<div class="form-group">
							<label for="">Alamat</label>
							<input type="text" name="lokasiAlamat" class="form-control" placeholder="Alamat" value=""/>
						</div>
						<div class="form-group">
							<label for="">Kota</label>
							<input type="text" class="form-control" name="lokasiKota" placeholder="Masukkan Kota" value=""/>
						</div>
						<div class="form-group">
							<label for="">Deskripsi</label>
							<textarea name="lokasiDeskripsi" class="form-control" placeholder="Deskripsi" style="width:100%;height:200px;resize:none" ></textarea>
						</div>
						<button type="submit" class="btn btn-primary">Simpan</button>
										
				</div><!--end panel-body-->
			</div><!--end panel-default-->
		</form>
<!--KOMENTAR-->
			<div class="panel panel-default col-md-3 col-md-offset-1">
				<div class="panel-body" style="text-align:justify">
					<p>
						<b>Nama Tempat</b>, Gunakan Nama Tempat atau Perusahaan.
					</p>
					<p>
						<b>Alamat</b>, Harap Masukkan Nama Jalan dimana objek tsb berada. 
					</p>
					<p>
						<b>Deskripsi</b>, Berikan Deskripsi Singkat mengenai tempat yang bersangkutan.  
					</p>
				</div><!--end panel-body-->
			</div><!--end panel-default-->
		</div><!--end row body-->
		<?php include('template/footer.php')?>
		
	</body>
</html>