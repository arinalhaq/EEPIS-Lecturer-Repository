<!DOCTYPE html>
<html lang="en">

<?php $this->load->view("admin/layout/head.php"); ?>

<body class="animsition">
	<div class="page-wrapper">
		<!-- MENU SIDEBAR-->
		<?php $this->load->view("admin/layout/sidebar.php"); ?>
		<!-- END MENU SIDEBAR-->

		<!-- PAGE CONTAINER-->
		<div class="page-container2">
			<!-- HEADER DESKTOP-->
			<?php $this->load->view("admin/layout/navbar.php"); ?>
			<!-- END HEADER DESKTOP-->

			<!-- BREADCRUMB-->
			<section class="au-breadcrumb m-t-75">
				<div class="section__content section__content--p30">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<div class="au-breadcrumb-content">
									<div class="au-breadcrumb-left">
										<span class="au-breadcrumb-span">You are here:</span>
										<ul class="list-unstyled list-inline au-breadcrumb__list">
											<li class="list-inline-item active">
												<a href="<?php echo base_url();?>">Home</a>
											</li>
											<li class="list-inline-item seprate">
												<span>/</span>
											</li>
											<li class="list-inline-item">Berkas</li>
											<li class="list-inline-item seprate">
												<span>/</span>
											</li>
											<li class="list-inline-item">view</li>
										</ul>
									</div>
									<div>
										<a href="<?php echo base_url('admin/dosen/edit/'.$dosen->ID_DOSEN)?>">
											<button type="submit" name="ubah" class="btn btn-primary btn-sm">
												Ubah
											</button></a>
										<a onclick="deleteConfirm('<?php echo base_url('admin/dosen/del/'.$dosen->ID_DOSEN) ?>')" href="#!" class="btn btn-danger btn-sm">
											Hapus
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- END BREADCRUMB-->
			<?php if ($this->session->flashdata('success')): ?>
			<div class="alert alert-success" role="alert">
				<?php echo $this->session->flashdata('success'); ?>
			</div>
			<?php endif; ?>
			<div class="card">
				<div class="card-header">
					<a href="<?php echo base_url('admin/dosen');?>">
						<button class="btn btn-icon"><i class="zmdi zmdi-chevron-left"></i></button></a>
					<strong>Data</strong> Dosen
				</div>
				<div class="card-body card-block">
					<!--<form action="" method="post" enctype="multipart/form-data" class="form-horizontal">-->
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="number" class=" form-control-label">NIK</label>
							</div>
							<div class="col-12 col-md-9">
								<?php echo $dosen->NIK?>
							</div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="nama-input" class="form-control-label">Nama Dosen</label>
							</div>
							<div class="col-12 col-md-9">
								<?php echo $dosen->NAMA_DOSEN?>
							</div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="select" class=" form-control-label">Program Studi</label>
							</div>
							<div class="col-12 col-md-9">
								<?php echo $this->prodi_model->getById($dosen->ID_PRODI)->NAMA_PRODI?>
							</div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="tempat-input" class=" form-control-label">Tempat Lahir</label>
							</div>
							<div class="col-12 col-md-9">
								<?php echo $dosen->TEMPAT_LAHIR?>
							</div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="tanggal-input" class=" form-control-label">Tanggal Lahir</label>
							</div>
							<div class="col-12 col-md-9">
								<?php echo $dosen->TGL_LAHIR?>
							</div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="no-telp-input" class=" form-control-label">No. Telp</label>
							</div>
							<div class="col-12 col-md-9">
								<?php echo $dosen->NO_TELP?>
							</div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="email-input" class=" form-control-label">Email</label>
							</div>
							<div class="col-12 col-md-9">
								<?php echo $dosen->EMAIL?>
							</div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="alamat-input" class=" form-control-label">Alamat</label>
							</div>
							<div class="col-12 col-md-9">
								<?php echo $dosen->ALAMAT?>
							</div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="select" class=" form-control-label">Status</label>
							</div>
							<div class="col-12 col-md-9">
								<?php echo $this->status_model->getById($dosen->ID_STATUS)->NAMA_STATUS?>
							</div>
						</div>
					<!--</form>-->
				</div>
			</div>

		</div>

		<?php $this->load->view("admin/layout/modal.php"); ?>
		<?php $this->load->view("admin/layout/js.php"); ?>

</body>

</html>
<!-- end document-->
