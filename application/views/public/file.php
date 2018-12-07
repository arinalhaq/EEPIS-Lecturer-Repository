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
    <link href="<?php echo base_url('css/font-face.css') ?>" rel="stylesheet" media="all">
	<link href="<?php echo base_url('assets/font-awesome-4.7/css/font-awesome.min.css') ?>" rel="stylesheet" media="all">
	<link href="<?php echo base_url('assets/font-awesome-5/css/fontawesome-all.min.css') ?>" rel="stylesheet" media="all">
	<link href="<?php echo base_url('assets/mdi-font/css/material-design-iconic-font.min.css') ?>" rel="stylesheet" media="all">

	<!-- Bootstrap CSS-->
	<link href="<?php echo base_url('assets/bootstrap-4.1/bootstrap.min.css') ?>" rel="stylesheet" media="all">

	<!-- Vendor CSS-->
	<link href="<?php echo base_url('assets/animsition/animsition.min.css') ?>" rel="stylesheet" media="all">
	<link href="<?php echo base_url('assets/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') ?>" rel="stylesheet" media="all">
	<link href="<?php echo base_url('assets/wow/animate.css') ?>" rel="stylesheet" media="all">
	<link href="<?php echo base_url('assets/css-hamburgers/hamburgers.min.css') ?>" rel="stylesheet" media="all">
	<link href="<?php echo base_url('assets/slick/slick.css') ?>" rel="stylesheet" media="all">
	<link href="<?php echo base_url('assets/select2/select2.min.css') ?>" rel="stylesheet" media="all">
	<link href="<?php echo base_url('assets/perfect-scrollbar/perfect-scrollbar.css') ?>" rel="stylesheet" media="all">
	<link href="<?php echo base_url('assets/vector-map/jqvmap.min.css') ?>" rel="stylesheet" media="all">

	<!-- Main CSS-->
	<link href="<?php echo base_url('css/theme.css') ?>" rel="stylesheet" media="all">
	<link href="<?php echo base_url('assets/DataTables/datatables.min.css') ?>" rel="stylesheet" media="all">
</head>

<body>
	<header class="header-global">
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<div class="container">
				<a class="navbar-brand" href="#">EEPIS LECTURER</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default"
				 aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbar-default">
					<div class="navbar-collapse-header">
						<div class="row">
							<div class="col-6 collapse-brand">
								<a href="./index.html">
									<img src="./assets/img/brand/blue.png">
								</a>
							</div>
							<div class="col-6 collapse-close">
								<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-default" aria-controls="navbar-default"
								 aria-expanded="false" aria-label="Toggle navigation">
									<span></span>
									<span></span>
								</button>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</nav>
	</header>
	<main>
		<!-- Table -->
		<div class="card">
			<div class="card-header">
				<a href="<?php echo base_url('mahasiswa/dosen/'.$berkas->ID_DOSEN);?>">
					<button class="btn btn-icon"><i class="zmdi zmdi-chevron-left"></i></button></a>
				<strong>Data</strong> Berkas
			</div>
			<div class="card-body card-block">
				<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
					<div class="row form-group">
						<div class="col col-md-3">
							<label for="number" class=" form-control-label">Judul Berkas</label>
						</div>
						<div class="col-12 col-md-9">
							<?php echo $berkas->JUDUL_BERKAS?>
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3">
							<label for="select" class=" form-control-label">Dosen</label>
						</div>
						<div class="col-12 col-md-9">
							<?php echo $this->dosen_model->getById($berkas->ID_DOSEN)->NAMA_DOSEN?>
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3">
							<label for="select" class=" form-control-label">Kategori</label>
						</div>
						<div class="col-12 col-md-9">
							<?php echo $this->kategori_model->getById($berkas->ID_KATEGORI)->NAMA_KATEGORI?>
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3">
							<label for="select" class=" form-control-label">Jenis Berkas</label>
						</div>
						<div class="col-12 col-md-9">
							<?php echo $this->jenis_berkas_model->getById($berkas->ID_JENIS_BERKAS)->NAMA_JENIS_BERKAS?>
						</div>
					</div>
					<div class="row form-group">
						<div class="col col-md-3">
							<label for="tempat-input" class=" form-control-label">Deskripsi</label>
						</div>
						<div class="col-12 col-md-9">
							<?php echo $berkas->DESKRIPSI?>
						</div>
					</div>


				</form>
			</div>
		</div>
		<div class="user-data m-b-40">
			<h3 class="title-3 m-b-30">
				<i class="zmdi zmdi-account"></i>File</h3>
			<div class="table-responsive table--no-card m-b-30">
				<table class="table table-borderless table-striped table-earning" id="datatable">
					<thead>
						<tr>
							<th>ID Upload</th>
							<th>Nama File</th>
							<th>Tgl Upload</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($file as $row) : ?>
						<tr>
							<td>
								<?php echo $row->ID_UPLOAD?>
							</td>

							<td><a href="<?php //echo base_url('admin/berkas/file/').$row->ID_UPLOAD?>" color="black">
									<?php echo $row->NAMA_FILE?></a>
							</td>
							<td>
								<?php echo $row->TGL_UPLOAD?>
							</td>
							<td>
							<a href="<?php echo base_url('mahasiswa/download/'.$row->ID_UPLOAD)?>" class="btn btn-primary btn-sm">
									Download
								</a>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
		<!-- END PAGE CONTAINER-->







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
