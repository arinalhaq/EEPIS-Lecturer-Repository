<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Start your development with a Design System for Bootstrap 4.">
	<meta name="author" content="Creative Tim">
	<title>EEPIS Lecturer</title>
	<!-- Favicon -->
	<link href="<?php //echo base_url('assets/public/assets/img/brand/favicon.png') ?>" rel="icon" type="image/png">
	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<!-- Icons -->
	<link href="<?php echo base_url('assets/public/assets/vendor/nucleo/css/nucleo.css') ?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/public/assets/vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
	<!-- Argon CSS -->
	<link type="text/css" href="<?php echo base_url('assets/public/assets/css/argon.css?v=1.0.1') ?>" rel="stylesheet">
	<!-- Docs CSS -->
	<link type="text/css" href="<?php echo base_url('assets/public/assets/css/docs.min.css') ?>" rel="stylesheet">
</head>

<body>
	<header class="header-global">
		<nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
			<div class="container">
				<a  href="<?php echo base_url('')?>">
					<img style="width:200px" src="<?php echo base_url('assets/public/assets/img/brand/logo.png') ?>">
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global"
				 aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="navbar-collapse collapse" id="navbar_global">
					<div class="navbar-collapse-header">
						<div class="row">
							<div class="col-6 collapse-brand">
								<a href="../index.html">
									<img src="<?php echo base_url('assets/public/assets/img/brand/blue.png') ?>">
								</a>
							</div>
							<div class="col-6 collapse-close">
								<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global"
								 aria-expanded="false" aria-label="Toggle navigation">
									<span></span>
									<span></span>
								</button>
							</div>
						</div>
					</div>
					<ul class="navbar-nav align-items-lg-center ml-lg-auto">
						<li class="nav-item d-none d-lg-block ml-lg-4">
							<a href="<?php echo base_url('login')?>" target="_blank" class="btn btn-neutral btn-icon">
								<span class="nav-link-inner--text">Log In</span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<main>
		<div class="position-relative">
			<!-- shape Hero -->
			<section class="section section-lg section-shaped pb-250">
				<div class="shape shape-style-1 shape-default">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
				<center>
					<h1 class="display-3 text-white">
						<?php echo $prodi->NAMA_PRODI?>
					</h1>
				</center>
				<!-- SVG separator -->
				<div class="separator separator-bottom separator-skew">
					<svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
						<polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
					</svg>
				</div>
			</section>
			<!-- 1st Hero Variation -->
		</div>

		<section class="section section-lg pt-lg-0 mt--200">
			<!-- Table -->
			<div class="row">
				<div class="col">
					<div class="card shadow">
						<div class="table-responsive">
							<table class="table align-items-center table-flush" id="datatable">
								<thead>
									<tr>
										<th>NIK</th>
										<th>Nama Dosen</th>
										<th>Program Studi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($dosen as $row) : ?>
									<tr>
										<td>
											<?php echo $row->NIK?>
										</td>

										<td>
											<a href="<?php echo base_url('mahasiswa/dosen/').$row->ID_DOSEN?>" color="black">
												<?php echo $row->NAMA_DOSEN?></a>
										</td>
										<td>
											<?php echo $this->prodi_model->getById($row->ID_PRODI)->NAMA_PRODI?>
										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

		</section>


	</main>
	<footer class="footer has-cards">
		<div class="container">
			<hr>
			<div class="row align-items-center justify-content-md-between">
				<div class="col-md-6">
					<div class="copyright">
						&copy; 2018
						<a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
					</div>
				</div>
				<div class="col-md-6">
					<ul class="nav nav-footer justify-content-end">
						<li class="nav-item">
							<a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
						</li>
						<li class="nav-item">
							<a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
						</li>
						<li class="nav-item">
							<a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
						</li>
						<li class="nav-item">
							<a href="https://github.com/creativetimofficial/argon-design-system/blob/master/LICENSE.md" class="nav-link"
							 target="_blank">MIT License</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- Core -->
	<script src="<?php echo base_url('assets/public/assets/vendor/jquery/jquery.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/public/assets/vendor/popper/popper.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/public/assets/vendor/bootstrap/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/public/assets/vendor/headroom/headroom.min.js') ?>"></script>
	<!-- Argon JS -->
	<script src="<?php echo base_url('assets/public/assets/js/argon.js?v=1.0.1') ?>"></script>
	<?php $this->load->view('admin/layout/js')?>
</body>

</html>
