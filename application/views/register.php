<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tireduzz | Register</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>other/styles.css">
  <link rel="shortcut icon" href="<?php echo base_url();?>dist/img/only_logo.png" />
   
  <link rel="stylesheet" href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url();?>dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url();?>plugins/datatables/dataTables.bootstrap.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  

  

</head>
<body>


  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
      <h1> Register User </h1>
      
    </section>

    <?php if($feedback = $this->session->flashdata('feedback')): 
              $feedback_class = $this->session->flashdata('feedback_class');
    ?>
    <div class="row">
      <div class="col-lg-6 col-lg-offset-3">
        <div class="alert <?= $feedback_class ?> alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
          </button>
         <strong><?= $feedback ?></strong>
        </div>
      </div>
    </div>
  <?php endif; ?>

    <section class="content">
      <div class="row">
        <div class="col-md-10">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('Register/register_user', ['role'=>'form'] ); ?>
            
              <div class="box-body">
                <div class="form-group ">
                  <label for="InputName">User Name</label>
                  <?php echo form_input(['id' => 'username', 'name' => 'username' , 'class' => 'form-control' , 'placeholder' => 'Enter Username', 'type' => 'text' , 'value' => set_value('username') ]); ?>
                  <?php echo form_error('username');   ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <?php echo form_input(['id' => 'email', 'name' => 'email' , 'class' => 'form-control' , 'placeholder' => 'Enter email' , 'value' => set_value('email') ]); ?>
                  <?php echo form_error('email');   ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <?php echo form_password(['id' => 'password', 'name' => 'password' , 'class' => 'form-control' , 'placeholder' => 'Password', 'type' => 'password' ]); ?>
                  <?php echo form_error('password'); ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Confirm Password</label>
                  <?php echo form_password(['id' => 'pass_confirm', 'name' => 'pass_confirm' , 'class' => 'form-control' , 'placeholder' => 'Confirm Password', 'type' => 'pass_confirm' ]); ?>
                  <?php echo form_error('pass_confirm'); ?>
                </div>
                <div class="form-group">
                  <label for="InputImage">Upload Photo</label>
                  <?php echo form_upload(['name' => 'userfile']); ?>
                  <?php if(isset($upload_error)) echo $upload_error  ?>
                </div>
                
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <?php 
                  echo form_reset(['id' => 'reset', 'value' => 'Reset' , 'class' => 'btn btn-danger']), 
                       form_submit(['id' => 'submit', 'value' => 'Submit' , 'class' => 'btn btn-primary']); 
                 ?>
              </div>
            <?php echo form_close(); ?>
          </div>
      </div>

      
      <!-- /.row -->
    </section>
  </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.7
    </div>
    <strong>Copyright &copy; 2017-2018 <a href="http://pickbee.com">Pickbee</a>.</strong> All rights
    reserved.
  </footer>

<div class="control-sidebar-bg"></div>
</div>


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

    <!-- /.content -->
  
  <!-- /.content-wrapper -->

<!-- ./wrapper -->

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
</body>
</html>
