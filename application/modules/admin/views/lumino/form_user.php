
	<?php 
	    $header=array('menu_aktif'=>2);
	    include('templates/header.php'); 
    ?>		
   <link rel="stylesheet" type="text/css" href="<?=base_url('assets/bower-components/angucomplete-alt/angucomplete-alt.css')?>"/>
	<?php include('templates/sidebar.php'); ?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" ng-controller="userForm">			
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
						<?=form_open_multipart('',["id"=>'form1'])?>
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
										ng-model="accountKtp"
									   class="form-control" 
									   placeholder="Masukkan Nomor KTP Anda" required>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Nama Lengkap</label>
								<input type="text" name="nama" value="<?=(isset($nama)?$nama:'')?>" 
										ng-model="accountName"
									   class="form-control" 
									   placeholder="Masukkan Nama Lengkap" required>
							</div>
							<div class="form-group">
								<label for="">Alamat</label>
								<input type="text" name="alamat" 
									value="<?=(isset($alamat)?$alamat:'')?>" class="form-control" 
									ng-model="accountAddress"
									placeholder="Alamat" value=""/>
							</div>
						</div><!--col-md-12-->
							<div class="col-md-6">
								<label for="">Kelurahan</label>
								<input type="hidden" name="kelurahanId" value="{{selectedKelurahan.originalObject.id}}"/>
								<angucomplete-alt 
											id="ex1"
								      placeholder="Pilih Kelurahan"
								      pause="400"
								      selected-object='selectedKelurahan'
								      remote-url="<?=site_url('/api/kelurahan/findbyname')?>?q="
								      remote-url-data-field="data"
								      title-field="name"
								      input-class="form-control form-control-small"/>
								      
							</div>
							<div class="col-md-6">
								<label for="">Level</label>
								<?=form_dropdown_level()?>
							</div>
							<div class="col-md-12"><br/>
								<label for="">Email</label>
								<input type="email" required class="form-control" ng-model="accountEmail" 
									   value="<?=(isset($email)?$email:'')?>" name="email"
									   placeholder="email@exp.com" value="" autocomplete="off" required/>
							</div>
							<div class="col-md-6"><br/>
								<label for="">Password</label>
								<input type="text" class="form-control" 
										 name="password"
										 placeholder="****" value="" required/>
							</div>
							<div class="col-md-6"><br/>
								<label for="">Konfirmasi</label>
								<input type="text" class="form-control" 
										 name="confPass"
										 placeholder="****" value="" required/>
							</div>
						<div class="col-md-12"><br/>
							<div class="form-group">
								<label for="exampleInputEmail1">Foto Profil</label>
								<input type="file" name="fotoProfile" class="form-control fileUpload"/>
							</div>
						</div><!--col-md-4-->
						<div class="col-md-12">
							<!--button type="submit" class="btn btn-primary">
								Simpan
							</button-->
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
										 'no-image.png'))?>" height="200px" id="fotoLokasi">
								</div>
							</div>
							<div class="col-md-12">
								<table class="table table-default">
								<tr>
									<th width="100px">Email</th><td>: {{accountEmail}}</td>
								</tr>
								<tr>
									<th>No KTP</th><td>: {{accountKtp}}</td>
								</tr>
								<tr>
									<th>Nama</th><td>: {{accountName}}</td>
								</tr>
								<tr>
									<th>Alamat</th><td>: {{accountAddress}}</td>
								</tr>
								<tr>
									<th>
										Kelurahan
										Kecamatan
										Kab/Kota 
									</th>
									<td>
										: {{selectedKelurahan.originalObject.kelurahan}}<br/>
										: {{selectedKelurahan.originalObject.kecamatan}}<br/>
										: {{selectedKelurahan.originalObject.kabupaten}}<br/>
									</td>
								</tr>
								<tr>
									<th>Level</th><td>: {{accountLevel}}</td>
								</tr>
								<tr>
									<td colspan="2"><button ng-show="valid" class="btn btn-primary" onclick="submitFormAndGo('form1')">Simpan & Lanjut</button></td>
								</tr>
								</table>
							</div>	
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
<?php
$loader=['angular'=>true,'angucomplete'=>true];
?>

<?php include('templates/footer.php')?>
