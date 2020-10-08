		<!-- Begin Page Content -->
		<div class="container-fluid">

			<!-- Page Heading -->
			<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h2 mb-0 text-gray-800">Package</h1>
			</div>

			<div>
				<button class="btn btn-primary mb-3" type="button" data-toggle="modal"
					href="#exampleModal" onclick="submit('add')">Add Package</button>
			</div>
			<br>
			<table id="table" class="table table-striped table-bordered">
				<thead align="center" class="bg-primary" style="color:white;">
					<tr>
						<th scope="col">No</th>
						<th scope="col">ID Outlet</th>
						<th scope="col">Type</th>
						<th scope="col">Package Name</th>
						<th scope="col">Price</th>
						<th scope="col">Action</th>
					</tr>
				</thead>

				<tbody align="center" id="target">

				</tbody>
			</table>

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
						url: '<?php echo base_url(). "Package/package_show" ?>',
						dataType: 'Json',
						success: function (data) {
		
							var row = '';
							for (var i = 0; i < data.length; i++) {
								row += '<tr>' +
									'<td>' + (i+1) + '</td>' +
									'<td>' + data[i].id_outlet + '</td>' +
									'<td>' + data[i].type + '</td>' +
									'<td>' + data[i].name + '</td>' +
									'<td>' + data[i].price + '</td>' +
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
                    var type = $("[name = 'type']").val();
                    var name = $("[name = 'name']").val();
                    var price = $("[name = 'price']").val();

                    $.ajax({
                        type : 'POST',
                        data : 'id_outlet='+id_outlet+'&type='+type+'&name='+name+'&price='+price,
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
				function editData(){

					var id = $("[name = 'id']").val();
					var id_outlet = $("[name = 'id_outlet']").val();
					var type = $("[name = 'type']").val();
                    var name = $("[name = 'name']").val();
                    var price = $("[name = 'price]").val();

					$.ajax({
						type : 'POST',
                        data : 'id='+id+'&id_outlet='+id_outlet+'&type='+type+'&name='+name+'&price='+price,
                        url : '<?php echo base_url(). "Package/package_edit" ?>',
                        dataType : 'Json',
						success : function(result){
                            // console.log(result);
							$('#message').html(result.message);

							if(result.message == ""){
								$('#exampleModal').modal('hide');
								getData();

							}	
                        }
					});
				}

				function deleteData(id){
					var ask = confirm("Are You Sure?");

					if(ask){
						$.ajax({
							type : 'POST',
							data : 'id=' +id,
							url : '<?php echo base_url(). "Package/package_delete" ?>',
							success : function(){
								getData();
							}


						})
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
