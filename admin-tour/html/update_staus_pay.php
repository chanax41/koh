<?php require_once('check.php');?>
<?php 
    isset($_GET['id']) ? $_GET['id'] : NULL;
    if($_GET['id'] != NULL){
        require_once('includes/conn.php');
        mysqli_query($conn, "SET NAMES 'utf8'");
    
        $sql = "SELECT
                    t_booking.ID,
                    t_booking.Email,
                    t_booking.Address_user,
                    t_package.Name,
                    t_package.Price,
                    t_package.Time,
                    t_booking.Amount,
                    t_booking.Booking_date,
                    t_booking.Last_date_payment,
                    t_booking.Proof_of_payment,
                    t_booking.Status_payment
                FROM t_booking
                JOIN t_package
                    ON t_package.Name = t_booking.Name_tour
                WHERE t_booking.ID = ".$_GET['id']."
                Order By t_booking.ID DESC";
    
        // Check connection
        $result = mysqli_query($conn, $sql);
    
        if (empty($result)){
            die("Connection failed: ".$conn->error);
        } 

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

        $sql = "SELECT FirstName, LastName FROM t_user
                WHERE Email = '".$rows[0]['Email']."'";
        // Check connection
        $result2 = mysqli_query($conn, $sql);
        if ($result2->num_rows > 0) {
            // output data of each row
            $rows2 = array();
            while($r = mysqli_fetch_assoc($result2)) {
                $rows2[] = $r;
            }
            $firstname = $rows2[0]['FirstName'];
            $lastname = $rows2[0]['LastName'];
        }

    } else {
        echo "<script>";
            echo "alert(\"ไม่มีสิทธ์เข้าถึงหน้านี้\");"; 
            echo "window.history.back()";
        echo "</script>";
    }
    
?>
<!DOCTYPE html>
<?php include('includes/header.php');?>
<body class="skin-default-dark fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elegant admin</p>
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
                            <button type="button" class="btn btn-success d-none d-lg-block m-l-15"> Upgrade To
                                Pro</button>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->

                <?php
                    if($obj != NULL){
                        $json_decoded = json_decode($obj);
                        foreach($json_decoded as $val){  ?>                                       
                                            
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <center><h4>หลักฐานการชำระเงิน</h4></center>
                                            <div class="col-lg-12">
                                                <img src="<?php echo "../../".$val->Proof_of_payment;?>" id="myImg<?php echo $val->ID;?>" width=100%>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-9">
                                    <div class="card">
                                        <div class="card-body">
                                            <form class="form-horizontal form-material" action="db_update_status_pay.php" method='POST'>
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">ID</label>
                                                        <input type="text" class="form-control" name="id" value=<?php echo $val->ID; ?> readonly>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="inputPassword4">ชื่อเเพคเกจทัวร์</label>
                                                        <input type="text" class="form-control" name="name_pac" value=<?php echo $val->Name; ?> readonly>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">ชื่อ</label>
                                                        <input type="email" class="form-control" name="firstname" value=<?php echo $firstname; ?> readonly>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">นามสกุล</label>
                                                        <input type="text" class="form-control" name="surname" value=<?php echo $lastname;?> readonly>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">Email</label>
                                                        <input type="email" class="form-control" name="email" value=<?php echo $val->Email; ?> readonly>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">ที่อยู่</label>
                                                        <input type="text" class="form-control" name="address" value=<?php echo $val->Address_user;?> readonly>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4">จำนวน</label>
                                                        <input type="text" class="form-control" name="Amount" value=<?php echo $val->Amount;?> readonly>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4">ราคา</label>
                                                        <input type="text" class="form-control" name="Price" value=<?php echo $val->Price;?> readonly>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4">ราคาสุทธิ</label>
                                                        <input type="text" class="form-control" name="total" value=<?php echo $val->Price * $val->Amount;?> readonly>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">วันที่ต้องการจอง</label>
                                                        <input type="date" class="form-control" name="Booking_date" value=<?php echo $val->Booking_date; ?> readonly>
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4">วันสุดท้ายของการโอนเงิน</label>
                                                        <input type="date" class="form-control" name="Last_date_payment" value=<?php echo $val->Last_date_payment;?> readonly>
                                                    </div>
                                                </div>

                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label> User Level</label>
                                                        <div class="col-sm-12">
                                                            <select class="form-control" name='proof'>
                                                                <option value='not_pass'>ไม่ผ่าน</option>
                                                                <option value='pass'>ผ่านการตรวจสอบ</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                <button type="submit" class="btn btn-primary">บันทึกการตรวจสอบ</button> 
                                                </div>
                                            </form>
                                        </div>    
                                    </div>       
                                </div>
                            </div>
                <?php   
                        }
                    } ?>
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
            © 2020 Elegent Admin by <a href="https://www.wrappixel.com/">wrappixel.com</a>
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