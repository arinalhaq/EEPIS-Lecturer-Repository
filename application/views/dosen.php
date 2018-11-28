<table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th>Name</th>
			<th>Price</th>
			<th>Photo</th>
			<th>Description</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($dosen as $row): ?>
		<tr>
			<td width="150">
				<?php echo $row->NAMA_DOSEN ?>
			</td>
			<td>
				<?php echo $row->TEMPAT_LAHIR ?>
			</td>
			
			
			
		</tr>
		<?php endforeach; ?>

	</tbody>
</table>
