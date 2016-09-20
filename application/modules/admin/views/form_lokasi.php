<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="<?=base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
		<link href="<?=base_url('assets/css/styles.css')?>" rel="stylesheet">
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
<?php
if(isset($lokasi)){
	foreach($lokasi as $r){
		$nama=$r->nama;
		$alamat=$r->alamat;
		$kota=$r->kota;
		$deskripsi=$r->deskripsi;
		$foto=$r->foto;
	}
}
?>
		<?=form_open_multipart()?>
			<div class="panel panel-default col-md-8">
				<div class="panel-body">
					<div class="col-md-12">
						<?php
						if(!empty($this->session->flashdata('success'))){
						?>
							<div class="alert alert-success"><?=$this->session->flashdata('success')?></div>
						<?php
						}
						?>
					</div>
					<div class="col-md-8">
						<div class="form-group">
							<label for="exampleInputEmail1">Nama Tempat / Perusahaan</label>
							<input type="text" name="lokasiNama" value="<?=(isset($nama)?$nama:'')?>" class="form-control" placeholder="Masukkan Nama Tempat / Perusahaan">
						</div>
						<div class="form-group">
							<label for="">Alamat</label>
							<input type="text" name="lokasiAlamat" value="<?=(isset($alamat)?$alamat:'')?>" class="form-control" placeholder="Alamat" value=""/>
						</div>
						<div class="form-group">
							<label for="">Kota</label>
							<input type="text" class="form-control" value="<?=(isset($kota)?$kota:'')?>" name="lokasiKota" placeholder="Masukkan Kota" value=""/>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="exampleInputEmail1">Foto Tempat / Lokasi</label>
							<div class="img-rounded ts-image-preview">
	   						<img src="<?=base_url('uploads/'.(isset($foto)?'lokasi-images/'.$foto:'no-image.png'))?>" width="100%" id="fotoLokasi">
	   						<input type="file" name="fotoLokasi" class="form-control fileUpload"/>
	   					</div>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="">Deskripsi</label>
							<textarea name="lokasiDeskripsi" class="form-control" placeholder="Deskripsi" style="width:100%;height:200px;resize:none" ><?=(isset($deskripsi)?$deskripsi:'')?></textarea>
						</div>
						<button type="submit" class="btn btn-primary">Simpan</button>					
					</div>
										
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
			<!--Panel Kontak-->
			<div class="panel panel-default col-md-3 col-md-offset-1">
				<div class="panel-body" style="text-align:justify">
					<p>
					<?php
					if(isset($kontak)){?>
					<form action="<?=site_url('admin/new_kontak')?>" method="GET" name="newKontak">
						<label>Daftar Kontak</label>
						<div class="input-group">
							<input type="hidden" value="<?=$this->uri->segment(3)?>" name="id"/>
							<input class="form-control" name="kontak" style="width:180px"/>
							<span class="input-group-addon btn btn-primary" id="add_kontak" onclick="newKontak.submit()">Add</span>
						</div>
					</form>
					<?php } ?>
					</p>
					<p>
						<?php
							if(isset($kontak))
							foreach($kontak as $r){
								?>
								<div class="btn-group">
									<a href="#" class="btn btn-xs btn-primary"><?=$r->key_kontak?></a>
									<a href="#" class="btn btn-xs btn-default"><?=$r->value?></a>
									<a href="<?=site_url('admin/delete_kontak/'.$r->ID.'/prefered?id='.$r->id_lokasi)?>" class="btn btn-xs btn-danger">X</a>
								</div>
								<?php
							}
						?>
					</p>
				</div><!--end panel-body-->
			</div><!--end panel-default-->
		</div><!--end row body-->
		<?php include('template/footer.php');?>
		<script type="text/javascript">
			function readURL(input) {
				var id=$(input).attr('name');
				if (input.files && input.files[0]) {
						var reader = new FileReader();
						reader.onload = function (e) {
						    $('#'+id).attr('src', e.target.result);
						}
						reader.readAsDataURL(input.files[0]);
				}
			}
			$("[name='fotoLokasi']").on('change',function(){
				readURL(this);
			});
		</script>
	</body>
</html>