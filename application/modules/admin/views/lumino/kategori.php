
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
				<li class="active">Kategori</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Kategori Produk & Jasa</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-md-10">
			 <div class="panel panel-primary">
				<div class="panel-body">
					<?php
			            if(!empty($this->session->flashdata('success'))){
		            ?>
			            <div class="alert alert-success"><?=$this->session->flashdata('success')?></div>
		            <?php
		            // sukses
			            }
		            ?>
		            
			                     <div class="col-md-12" style="margin-bottom:20px">
				                     <form class="form-inline" method="GET">
					                    <div class="input-group">
						                    <input type="text" name="kategori" class="form-control input-sm" 
						                            id="kategoriName" placeholder="Kategori" style="width:200px">
						                    <button type="submit" class="btn btn-sm input-group-addon btn-primary"
						                            style="width:80px">Quick Add</button>
					                    </div>
				                    </form>
			                     </div>
				                    <?php
				                    if($kategori !== false){
					                    foreach($kategori as $r){
						                    $id=$r->ID;
						                    $kategori=$r->nama;
						                    $deskripsi=$r->deskripsi;
							                    ?>
						                    <div class="btn-group">
							                    <a href="#" class="btn btn-xs btn-primary"><?=$kategori?></a>
							                    <a href="<?=site_url('admin/delete_kategori/'.$id.'/prefered')?>" 
							                       class="btn btn-xs btn-danger">X</a>
						                    </div>
				                    <?php
					                    }
				                    }
				                    ?>
				</div>
			 </div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

<?php include('templates/footer.php')?>
