		<!-- Begin Page Content -->
		<div class="container-fluid">

			<!-- Page Heading -->
			<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h3 mb-0 text-gray-800">Report</h1>
			</div>

			<div class="row">

				<!-- Foods -->
				<div class="col-xl-4 col-md-6 mb-4">
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
				<div class="col-xl-4 col-md-6 mb-4">
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
				<div class="col-xl-4 col-md-6 mb-4">
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

			</div>


		</div>
		<!-- /.container-fluid -->

        <main role="main" class="container-fluid" style="margin-top: 5%;">
        <center><div class="col-xl-6">
              <div class="card border-left-success mt-4 shadow h-100 py-2">
                <div class="card-body" style="width:100%">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                     <h2>Print Excel</h2>
                     <div class="input-group">
                        <select class="custom-select" id="select_print">
                            <option selected>Choose...</option>
                            <option value="1">Customer</option>
                            <option value="2">Transaction</option>
                            <option value="3">Payment</option>
                        </select>
                        <div class="input-group-append">
                           <button class="btn btn-success" onclick="print_xls()" type="button"><i class="fas fa-file-download"></i></button>
                        </div>
                        </div>
                    </div>             
                  </div>
                </div>
              </div>
            </div></center>

            <script>
                 function print_xls() {
                    var pilihan= document.getElementById("select_print").value;
                        
                    if(pilihan=="1") {
                        window.location.assign("<?php echo base_url("Customer/customer_print_xls")?>");
                    }
                    else if(pilihan=="2") {
                        window.location.assign("<?php echo base_url("Transaction/transaction_print_xls")?>");
                    }
                    else if(pilihan=="3") {
                        window.location.assign("<?php echo base_url("Payment/payment_print_xls")?>");
                    };
                    

                 };
            </script>
        </main>



		</div>
		<!-- End of Main Content -->
