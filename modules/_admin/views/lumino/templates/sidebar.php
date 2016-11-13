<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<?php $aktif=$header['menu_aktif']; ?>
		<ul class="nav menu">
			<li class="<?=($aktif == 1)?'active':''?>"><a href="<?=site_url('admin')?>">
			    <svg class="glyph stroked dashboard-dial">
			        <use xlink:href="#stroked-dashboard-dial"></use>
			    </svg> Dashboard</a>
			</li>
			<li class="parent <?=($aktif == 2)?'active':''?>">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-user">
						<svg class="glyph stroked user">
							<use xlink:href="#stroked-male-user"></use>
						</svg> Users
					</span>
				</a>
				<ul class="children collapse" id="sub-item-user">
					<li>
						<a class="" href="<?=site_url('admin/new_user')?>">
							<svg class="glyph stroked chevron-right">
							    <use xlink:href="#stroked-chevron-right"></use>
							</svg> New User
						</a>
					</li>
					<li>
						<a class="" href="<?=site_url('admin/users')?>">
							<svg class="glyph stroked chevron-right">
							    <use xlink:href="#stroked-chevron-right"></use>
							</svg> Browse User
						</a>
					</li>
				</ul>
			</li>
			<li class="parent <?=($aktif == 3)?'active':''?>">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-product">
						<svg class="glyph stroked bag">
							<use xlink:href="#stroked-bag"></use>
						</svg> Products & Services
					</span>
				</a>
				<ul class="children collapse" id="sub-item-product">
					<li>
						<a class="" href="<?=site_url('admin/new_post')?>">
							<svg class="glyph stroked plus-sign">
							    <use xlink:href="#stroked-plus-sign"></use>
							</svg> New 
						</a>
					</li>
					<li>
						<a class="" href="<?=site_url('admin/dagangan')?>">
							<svg class="glyph stroked monitor">
							    <use xlink:href="#stroked-monitor"></use>
							</svg> Browse 
						</a>
					</li>
					<li>
						<a class="" href="<?=site_url('admin/kategori')?>">
							<svg class="glyph stroked monitor">
							    <use xlink:href="#stroked-monitor"></use>
							</svg> Kategori
						</a>
					</li>
				</ul>
			</li>
			<li class="parent <?=($aktif == 4)?'active':''?>">
				<a href="#">
					<span data-toggle="collapse" href="#sub-item-location">
						<svg class="glyph stroked location pin">
							<use xlink:href="#stroked-location-pin"></use>
						</svg> Locations
					</span>
				</a>
				<ul class="children collapse" id="sub-item-location">
					<li>
						<a class="" href="<?=site_url('admin/new_lokasi')?>">
							<svg class="glyph stroked plus-sign">
							    <use xlink:href="#stroked-plus-sign"></use>
							</svg> New 
						</a>
					</li>
					<li>
						<a class="" href="<?=site_url('admin/list_lokasi')?>">
							<svg class="glyph stroked monitor">
							    <use xlink:href="#stroked-monitor"></use>
							</svg> Browse 
						</a>
					</li>
				</ul>
			</li>
			<li role="presentation" class="divider"></li>
			<li>
			    <a href="login.html">
			        <svg class="glyph stroked male-user">
			            <use xlink:href="#stroked-male-user"></use>
			        </svg> Mode
			    </a>
			</li>
		</ul>

	</div><!--/.sidebar-->
