<?php require_once('check.php');?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, AdminWrap lite admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, Elegant admin lite design, Elegant admin lite dashboard bootstrap 4 dashboard template">
    <meta name="description"
        content="Elegant Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>E-Phaluai admin</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/elegant-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href=".../assets/images/favicon.png">
    <!-- Custom CSS -->
    <link href="./dist/css/style.css" rel="stylesheet">
    <!-- page css -->
    <link href="./dist/css/pages/google-vector-map.css" rel="stylesheet">

    <link rel = "stylesheet" type ="text/css" href ="plugin/dataTables/css/jquery.dataTables.min.css">
    <link rel = "stylesheet" type ="text/css" href ="plugin/dataTables/css/buttons.dataTables.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="skin-default-dark fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">E-Phaluai admin</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php include('includes/navbar.php');?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">ส่วนจัดการหน้าเว็บเพจ</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">ส่วนจัดการหน้าเว็บเพจ</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <?php include('pr_popup.php');?>
                <?php include('about_us_popup.php');?>
                <?php include('team_popup.php');?>
                <?php include('contact_popup.php');?>
                <?php include('gallery_popup.php');?>
                <?php include('payment_popup.php');?>
                <div class="row">
                  <div class="col-12">
                    <div class="card">
                      <div class="card-body">
                        <br><br>    
                        <div class="table-responsive">
                            <table id="myTable" class="display nowrap" style="width:100%" class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>หน้าเว็บ</th>
                                        <th class="text-right">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>หน้าเเรก</td>
                                            <td class="text-right">
                                                <a class="btn btn-primary" href="../../index.php" target="_blank"> View </a> 
                                                <a class="btn btn-success" href="update_index.php"><i class="fa fa-plus-circle"></i>  Update </a> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>ประชาสัมพันธ์</td>
                                            <td class="text-right">
                                                <a class="btn btn-primary" href="../../blog-details.php" target="_blank"> View </a>
                                                <a class="btn btn-success" href="#myModal" data-toggle="modal" role="button"><i class="fa fa-plus-circle"></i> Update</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>เกี่ยวกับฉัน</td>
                                            <td class="text-right">
                                                <a class="btn btn-primary" href="../../about-us.php" target="_blank"> View </a>
                                                <a class="btn btn-success" href="#myModal_about" data-toggle="modal" role="button"><i class="fa fa-plus-circle"></i>  Update </a> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>ทีมของเรา</td>
                                            <td class="text-right">
                                                <a class="btn btn-primary" href="../../terms.php" target="_blank"> View </a>
                                                <a class="btn btn-success" href="#myModal_team" data-toggle="modal" role="button"><i class="fa fa-plus-circle"></i>  Update </a> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>ช่องทางติดต่อ</td>
                                            <td class="text-right">
                                            <a class="btn btn-primary" href="../../contact.php" target="_blank"> View </a>
                                                <a class="btn btn-success" href="#myModal_contact" data-toggle="modal" role="button"><i class="fa fa-plus-circle"></i>  Update </a> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>หน้า Gallery</td>
                                            <td class="text-right">
                                            <a class="btn btn-primary" href="../../testimonials.php" target="_blank"> View </a>
                                                <a class="btn btn-success" href="#myModal_gallery" data-toggle="modal" role="button"><i class="fa fa-plus-circle"></i>  Update </a> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>7</td>
                                            <td>หน้าวิธีการชำระเงิน</td>
                                            <td class="text-right">
                                            <a class="btn btn-primary" href="../../upload_payment_preview.php" target="_blank"> View </a>
                                                <a class="btn btn-success" href="#myModal_payment" data-toggle="modal" role="button"><i class="fa fa-plus-circle"></i>  Update </a> 
                                            </td>
                                        </tr>
                                        
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>หน้าเว็บ</th>
                                        <th class="text-right">ACTION</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © 2021 E-Phaluai Admin by <a href="">CHANAX</a>
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/node_modules/popper/popper.min.js"></script>
    <script src="../assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>

</body>
</body>

</html>
<script type="application/javascript" src="plugin/dataTables/js/jquery-3.3.1.js"></script>
<script type="application/javascript" src="plugin/dataTables/js/jquery.dataTables.min.js"></script>
<script type="application/javascript" src="plugin/dataTables/js/dataTables.buttons.min.js"></script>
<script type="application/javascript" src="plugin/dataTables/js/buttons.flash.min.js"></script>
<script type="application/javascript" src="plugin/dataTables/js/jszip.min.js"></script>
<script type="application/javascript" src="plugin/dataTables/js/pdfmake.min.js"></script>
<script type="application/javascript" src="plugin/dataTables/js/vfs_fonts.js"></script>
<script type="application/javascript" src="plugin/dataTables/js/buttons.html5.min.js"></script>
<script type="application/javascript" src="plugin/dataTables/js/buttons.print.min.js"></script>
<!--Datatable -->

<script language="javascript">
$(document).ready(function() {
    $('#myTable').DataTable( {

        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );

    
} );
</script>
<!------------------------ ยืนยันการลบ --------------------------->
<script type="text/javascript">
  function checkdelete()
  {
    return confirm('Are you  sure you want to Delete this record');
  }
</script>