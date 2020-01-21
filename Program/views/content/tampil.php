
<div class="container">
        <div class="form-group">
         <?php
        echo validation_errors('<div class="alert alert-warning" id=""warning-alert>','</div>');
        if ($this->session->flashdata('sukses')) {
            echo '<div class="alert alert-success" id="success-alert">';
            echo $this->session->flashdata('sukses');
            echo '</div>';
        }
        echo form_open(base_url('test/simpan'), 'class="form-horizontal" entype="multipart/formdata"');
        ?>
            <br >
            <div class="form-group">
                <label  class="control-label">Lokasi Sekarang :</label>
            <html lang="en">
            <head>
            <meta charset="utf-8">
            <title>Percobaan</title>
            <script src="https://maps.google.com/maps/api/js?sensor=false"></script>
            <script>
            function showPosition() {
                if(navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(showMap, showError);
                } else {
                    alert("Sorry, your browser does not support HTML5 geolocation.");
                }
            }
             
            // Define callback function for successful attempt
            function showMap(position) {
                // Get location data
                lat = position.coords.latitude;
                long = position.coords.longitude;
                var latlong = new google.maps.LatLng(lat, long);
                
                var myOptions = {
                    center: latlong,
                    zoom: 15,
                    mapTypeControl: true,
                    navigationControlOptions: {
                        style:google.maps.NavigationControlStyle.SMALL
                    }
                }
                var map = new google.maps.Map(document.getElementById("embedMap"), myOptions);
                var marker = new google.maps.Marker({ position:latlong, map:map, title:"You are here!" });
            }
             
            // Define callback function for failed attempt
            function showError(error) {
                if(error.code == 1) {
                    result.innerHTML = "You've decided not to share your position, but it's OK. We won't ask you again.";
                } else if(error.code == 2) {
                    result.innerHTML = "The network is down or the positioning service can't be reached.";
                } else if(error.code == 3) {
                    result.innerHTML = "The attempt timed out before it could get the location data.";
                } else {
                    result.innerHTML = "Geolocation failed due to unknown error.";
                }
            }
            </script>
             <script>
                if ('geolocation' in navigator) {
                  console.log('geolocation available');
                  navigator.geolocation.getCurrentPosition(position => {
                    const lat = position.coords.latitude;
                    const long = position.coords.longitude;
                      document.getElementById('latitude1').textContent = lat;
                      document.getElementById('longitude1').textContent = long;
                    //  console.log(position);
                  });
                } else {
                  console.log('geolocation not available');
                }
                </script>
            </head>
            <body>
                <button type="button" onclick="showPosition();">Detect</button>
                <div id="embedMap" style="height: 500px; width:500px;">
                    <!--Google map will be embedded here-->
                </div>
            </body>
            </html> 
            </div> 

             <div class="form-group">
               <textarea id="latitude1"  type="text"  name="latitude1" style="display:none;" placeholder="Latitude"
              value="<?php echo set_value('latitude1') ?>"></textarea>
              <textarea id="longitude1" type="text" name="longitude1" style="display:none;" placeholder="Longitude"
              value="<?php echo set_value('longitude1') ?>"></textarea>
             </div>

             <div class="form-group">
<!--               <button class="btn btn-success" type="submit" >
                  <i class="fa fa-paper-plane"></i> Save</button> -->
              <a href="<?=site_url('test/lanjut')?>">
              <button class="btn btn-success" >Next</button> 
       
            </div>
          </div>

