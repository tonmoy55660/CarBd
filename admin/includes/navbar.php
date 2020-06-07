</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>Carrental</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
		<!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a  class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?=$_SESSION['name']?></span>
            </a>
		        </li>

              <li class="user-footer">
                  <a href="logout.php" class="btn btn-success btn-flat">Sign out</a>
              </li>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <?php if(($_SESSION['role']) == 1){ ?>
        <li>
        <a href="dashboard">
          <i class="fa fa-th"></i> <span>Reports</span>
        </a>
      </li>
        <li>
        <a href="registration_request">
          <i class="fa fa-th"></i> <span>Register Request</span>
        </a>
      </li>
    <?php }else{ ?>
		 <li>
          <a href="booking_details">
            <i class="fa fa-dashboard"></i> <span>All Bookings </span>
          </a>
        </li>

		      <li>
          <a href="viewRent">
            <i class="fa fa-th"></i> <span>Your Renting Cars</span>
          </a>
        </li>
      <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
