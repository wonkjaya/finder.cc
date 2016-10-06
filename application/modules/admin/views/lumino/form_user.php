
	<?php 
	    $header=array('menu_aktif'=>2);
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
				<li class="active">User</li>
				<li class="active">Form</li>
			</ol>
		</div><!--/.row-->
	

			<div class="row">
				<div class="col-md-6">
				 <div class="panel panel-primary">
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<h2 class="page-header">Form User</h2>
							</div>
						</div><!--/.row-->
						<?php
						if(isset($user)){
							foreach($user as $r){
							    $ID=$r->ID;
							    $email=$r->email;
							    $level=$r->level;
							    // detail
							    $nama = $r->nama_lengkap;
							    $alamat = $r->alamat;
							    $jk = $r->jenis_kelamin;
							    $nomor_telp = $r->nomor_telp;
							    $photo = $r->profile_pic;
							}
						}
						?>
						<?=form_open_multipart()?>
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
								<label for="exampleInputEmail1">Nomor KTP</label>
								<input type="text" name="ktp" value="<?=(isset($ktp)?$ktp:'')?>"
									   class="form-control" 
									   placeholder="Masukkan Nomor KTP Anda">
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Nama Lengkap</label>
								<input type="text" name="nama" value="<?=(isset($nama)?$nama:'')?>"
									   class="form-control" 
									   placeholder="Masukkan Nama Lengkap">
							</div>
							<div class="form-group">
								<label for="">Alamat</label>
								<input type="text" name="alamat" 
									value="<?=(isset($alamat)?$alamat:'')?>" class="form-control"
									placeholder="Alamat" value=""/>
							</div>
						</div><!--col-md-12-->
							<div class="col-md-6">
								<label for="">Kelurahan</label>
								<input type="text" class="form-control" 
									   value="<?=(isset($kelurahan)?$kelurahan:'')?>" name="kelurahanId"
									   placeholder="Masukkan Kelurahan" value=""/>
							</div>
							<div class="col-md-6">
								<label for="">Level</label>
								<?=form_dropdown_level()?>
							</div>
							<div class="col-md-12"><br/>
								<label for="">Email</label>
								<input type="email" required class="form-control" 
									   value="<?=(isset($email)?$email:'')?>" name="kotaid"
									   placeholder="email@exp.com" value=""/>
							</div>
							<div class="col-md-6"><br/>
								<label for="">Password</label>
								<input type="text" class="form-control" 
										 name="password"
										 placeholder="****" value=""/>
							</div>
							<div class="col-md-6"><br/>
								<label for="">Konfirmasi</label>
								<input type="text" class="form-control" 
										 name="confPass"
										 placeholder="****" value=""/>
							</div>
						<div class="col-md-12"><br/>
							<div class="form-group">
								<label for="exampleInputEmail1">Foto Profil</label>
								<input type="file" name="fotoProfile" class="form-control fileUpload"/>
							</div>
						</div><!--col-md-4-->
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary">
								Simpan
							</button>
						</div> <!--col-md-12-->
           </form>
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
