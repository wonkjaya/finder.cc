
	<?php 
	    $header=array('menu_aktif'=>2);
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
				<li class="active">Users</li>
				<li class="active">List</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row" style="margin-top:20px;">
			<div class="col-md-12">
			 <div class="panel panel-primary">
				<div class="panel-body">
		
					<div class="row">
						<div class="col-lg-12">
							<h1 class="page-header">Daftar User</h1>
						</div>
					</div><!--/.row-->
					<table class="table table-bordered">
					<tr>
						<th>#</th>
						<th>Email</th>
						<th>Nama Lengkap</th>
						<th>Kelurahan</th>
						<th>*** <a href="<?=site_url('admin/new_user')?>" class="btn btn-primary btn-xs" style="float:right">New</a></th>
					</tr>
					<?php
					$no=1;
					if(isset($users))
					 if($users !== false){
						foreach($users as $r){
							$id=$r->id_user;
							//$nomor_identitas=$r->identitas;
							$email = $r->email;
							$nama_lengkap=$r->nama;
							$kelurahan=$r->id_kelurahan;				
					?>
					<tr>
						<td><?=$no?></td>
						<td><?=$email?></td>
						<td><?=$nama_lengkap?></td>
						<td><?=$kelurahan?></td>
						<td>
						    <div class="btn-group">
							    <?=anchor('admin/edit_user/'.$id.'/prefered_content','
								    <i class="visible-xs glyphicon glyphicon-pencil"></i>
								    <span class="hidden-xs">Edit</span>',
								    'class="btn btn-primary btn-xs"')?>
							    <?=anchor('admin/detail_user/'.$id.'/prefered_content',
								    '<i class="visible-xs glyphicon glyphicon-eye-open"></i>
								    <span class="hidden-xs">Detail</span>',
								    'class="btn btn-default btn-xs"')?>
							    <?=anchor('admin/delete_user/'.$id.'/prefered_content',
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
