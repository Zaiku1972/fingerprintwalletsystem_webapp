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

  <link rel="stylesheet" href="<?php echo base_url().'assests/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css';?>">
  <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }
    .example-modal .modal {
      background: transparent !important;
    }
</style>

</head><!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
  <div class="wrapper">

    <?php include 'assests/menu/topnav.php'; ?>
    <!-- Full Width Column -->
    <div class="content-wrapper">
      <div class="container">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="modal fade" id="contact_us_modal" tabindex="-1" role="dialog" aria-labelledby="contact_us_modalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="contact_usLabel">Contact Us Message</h4>
                </div>
                <div class="modal-body">
                  <?php
                    if(isset($contact_status))
                    {
                      echo $contact_status;
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
          <?php echo form_open('info/contact_us#contact_us_modal'); ?>
          <div class="example-modal">
            <div class="modal">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="box-header">
                    <i class="fa fa-envelope"></i>
                    <h3 class="box-title">Contact Us</h3>
                  </div>
                  <div class="modal-body">
                    <form action="#" method="post">
                      <div class="form-group">
                        <input type="email" id="email_id" name="email_id" class="form-control" name="emailto" placeholder="Your Email" required>
                      </div>
                      <div class="form-group">
                        <input type="text" id="subject" name="subject" class="form-control" name="subject" placeholder="Subject" required>
                      </div>
                      <div>
                        <textarea class="textarea" id="message" name="message" placeholder="Message ,Not more Than 500 Words" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" required></textarea>
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" value="sendEmail" name="submit" class="pull-right btn btn-default">Send <i class="fa fa-arrow-circle-right"></i></button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
          </div><!-- /.example-modal -->
          </form>
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

<script src="<?php echo base_url().'assests/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js';?>"></script>
</body>
<script>
$('#contact_us_modal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})
</script>
<script>
$(document).ready(function() {
  if(window.location.href.indexOf('#contact_us_modal') != -1) {
  $('#contact_us_modal').modal('show');
}

});

</script>
