<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <ul class="sidebar-menu">
      <li class="header">Menu</li>
      <li class="active">
        <a href="<?php echo base_url().'hp_admin/dash_board'; ?>">
          <i class="fa fa-dashboard"></i> <span>Admin Dashboard</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-newspaper-o"></i>
          <span>News</span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo base_url().'news/create'; ?>"><i class="fa fa-circle-o"></i> Add News</a></li>
          <li><a href="<?php echo base_url().'news/edit_news';?>"><i class="fa fa-circle-o"></i> Edit/Delete</a></li>
        </ul>
      </li>
      <li>
        <a href="<?php echo base_url().'hp_admin/edit_team'; ?>">
          <i class="fa  fa-users"></i> <span>Team Members</span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url().'hp_admin/message'; ?>">
          <i class="fa fa-envelope"></i> <span>Message's</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
