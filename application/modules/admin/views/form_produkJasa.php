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
			$header=array('menu_aktif'=>2);
			include('template/header.php'); ?>
		</div><!--end row head-->
		<div class="row">
<!--KONTEN AWAL-->
		<?php
		$type="1";
		if(isset($post)):
			if($post !== false){
				foreach($post as $r){
					$id=$r->ID;
					$type=$r->type;
					$judul=$r->judul;
					$pedagang=$r->id_pedagang;
					$idKategori=$r->id_kategori;
					$idLokasi=$r->id_lokasi;
					$deskripsi=$r->deskripsi;
					$foto=$r->foto;
				}
			}
		endif;
		?>
		<?=form_open_multipart()?>
			<div class="panel panel-default col-md-8">
				<div class="panel-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Nama Produk / Jasa</label>
							<input type="text" name="nama" class="form-control" value="<?=(isset($judul)?$judul:'')?>" placeholder="Masukkan Nama Produk / Jasa">
						</div>
						<div class="form-group">
							<label for="">Lokasi</label>
							<?php
								if($lokasi != false){
									foreach($lokasi as $r){
										$listLokasi[$r->ID]=ucwords($r->nama);
									}
								}
								echo form_dropdown('idTempat',$listLokasi,(isset($idLokasi)?$idLokasi:''),'class="form-control"')
							?>
						</div>
						<!--div class="form-group">
							<label for="">Kota</label>
							<input type="text" class="form-control" id="lokasi" placeholder="Masukkan Lokasi" value="red"/>
						</div-->
						<div class="form-group">
							<label for="">Jenis</label><br/>
							<input type="radio" name="jenis" value="1" class="-form-control" <?=(($type == 1)?'checked':'')?>> Dagang
							<input type="radio" name="jenis" value="2" class="-form-control" <?=(($type == 2)?'checked':'')?>> Jasa
						</div>
						<div class="form-group">
							<label for="">Kategori</label>
							<?php
								$kategori=isset($kategori)?$kategori:[''=>'Pilih Kategori'];
								echo form_dropdown('kategori',$kategori, (isset($idKategori)?$idKategori:''),'class="form-control"');
							?>
						</div>
						<div class="form-group">
							<label for="">Deskripsi</label>
							<textarea name="deskripsi" class="form-control" placeholder="Deskripsi" style="resize:vertical"><?=(isset($deskripsi)?$deskripsi:'')?></textarea>
						</div>
						<div class="form-group">
							<label for="exampleInputFile">Foto Produk</label>
							<?=form_upload('foto','','class="form-control" accept=".jpg"')?>
							<p class="help-block">Foto Produk/Jasa</p>
						</div>
						<button type="submit" class="btn btn-primary">Simpan</button>
										
				</div><!--end panel-body-->
			</div><!--end panel-default-->
		</form>
<!--KOMENTAR-->
			<div class="panel panel-default col-md-3 col-md-offset-1">
				<div class="panel-body" style="text-align:justify">
					<p>
						<b>Nama Produk/Jasa</b>, Gunakan Nama Tempat atau Perusahaan.
					</p>
					<p>
						<b>Lokasi</b>, Harap Masukkan Nama Desa/Kelurahan dimana tempat tsb berada. 
					</p>
					<p>
						<b>Deskripsi</b>, Berikan Deskripsi Singkat mengenai tempat yang bersangkutan.  
					</p>
					<p>
						<b>Foto Produk</b>, Harap Lampirkan foto produk. 
					</p>
				</div><!--end panel-body-->
			</div><!--end panel-default-->
		</div><!--end row body-->
		<?php include('template/footer.php')?>
		<!--script type="text/javascript" src="<?=base_url('assets/js/tokenfield.min.js')?>"></script>
		<script type="text/javascript" src="<?=base_url('assets/js/jquery-ui.js')?>"></script>
		<script type="text/javascript">
			$("#lokasi").tokenfield({
				autocomplete: {
					source: ['red','blue','green','yellow','violet','brown','purple','black','white'],
					delay: 100
				},
				limit: 1,
				minLength:3,
				showAutocompleteOnFocus: true
			})


		</script-->
	</body>
</html>