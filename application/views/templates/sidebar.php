<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">

      <div class="info">
        <a href="#" class="d-block"><?php echo $_SESSION['passed_user_name']; ?></a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="<?php echo base_url(); ?>portal/home" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard

            </p>
          </a>

        </li>
        <li class="nav-header">APPOINTMENT SECTION</li>
        <li class="nav-item">
          <a href="<?php echo base_url(); ?>appointment/" class="nav-link">
          <i class="fas fa-circle nav-icon"></i>
            <p>
            Appointment
             
            </p>
          </a>
          
        </li>
        <li class="nav-header">CUSTOMER SECTION</li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>customer/index" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Customer Search</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>customer/register" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Customer Register</p>
            </a>
          </li>
          <li class="nav-header">USER SECTION</li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>user/register" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>User Registration</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>user/changePassword" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Password Recovery</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url(); ?>user/edit" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>User Changes</p>
            </a>
          </li>
          <li class="nav-header">SYSTEM SETUP</li>
        
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>setup/sections" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Section</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>setup/services" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Service</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url(); ?>setup/groups" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Groups</p>
              </a>
            </li>


        


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>