<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tireduzz | UserLogin</title>
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


<div class="container">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Sign in User to continue to TiredBuzz</h1>

            <?php if($feedback = $this->session->flashdata('feedback')): 
                    $feedback_class = $this->session->flashdata('feedback_class');
                    ?>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="alert <?= $feedback_class ?> alert-dismissible" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                          </button>
                         <strong><?= $feedback ?></strong>
                        </div>
                      </div>
                    </div>
                  <?php endif; ?>

            <div class="account-wall">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">



                    <?php if($feedback = $this->session->flashdata('login_failed')):  ?>
                      <div class="row">
                        <div class="col-lg-12 ">
                          <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                            </button>
                            <strong><?= $feedback ?></strong>
                          </div>
                        </div>
                      </div>
                    <?php endif; ?>
                    
                    
                <?php echo form_open('UserLogin/user_login', ['role'=>'form' , 'class'=>'form-signin'] ); ?>
                  <?php echo form_input(['id' => 'email', 'name' => 'email' , 'class' => 'form-control' , 'placeholder' => 'Email' , 'value' => set_value('email') ]); ?>
                  <?php echo form_error('email');   ?>

                  <?php echo form_password(['id' => 'password', 'name' => 'password' , 'class' => 'form-control' , 'placeholder' => 'Password', 'type' => 'password' ]); ?>
                  <?php echo form_error('password'); ?>
                  
                  <?php echo form_submit(['id' => 'submit', 'value' => 'Submit' , 'class' => 'btn btn-lg btn-primary btn-block']);?>
                <?php form_close(); ?>
                <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                    Remember me
                </label>
                <a href="#" class="pull-right need-help">Need help? </a><span class="clearfix"></span>
                </form>
            </div>
            <a href="<?php echo base_url('Register');?>" class="text-center new-account">Create an account </a>
        </div>
    </div>
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


</body>
</html>
