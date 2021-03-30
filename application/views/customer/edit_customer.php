<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-1">
		<h1 class="h2 mb-0 text-gray-800">Customer / <small> Edit</small></h1>
	</div>
	<div class="card-body">
		<form action="<?php echo site_url('Customer/action_edit');?>" method="POST" enctype="multipart/form-data">
			<?php foreach($data_edit as $edit): ?>
			<input type="hidden" name="id" id="id" value="<?php echo $edit->id; ?>">
			<div class="form-group">
				<input type="text" name="name" value="<?php echo $edit->name; ?>" class="form-control" placeholder="Name" autocomplete="off">
			</div>
			<div class="form-group">
				<input type="text" name="address" value="<?php echo $edit->address; ?>" class="form-control" placeholder="Address">
			</div>
			<div class="form-group">
				<select name="gender" id="gender" class="form-control" required readonly>
					<option value="<?php echo $edit->gender;?>">Male</option>
				</select>
			</div>
			<div class="form-group">
				<input type="number" name="phone" value="<?php echo $edit->phone;?>" class="form-control" placeholder="Phone Number">
			</div>

			<div class="form-group">
                <div id="mapa"></div>
			    <div class="eventtext">
			</div>
<br>
            <div class="row">
                <div class="col-6">
                <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Latitude</span>
                    <input type="text" name="latitude" id="latitude" value="<?php echo $edit->latitude; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3" readonly>
                </div>
                </div>

                <div class="col-6">
                <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon3">Longitude</span>
                    <input type="text" name="longitude" id="longitude" value="<?php echo $edit->longitude; ?>" class="form-control" id="basic-url" aria-describedby="basic-addon3" readonly>
                </div>
                </div>
            </div>

				<div class="form-group">
					<button class="btn btn-primary" type="submit">Submit</button>
				</div>
				<?php endforeach; ?>
		</form>
	</div>
    
            <style type="text/css"> 
			#mapa {
				width: 100%;
				height: 300px; 
				padding: 10px;
			}
			</style>
<!-- <script>
function initMap() {
   
   // membuat objek untuk titik koordinat
   var location = {
	   lat: Number(document.getElementById("latitude").value), 
	   lng: Number(document.getElementById("longitude").value)
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
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?callback=initMap">
</script> -->

<script src="http://maps.google.com/maps?file=api&v=2&key=ABQIAAAA7A7Eu8gZ_mTslgWnRR9TGRQByQgPDcFg0q0wOb9u6rRtBOFyKBQD4QgfPHRxBFGL7JviJdz_jAlHfw" type="text/javascript"></script>
 <script type="text/javascript">
    if (GBrowserIsCompatible()) 
    {
        map = new GMap2(document.getElementById("mapa"));
        map.addControl(new GLargeMapControl());
        map.addControl(new GMapTypeControl(3));    
        map.setCenter( new GLatLng(
            Number(document.getElementById("latitude").value),
            Number(document.getElementById("longitude").value),
            ), 5,0);
        
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


</div>
<!-- End of Main Content -->

<!-- End Page Content -->
</div