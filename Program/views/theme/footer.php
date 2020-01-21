</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/Flot/jquery.flot.js"></script>
<script src="<?=base_url()?>assets/bower_components/Flot/jquery.flot.pie.js"></script>
</body>
</html>

<script>
    function refreshPage(){
        window.location.reload();
    } 

    $(document).ready(function() {
      $("#success-alert").hide();
      
        $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
          $("#success-alert").slideUp(500);
        });
    });

    $(document).ready(function() {
      $("#warning-alert").hide();
      
        $("#warning-alert").fadeTo(2000, 500).slideUp(500, function() {
          $("#warning-alert").slideUp(500);
        });
    });
</script>

<!-- <script>
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
</script> -->

