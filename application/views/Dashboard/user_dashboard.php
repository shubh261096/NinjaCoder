
  <!-- Content Wrapper. Contains page content -->


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Dashboard
      </h1>
      
    </section>
    <section class="content">

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <?php echo form_open('UserDashboard/getVal', ['role'=>'form' , 'class' => 'navbar-form navbar-left' , 'role' => 'search'] ); ?>
      <div class="form-group">
      <?php echo form_input(['id' => 'keyword', 'name' => 'keyword' , 'class' => 'form-control' , 'placeholder' => 'Search' , 'value' => set_value('keyword') ]); ?>
      </div>
      <?php echo form_submit(['id' => 'submit', 'value' => 'Submit' , 'class' => 'btn btn-primary ']);?>
      
    <?php form_close(); ?>
      
    </div>
    <!-- Small boxes (Stat box) -->

    <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tweets</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Text</th>
                  <th>Image</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                  if(!empty($tweets)){
                    $i=0;
                    foreach ($tweets->statuses as $key => $tweet) { 
                      $i++;
                ?>
                <tr>

                  <td><?php echo $i; ?></td>
                  <td><?=$tweet->full_text;?></td>
                  <td><img src="<?php echo $tweet->user->profile_image_url;?>" height="100" width="100">&nbsp;&nbsp;</td>
                </tr>
                <?php } }?>  
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    


      </section>
  </div>

  
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.7
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="#">Ninja</a>.</strong> All rights
    reserved.
  </footer>

<div class="control-sidebar-bg"></div>
</div>

<script type="text/javascript"> 
function deleteConfirm(url)
 {
    if(confirm('Do you want to Delete this record ?'))
    {
        window.location.href=url;
    }
 }
</script>


<script type="text/javascript"> 
function deleteConfirm(url)
 {
    if(confirm('Do you want to Delete this record ?'))
    {
        window.location.href=url;
    }
 }
</script>


<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url();?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url();?>plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo base_url();?>plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo base_url();?>plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url();?>plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url();?>plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url();?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo base_url();?>plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url();?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url();?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url();?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>dist/js/demo.js"></script>

<script src="<?php echo base_url();?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "sScrollX": '100%'
    });
  });
</script>
</body>
</html>