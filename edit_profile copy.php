<?php require_once('./check.php');

if($_SESSION["login"] == 0){
    Header("Location: index.php");
}
$submit = isset($_POST['email']) ? $_POST['email'] :NULL;
if($submit && $_SESSION["UserID"]!=NULL){
    //connection
    require_once('includes/conn.php');
    //รับค่า user & password
    
    $Password = strval(md5($_POST['password']));
    $P2 = strval(md5($_POST['psw-repeat']));
    if($Password != $P2){
        echo "<script>";
            echo "alert(\"Password ไม่ตรงกัน กรุณากรอกใหม่อีกครั้งค่ะ\");"; 
            echo "window.history.back()";
        echo "</script>";
    }

    $firstname = strval($_POST['firstname']);
    $lastname = strval($_POST['surname']);
    $create_date = strval(date("Y-m-d"));
    $status = "user";
    $ID = 0;
    //query 
    $sql = "UPDATE t_user
                SET FirstName = '$firstname', LastName = '$lastname', Password = '$Password', Create_date = '$create_date'
                WHERE Email = '".$_SESSION['UserID']."'";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "<script>";
            echo "alert(\"เเก้ไขข้อมูลสำเร็จ\");"; 
        echo "</script>";
        Header("Location: profile.php");
    }
}
?>

<?php 
    require_once('includes/conn.php');
    mysqli_query($conn, "SET NAMES 'utf8'");
    if(!empty($_SESSION["UserID"])){

        $sql = 'SELECT * FROM t_user where Email = "'.$_SESSION["UserID"].'"';
        $result = mysqli_query($conn, $sql);
        $count = $result->num_rows;
        if ($result->num_rows > 0) {
        // output data of each row
            $rows = array();
            while($r = mysqli_fetch_assoc($result)) {
                $rows[] = $r;
            }
        } else {
            $rows[]= NULL;
        } 

    } else {
        echo "<script>";
            echo "alert(\"ไม่มีข้อมูลที่คุณต้องการ\");"; 
            echo "window.history.back()";
        echo "</script>";
        exit(0);
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>PHPJabbers.com | Free Travel Agency Website Template</title>
        
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/hero-slider.css">
        <link rel="stylesheet" href="css/owl-carousel.css">
        <link rel="stylesheet" href="css/style.css">
        
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@700&display=swap" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>

<body>
 
    <?php include('includes/header.php');?>
      
    <section class="banner banner-secondary" id="top" style="background-image: url(img/banner-image-1-1920x300.jpg); height: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>Edit Profile</h2>
                        <h4>แก้ไขข้อมูลส่วนตัว</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section class="popular-places">
        <div class="container">
            <div class="container">
                <div class="contact-content">
                    <div class="row">
                        <div class="col-md-12"> 
                            <div class="left-content">
                                <div class="row">
                                    <form action="" method="post">
                                        <h1>แก้ไขข้อมูลส่วนตัว</h1>
                                        <p>Please fill in this form to create an account.</p>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="email"><b>ชื่อ (ไม่ต้องมีคำนำหน้า) </b></label>
                                                <input class="form-control" type="text" value=<?php echo $rows[0]['FirstName'];?> name="firstname" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="email"><b>นามสกุล </b></label>
                                                <input class="form-control" type="text" value=<?php echo $rows[0]['LastName'];?> name="surname" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="email"><b>E-mail </b></label>
                                                <input class="form-control" type="text" value=<?php echo $rows[0]['Email'];?> name="email" resdonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="email"><b>ยืนยัน E-mail</b></label>
                                                <input class="form-control" type="text" value=<?php echo $rows[0]['Email'];?> name="email2" resdonly>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="psw"><b>Password</b></label>
                                                <input class="form-control" type="password" placeholder="Enter Password" name="password"  required>      
                                            </div>
                                            <div class="col-md-6">
                                                <label for="psw-repeat"><b>Repeat Password</b></label>
                                                <input class="form-control" type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
                                            </div>
                                        </div>

                                        <hr>
                                        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
                                        <button class="btn btn-primary btn-sm" type="submit" class="registerbtn"> บันทึกข้อมูล </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>      
                </div>
            </div>
        </div>    
        </section>
    </main>

    <?php include('includes/footer.php');?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>
    
    <script src="js/datepicker.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>
</html>