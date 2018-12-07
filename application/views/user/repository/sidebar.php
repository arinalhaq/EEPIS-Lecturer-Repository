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
					<a href="<?php echo base_url('admin/repositori')?>">
						<i class="fas fa-folder-open"></i>Repository Anda</a>
				</li>
				
					
			</ul>
		</nav>
	</div>
</aside>
