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
						<th scope="col">Notes</th>
						<th scope="col">Transaction Date</th>
						<th scope="col">Discount</th>
						<th scope="col">Tax</th>
						<th scope="col">Total Price</th>
						<th scope="col">Status</th>
						<th scope="col">Paid</th>
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
									'<td>' + data[i].invoice + '</td>' +
									'<td>' + data[i].transaction_date + '</td>' +
									'<td>' + data[i].discount + '</td>' +
									'<td>' + data[i].tax + '</td>' +
									'<td>' + data[i].total_price + '</td>' +
									'<td>' + data[i].status + '</td>' +
									'<td>' + data[i].paid + '</td>' +
									'<td><a href="#exampleModal" data-toggle="modal" class="btn btn-success" onclick="submit('+ data[i].id +')">Edit</a>'+
									' <a class="btn btn-danger" onclick="deleteData('+ data[i].id +')" style="color:white;" >Delete</a></td>' +
									'</tr>';
							}

							$('#target').html(row);
						}
					});
                }

				function addData(){
                    var id_outlet = $("[name = 'id_outlet']").val();
                    var invoice = $("[name = 'invoice']").val();
                    var id_member = $("[name = 'id_member']").val();
                    var transaction_date = $("[name = 'transaction_date']").val();
                    var pay_date = $("[name = 'pay_date']").val();
                    var discount = $("[name = 'discount']").val();
                    var tax = $("[name = 'tax']").val();
                    var total_price = $("[name = 'total_price']").val();
                    var money = $("[name = 'money']").val();
                    var total_change = $("[name = 'total_change']").val();
                    var status = $("[name = 'status']").val();
                    var paid = $("[name = 'paid']").val();
                    var id_user = $("[name = 'id_user']").val();

                    $.ajax({
                        type : 'POST',
                        data : 'id_outlet='+id_outlet+'&invoice='+invoice+'&id_member='+id_member+'&transaction_date='+transaction_date,
                        url : '<?php echo base_url(). "Package/package_save" ?>',
                        dataType : 'Json',
                        success : function(result){
                            // console.log(result);
							$('#message').html(result.message);

							if(result.message == ""){
								$('#exampleModal').modal('hide');
								getData();

								$("[name = 'id_outlet']").val('');
								$("[name = 'type']").val('');
								$("[name = 'name']").val('');
								$("[name = 'price']").val('');

							}	
                        }
                    });
                }

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
							url : '<?php echo base_url(). "Package/package_get" ?>',
							dataType : 'Json',
							success : function(result){
								// console.log(result);
								$("[name = 'id']").val(result[0].id);
								$("[name = 'id_outlet']").val(result[0].id_outlet);
								$("[name = 'type']").val(result[0].type);
								$("[name = 'name']").val(result[0].name);
								$("[name = 'price']").val(result[0].price);
							}

						});
					}

				}

			</script>

			<!-- Modal Add Data -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">

						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Package</h5>
						</div>

						<div class="modal-body">
									<p id="message" align="center" style="color:red;"></p>
										<form>
											<input type="hidden" name="id"  value="">
											<div class="form-group">
												<input type="hidden" name="id_outlet" class="form-control"  placeholder="ID Outlet" value="<?php echo $this->session->userdata('id_outlet');?>">
											</div>
											<div class="form-group">
                                            <select name="type" id="type" class="form-control" required>
                                                    <option selected disabled>Select Type...</option>
													<option value="Kilos">Kilos</option>
													<option value="Blanket">Blanket</option>
													<option value="Bed Cover">Bed Cover</option>
													<option value="T-Shirt">T-Shirt</option>
												</select>
											</div>
 											<div class="form-group">
												<input type="text" name="name" class="form-control" placeholder="Package Name">
											</div>
 											<div class="form-group">
												<input type="number" name="price" class="form-control" placeholder="Price">
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

		</div>
		<!-- /.container-fluid -->

		</div>
		<!-- End of Main Content -->