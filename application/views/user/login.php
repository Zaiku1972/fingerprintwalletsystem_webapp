<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="<?php echo base_url().'assests/bootstrap/css/bootstrap.min.css'?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url().'assests/dist/css/AdminLTE.min.css'; ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url().'assests/dist/css/skins/_all-skins.min.css';?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url().'assests/plugins/iCheck/square/blue.css'?>">


</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
  <div class="wrapper">

    <?php include 'assests/menu/topnav.php'; ?>
    <!-- Full Width Column -->
    <div class="content-wrapper">
      <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="modal fade" id="Login_modal" tabindex="-1" role="dialog" aria-labelledby="Login_modalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="Login_modalLabel">Login Message</h4>
                </div>
                <div class="modal-body">
                  <?php
                    if(isset($error))
                    {
                      echo $error;
                    }
                  ?>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-dismiss="modal">Okay</button>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="login-box">
            <div class="login-logo">
              <a href="<?php echo base_url(); ?>"><b>Stud</b>COPS</a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
              <p class="login-box-msg">Sign in</p>
              <?php echo form_open('users/login#Login_modal'); ?>
                <div class="form-group has-feedback">
                  <input type="input" name = "phone_number" id="phone_number" onkeypress="return isNumber(event)" class="form-control" placeholder="Number" required>
                  <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                </div>
                <p id="test"></p>
                <div class="form-group has-feedback">
                  <input type="password" name = "password" id="password"  class="form-control" placeholder="Password" required>
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                  <div class="col-xs-8">
                    <div class="checkbox icheck">
                      <label>
                        <input type="checkbox">  Remember Me
                      </label>
                    </div>
                  </div><!-- /.col -->
                  <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                  </div><!-- /.col -->
                </div>
              </form>

              <!-- /.social-auth-links -->
              <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat">Forgot Password</a>
                <a href="<?php echo base_url().'users/register';?>" class="btn btn-block btn-social btn-google btn-flat">Register</a>
              </div>
            </div><!-- /.login-box-body -->
          </div>
        </section><!-- /.content -->
      </div><!-- /.container -->
    </div><!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="container">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </div><!-- /.container -->
    </footer>
  </div><!-- ./wrapper -->

  <!-- jQuery 2.1.4 -->
  <script src="<?php echo base_url().'assests/plugins/jQuery/jQuery-2.1.4.min.js'; ?>"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="<?php echo base_url().'assests/bootstrap/js/bootstrap.min.js'; ?>"></script>
  <!-- iCheck -->
  <script src="<?php echo base_url().'assests/plugins/iCheck/icheck.min.js'; ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url().'assests/plugins/slimScroll/jquery.slimscroll.min.js'; ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url().'assests/plugins/fastclick/fastclick.min.js'; ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url().'assests/dist/js/app.min.js';?> "></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url().'assests/dist/js/demo.js';?>"></script>

<!-- iCheck -->
<script src="<?php echo base_url().'assests/plugins/iCheck/icheck.min.js'; ?>"></script>

</body>
<script>
function isNumber(evt) {
   evt = (evt) ? evt : window.event;
   var charCode = (evt.which) ? evt.which : evt.keyCode;
   if (charCode > 31 && (charCode < 48 || charCode > 57)) {
       document.getElementById("test").innerHTML = "  Please enter only Numbers.  ";
       return false;
   }
   else{
     document.getElementById("test").innerHTML="  ";
     return true;
   }

}
</script>
<script>
$(function () {
  $('input').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square-blue',
    increaseArea: '20%' // optional
  });
});
</script>
<script>
$('#Login_modal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
</script>
<script>
$(document).ready(function() {
  if(window.location.href.indexOf('#Login_modal') != -1) {
  $('#Login_modal').modal('show');
}

});

</script>
