<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-1">
		<h3 class="mb-0 text-gray-800"><a href="<?php echo base_url()?>" style="text-decoration:none;color:gray">Home</a> / <small>Detail</small></h3>
	</div>
	<div class="card-body">
		<form>
			<?php foreach($data as $edit): ?>
			<input type="hidden" name="id" id="id" value="<?php echo $edit->id; ?>">

			<div class="form-group">
                <div id="map"></div>
			</div>

			<div class="form-group">
               <input type="hidden" class="form-control" name="address" id="address" value="<?php echo $edit->address; ?>">
			</div>

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
				<?php endforeach; ?>
		</form>
	</div>
    
<style>
		/* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
		#map {
			height: 550px;
		}

		/* Optional: Makes the sample page fill the window. */
		html,
		body {
			height: 100%;
			margin: 0;
			padding: 0;
		}
        a{
            text-decoration: none;
        }

	</style>
<script>
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
   var contentString = document.getElementById("address").value;
 
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
//    infowindow.open(map);
 
   
 }
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?callback=initMap">
</script>

</div>
<!-- End of Main Content -->

<!-- End Page Content -->
</div