<!-- Data table css -->
		<link href="<?php echo base_url(); ?>/assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />

		<!-- Data tables -->
		<script src="<?php echo base_url(); ?>/assets/plugins/datatable/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url(); ?>/assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>

<div class="row">
	<div class="col-md-12">
		
		<a class="btn btn-primary" href="<?php echo site_url("Admin_permohonan/baru"); ?>"> <i class="fa fa-plus"></i> Tambah Baru </a>

	</div>
</div>
<div class="row mt-5">
	<div class="col-md-12">
		<div class="table-responsive">
		<table id="example" class="table card-table table-vcenter text-nowrap table-primary" style="width:100%">
			<thead  class="bg-primary text-white">
				<tr>
					<th class="text-white wd-15p">Tanggal</th>
					<th class="text-white wd-15p">Nama Pemohon</th>
					<th class="text-white wd-15p">Alamat</th>
					 
					<th class="text-white wd-15p">Pemanfaatan</th>
					<th class="text-white wd-10p">Lokasi</th>
					<th class="text-white wd-25p">Status</th>
				</tr>
			</thead>
			<tbody>
											 
			</tbody>
		</table>
		</div>
	</div>
</div>





<script type="text/javascript">
	$(function(e) {
		// $('#example').DataTable();

		 var dt = $("#example").DataTable(
		 	{
		 		// "order": [[ 0, "desc" ]],
		 		// "iDisplayLength": 50,
				"columnDefs": [ { "targets": 0, "orderable": true } ],
				"processing": true,
		        "serverSide": true,
		        "ajax": '<?php echo site_url("Admin_permohonan/get_data") ?>'
		 	});
	} );
</script>


