<?php require_once('check.php');?>
<?php
$submit = isset($_GET['name']) ? $_GET['name']: NULL;
if($submit != NULL){
    require_once('includes/conn.php');
    mysqli_query($conn, "SET NAMES 'utf8'");

    $Name = $_GET['name'];
    $sql = "SELECT * FROM t_package WHERE Name = '$Name'";
    // Check connection
    $result = mysqli_query($conn, $sql);

    if($result){
        if ($result->num_rows > 0) {
            // output data of each row
            $rows = array();
            while($r = mysqli_fetch_assoc($result)) {
                $rows[] = $r;
            }
            $obj = json_encode($rows);
            $json_decoded = json_decode($obj);
            foreach($json_decoded as $val){
                $ID = $val->ID;
                $name = $val->Name;
                $price = $val->Price;
                $description = $val->Description;
                $time = $val->Time;
                $position = $val->Position;
            }
        } else {
            echo "<script>";
                echo "alert(\"ข้อมูลไม่ถูกต้อง \");"; 
                echo "window.location.href = 'manage_pack.php'";
            echo "</script>";
        }
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
                                <h3>Information</h3>
                                <form class="form-horizontal form-material" action="" method="POST">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">ชื่อเเพคเกจทัวร์</label>
                                            <input type="hidden" class="form-control" name="ID" value="<?php echo $ID;?>">
                                            <input type="text" class="form-control" name="name" value="<?php echo $name;?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">ราคา (บาท)</label>
                                            <input type="number" class="form-control" name="price" value="<?php echo $price;?>">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">ระยะเวลา</label>
                                            <input type="text" class="form-control" name="time" value="<?php echo $time;?>">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">ตำเเหน่ง</label>
                                            <input type="text" class="form-control" name="position" value="<?php echo $position;?>">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="inputEmail4">รายละเอียด</label>
                                            <textarea class="form-control" rows="3" name="description" value="<?php echo $description;?>"><?php echo $description;?></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" name="submit2" value="submit" class="btn btn-primary float-right">บันทึกข้อมูล</button>
                                </form> 
                            </div>
                        </div>
                        
                        <?php 
                        require_once('includes/conn.php');
                        
                        if($submit != NULL){
                            require_once('includes/conn.php');
                            mysqli_query($conn, "SET NAMES 'utf8'");
                        
                            $Name = $_GET['name'];
                            $sql = "SELECT meta_value FROM t_package_meta WHERE Name = '$Name' AND meta_key ='img_pack'";
                            // Check connection
                            $result = mysqli_query($conn, $sql);
                            if($result){
                                
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    $rows = array();
                                    while($r = mysqli_fetch_assoc($result)) {
                                        $rows[] = $r;
                                    }
                                    $obj = json_encode($rows);
                                    
                                } else {
                                    $obj = NULL;
                                }
                            } 
                        } ?>
                        <?php
                        if($result->num_rows >0){
                            $json_decoded = json_decode($obj);
                            $i= 0;
                            foreach($json_decoded as $val){
                                if ($i == 8) {
                                    break;    
                                } else {
                                    $img_path[$i] = $val->meta_value;
                                    $i++;
                                }
                            
                            }
                        ?>
                            <div class="card">
                                <div class="card-body">
                                    <h5>รูปที่อัปโหลดแล้ว [<?php echo $result->num_rows;?>]</h5>
                                    <div class="row">
                                        <?php for($j = 0; $j < $result->num_rows; $j++){
                                            if ($j == 6) {
                                                break;    
                                            } else {
                                                echo '<div class="col-lg-4">
                                                        <center><img src="../../'.$img_path[$j].'" width = 60%></center>
                                                    </div>';
                                            }
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        <?php 
                        }
                        ?>
                    </div>
                    <!-- Column -->
                
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="modal-title">
                                    <h4>อัปโหลดรูปภาพ</h4>
                                </div>
                                <form method="POST" action="" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <input type="hidden" class="form-control" name="name" value="<?php echo $name;?>">
                                            <input type="file" class="form-control" name="img-1">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="file" class="form-control" name="img-2">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="file" class="form-control" name="img-3">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <input type="file" class="form-control" name="img-4">
                                        </div>
                                        
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-success float-right"><i class="fa fa-plus-circle"></i> Upload Photo</button>
                                </form>
                                <br><br>
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

<?php 

    require_once('includes/conn.php');
    $file[1] = isset($_FILES['img-1']) ? $_FILES['img-1'] : NULL;
    $file[2] = isset($_FILES['img-2']) ? $_FILES['img-2'] : NULL;
    $file[3] = isset($_FILES['img-3']) ? $_FILES['img-3'] : NULL;
    $file[4] = isset($_FILES['img-4']) ? $_FILES['img-4'] : NULL;
    $file[5] = isset($_FILES['img-5']) ? $_FILES['img-5'] : NULL;
    $file[6] = isset($_FILES['img-6']) ? $_FILES['img-6'] : NULL;
    $file[7] = isset($_FILES['img-7']) ? $_FILES['img-7'] : NULL;
    $file[8] = isset($_FILES['img-8']) ? $_FILES['img-8'] : NULL;
    $Name = isset($_POST['name']) ? $_POST['name'] : NULL;

    for($k=1; $k<=4 ;$k++){

        if ($file[$k]['name'] != NULL && $Name != NULL) {

            $Name=$_POST['name'];
            $index ='img-'.$k;
            $img_name = $_FILES[$index]['name'];
            $img_size = $_FILES[$index]['size'];
            $tmp_name = $_FILES[$index]['tmp_name'];
            $error = $_FILES[$index]['error'];

            if ($error === 0) {
                if ($img_size > 300000) {
                    $em = "Sorry, your file is too large.";
                    echo "<script>";
                        echo "alert(\"$em\");"; 
                        echo "window.history.back()";
                    echo "</script>";
                }else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);

                    $allowed_exs = array("jpg", "jpeg", "png", "gif"); 

                    if (in_array($img_ex_lc, $allowed_exs)) {
                        $new_img_name = uniqid("PAC_IMG-", true).'.'.$img_ex_lc;
                        $img_upload_path = '../../uploads/packages/'.$new_img_name;
                        $result = move_uploaded_file($tmp_name, $img_upload_path);
                        if($result){
                            // Insert into Database
                            $IMG_PAC = 'uploads/packages/'.$new_img_name;
                            $sql = "INSERT INTO t_package_meta (Name, meta_key, meta_value) VALUES ('$Name', 'img_pack', '$IMG_PAC')";
                            if(mysqli_query($conn, $sql)){
                                $em = "บันทึกรูปที่".$k."ข้อมูลสำเร็จ";
                                echo "<script>";
                                    echo "alert(\"$em\");"; 
                                    echo "window.history.back()";
                                echo "</script>";
                            } else {
                                $em = "unknown error occurred! [รูปที่ $k]";
                                echo "<script>";
                                    echo "alert(\"$em\");"; 
                                    echo "window.history.back()";
                                echo "</script>";
                            }
                        } else {
                            $em = "unknown error occurred! [รูปที่ $k]";
                            echo "<script>";
                                echo "alert(\"$em\");"; 
                                echo "window.history.back()";
                            echo "</script>";
                        }
                    }else {
                        $em = "You can't upload files of this type [รูปที่ $k]";
                            echo "<script>";
                                echo "alert(\"$em\");"; 
                                echo "window.history.back()";
                            echo "</script>";
                    }
                }
            }else {
                $em = "unknown error occurred![รูปที่ $k]";
                echo "<script>";
                    echo "alert(\"$em\");"; 
                    echo "window.history.back()";
                echo "</script>";
            }

        }
    }
