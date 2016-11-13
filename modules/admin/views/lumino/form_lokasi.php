
	<?php 
	    $header=array('menu_aktif'=>4);
	    include('templates/header.php'); 
    ?>		
	<?php include('templates/sidebar.php'); ?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row" style="padding:20px">
			<ol class="breadcrumb">
				<li>
				 <a href="#">
					<svg class="glyph stroked home">
						<use xlink:href="#stroked-home"></use>
					</svg>
				 </a>
				</li>
				<li class="active">Lokasi</li>
			</ol>
		</div><!--/.row-->
	

			<div class="row">
				<div class="col-md-6">
				 <div class="panel panel-primary">
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<h2 class="page-header">Input Lokasi</h2>
							</div>
						</div><!--/.row-->
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
						<!-- <x?=form_open_multipart()?> -->
						<div class="col-md-12">
							<?php
							if(!empty($this->session->flashdata('success'))){
							?>
								<div class="alert alert-success">
									<?=$this->session->flashdata('success')?>
								</div>
							<?php
							}
							?>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="exampleInputEmail1">Nama Tempat / Perusahaan</label>
								<input type="text" name="lokasiNama" value="<?=(isset($nama)?$nama:'')?>"
									   class="form-control" 
									   placeholder="Masukkan Nama Tempat / Perusahaan">
							</div>
							<div class="form-group">
								<label for="">Alamat</label>
								<input type="text" name="lokasiAlamat" 
									value="<?=(isset($alamat)?$alamat:'')?>" class="form-control"
									placeholder="Alamat" value=""/>
							</div>
							<div class="form-group">
								<label for="">Kota</label>
								<input type="text" class="form-control" 
									   value="<?=(isset($kota)?$kota:'')?>" name="lokasiKota"
									   placeholder="Masukkan Kota" value=""/>
							</div>
						</div><!--col-md-8-->
						<div class="col-md-12">
							<div class="form-group">
								<label for="exampleInputEmail1">Foto Tempat / Lokasi</label>
								<input type="file" name="fotoLokasi" class="form-control fileUpload"/>
							</div>
						</div><!--col-md-4-->
						<div class="col-md-12">
							<div class="form-group">
								<label for="">Deskripsi</label>
								<textarea name="lokasiDeskripsi" class="form-control"
										  placeholder="Deskripsi" 
										  style="width:100%;height:200px;resize:none"><?=(isset($deskripsi)?$deskripsi:'')?></textarea>
							</div>
							<button type="submit" class="btn btn-primary">
								Simpan
							</button>
						</div> <!--col-md-12-->
           <!-- </form> -->
				</div>
			 </div>
			</div><!--/ .col-md-6-->
			<div class="col-md-5" style="">
				<div class="panel">
					<div class="panel-body">
							<div class="col-md-12">
								<h2 class="page-header">Preview</h2>
							</div>
							<div class="col-md-12">
								<div class="img-rounded ts-image-preview" style="text-align:center;">
									<img src="<?=base_url('uploads/'.(isset($foto)?'lokasi-images/'.$foto:
										 'no-image.png'))?>" width="60%" id="fotoLokasi">
								</div>
							</div>	
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

<?php include('templates/footer.php')?>
