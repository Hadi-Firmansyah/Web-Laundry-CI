		<!-- Begin Page Content -->
		<div class="container-fluid">

			<!-- Page Heading -->
			<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
			</div>

			<div class="row">

				<!-- Foods -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-warning shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
										User</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count_user; ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-user fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Earnings (Monthly) Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
										Package</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $count_package; ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
									<!-- <i class="fas fa-fw fa-utensils"></i> -->
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Earnings (Annual) Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-success shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
										Transaction</div>
									<div class="h5 mb-0 font-weight-bold text-gray-800">20</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-table fa-2x text-gray-300"></i>

								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Tasks Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
					<div class="card border-left-info shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Report
									</div>
									<div class="row no-gutters align-items-center">
										<div class="col-auto">
											<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">10</div>
										</div>
										<!-- <div class="col">
											<div class="progress progress-sm mr-2">
												<div class="progress-bar bg-info" role="progressbar" style="width: 50%"
													aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
										</div> -->
									</div>
								</div>
								<div class="col-auto">
									<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="card mb-3 shadow" style="max-width: 100%;">
				<div class="row no-gutters">
					<div class="col-md-12">
						<center><img src="<?= base_url().'profile/'.$this->session->userdata('image');?>"
						style="width:250px;border-radius: 50%;" class="mt-4"
						alt="User Image"></center>
					</div>
					<div class="col-md-12">
						<div class="card-body">
							<h5 class="card-title" align="center">Welcome , <?php echo $this->session->userdata('name');?></h5>
							<p class="card-text" align="center"><?php echo $this->session->userdata('role');?></p>
							<p class="card-text" style="color:green;" align="center"><small><?php echo $this->session->userdata('status_log');?></small></p>
						</div>
					</div>
				</div>
			</div>


		</div>
		<!-- /.container-fluid -->



		</div>
		<!-- End of Main Content -->
