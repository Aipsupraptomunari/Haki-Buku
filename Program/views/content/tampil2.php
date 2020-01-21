
<div class="container">
        <div class="form-group">
        <?php
        echo validation_errors('<div class="alert alert-warning" id="warning-alert">','</div>');
        if ($this->session->flashdata('sukses')) {
            echo '<div class="alert alert-success" id="success-alert">';
            echo $this->session->flashdata('sukses');
            echo '</div>';
        }
        ?>

        <?php echo form_open_multipart('test/simpan1');?>
            <br >
            <div class="form-group">
                <label  class="control-label">Lokasi Sekarang :</label>
            <html lang="en">
            <head>
            <meta charset="utf-8">
            <title>Showing User's Location on Google Map</title>
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
            <html>
              <body>
                <script>
                if ('geolocation' in navigator) {
                  console.log('geolocation available');
                  navigator.geolocation.getCurrentPosition(position => {
                    const lat = position.coords.latitude;
                    const lon = position.coords.longitude;
                      document.getElementById('latitude2').textContent = lat;
                      document.getElementById('longitude2').textContent = lon;
                    //  console.log(position);
                  });
                } else {
                  console.log('geolocation not available');
                }
                </script>

                  <!-- <h4><b>Coordinates from detect location : </b></h4> -->
                  <p> 
                  <script>
                      $('#coba11').click(function(){
                          var latitude2 = $('#latitude2').val();
                          var longitude2 = $('#longitude2').val();
                          $.ajax({
                              type: "POST",
                              url: "<?php echo base_url('Test/haversine/'); ?>"+latitude2+'~'+longitude2,
                              success:function(data) {
                                  var out = jQuery.parseJSON(data);
                                  console.log(out.jsonarray);
                                  document.getElementById("showhasil").innerHTML = out.jsonarray;
                              }
                          });
                      })
                      </script>
                      
                  <textarea id="latitude2"  type="text"  name="latitude2"  class="form-control" placeholder="Latitude"
              value="<?php echo set_value('latitude2') ?>"></textarea>
              <textarea id="longitude2" type="text" name="longitude2"  class="form-control" placeholder="Longitude"
              value="<?php echo set_value('longitude2') ?>"></textarea>
                    <!-- <input id="longitude2" type="text" value="" />  -->
                    <!-- latitude:  <span id="latitude2"></span><br />
                    longitude: <span id="longitude2"></span><br /> -->
                    <textarea id='showhasil' type="text" name='hasil' class="form-control" 
                    value="<?php echo set_value('hasil') ?>'"></textarea>
                  </p>
                  <a href='#' class='btn btn-primary' id='coba11'>Generate</a>
                </body>
                </html>
                </div>

             <div class="form-group">
                <div class="box">
                <div class="box-header">
                  <div class="pull-right">
                      <a href="<?=site_url('test/tampil')?>" class="btn btn-warning btn-flat">
                      <i class="fa fa-undo"></i> Back
                  </a>
              <button class="btn btn-success" type="submit" >Save</button> 
            </div>
          </div>
