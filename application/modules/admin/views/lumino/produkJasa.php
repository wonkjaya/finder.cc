
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
			<div class="col-md-10">
			 <div class="panel panel-primary">
				<div class="panel-body">
					<!--table data-toggle="table" 
                            data-url="<?=site_url('admin/allPosts')?>" 
                            data-show-columns="true"
                            data-search="true"
                            data-show-refresh="true"
                            data-show-toggle="true"
                            data-pagination="true"
                            data-side-pagination="server"
                            data-page-list="[5, 10, 20, 50]">
					    <thead>
					    <tr>
					        <th data-field="No" data-align="left">No</th>
					        <th data-field="judul" data-sortable="true">Title</th>
					        <th data-field="kategori" data-sortable="true">Category</th>
					        <th data-field="pedagang" data-sortable="true" data-visible="false">Author</th>
					        <th data-formatter="actionFormatter" data-events="actionEvents"></th>
					    </tr>
					    </thead>
					</table-->
					<table class="table">
					    <thead>
					        <tr>
					            <th>No</th>
					            <th>Title</th>
					            <th>Category</th>
					            <th>Author</th>
					            <th>*</th>
					        </tr>
					    </thead>
					    <tbody>
					    <?php
					    $no=1;
					    foreach($dagangan as $row){
					    ?>
					        <tr>
					            <td><?=$no;?></td>
					            <td><?=$row->judul;?></td>
					            <td><?=$row->kategori;?></td>
					            <td><?=$row->pedagang;?></td>
					            <td>
					             <div class="btn-group">
				                    <?=anchor(
				                        'admin/detail_produkJasa/'.$row->ID.'/prefered_content',
		                                'Detail',
		                                'class="btn btn-primary btn-xs"'
		                            )?>
				                    <?=anchor(
				                        'admin/edit_produkJasa/'.$row->ID.'/prefered_content',
		                                'Edit',
		                                'class="btn btn-default btn-xs"'
		                            )?>
				                    <?=anchor(
				                        'admin/delete_produkJasa/'.$row->ID.'/prefered_content',
		                                'Delete',
		                                'class="btn btn-danger btn-xs"'
		                            )?>
					             </div>
					            </td>
					        </tr>
					    </tbody>
					    <?php
					    $no++;
					    }
					    ?>
					</table>
				</div>
			 </div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	<script type="text/javascript">
	    function actionFormatter(value, row, index) {
            return [
                '<div class="btn-group">\
                <a class="like btn btn-xs btn-primary" href="javascript:void(0)" title="Like">',
                '<i class="glyphicon glyphicon-heart"></i>',
                '</a>',
                '<a class="edit btn btn-xs btn-warning" href="javascript:void(0)" title="Edit">',
                '<i class="glyphicon glyphicon-edit"></i>',
                '</a>',
                '<a class="remove btn btn-xs btn-danger" href="javascript:void(0)" title="Remove">',
                '<i class="glyphicon glyphicon-remove"></i>',
                '</a></div>'
            ].join('');
        }

        window.actionEvents = {
            'click .like': function (e, value, row, index) {
                alert('You click like icon, row: ' + JSON.stringify(row));
                console.log(value, row, index);
            },
            'click .edit': function (e, value, row, index) {
                alert('You click edit icon, row: ' + JSON.stringify(row));
                console.log(value, row, index);
            },
            'click .remove': function (e, value, row, index) {
                alert('You click remove icon, row: ' + JSON.stringify(row));
                console.log(value, row, index);
            }
        };
	</script>
<?php include('templates/footer.php')?>