?>

<?php
$ID = isset($_POST['ID']) ? $_POST['ID']: NULL;
$submit2 = isset($_POST['submit2']) ? $_POST['submit2']: NULL;
if($ID != NULL && $submit2 != NULL){
    require_once('includes/conn.php');
    mysqli_query($conn, "SET NAMES 'utf8'");
    $ID = $_POST['ID'];
    $Name = $_POST['name'];
    $Price = $_POST['price'];
    $Position = $_POST['position'];
    $Description = $_POST['description'];
    $Time = $_POST['time'];
    $Status = 'ACTIVE';

    $sql = "UPDATE t_package 
                SET Name = '$Name',
                Price = $Price,
                Position = '$Position',
                Description = '$Description',
                Time = '$Time',
                Status = '$Status'
            WHERE ID = $ID;
    ";
    // Check connection
    $result = mysqli_query($conn, $sql);
    
    if($result){
        $old_name = $_GET['name'];
        if($old_name != $Name){
            $sql = "UPDATE t_package_meta SET Name ='$Name' WHERE  Name = '$old_name'";
            // Check connection
            $result = mysqli_query($conn, $sql);
        }
            echo "<script>";
                echo "alert(\"แก้ไขข้อมูลสำเร็จ\");"; 
                echo "window.location.href = 'manage_pack.php'";
            echo "</script>";
    } else {
        echo "<script>";
        echo "alert(\"แก้ไขข้อมูล ไม่ สำเร็จ\");"; 
        echo "window.location.href = 'manage_pack.php'";
    echo "</script>";
	} 
}