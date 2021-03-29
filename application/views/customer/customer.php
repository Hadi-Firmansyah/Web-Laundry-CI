		<!-- Begin Page Content -->
		<div class="container-fluid">

			<!-- Page Heading -->
			<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h2 mb-0 text-gray-800">Customer</h1>
			</div>

			<div>
				<button class="btn btn-primary mb-3" type="button" data-toggle="modal"
					href="#exampleModal" onclick="submit('add')">Add Customer</button>
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
						url: '<?php echo base_url(). "Customer/customer_show" ?>',
						dataType: 'Json',
						success: function (data) {
		
							var row = '';
							for (var i = 0; i < data.length; i++) {
								row += '<tr>' +
									'<td>' + (i+1) + '</td>' +
									'<td>' + data[i].name + '</td>' +
									'<td>' + data[i].address + '</td>' +
									'<td>' + data[i].gender + '</td>' +
									'<td>' + data[i].phone + '</td>' +
									'<td>' + data[i].latitude + '</td>' +
									'<td>' + data[i].longitude + '</td>' +
									'<td><a href="#exampleModal" data-toggle="modal" class="btn btn-success btn-block" onclick="submit('+ data[i].id +')">Edit</a>'+
									' <a class="btn btn-danger btn-block" onclick="deleteData('+ data[i].id +')" style="color:white;" >Delete</a>' +
									' <a href="#exampleModal2" data-toggle="modal" onclick="detail('+ data[i].id +')" onclick="initMap()" class="btn btn-info btn-block">Detail Location</a>' + '</td>' +
									'</tr>';
							}

							$('#target').html(row);
						}
					});
                }
                
                function addData(){
                    var name = $("[name = 'name']").val();
                    var address = $("[name = 'address']").val();
                    var gender = $("[name = 'gender']").val();
                    var phone = $("[name = 'phone']").val();
                    var latitude = $("[name = 'latitude']").val();
                    var longitude = $("[name = 'longitude']").val();

                    $.ajax({
                        type : 'POST',
                        data : 'name='+name+'&address='+address+'&gender='+gender+'&phone='+phone+'&latitude='+latitude+'&longitude='+longitude,
                        url : '<?php echo base_url(). "Customer/customer_save" ?>',
                        dataType : 'Json',
                        success : function(result){
                            // console.log(result);
							$('#message').html(result.message);

							if(result.message == ""){
								$('#exampleModal').modal('hide');
								getData();

								$("[name = 'name']").val('');
								$("[name = 'address']").val('');
								$("[name = 'phone']").val('');
								$("[name = 'latitude']").val('');
								$("[name = 'longitude']").val('');

							}	
                        }
                    });
                }

				function submit(x){
					if(x  == "add"){
						$('#btn-add').show();
						$('#btn-edit').hide();
					}else if(x == "detail"){
						$('#btn-add').hide();
						$('#btn-edit').hide();
					}else{
						$('#btn-add').hide();
						$('#btn-edit').show();

						$.ajax({
							type : 'POST',
							data : 'id=' + x,
							url : '<?php echo base_url(). "Customer/customer_get" ?>',
							dataType : 'Json',
							success : function(result){
								// console.log(result);
								$("[name = 'id']").val(result[0].id);
								$("[name = 'name']").val(result[0].name);
								$("[name = 'address']").val(result[0].address);
								$("[name = 'gender']").val(result[0].gender);
								$("[name = 'phone']").val(result[0].phone);
								$("[name = 'latitude']").val(result[0].latitude);
								$("[name = 'longitude']").val(result[0].longitude);
							}

						});
					}

				}
				function editData(){

					var id = $("[name = 'id']").val();
					var name = $("[name = 'name']").val();
                    var address = $("[name = 'address']").val();
                    var gender = $("[name = 'gender']").val();
                    var phone = $("[name = 'phone']").val();
					var latitude = $("[name = 'latitude']").val();
                    var longitude = $("[name = 'longitude']").val();

					$.ajax({
						type : 'POST',
                        data : 'id='+id+'&name='+name+'&address='+address+'&gender='+gender+'&phone='+phone+'&latitude='+latitude+'&longitude='+longitude,
                        url : '<?php echo base_url(). "Customer/customer_edit" ?>',
                        dataType : 'Json',
						success : function(result){
                            // console.log(result);
							$('#message').html(result.message);

							if(result.message == ""){
								$('#exampleModal').modal('hide');
								getData();

								// $("[name = 'name']").val('');
								// $("[name = 'address']").val('');
								// $("[name = 'phone']").val('');

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
							url : '<?php echo base_url(). "Customer/customer_delete" ?>',
							success : function(){
								getData();
							}


						})
					}

				}

				function detail(x){

					$.ajax({
							type : 'POST',
							data : 'id=' + x,
							url : '<?php echo base_url(). "Customer/customer_location" ?>',
							dataType : 'Json',
							success : function(result){
								// console.log(result);
								$("[name = 'id']").val(result[0].id);
								$("[name = 'latitude']").val(result[0].latitude);
								$("[name = 'longitude']").val(result[0].longitude);
					
							}

						});
				}

			</script>

			<style type="text/css"> 
			#mapa {
				width: 100%;
				height: 300px; 
				padding: 10px;
			}
			</style>

			<!-- Modal Add Data -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">

						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Customer</h5>
						</div>

						<div class="modal-body">
									<p id="message" align="center" style="color:red;"></p>
										<form>
											<input type="hidden" name="id"  value="">
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

											<div id="map"></div>

											<div class="form-group">
											<td>Latitude</td> 
 											<td> <input type="text" name='latitude' class="form-control" id='latitude' readonly></td>
											<td>Longitude</td>
											<td><input type="text" name='longitude' class="form-control" id='longitude' readonly></td>
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

			<!-- Modal Add Data -->
			<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">

							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Detail Location</h5>
							</div>

							<div class="modal-body">
										<p id="message" align="center" style="color:red;"></p>
											<form>
												<input type="hidden" name="id"  value="">

												<div class="form-group">
													<div id="mapa"></div>
													<div class="eventtext">
												</div>

												<div class="form-group">
												<!-- <td>Latitude</td>  -->
												<td> <input type="text" name='latitude' class="form-control" id='latitude2' readonly></td>
												<!-- <td>Longitude</td> -->
												<br>
												<td><input type="text" name='longitude' class="form-control" id='longitude2' readonly></td>
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

<!-- <script>
function initMap() {
   
   // membuat objek untuk titik koordinat
   var location = {
	   lat: Number(document.getElementById("latitude2").value), 
	   lng: Number(document.getElementById("longitude2").value)
	 };
   
   // membuat objek peta
   var map = new google.maps.Map(document.getElementById('map'), {
	 zoom: 5,
	 center: location
   });
 
   // mebuat konten untuk info window
   var contentString = "Location";
 
   // membuat objek info window
   const infowindow = new google.maps.InfoWindow({
	 content: contentString,
	 position: location
   });
 
   const marker = new google.maps.Marker({
	 position: location,
	 map,
	 title: "Location!",
   });
 
   marker.addListener("click", () => {
	 infowindow.open(map, marker);
   });
   
   // tampilkan info window pada peta
   infowindow.open(map);
 
   
 }
</script> -->
<!-- <script async defer
src="https://maps.googleapis.com/maps/api/js?callback=initMap">
</script> -->