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
                                                <a href="">Home</a>
                                            </li>
                                            <li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
                                            <li class="list-inline-item">Admin</li>
                                            <li class="list-inline-item seprate">
                                                <span>/</span>
                                            </li>
                                            <li class="list-inline-item">Dashboard</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- STATISTIC-->
            <section class="statistic">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <h2 class="number"><?php echo $dosen ?></h2>
                                    <span class="desc">jumlah dosen</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-account-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <h2 class="number"><?php echo $berkas ?></h2>
                                    <span class="desc">jumlah berkas</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-file"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <h2 class="number"><?php echo $prodi ?></h2>
                                    <span class="desc">jumlah prodi</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-case"></i>
                                    </div>
                                </div>
                            </div>
                            <!--
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item">
                                    <h2 class="number">$1,060,386</h2>
                                    <span class="desc">total earnings</span>
                                    <div class="icon">
                                        <i class="zmdi zmdi-money"></i>
                                    </div>
                                </div>
                            </div>-->
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->

            <section>
                <div class="section__content section__content--p30">
                                <!-- USER DATA-->
                                <div class="user-data m-b-40">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi zmdi-file"></i>recent post</h3>
                                    <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning" id="datatable">
                                        <thead>
                                            <tr>
                                                <th>date</th>
                                                <th>nama file</th>
                                                <th>nama berkas</th>
                                                <th>dosen</th>
                                                
                                                <!--<th></th>-->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($file as $row) : ?>
                                            <tr>
                                                <td>
                                                    <?php echo $row->TGL_UPLOAD?>
                                                </td>
                                                
                                                <td><a href="<?php echo base_url('dosen/view/').$row->ID_UPLOAD?>" color="black">
                                                    <?php echo $row->NAMA_FILE?></a>
                                                </td>
                                                <td>
                                                    <?php echo $this->berkas_model->getById($row->ID_BERKAS)->JUDUL_BERKAS?>
                                                </td>
                                                <td>
                                                    <?php echo $this->dosen_model->getById($row->ID_DOSEN)->NAMA_DOSEN ?>
                                                </td>
                                                <!--<td>
                                                    <a href="<?php echo base_url('file/edit/'.$row->ID_UPLOAD)?>">
                                                        <button type="submit" name="ubah" class="btn btn-warning btn-sm">
                                                            Ubah
                                                        </button></a>
                                                    <a onclick="deleteConfirm('<?php echo site_url('file/del/'.$row->ID_UPLOAD) ?>')" href="#!"
                                                    class="btn btn-danger btn-sm">
                                                            Hapus
                                                    </a>
                                                </td>-->
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                    <!--
                                    <div class="user-data__footer">
                                        <button class="au-btn au-btn-load">load more</button>
                                    </div> -->
                                </div>
                                <!-- END USER DATA-->
                </div>
            </section>
            <?php $this->load->view("admin/layout/modal.php"); ?>
		<?php $this->load->view("admin/layout/js.php"); ?>
</body>

</html>
<!-- end document-->