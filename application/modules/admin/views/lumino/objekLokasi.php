
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
				<li class="active">Lokasi</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Objek Lokasi</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-md-10">
			 <div class="panel panel-primary">
				<div class="panel-body">
					<table class="table table-bordered">
					<tr>
						<th>#</th>
						<th>Nama</th>
						<th>Alamat</th>
						<th>kota</th>
						<th>***</th>
					</tr>
					<?php
					$no=1;
					if($lokasi !== false){
						foreach($lokasi as $r){
							$id=$r->ID;
							$nama_toko=$r->nama;
							$alamat=$r->alamat;
							$kota=$r->kota;
							$status=$r->status;				
					?>
					<tr>
						<td><?=$no?></td>
						<td><?=$nama_toko?></td>
						<td><?=$alamat?></td>
						<td><?=$kota?></td>
						<td>
						    <div class="btn-group">
							    <?=anchor('admin/edit_lokasi/'.$id.'/prefered_content','
								    <i class="visible-xs glyphicon glyphicon-pencil"></i>
								    <span class="hidden-xs">Edit</span>',
								    'class="btn btn-primary btn-xs"')?>
							    <?=anchor('admin/detail_lokasi/'.$id.'/prefered_content',
								    '<i class="visible-xs glyphicon glyphicon-eye-open"></i>
								    <span class="hidden-xs">Detail</span>',
								    'class="btn btn-default btn-xs"')?>
							    <?=anchor('admin/hapus_lokasi/'.$id.'/prefered_content',
								    '<i class="visible-xs glyphicon glyphicon-trash"></i>
								    <span class="hidden-xs">Hapus</span>',
								    'class="btn btn-danger btn-xs"')?>
						    </div>
						</td>
					</tr>
					<?php
							$no++;
						}
					}
					?>
				</table>
				</div>
			 </div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

<?php include('templates/footer.php')?>
