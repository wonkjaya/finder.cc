
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
				<h1 class="page-header">Produk & Jasa</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="panel panel-default">
				<div class="panel-heading">.</div>
				<div class="panel-body">
					<table data-toggle="table" data-url="<?=site_url('admin/allPosts')?>" >
					    <thead>
					    <tr>
					        <th data-field="No" data-align="left">No</th>
					        <th data-field="judul">Title</th>
					        <th data-field="kategori">Category</th>
					        <th data-field="pedagang">Author</th>
					        <th></th>
					    </tr>
					    </thead>
					</table>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
<?php include('templates/footer.php')?>
