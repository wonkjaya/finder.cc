
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
				<li class="active">Products</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Detail Produk & Jasa</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-md-10">
			 <div class="panel panel-primary">
				<div class="panel-body">
					<?php
					foreach($detail_produkJasa as $r){
						$id=$r->ID;
						$judul=$r->judul;
						$kategori=$r->kategori;
						$lokasi=$r->lokasi;
						$deskripsi=$r->deskripsi;
						$foto_path=FCPATH.'uploads/produk-images/'.$r->foto;
						$foto=base_url('uploads/produk-images/'.$r->foto);
						$foto=(file_exists($foto_path)?$foto:base_url('assets/images/noimage.png'));
						$alamat=$r->alamat;
					}
				?>
				<table class="table" border="0">
					<tr>
						<td class="col-md-9">
							<label>Kategori</label>
							<p><?=$kategori?></p>
						</td>
						<td rowspan=2 width="30%" class="col-md-3">
							<div class="img img-rounded" style="">
								<img class="img" src="<?=$foto?>" width="100%"/>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<label>Nama Tempat</label>
							<p><?=$lokasi?></p>
						</td>
					</tr>
					<tr>
						<td colspan=2>
							<label>Alamat</label>
							<p><?=$alamat?></p>
						</td>
					</tr>
					<tr>
						<td colspan=2>
							<label>Judul</label>
							<p><?=$judul?></p>
						</td>
					</tr>
					<tr>
						<td colspan=2>
							<label>Deskripsi</label>
							<p><?=$deskripsi?></p>
						</td>
					</tr>
					<tr>
						<td colspan=2>
							<br>
							<a href="#" class="btn btn-warning" onclick="history.back()">
							 <i class="glyphicon glyphicon-arrow-left"></i> Kembali
							</a>
							<?=anchor('admin/edit_produkJasa/'.$id.'/prefered_content','Edit',
							          'class="btn btn-default"')?>
						</td>
					</tr>
				</table>
				</div>
			 </div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

<?php include('templates/footer.php')?>
