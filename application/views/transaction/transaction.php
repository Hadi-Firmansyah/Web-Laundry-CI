		<!-- Begin Page Content -->
		<div class="container-fluid">

			<!-- Page Heading -->
			<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h2 mb-0 text-gray-800">Transaction</h1>
			</div>

			<div>
				<button class="btn btn-primary mb-3" type="button" data-toggle="modal"
					href="#exampleModal" onclick="submit('add')">Add Transaction</button>
			</div>
			<br>
			<div class="card">
			<div class="card-body">
			<table id="table" class="table table-bordered">
				<thead align="center" class="bg-primary" style="color:white;">
					<tr>
						<th scope="col">No</th>
						<th scope="col">ID Transaction</th>
						<th scope="col">Date Transaction</th>
						<th scope="col">ID Customer</th>
						<th scope="col">Package</th>
						<th scope="col">Notes</th>
						<th scope="col">Total Price</th>
						<th scope="col">Status</th>
						<th scope="col">Action</th>
					</tr>
				</thead>

				<tbody align="center" id="target">

				</tbody>
			</table>
			</div>
			</div>

			<script type="text/javascript">
				$(document).ready(function () {
					$('#table').DataTable({
						"ordering": false
					});
				});

			</script>

			<script type="text/javascript">
				getData();

				function getData() {
					$.ajax({
						type: 'POST',
						url: '<?php echo base_url(). "Transaction/transaction_show" ?>',
						dataType: 'Json',
						success: function (data) {
		
							var row = '';
							for (var i = 0; i < data.length; i++) {
								row += '<tr>' +
									'<td>' + (i+1) + '</td>' +
									'<td>' + data[i].id + '</td>' +
									'<td>' + data[i].transaction_date + '</td>' +
									'<td>' + data[i].id_member + '</td>' +
									'<td>' + data[i].id_package + '</td>' +
									'<td>' + data[i].notes + '</td>' +
									'<td>' + data[i].total_price + '</td>' +
									'<td class="">' + data[i].status + '</td>' +
									'<td>' + '<a href="#modalPayment" data-toggle="modal" class="btn btn-success btn-block" onclick="payment('+ data[i].id +')">Pay</a>' + '</td>'
									'</tr>';
							}

							$('#target').html(row);
						}
					});
                }

				// ADD DATA TRANSACTION
				function addData(){
                    var id_outlet = $("[name = 'id_outlet']").val();
                    var transaction_date = $("[name = 'transaction_date']").val();
                    var id_user = $("[name = 'id_user']").val();
                    var id_member = $("[name = 'id_member']").val();
					var id_package = $("[name = 'id_package']").val();
					var price_package = $("[name = 'price_package']").val();
					var quantity = $("[name = 'quantity']").val();
                    var notes = $("[name = 'notes']").val();
                    // var pay_date = ''
                    var total_price = $("[name = 'total_price']").val();
                    // var money = ''
                    // var total_change = ''
                    var status = 'Belum Dibayar';
					
                    $.ajax({
                        type : 'POST',
                        data : 'id_outlet='+id_outlet+
								'&transaction_date='+transaction_date+
								'&id_user='+id_user+
								'&id_member='+id_member+
								'&id_package='+id_package+
								'&price_package='+price_package+
								'&quantity='+quantity+
								'&notes='+notes+
								'&total_price='+total_price+
								'&status='+status,

                        url : '<?php echo base_url(). "Transaction/transaction_save" ?>',
                        dataType : 'Json',
                        success : function(result){
                            // console.log(result);
							$('#message').html(result.message);

							if(result.message == ""){
								$('#exampleModal').modal('hide');
								getData();

								$("[name = 'id_outlet']").val('');
								$("[name = 'transaction_date']").val('');
								$("[name = 'id_user']").val('');
								$("[name = 'id_member']").val('');
								$("[name = 'id_package']").val('');
								$("[name = 'price_package']").val('');
								$("[name = 'quantity']").val('');
								$("[name = 'notes']").val('');
								$("[name = 'total_price']").val('');
								$("[name = 'status']").val('');

							}	
                        }
                    });
                }

				//KONDISI KETIKA TOMBOL DI KLIK
				function submit(x){
					if(x  == "add"){
						$('#btn-add').show();
						$('#btn-edit').hide();
					}else{
						$('#btn-add').hide();
						$('#btn-edit').show();

						$.ajax({
							type : 'POST',
							data : 'id=' + x,
							url : '<?php echo base_url(). "Transaction/transaction_get" ?>',
							dataType : 'Json',
							success : function(result){
								// console.log(result);
								$$("[name = 'id']").val(result[0].id);
								$("[name = 'id_outlet']").val(result[0].id_outlet);
								$("[name = 'transaction_date']").val(result[0].transaction_date);
								$("[name = 'id_user']").val(result[0].id_user);
								$("[name = 'id_member']").val(result[0].id_member);
								$("[name = 'id_package']").val(result[0].id_package);
								$("[name = 'price_package']").val(result[0].price_package);
								$("[name = 'quantity']").val(result[0].quantity);
								$("[name = 'notes']").val(result[0].notes);
								$("[name = 'total_price']").val(result[0].total_price);
								$("[name = 'status']").val(result[0].status);
							}

						});
					}

				}

				//MENAM
				function payment(x){
					$.ajax({
							type : 'POST',
							data : 'id=' + x,
							url : '<?php echo base_url(). "Payment/payment_select" ?>',
							dataType : 'Json',
							success : function(result){
								// console.log(result);
								$("[name = 'id']").val(result[0].id);
								$("[name = 'id_packages']").val(result[0].id_package);
								$("[name = 'total_prices']").val(result[0].total_price);
					
							}

						});
				}

			</script>

			<!-- Modal Add Data Transaction -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">

						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Add Transaction</h5>
						</div>

								<div class="modal-body">
									<p id="message" align="center" style="color:red;"></p>
										<form action="<?php echo site_url('Transaction/transaction_save');?>" method="POST"">
											<input type="hidden" name="id"  value="">
											<div class="form-group">
												<input type="hidden" name="id_outlet" class="form-control"  placeholder="ID Outlet" value="<?php echo $this->session->userdata('id_outlet');?>">
											</div>
											<div class="form-group">
												<input type="hidden" name="id_user" class="form-control"  placeholder="ID User" value="<?php echo $this->session->userdata('id');?>">
											</div>
											<div class="form-group">
												<input type="date" name="transaction_date" class="form-control"  placeholder="Date Transaction" value="<?php echo date('Y-m-d') ?>" readonly>
											</div>
											<div class="form-group">
											<select name="id_member" class="form-control" id="">
											<option value="" disabled selected>Select Customers...</option>
												<?php foreach($get_customers as $datas) { 
													?>
													<option value="<?php echo $datas->id?>"><?php echo $datas->name?></option>
												<?php } ?>
											</select>
											</div>
 											<div class="form-group">
											
												<select name="id_package" class="form-control" id="id_package">
												<option value="" disabled selected>Select Package...</option>
												<?php foreach($get_package_outlet as $datas) : ?>
													<option value="<?php echo $datas->id?>"><?php echo $datas->type?></option>
												<?php endforeach; ?>
												</select>
											
											</div>
											<div class="form-group">
												<input type="number" name="price_package" class="form-control" placeholder="Price" id="price_package" readonly>
											</div>
 											<div class="form-group">
												<input type="number" name="quantity" id="quantity" onkeyup="total()" class="form-control" placeholder="Quantity / KG">
											</div>
 											<!-- <div class="form-group">
												<input type="number" name="discount" id="discount" class="form-control" placeholder="Discount">
											</div> -->
 											<div class="form-group">
												<input type="number" name="total_price" id="total_price" class="form-control" placeholder="Total Price" readonly>
											</div>
 											<div class="form-group">
											 	<textarea name="notes" class="form-control" cols="30" rows="10" placeholder="Notes"></textarea>
											</div>

											<div class="form-group" align="center">
												<button class="btn btn-primary" type="button" id="btn-add" onclick="addData()">Add</button>
												<button class="btn btn-primary" type="button" id="btn-edit" onclick="editData()">Edit</button>
											</div>
										</form>
                        		</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>

					</div>
				</div>
			</div>
            <!-- End Modal -->


			<!-- Modal Payment -->
			<div class="modal fade" id="modalPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">

						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Payment</h5>
						</div>
							<div class="modal-body">
									<p id="message" align="center" style="color:red;"></p>
									<form action="">
										<!-- <div class="form-group">
											<input type="hidden" name="id" id="id" class="form-control" readonly>
										</div>					 -->
										<div class="form-group">
											<input type="date" name="payment_dates" class="form-control" placeholder="Date" value="<?php echo date('Y-m-d') ?>" required readonly>
										</div>
										<div class="form-group">
											<input type="number" name="id" id="id" class="form-control" placeholder="ID Transaction" readonly>
										</div>
										<div class="form-group">
											<input type="text" name="total_prices" id="price" class="form-control" placeholder="Total Price" readonly>
										</div>
										<div class="form-group">
											<input type="number" name="moneys" id="money" onkeyup="changes()" class="form-control" placeholder="Insert Money" required>
										</div>
										<div class="form-group">
											<input type="number" name="total_changes" id="change" class="form-control" placeholder="Change" required readonly>
										</div>
											<button class="btn btn-primary" onclick="addDatas()" align="center">Pay</button>
									</form>
                        		</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
							</div>
				</div>
			</div>
            <!-- End Modal -->

			<script>

			// KETIKA SELECT PACKAGE										
			$('#id_package').on("change", function() {
				var id = $(this).val();

				$.ajax({
					url:'<?php echo base_url(). 'Transaction/get_price_package'?>',
					method: "POST",
					data: {id_package:id},
					async: true,
					dataType: 'Json',
					success: function(data){
						var price = "";

						for(i = 0 ; i < data.length; i++){
							price += data[i].price;
						}

						$('#price_package').val(price);
						total();

					}
				});
			});
			
			

			function total(){
				var price = Number(document.getElementById('price_package').value);
				var quantity = Number(document.getElementById('quantity').value);

				var total_price = price * quantity;
								Number(document.getElementById('total_price').value = total_price);
			}

			function changes(){
				var money = Number(document.getElementById('money').value);
				var price = Number(document.getElementById('price').value);

				var change = Number(money - price);
							 Number(document.getElementById('change').value = change);
			}

			function addDatas(){
                    var payment_date = $("[name = 'payment_dates']").val();
					var id_transaction = $("[name = 'id']").val();
					var total_prices = $("[name = 'total_prices']").val();
					var moneys = $("[name = 'moneys']").val();
					var total_changes = $("[name = 'total_changes']").val();
                    var status = 'Selesai';
					
                    $.ajax({
                        type : 'POST',
                        data : 'payment_date='+payment_date+
								'&id_transaction='+id_transaction+
								'&total_price='+total_prices+
								'&money='+moneys+
								'&total_change='+total_changes+
								'&status='+status,

                        url : '<?php echo base_url(). "Payment/payment_save" ?>',
                        dataType : 'Json',
                        success : function(result){
                            // console.log(result);
							$('#message').html(result.message);

							if(result.message == ""){
								$('#modalPayment').modal('hide');

								$("[name = 'moneys']").val('');

							}
                        }
                    });
                }


			</script>

		</div>
		<!-- /.container-fluid -->

		</div>
		<!-- End of Main Content -->
