        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                            <!-- dark Logo text -->
                            <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item hidden-sm-up"> <a class="nav-link nav-toggler waves-effect waves-light"
                                href="javascript:void(0)"><i class="ti-menu"></i></a></li>
                        <!-- ============================================================== -->
                        
                    </ul>
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href=""
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="../assets/images/users/1.jpg" alt="user" class="img-circle" width="30"></a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <div class="d-flex no-block nav-text-box align-items-center">
                <span><img src="../assets/images/logo-icon.png" alt="elegant admin template"></span>
                <a class="waves-effect waves-dark ml-auto hidden-sm-down" href="javascript:void(0)"><i
                        class="ti-menu"></i></a>
                <a class="nav-toggler waves-effect waves-dark ml-auto hidden-sm-up" href="javascript:void(0)"><i
                        class="ti-menu ti-close"></i></a>
            </div>
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="index.php" aria-expanded="false">
                            <i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="manage_user.php" aria-expanded="false">
                            <i class="fa fa-user-circle-o"></i><span class="hide-menu">จัดการข้อมูลสมาชิก</span></a></li>
                        <li> <a class="waves-effect waves-dark" href="manage_pack.php" aria-expanded="false">
                            <i class="fa fa-table"></i><span class="hide-menu"></span>จัดการข้อมูลเเพ็คเกจทัวร์</a></li>
                         <li> <a class="waves-effect waves-dark" href="map-google.php" aria-expanded="false">
                            <i class="fa fa-calendar-o"></i><span class="hide-menu"></span>จัดการข้อมูลการจอง</a></li>
                        <li> <a class="waves-effect waves-dark" href="manage_web_pages.php" aria-expanded="false">
                            <i class="fa fa-pencil"></i><span class="hide-menu"></span>จัดการข้อมูลหน้าเว็บ</a></li>
                        <div class="text-center m-t-30">
                            <a href="../../logout.php"
                                class="btn waves-effect waves-light btn-success hidden-md-down"> ออกจากระบบ </a>
                        </div>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>