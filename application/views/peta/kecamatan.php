<div class="row">
 	<div class="col-md-12">
		<div class="table-responsive">
			<table class="table card-table table-vcenter table-primary table-bordered table-sm">
				<thead  class="bg-primary text-white text-nowrap">
					<tr>
						<th class="text-white" style="width: 5%">No</th>
						<th class="text-white">Nama Kecamatan</th>
						<th class="text-white" style="width: 12%">Set Koordinat</th>
					</tr>
				</thead>
				<tbody>
					<?php $n=0; foreach ($arr_kec as $row) : $n++; ?>
					<tr>
						<td><?= $n ?></td>
						<td><?= $row['kecamatan'] ?></td>
						<td><a class="btn btn-info btn-sm" href="<?= site_url('peta/form_peta/'.$row['id']) ?>">Set Koordinat</a></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
 	</div>
</div>