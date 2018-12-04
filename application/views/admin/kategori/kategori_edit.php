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
											<li class="list-inline-item">kategori</li>
											<li class="list-inline-item seprate">
												<span>/</span>
											</li>
											<li class="list-inline-item">Form</li>
										</ul>
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
				<a href="<?php echo base_url('admin/kategori');?>">
					<button class="btn btn-icon"><i class="zmdi zmdi-chevron-left"></i></button></a>
					<strong>Edit</strong> Kategori
				</div>
				<div class="card-body card-block">
					<form action="<?php base_url('admin/kategori/edit/'.$kategori->ID_KATEGORI);?>" method="post" enctype="multipart/form-data" class="form-horizontal">
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="number" class=" form-control-label">Nama Kategori</label>
							</div>
							<div class="col-12 col-md-9">
								<input type="text" id="nama_kategori" name="nama_kategori" placeholder="" class="form-control" value="<?php echo $kategori->NAMA_KATEGORI?>">
								<small class="form-text text-muted">Masukkan Nama Kategori</small>
								<div class="invalid-feedback">
									<?php echo form_error('nama_kategori') ?>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<button type="submit" class="btn btn-primary btn-sm">
								Submit
							</button>
							<button type="reset" class="btn btn-danger btn-sm">
								Reset
							</button>
						</div>
					</form>
				</div>
			</div>

		</div>

		<?php $this->load->view("admin/layout/js.php"); ?>

</body>

</html>
<!-- end document-->
