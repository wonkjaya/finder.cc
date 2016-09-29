
	<?php 
	    $header=array('menu_aktif'=>3);
	    include('templates/header.php'); 
    ?>		
	<?php include('templates/sidebar.php'); ?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li>
				 <a href="#">
				    <svg class="glyph stroked home">
				        <use xlink:href="#stroked-home"></use>
				    </svg>
				 </a>
				</li>
				<li class="active">Posts</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Input Produk & Jasa</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row" style="padding:20px;">
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
			<div class="panel panel-default col-md-7">
		      <?=form_open_multipart()?>
				<div class="panel-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Nama Produk / Jasa</label>
							<input type="text" name="nama" class="form-control" 
							        value="<?=(isset($judul)?$judul:'')?>" 
							        placeholder="Masukkan Nama Produk / Jasa">
						</div>
						<div class="form-group">
							<label for="">Lokasi</label>
							<?php
								if($lokasi != false){
									foreach($lokasi as $r){
										$listLokasi[$r->ID]=ucwords($r->nama);
									}
								}
								echo form_dropdown('idTempat',$listLokasi,
								        (isset($idLokasi)?$idLokasi:''),'class="form-control"')
							?>
						</div>
						<!--div class="form-group">
							<label for="">Kota</label>
							<input type="text" class="form-control" 
							        id="lokasi" placeholder="Masukkan Lokasi" value="red"/>
						</div-->
						<div class="form-group">
							<label for="">Jenis</label><br/>
							<input type="radio" name="jenis" value="1" class="-form-control" 
							        <?=(($type == 1)?'checked':'')?>> Dagang
							<input type="radio" name="jenis" value="2" class="-form-control" 
							        <?=(($type == 2)?'checked':'')?>> Jasa
						</div>
						<div class="form-group">
							<label for="">Kategori</label>
							<?php
								$kategori=isset($kategori)?$kategori:[''=>'Pilih Kategori'];
								echo form_dropdown('kategori',$kategori, 
								        (isset($idKategori)?$idKategori:''),'class="form-control"');
							?>
						</div>
						<div class="form-group">
							<label for="">Deskripsi</label>
							<textarea name="deskripsi" class="form-control" 
							            placeholder="Deskripsi" style="resize:vertical">
							            <?=(isset($deskripsi)?$deskripsi:'')?>
							</textarea>
						</div>
						<div class="form-group">
							<label for="exampleInputFile">Foto Produk</label>
							<?=form_upload('foto','','class="form-control" accept=".jpg"')?>
							<p class="help-block">Foto Produk/Jasa</p>
						</div>
						<button type="submit" class="btn btn-primary">Simpan</button>
										
				</div><!--end panel-body-->
		      </form>
			</div><!--end panel-default col-md7-->
			
		</div><!--/.row--> 
	</div>	<!--/.main-->
<?php include('templates/footer.php')?>
