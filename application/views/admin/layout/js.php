<script src="<?php echo base_url('assets/jquery-3.2.1.min.js') ?>"></script>
<!-- Bootstrap JS-->
<script src="<?php echo base_url('assets/bootstrap-4.1/popper.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-4.1/bootstrap.min.js') ?>"></script>
<!-- Vendor JS       -->
<script src="<?php echo base_url('assets/slick/slick.min.js') ?>">
</script>
<script src="<?php echo base_url('assets/wow/wow.min.js') ?>"></script>
<script src="<?php echo base_url('assets/animsition/animsition.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bootstrap-progressbar/bootstrap-progressbar.min.js') ?>">
</script>
<script src="<?php echo base_url('assets/counter-up/jquery.waypoints.min.js') ?>"></script>
<script src="<?php echo base_url('assets/counter-up/jquery.counterup.min.js') ?>">
</script>
<script src="<?php echo base_url('assets/circle-progress/circle-progress.min.js') ?>"></script>
<script src="<?php echo base_url('assets/perfect-scrollbar/perfect-scrollbar.js') ?>"></script>
<script src="<?php echo base_url('assets/chartjs/Chart.bundle.min.js') ?>"></script>
<script src="<?php echo base_url('assets/select2/select2.min.js') ?>">
</script>
<script src="<?php echo base_url('assets/vector-map/jquery.vmap.js') ?>"></script>
<script src="<?php echo base_url('assets/vector-map/jquery.vmap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/vector-map/jquery.vmap.sampledata.js') ?>"></script>
<script src="<?php echo base_url('assets/vector-map/jquery.vmap.world.js') ?>"></script>
<!-- Main JS-->
<script src="<?php echo base_url('js/main.js') ?>"></script>
<script src="<?php echo base_url('assets/DataTables/datatables.min.js') ?>"></script>
<script>$(document).ready( function () {
    $('#datatable').DataTable();
} );</script>
<script>
function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}
</script>

