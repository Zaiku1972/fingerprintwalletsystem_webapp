<header class="main-header">
  <!-- Logo -->
  <a href="<?php echo base_url(); ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>S</b>C</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Stud</b>COPS</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
<?php
     if(isset($_SESSION['u_level']) && $_SESSION['u_level'] ==2)
      {
            echo '<span class="icon-bar">'."Admin".'</span>';
      }
?>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo $_SESSION['profile_link']; ?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $_SESSION['name']; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="<?php echo $_SESSION['profile_link']; ?>" class="img-circle" alt="User Image">
              <p>
                <?php echo $_SESSION['name']; ?>
                <small>Member since April 2016</small>
              </p>
            </li>
            <li class="user-body">
                Account Balance:<?php echo $_SESSION['acc_bal']; ?>
            </li>
            <?php
              $url=$_SERVER['REQUEST_URI'];
              $iparr = explode("/", $url);
              $web=base_url().$iparr[2];
              $web2=base_url().'hp_admin';
              $web0='http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
              $web3=base_url().'news/create';
              $web4=base_url().'news/edit_news';
                  if(isset($_SESSION['u_level']) && $_SESSION['u_level'] == 2 && ($web != $web2)  && (($web0 != $web3) && ($web0 != $web4))){
                  echo'<li class="user-body">'.
                      '<a href="'.base_url().'hp_admin/dash_board'.'" class="btn btn-default btn-flat">Admin Panel</a>
                      </li>';
                  }else if(isset($_SESSION['u_level']) && $_SESSION['u_level'] == 2 && ($web == $web2) || ($web0 == $web3) || ($web0 == $web4)){
                      echo'<li class="user-body">'.
                      '<a href="'.base_url().'" class="btn btn-default btn-flat">Main Website</a>
                      </li>';
                    }
            ?>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="<?php echo base_url().'users/profile';?>" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <a href="<?php echo base_url().'users/logout';?>" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
