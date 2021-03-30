		<!-- Begin Page Content -->
		<div class="container-fluid">

			<!-- Page Heading -->
			<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h2 mb-0 text-gray-800">User</h1>
			</div>

			<div>
				<button class="btn btn-primary btn-block" style="width:15%;" type="button" 
					data-toggle="modal" data-target="#exampleModal">Add Customer</button>
				<!-- <a href="<?php echo base_url("User/user_print_xls")?>">
					<button class="btn btn-success mb-3" style="width:15%;" >Generate XLS</button></a> -->
			</div>
			<br>
		<div class="card">
			<div class="card-body">
			<table id="table" class="table table-bordered">
				<thead align="center" class="bg-primary" style="color:white;">
					<tr>
                        <th scope="col">No</th>
						<th scope="col">Name</th>
						<th scope="col">Address</th>
						<th scope="col">Gender</th>
						<th scope="col">Phone</th>
						<th scope="col">Latitude</th>
						<th scope="col">Longitude</th>
						<th scope="col">Action</th>
					</tr>
				</thead>

				<tbody align="center">
					<?php
          				if($count_customer>0){
            			foreach($get_customer as $datas){
          			?>
					<tr>
						<td><?php echo $datas->id;?></td>
						<td><?php echo $datas->name;?></td>
						<td><?php echo $datas->address;?></td>
						<td><?php echo $datas->gender;?></td>
						<td><?php echo $datas->phone;?></td>
                        <td><?php echo $datas->latitude;?></td>
                        <td><?php echo $datas->longitude;?></td>
						<td>
							<div>
								<a href="<?php echo site_url('Customer/customer_edit/'.$datas->id);?>" style=”text-decoration: none”>
									<button class="btn btn-success btn-block">Edit</button></a>
							</div>
							<div class="mt-2">
								<a href="<?php echo site_url('Customer/customer_delete/'.$datas->id);?>" style=”text-decoration: none”>
									<button class="btn btn-danger btn-block">Delete</button></a>
							</div>
							<div class="mt-2">
								<a href="<?php echo site_url('Customer/detail_location/'.$datas->id);?>" style=”text-decoration: none”>
									<button class="btn btn-info btn-block">Location</button></a>
							</div>
						</td>
					</tr>
					<?php } } else { ?>
					<tr>
						<td colspan="9">
							<center><b>Nothing !</b></center>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			</div>
		</div>
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/');?>DataTables/datatables.min.css"/> 
<script type="text/javascript" src="<?php echo base_url('assets/');?>DataTables/datatables.min.js"></script> -->

<script type="text/javascript">
	$(document).ready( function () {
   		$('#table').DataTable({
			"ordering": false
		   });
	});
</script>

			<!-- Modal Add Data -->
			<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Add User</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div> 
						<div class="modal-body">
						
								<div class="card text-center">
									<div class="card-body">
										<form action="<?php echo site_url('Customer/customer_save');?>"  method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
												<input type="text" name="name" class="form-control" placeholder="Name" autocomplete="off">
											</div>
											<div class="form-group">
												<input type="text" name="address" class="form-control" placeholder="Address">
											</div>
											<div class="form-group">
                                            <select name="gender" id="gender" class="form-control" required>
                                                    <option selected disabled>Select Gender...</option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
											</div>
 											<div class="form-group">
												<input type="number" name="phone" class="form-control" placeholder="Phone Number">
											</div>

											<div class="form-group">
												<div id="mapa"></div>
												<div class="eventtext">
											</div>

											<div class="form-group">
											<td>Latitude</td> 
 											<td> <input type="text" name='latitude' class="form-control" id='latitude' readonly></td>
											<td>Longitude</td>
											<td><input type="text" name='longitude' class="form-control" id='longitude' readonly></td>
											</div>

											<div class="form-group">
												<button class="btn btn-primary" type="submit">Submit</button>
											</div>
										</form>
									</div>
								
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
							</div>

						</div>

					</div>
				</div>
                <!-- End Modal -->
			</div>


		</div>
		<!-- /.container-fluid -->

		</div>
		<!-- End of Main Content -->

        <style type="text/css"> 
			#mapa {
				width: 100%;
				height: 300px; 
				padding: 10px;
			}
		</style>

        <script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAA7A7Eu8gZ_mTslgWnRR9TGRQByQgPDcFg0q0wOb9u6rRtBOFyKBQD4QgfPHRxBFGL7JviJdz_jAlHfw" type="text/javascript"></script>
        <script type="text/javascript">
            if (GBrowserIsCompatible()) 
            {
                map = new GMap2(document.getElementById("mapa"));
                map.addControl(new GLargeMapControl());
                map.addControl(new GMapTypeControl(3));    
                map.setCenter( new GLatLng(-7.793997,110.36931), 5,0);
                
                // GEvent.addListener(map,'mousemove',function(point)
                // {
                //     document.getElementById('latspan').innerHTML = point.lat()
                //     document.getElementById('lngspan').innerHTML = point.lng()
                //     // document.getElementById('latlong').innerHTML = point.lat() + ', ' + point.lng()                        
                // });
                
                GEvent.addListener(map,'click',function(overlay,point)
                {
                    // document.getElementById('latlongclicked').value = point.lat() + ', ' + point.lng()
                    document.getElementById('latitude').value = point.lat() 
                    document.getElementById('longitude').value = point.lng()
                });
            }

        </script>
