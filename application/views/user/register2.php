<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Register</title>
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


</head><!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
  <div class="wrapper">

    <?php include 'assests/menu/topnav.php'; ?>
    <!-- Full Width Column -->
    <div class="content-wrapper">
      <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="modal fade" id="reg2_modal" tabindex="-1" role="dialog" aria-labelledby="reg2_modalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="reg2_modalLabel">Register Message</h4>
                </div>
                <div class="modal-body">
                  <?php
                    if(isset($message))
                    {
                      echo "Email Already Exists";
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
          <div class="register-box">
            <div class="register-logo">
              <a href="<?php echo base_url(); ?>"><b>Stud</b>COPS</a>
            </div>

            <div class="register-box-body">
              <p class="login-box-msg">Register for web Portal Access</p>
               <?php echo form_open('users/register2#reg2_modal');?>
               <div class="form-group has-feedback">
                 <input type="text" id="name" name="name"class="form-control" placeholder="Name" required/>
                 <span class="glyphicon glyphicon-user form-control-feedback"></span>
               </div>
               <div class="form-group has-feedback">
                 <input type="email" id="email" name="email" class="form-control" placeholder="Email" required/>
                 <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
               </div>
               <div class="form-group">
                 <input type="input" class="form-control" placeholder="<?php echo $_SESSION['num'];?>" disabled>
               </div>

               <div class="row">
                 <div class="col-xs-8">
                   <p id="test"></p>
                 </div>
               </div>
                <div class="row">
                  <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                  </div><!-- /.col -->
                </div>
              </form>
            </div><!-- /.form-box -->
          </div><!-- /.register-box -->

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

</body>
<script>
$('#reg2_modal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
</script>
<script>
$(document).ready(function() {

  if(window.location.href.indexOf('#reg2_modal') != -1) {
  $('#reg2_modal').modal('show');
}

});
</script>
