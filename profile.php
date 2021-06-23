<?php require_once('./check.php');

if($_SESSION["login"] == 0){
    Header("Location: index.php");
}
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
        <title>หนีโซเชียวเที่วเกาะพะลวย</title>
        
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
                        <h2>Profile</h2>
                        <h4>ข้อมูลส่วนตัว</h4>
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
                                    <form action="add_user.php" method="post">
                                        <h1>ข้อมูลส่วนตัว</h1>
                                        <p>Please fill in this form to create an account.</p>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="email"><b>ชื่อ (ไม่ต้องมีคำนำหน้า) </b></label>
                                                <input class="form-control" type="text" value=<?php echo $rows[0]['FirstName'];?> name="firstname" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="email"><b>นามสกุล </b></label>
                                                <input class="form-control" type="text" value=<?php echo $rows[0]['LastName'];?> name="surname" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="email"><b>E-mail </b></label>
                                                <input class="form-control" type="text" value=<?php echo $rows[0]['Email'];?> name="email" readonly>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="email"><b>ยืนยัน E-mail</b></label>
                                                <input class="form-control" type="text" value=<?php echo $rows[0]['Email'];?> name="email2" readonly>
                                            </div>
                                        </div>

                                        <hr>
                                        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
                                        <a class="btn btn-success btn-sm" href="edit_profile.php"> แก้ไขข้อมูลผู้ใช้ </a>
                                        <a class="btn btn-danger btn-sm" href="delete_profile.php" onclick='return checkdelete()'> ลบบัญชีผู้ใช้ </a>

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

<script type="text/javascript">
  function checkdelete()
  {
    return confirm('Are you  sure you want to Delete this record');
  }
</script>