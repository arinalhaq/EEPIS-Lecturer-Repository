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
											<li class="list-inline-item">Jenis Berkas</li>
										</ul>
									</div>
									<a href="<?php echo base_url('admin/jenis_berkas/add');?>">
										<button class="au-btn au-btn-icon au-btn--green">
											<i class="zmdi zmdi-plus"></i>add item</button></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- END BREADCRUMB-->
			<!-- USER DATA-->
			<div class="user-data m-b-40">
				<h3 class="title-3 m-b-30">
					<i class="zmdi zmdi-grid"></i>tabel Jenis Berkas</h3>
				<div class="table-responsive table--no-card m-b-30">
					<table class="table table-borderless table-striped table-earning" id="datatable">
						<thead>
							<tr>
								<th>ID Jenis berkas</th>
								<th>Nama Jenis Berkas</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($jenis_berkas as $row) : ?>
							<tr>
								<td>
									<?php echo $row->ID_JENIS_BERKAS?>
								</td>
								<td>
									<?php echo $row->NAMA_JENIS_BERKAS?>
								</td>
								<td>
									<a href="<?php echo base_url('admin/jenis_berkas/edit/'.$row->ID_JENIS_BERKAS)?>">
										<button type="submit" name="ubah" class="btn btn-warning btn-sm">
											Ubah
										</button></a>
									<a onclick="deleteConfirm('<?php echo site_url('admin/jenis_berkas/del/'.$row->ID_JENIS_BERKAS) ?>')" href="#!" class="btn btn-danger btn-sm">
										Hapus
									</a>
								</td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<?php $this->load->view("admin/layout/footer.php"); ?>
				<!-- END PAGE CONTAINER-->
			</div>
		</div>

		<?php $this->load->view("admin/layout/modal.php"); ?>
		<?php $this->load->view("admin/layout/js.php"); ?>
</body>

</html>
<!-- end document-->
