
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
						if(isset($user)){// edit only
						    $ID=$user->ID;
						    $email=$user->email;
						    $level=$user->level;
						    // detail
						    $identitas = $user->identitas;
						    $nama = $user->nama;
						    $alamat = $user->alamat;
						    $jk = $user->jenis_kelamin;
						    $photo = $user->photo;
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
								<label for="exampleInputEmail1">ID Pengenal</label>
								<input type="text" name="ktp" 
										ng-init="accountKtp=<?=(isset($identitas)?$identitas:'0')?>" 
										ng-model="accountKtp"
									   class="form-control"
									   placeholder="Masukkan Nomor KTP Anda" required>
							</div>
							<div class="form-group">
								<label for="exampleInputEmail1">Nama Lengkap</label>
								<input type="text" name="nama" ng-init="accountName='<?=(isset($nama)?$nama:'')?>'" 
										 ng-model="accountName"
									   class="form-control" 
									   placeholder="Masukkan Nama Lengkap" required>
							</div>
							<div class="form-group">
								<label for="">Alamat</label>
								<input type="text" name="alamat" 
									ng-init="accountAddress='<?=(isset($alamat)?$alamat:'')?>'" class="form-control" 
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
								<label for="">Sebagai</label>
								<?php $level=isset($level)?$level:03;?>
								<?=form_dropdown_level([
									'ng-model'=>'accountLevel',
									'ng-change'=>'changeValLevel(accountLevel)',
									'required'=>''/*,
									'ng-init'=>"'accountLevel=$level'"*/])?>
							</div>
							<div class="col-md-12"><br/>
								<label for="">Email</label>
								<input type="email" required class="form-control" ng-model="accountEmail" 
									   value="<?=(isset($email)?$email:'')?>" name="email"
									   placeholder="email@exp.com" ng-init="accountEmail='<?=(isset($email)?$email:'')?>'" autocomplete="off" required/>
							</div>
							<div class="col-md-6"><br/>
								<label for="">Password</label>
								<input type="text" class="form-control" ng-model="accountPassword"
										 name="password"
										 placeholder="****" value="" required/>
							</div>
							<div class="col-md-6"><br/>
								<label for="">Konfirmasi</label>
								<input type="text" class="form-control" 
										 name="confPass"
										 placeholder="****" value="" required  ng-model="accountPasswordConf"/>
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
									<th>ID Pengenal</th><td>: {{accountKtp}}</td>
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
									<th>Sebagai</th><td>: {{levelVal}}</td>
								</tr>
								<tr>
									<td colspan="2"><button class="btn btn-primary" ng-click="sendRegistration('form1')">Simpan & Lanjut</button></td>
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
