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
                        <h4 class="text-themecolor">ส่วนจัดการข้อมูลการจองเเพคเกจ</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">ส่วนจัดการข้อมูลการจองเเพคเกจ</li>
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address_User</th>
                                        <th>Amount</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <th>Booking_date</th>
                                        <th>Last_date_payment</th>
                                        <th>Status_payment</th>
                                        <th>Proof_of_payment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        require_once('proof_popup.php');
                                        require_once('db_manage_booking.php');
                                    if($obj != NULL){
                                        $json_decoded = json_decode($obj);
                                        foreach($json_decoded as $val){
                                    ?>
                                        <tr>
                                            
                                        
                                            <td><?php echo $val->ID; ?></td>
                                            <td><?php echo $val->Name; ?></td>
                                            <td><?php echo $val->Email; ?></td>
                                            <td><?php echo $val->Address_user;?></td>
                                            <td><?php echo $val->Amount;?></td>
                                            <td><?php echo $val->Price;?></td>
                                            <td><?php echo $val->Price * $val->Amount;?></td>
                                            <td><center><?php echo $val->Booking_date; ?></td></center>
                                            <td><center><?php echo $val->Last_date_payment;?></td></center>
                                            <td><center>
                                            <?php 
                                                if($val->Status_payment === '0'){
                                                    echo '<p class="text-danger">ยังไม่ชำระเงิน </p>';
                                                }
                                                if($val->Status_payment === '1'){
                                                    echo '<p class="text-warning">ตรวจสอบหลักฐาน </p>';
                                                }
                                                if($val->Status_payment === '2'){
                                                    echo '<p class="text-success">ชำระเงินเเล้ว </p>';
                                                }
                                                if($val->Status_payment === 'DEL'){
                                                    echo '<p class="text-success">ยกเลิกเเล้ว </p>';
                                                }
                                                if($val->Status_payment === '3'){
                                                    echo '<p class="text-success">หลักฐานไม่ถูกต้อง </p>';
                                                }
   
                                            ?>
                                            </td></center>
                                            
                                            <td><center>
                                                <?php if( $val->Proof_of_payment != ' ') { ?>
                                                    <img src="<?php echo "../../".$val->Proof_of_payment;?>" id="myImg<?php echo $val->ID;?>" width=15%> 
                                                    <a class="btn btn-primary btn-sm" href="update_staus_pay.php?id=<?php echo $val->ID; ?>">Update </a>
                                                    <?php echo '<script>
                                                        // Get the modal
                                                        var modal = document.getElementById("myModal");

                                                        // Get the image and insert it inside the modal - use its "alt" text as a caption
                                                        var img = document.getElementById("myImg'.$val->ID.'");
                                                        var modalImg = document.getElementById("img01");
                                                        var captionText = document.getElementById("caption");
                                                        img.onclick = function(){
                                                        modal.style.display = "block";
                                                        modalImg.src = this.src;
                                                        captionText.innerHTML = this.alt;
                                                        }
                                                        </script>';  
                                                    ?>
                                                <?php } else { echo "N/A";}?>
                                            </center></td>
                                        </tr>
                                    <?php 
                                        }
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address_User</th>
                                        <th>Amount</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <th>Booking_date</th>
                                        <th>Last_date_payment</th>
                                        <th>Status_payment</th>
                                        <th>Proof_of_payment</th>
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

<script>
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>
