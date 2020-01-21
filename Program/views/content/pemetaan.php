
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<br >
<div class="container">
  <div class="row">
    <div class="col-md-7">
      <div class="panel panel-primary">
      <div class="panel-heading"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;Pemetaan</div>
        <div class="panel-body">
        <?php echo $map['html']; ?>
         <?php echo $map['js']; ?>
        </div>
      </div>
    </div>
</div> <br >
                <div class="box">
                <div class="box-header">
                  <div class="pull-right">
                      <a href="<?=site_url('test/tampil')?>" class="btn btn-warning btn-flat">
                      <i class="fa fa-undo"></i> Back
                  </a>
                  <!-- <button class="btn btn-primary" >Generate</button>  -->

