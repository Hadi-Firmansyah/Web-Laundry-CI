		<!-- Begin Page Content -->
		<div class="container-fluid">

		<main role="main" class="container-fluid" style="margin-top: 20%;">
        <center><div class="col-xl-6">
              <div class="card border-left-success mt-4 shadow h-100 py-2">
                <div class="card-body" style="width:100%;height: 150px;" >
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                     <h2>Print Excel</h2>
                     <div class="input-group">
                        <select class="custom-select" id="select_print">
                            <option selected>Choose...</option>
                            <option value="1">User</option>
                            <option value="2">Customer</option>
                            <option value="3">Outlet</option>
                            <option value="4">Package</option>
                            <option value="5">Transaction</option>
                            <option value="6">Payment</option>
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
                        window.location.assign("<?php echo base_url("User/user_print_xls")?>");
                    }
                    else if(pilihan=="2") {
                        window.location.assign("<?php echo base_url("Customer/customer_print_xls")?>");
                    }
                    else if(pilihan=="3") {
                        window.location.assign("<?php echo base_url("Outlet/outlet_print_xls")?>");
                    }
                    else if(pilihan=="4") {
                        window.location.assign("<?php echo base_url("Package/package_print_xls")?>");
                    }
                    else if(pilihan=="5") {
                        window.location.assign("<?php echo base_url("Transaction/transaction_print_xls")?>");
                    }
                    else if(pilihan=="6") {
                        window.location.assign("<?php echo base_url("Payment/payment_print_xls")?>");
                    };

                 };
            </script>
        </main>


		</div>
		<!-- /.container-fluid -->

        


		</div>
		<!-- End of Main Content -->
