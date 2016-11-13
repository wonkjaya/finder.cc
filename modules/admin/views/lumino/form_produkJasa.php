
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
			<div class="panel panel-default col-md-6">
				<div class="panel-body">
						<div class="row">
								<h2 class="page-header">Input Produk & Jasa</h2>
						</div><!--/.row-->
		   			<?//=form_open_multipart()?>
							<div class="row">
								<div class="col-md-12">
									<label for="exampleInputEmail1">Nama Produk / Jasa</label>
									<input type="text" name="nama" class="form-control" 
											    value="<?=(isset($judul)?$judul:'')?>" 
											    placeholder="Masukkan Nama Produk / Jasa">
								</div>
							</div><hr/>
							<div class="row">
								<div class="col-md-6">
									<label for="">Lokasi</label>
									<!-- <x?php
										if(isset($lokasi)){
											foreach($lokasi as $r){
												$listLokasi[$r->ID]=ucwords($r->nama);
											}
										}
										echo form_dropdown('idTempat',$listLokasi,
												    (isset($idLokasi)?$idLokasi:''),'class="form-control"')
									?> -->
								</div>
								<div class="col-md-6">
									<label for="">Kategori</label>
									<!-- <x?php
										$kategori=isset($kategori)?$kategori:[''=>'Pilih Kategori'];
										echo form_dropdown('kategori',$kategori, 
												    (isset($idKategori)?$idKategori:''),'class="form-control"');
									?> -->
								</div>
							</div>
								<hr/>
							<!--div class="form-group">
								<label for="">Kota</label>
								<input type="text" class="form-control" 
									      id="lokasi" placeholder="Masukkan Lokasi" value="red"/>
							</div-->
							<div class="row">
								<div class="col-md-6">
									<label for="">Jenis</label><br/>
									<input type="radio" name="jenis" value="1" class="-form-control" 
											    <?=(($type == 1)?'checked':'')?>> Dagang
									<input type="radio" name="jenis" value="2" class="-form-control" 
											    <?=(($type == 2)?'checked':'')?>> Jasa
								</div>
								<div class="col-md-6">
									<label for="exampleInputFile">Foto Produk/Jasa</label>
									<!-- <c?=form_upload('foto','','class="form-control" accept=".jpg"')?> -->
								</div>
							</div><hr/>
							<div class="row">
								<div class="col-md-12">
									<label for="">Deskripsi</label>
									<textarea name="deskripsi" class="form-control" 
											        placeholder="Deskripsi" style="resize:vertical">
											        <?=(isset($deskripsi)?$deskripsi:'')?>
									</textarea>
								</div>
							</div><hr/>
							<button type="submit" class="btn btn-primary">Simpan</button>
						<!-- </form> -->
				 </div><!--end panel-body-->
			</div><!--end panel-default col-md-6-->
			<div class="panel panel-default col-md-5" style="margin-left:3px;">
				<div class="panel-body">
					<div class="row">
						<h2 class="page-header">Preview</h2>
					</div>
				</div>
			</div>
			
		</div><!--/.row--> 
	</div>	<!--/.main-->
<?php include('templates/footer.php')?>
