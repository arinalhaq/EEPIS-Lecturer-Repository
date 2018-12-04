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
											<li class="list-inline-item">Dosen</li>
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
				<a href="<?php echo base_url('admin/dosen');?>">
					<button class="btn btn-icon"><i class="zmdi zmdi-chevron-left"></i></button></a>
					<strong>Edit</strong> Dosen
				</div>
				<div class="card-body card-block">
					<form action="<?php base_url('admin/dosen/edit/'.$dosen->ID_DOSEN);?>" method="post" enctype="multipart/form-data" class="form-horizontal">
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="number" class=" form-control-label">NIK</label>
							</div>
							<div class="col-12 col-md-9">
								<input type="text" id="nik" name="nik" placeholder="" class="form-control" value="<?php echo $dosen->NIK?>">
								<small class="form-text text-muted">Masukkan NIK Anda</small>
								<div class="invalid-feedback">
									<?php echo form_error('nik') ?>
								</div>
							</div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="nama-input" class=" form-control-label">Nama Dosen</label>
							</div>
							<div class="col-12 col-md-9">
								<input type="text" id="nama" name="nama" placeholder="" class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>"
								value="<?php echo $dosen->NAMA_DOSEN?>">
								<small class="help-block form-text">Masukkan Nama Anda</small>
								<div class="invalid-feedback">
									<?php echo form_error('nama') ?>
								</div>
							</div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="select" class=" form-control-label">Program Studi</label>
							</div>
							<div class="col-12 col-md-9">
								<select name="id_prodi" id="select" class="form-control">
									<?php foreach($prodi as $row) : ?>
									<option value="<?php echo $row->ID_PRODI?>" <?php if($row->ID_PRODI==$dosen->ID_PRODI) echo 'selected';?>>
										<?php echo $row->NAMA_PRODI?>
									</option>
									<?php endforeach; ?>
								</select>
								<small class="help-block form-text">Masukkan Program Studi</small>
							</div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="tempat-input" class=" form-control-label">Tempat Lahir</label>
							</div>
							<div class="col-12 col-md-9">
								<input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="" class="form-control"
								value="<?php echo $dosen->TEMPAT_LAHIR?>">
								<small class="help-block form-text">Masukkan Tempat Lahir</small>
							</div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="tanggal-input" class=" form-control-label">Tanggal Lahir</label>
							</div>
							<div class="col-12 col-md-9">
								<input type="date" id="tangal_lahir" name="tgl_lahir" placeholder="" class="form-control"
								value="<?php echo $dosen->TGL_LAHIR?>">
								<small class="help-block form-text">Masukkan Tanggal Lahir</small>
							</div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="no-telp-input" class=" form-control-label">No. Telp</label>
							</div>
							<div class="col-12 col-md-9">
								<input type="text" id="no_telp" name="no_telp" placeholder="" class="form-control"
								value="<?php echo $dosen->NO_TELP?>">
								<small class="help-block form-text">Masukkan Nomor Telepon</small>
							</div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="email-input" class=" form-control-label">Email</label>
							</div>
							<div class="col-12 col-md-9">
								<input type="email" id="email" name="email" placeholder="" class="form-control"
								value="<?php echo $dosen->EMAIL?>">
								<small class="help-block form-text">Masukkan Email</small>
							</div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="alamat-input" class=" form-control-label">Alamat</label>
							</div>
							<div class="col-12 col-md-9">
								<textarea name="alamat" id="alamat" rows="9" placeholder="Masukkan Alamat" class="form-control"
								value="<?php echo $dosen->ALAMAT?>"></textarea>
							</div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="select" class=" form-control-label">Status</label>
							</div>
							<div class="col-12 col-md-9">
								<select name="id_status" id="id_status" class="form-control">
								<?php foreach($status as $row) : ?>
									<option value="<?php echo $row->ID_STATUS?>" <?php if($row->ID_STATUS==$dosen->ID_STATUS) echo 'selected';?>>
										<?php echo $row->NAMA_STATUS?>
									</option>
									<?php endforeach; ?>
								</select>
								<small class="help-block form-text">Masukkan Program Studi</small>
							</div>
						</div>
						<div class="row form-group">
							<div class="col col-md-3">
								<label for="password-input" class=" form-control-label">Password</label>
							</div>
							<div class="col-12 col-md-9">
								<input type="password" id="password" name="password" placeholder="Password" class="form-control">
								<small class="help-block form-text">Masukkan Password Anda</small>
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
