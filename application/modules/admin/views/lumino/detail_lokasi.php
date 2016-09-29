
	<?php 
	    $header=array('menu_aktif'=>4);
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
				<li class="active">Lokasi</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Detail Lokasi</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-md-10">
			 <div class="panel panel-primary">
				<div class="panel-body">
						<?php
						$n=1;
						foreach($detail_lokasi as $r){
						 if($n == 1){
							$id=$r->ID;
							$nama=$r->nama;
							$alamat=$r->alamat;
							$kota=$r->kota;
							$deskripsi=$r->deskripsi;
							$foto=!empty($r->foto)?'lokasi-images/'.$r->foto:'no-image.png';
						 }
						 $n++;
						}
					?>
					<table class="table" border="0">
						<tr>
							<td class="col-md-9">
								<label>Nama</label>
								<p><?=$nama?></p>
							</td>
							<td rowspan="3">
								<div class="img img-rounded">
									<img src="<?=base_url('uploads/'.$foto)?>" width="150px"/>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<label>Alamat</label>
								<p><?=$alamat?></p>
							</td>
						</tr>
						<tr>
							<td>
								<label>Kota</label>
								<p><?=$kota?></p>
							</td>
						</tr>
						<tr>
							<td>
								<label>Deskripsi</label>
								<p><?=$deskripsi?></p>
							</td>
						</tr>
						<tr>
							<td>
								<br>
								<a href="#" class="btn btn-warning" onclick="history.back()"><i class="glyphicon glyphicon-arrow-left"></i> Kembali</a>
								<?=anchor('admin/edit_lokasi/'.$id.'/prefered_content','Edit','class="btn btn-default"')?>
							</td>
						</tr>
					</table>
				</div>
			 </div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

<?php include('templates/footer.php')?>
