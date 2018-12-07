<aside class="menu-sidebar2">
	<div class="logo">
		<a href="#">
			<img style="width:200px;" src="<?php echo base_url('images/icon/white.png') ?>" alt="Cool Admin" />
		</a>
	</div>
	<div class="menu-sidebar2__content js-scrollbar1">
		<div class="account2">
			<!--<div class="image img-cir img-120">
				<img src="<?php //echo base_url('images/icon/avatar-big-01.jpg') ?>" alt="John Doe" />
			</div>-->
			<h4 class="name">Hello, <?php echo $this->session->userdata('ses_nama');?></h4>
			<a href="<?php echo base_url('login/logout')?>">Sign out</a>
		</div>
		<nav class="navbar-sidebar2">
			<ul class="list-unstyled navbar__list">
				<li>
					<a href="<?php echo base_url('admin/dashboard')?>">
						<i class="fas fa-tachometer-alt"></i>Dashboard</a>
				</li>
				<li class="has-sub">
					<a class="js-arrow" href="#">
						<i class="fas fa-table"></i>Data
						<span class="arrow">
							<i class="fas fa-angle-down"></i>
						</span>
					</a>
					<ul class="list-unstyled navbar__sub-list js-sub-list">
						<li>
							<a href="<?php echo base_url('admin/berkas')?>">
								<i class="fas fa-folder-open"></i>Berkas</a>
						</li>
						<li>
							<a href="<?php echo base_url('admin/dosen')?>">
								<i class="fas fa-user"></i>Dosen</a>
						</li>
						<li>
							<a href="<?php echo base_url('admin/jenis_berkas')?>">
								<i class="fas fa-files-o"></i>Jenis Berkas</a>
						</li>
						<li>
							<a href="<?php echo base_url('admin/kategori')?>">
								<i class="fas fa-th"></i>Kategori</a>
						</li>
						<li>
							<a href="<?php echo base_url('admin/prodi')?>">
								<i class="fas fa-briefcase"></i>Prodi</a>
						</li>
					</ul>
				</li>
				<li class="has-sub">
					<a class="js-arrow" href="#">
						<i class="fas fa-desktop"></i>UI Elements
						<span class="arrow">
							<i class="fas fa-angle-down"></i>
						</span>
					</a>
					<ul class="list-unstyled navbar__sub-list js-sub-list">
						<li>
							<a href="button.html">
								<i class="fab fa-flickr"></i>Button</a>
						</li>
						<li>
							<a href="badge.html">
								<i class="fas fa-comment-alt"></i>Badges</a>
						</li>
						<li>
							<a href="tab.html">
								<i class="far fa-window-maximize"></i>Tabs</a>
						</li>
						<li>
							<a href="card.html">
								<i class="far fa-id-card"></i>Cards</a>
						</li>
						<li>
							<a href="alert.html">
								<i class="far fa-bell"></i>Alerts</a>
						</li>
						<li>
							<a href="progress-bar.html">
								<i class="fas fa-tasks"></i>Progress Bars</a>
						</li>
						<li>
							<a href="modal.html">
								<i class="far fa-window-restore"></i>Modals</a>
						</li>
						<li>
							<a href="switch.html">
								<i class="fas fa-toggle-on"></i>Switchs</a>
						</li>
						<li>
							<a href="grid.html">
								<i class="fas fa-th-large"></i>Grids</a>
						</li>
						<li>
							<a href="fontawesome.html">
								<i class="fab fa-font-awesome"></i>FontAwesome</a>
						</li>
						<li>
							<a href="typo.html">
								<i class="fas fa-font"></i>Typography</a>
						</li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</aside>
