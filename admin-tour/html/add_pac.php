<?php require_once('check.php');?>
<?php
$submit = isset($_POST['name']) ? $_POST['name']: NULL;
if($submit != NULL){
    require_once('includes/conn.php');
    mysqli_query($conn, "SET NAMES 'utf8'");
    $ID = 0;
    $Name = $_POST['name'];
    $Price = $_POST['price'];
    $Position = $_POST['position'];
    $Description = $_POST['description'];
    $Time = $_POST['time'];
    $Status = 'ACTIVE';

    $sql = "INSERT INTO t_package (ID, Name, Price, Position, Description, Time, Status) 
                VALUES ($ID, '$Name', $Price, '$Position', '$Description', '$Time', '$Status' )";
    // Check connection
    $result = mysqli_query($conn, $sql);

    if($result){
        echo "<script>";
            echo "alert(\"บันทึกข้อมูลสำเร็จ\");"; 
        echo "</script>";

        Header("Location: update_pac.php?name=$Name");
    }

	if (empty($result)){
		echo "<script>";
            echo "alert(\"บันทึกข้อมูล ไม่ สำเร็จ\");"; 
            echo "window.history.back()";
        echo "</script>";
	} 
}
?>
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
                        <h4 class="text-themecolor">Blank Page</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Blank Page</li>
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
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Tab panes -->
                            <div class="card-body">
                                <form class="form-horizontal form-material" action='' method='POST'>
                                    
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">ชื่อเเพคเกจทัวร์</label>
                                            <input type="text" class="form-control" name="name" placeholder="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">ราคา (บาท)</label>
                                            <input type="number" class="form-control" name="price" placeholder="ราคา">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">ระยะเวลา</label>
                                            <input type="text" class="form-control" name="time" placeholder="เช่น 2 วัน 1 คืน">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">ตำเเหน่ง</label>
                                            <input type="text" class="form-control" name="position" placeholder="เช่น อ่าวสองพี่น้อง">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4">รายละเอียด</label>
                                            <textarea class="form-control" rows="3" name="description" placeholder="เช่น กิจกรรมต่าง ๆ"> </textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" name="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" action='' method='POST'>
                                    <div class="form-group">
                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4">อัปโหลดรูปภาพ</label>
                                            <input type="file" class="form-control" name="position" placeholder="เช่น อ่าวสองพี่น้อง">
                                        </div>
                                        <button type="submit" name="submit-img" class="btn btn-primary">อัปโหลดรูป</button>
                                    </div>
                                </form>
                                <!-- <div class="row">
                                    <div class="col-lg-6">
                                        <img src="../assets/images/users/5.jpg" width = 100%>
                                    </div>
                                    <div class="col-lg-6">
                                        <img src="../assets/images/users/5.jpg" width = 100%>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                </div>
                <!-- Row -->
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
            © 2020 Elegent Admin by <a href="">CHANAX</a>
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


  $(function () {
            $(document).on('click', '.btn-add', function (e) {
                e.preventDefault();

                var controlForm = $('.controls:first'),
                    currentEntry = $(this).parents('.entry:first'),
                    newEntry = $(currentEntry.clone()).appendTo(controlForm);

                newEntry.find('input').val('');
                controlForm.find('.entry:not(:last) .btn-add')
                    .removeClass('btn-add').addClass('btn-remove')
                    .removeClass('btn-success').addClass('btn-danger')
                    .html('<span class="fa fa-trash"></span>');
            }).on('click', '.btn-remove', function (e) {
                $(this).parents('.entry:first').remove();

                e.preventDefault();
                return false;
            });
        });
</script>