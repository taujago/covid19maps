<div class="row row-cards">
							
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Jenis Fisik</h3>
									</div>
									<div class="card-body">

											<table class="table card-table table-vcenter text-nowrap table-primary">
												<thead class="bg-primary text-white">
												<tr>
													<th rowspan="2" class="text-white" style="text-align: center" valign="center">Jenis Fisik</th>
													<th class="text-white" colspan="<?php echo $table['colspan']; ?>" style="text-align: center">Jumlah Bangunan Fisik</th>
												</tr>
												<tr>
													<?php foreach ($table['header'] as $row) {
														$total_fisik[$row['sumber_dana']] = 0;
														?>
														<th class="text-white" style="text-align: center"><?php echo $row['sumber_dana']; ?></th>
														<?php
													} ?>
												</tr>
												</thead>
												<tbody>
													<?php foreach ($table['data'] as $key => $value) {
														?>
														<tr>
															<td><?php echo $value['jenis_data_fisik'] ?></td>

															<?php foreach ($table['header'] as $row) {
																$total_fisik [$row['sumber_dana']] += $value[$row['sumber_dana']];
															?>
																<td style="text-align: center"><?php echo $value[$row['sumber_dana']]; ?></td>
																<?php
															} ?>
														</tr>
														<?php
													} ?>
													<tr>
															<td><b>TOTAL</b></td>

															<?php foreach ($table['header'] as $id => $row) {
																

															?>
																<td style="text-align: center"><?php echo $total_fisik[$row['sumber_dana']]; ?></td>
																<?php
															} ?>
														</tr>
												</tbody>
											</table>


										 </div>
									</div>
								</div>
							</div>


							<div class="row row-cards">
							
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Jenis Alsintan</h3>
									</div>
									<div class="card-body">

											<table class="table card-table table-vcenter text-nowrap table-primary">
												<thead class="bg-primary text-white">
												<tr>
													<th class="text-white" rowspan="2" style="text-align: center" valign="center">Jenis Alsintan</th>
													<th class="text-white" colspan="<?php echo $table['colspan']; ?>" style="text-align: center">Jumlah ALSINTAN</th>
												</tr>
												<tr>
													<?php foreach ($table['header'] as $row) {
														$total_alsintan[$row['sumber_dana']] = 0;
														?>
														<th class="text-white" style="text-align: center"><?php echo $row['sumber_dana']; ?></th>
														<?php
													} ?>
												</tr>
												</thead>
												<tbody>
													<?php foreach ($table2['data'] as $key => $value) {
														?>
														<tr>
															<td><?php echo $value['jenis_alsintan'] ?></td>

															<?php foreach ($table['header'] as $row) {
																$total_alsintan[$row['sumber_dana']] += $value[$row['sumber_dana']];
															?>
																<td style="text-align: center"><?php echo $value[$row['sumber_dana']]; ?></td>
																<?php
															} ?>
														</tr>
														<?php
													} ?>
													<tr>
															<td><b>TOTAL</b></td>

															<?php foreach ($table['header'] as $id => $row) {
																

															?>
																<td style="text-align: center"><?php echo $total_alsintan[$row['sumber_dana']]; ?></td>
																<?php
															} ?>
														</tr>
												</tbody>
											</table>


										 </div>
									</div>
								</div>
							</div>

<div class="row row-cards">
							
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Data Petani</h3>
									</div>
									<div class="card-body">

											<div class="row">
												<div class="col-lg-3 col-sm-6">
								<div class="card">
									<div class="card-body text-center">
										<div class="h5">Jumlah Petani</div>
										<div class="h3 font-weight-bold mb-4"><?php echo $petani; ?></div>
										<div class="progress progress-sm">
											<div class="progress-bar bg-blue" style="width: 100%"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="card">
									<div class="card-body text-center">
										<div class="h5">Kelompok Tani</div>
										<div class="h3 font-weight-bold mb-4"><?php echo $poktan; ?></div>
										<div class="progress progress-sm">
											<div class="progress-bar bg-pink" style="width: 100%"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="card">
									<div class="card-body text-center">
										<div class="h5">Gapoktan </div>
										<div class="h3 font-weight-bold mb-4"><?php echo $gapoktan; ?></div>
										<div class="progress progress-sm">
											<div class="progress-bar bg-success" style="width: 100%"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6">
								<div class="card">
									<div class="card-body text-center">
										<div class="h5">Kios Pengecer</div>
										<div class="h3 font-weight-bold mb-4"><?php echo $pengecer; ?></div>
										<div class="progress progress-sm">
											<div class="progress-bar bg-orange" style="width: 100%"></div>
										</div>
									</div>
								</div>
							</div>
											</div>


										 </div>
									</div>
								</div>
							</div>



							<div class="row row-cards">
							
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Data Konsumsi Pupuk dalam satuan Kg</h3>
									</div>
									<div class="card-body">

											<div class="row justify-content-center">
												<div class="col-lg-2 col-sm-6">
								<div class="card">
									<div class="card-body text-center">
										<div class="h5">UREA</div>
										<div class="h3 font-weight-bold mb-4"><?php echo number_format($urea,0,'.',','); ?></div>
										<div class="progress progress-sm">
											<div class="progress-bar bg-blue" style="width: 100%"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-2 col-sm-6">
								<div class="card">
									<div class="card-body text-center">
										<div class="h5">SP-36</div>
										<div class="h3 font-weight-bold mb-4"><?php echo number_format($sp36,0,'.',','); ?></div>
										<div class="progress progress-sm">
											<div class="progress-bar bg-pink" style="width: 100%"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-2 col-sm-6">
								<div class="card">
									<div class="card-body text-center">
										<div class="h5">Z A </div>
										<div class="h3 font-weight-bold mb-4"><?php echo number_format($za,0,'.',','); ?></div>
										<div class="progress progress-sm">
											<div class="progress-bar bg-success" style="width: 100%"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-2 col-sm-6">
								<div class="card">
									<div class="card-body text-center">
										<div class="h5">NPK</div>
										<div class="h3 font-weight-bold mb-4"><?php echo number_format($npk,0,'.',','); ?></div>
										<div class="progress progress-sm">
											<div class="progress-bar bg-orange" style="width: 100%"></div>
										</div>
									</div>
								</div>
							</div>


							<div class="col-lg-2 col-sm-6">
								<div class="card">
									<div class="card-body text-center">
										<div class="h5">Organik</div>
										<div class="h3 font-weight-bold mb-4"><?php echo number_format($organik,0,',','.'); ?></div>
										<div class="progress progress-sm">
											<div class="progress-bar bg-danger" style="width: 100%"></div>
										</div>
									</div>
								</div>
							</div>
											</div>


										 </div>
									</div>
								</div>
							</div>


