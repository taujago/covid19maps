<!-- Data table css -->
<link href="<?php echo base_url(); ?>/assets/plugins/datatable/dataTables.bootstrap4.min.css" rel="stylesheet" />

<!-- Data tables -->
<script src="<?php echo base_url(); ?>/assets/plugins/datatable/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>

<!-- select2 Plugin -->
<link href="<?php echo base_url("assets") ?>/plugins/select2/select2.min.css" rel="stylesheet" />

<!--Select2 js -->
<script src="<?php echo base_url("assets") ?>/plugins/select2/select2.full.min.js"></script>



<div class="row mb-5">
	<div class="col-md-12">


<a href="<?php echo site_url("$this->class/baru"); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>
<!-- <a href="<?php echo site_url("$this->class/toexcel"); ?>" class="btn btn-success">   Export Excel</a>
 -->
	</div>
</div>



<div class="row row-cards">
<div class="col-md-12">
	<div class="card">
		<div class="card-status bg-primary br-tr-7 br-tl-7"></div>
		<div class="card-header">
			<h3 class="card-title">PENCARIAN</h3>
		</div>
		<div class="card-body">

	<div class="row">
		<div class="col-md-4">
		 
			<input type="text" name="nama" id="nama" placeholder="Cari Nama" class="form-control"> 
		 
		</div>
		
		 

		

		<div class="col-md-2">
		 
			 <a  href="#" name="btn_cari" id="btn_cari" class="btn btn-block btn-success"  > <i class="fa fa-search"></i> Cari</a>
		</div>	
		<div class="col-md-2">
		 
			 <a  href="#" name="btn_reset" id="btn_reset" class="btn btn-block btn-warning"  > <i class="fa fa-remove"></i> Reset</a>
		</div>	
		 

	</div>






		</div>
	</div>
</div>
</div>
			<div class="row mt-5">
				<div class="col-md-12">
					<div class="table-responsive">
					<table id="tbpetani" class="table card-table table-vcenter text-nowrap table-primary" width="100%"  >
					<thead  class="bg-primary text-white">
						<tr>
							<th class="text-white " width="7%"></th>
							<th class="text-white " width="7%">Kode</th>
							<th class="text-white " width="30%">Nama Pengecer</th>
							 
							 
						</tr>
					</thead>
					<tbody>
														 
						</tbody>
					</table>
					</div>
				</div>
			</div>





<?php $this->load->view("$this->class/$this->class"."_view_js"); ?>