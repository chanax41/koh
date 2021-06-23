<?php require_once('./check.php');

if($_SESSION["login"] == 0){
    Header("Location: index.php");
}

require_once('includes/conn.php');
$file = isset($_FILES['my_image']) ? isset($_FILES['my_image']) : NULL;
if ($file != NULL) {
    

    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    if ($error === 0) {
        if ($img_size > 300000) {
            $em = "Sorry, your file is too large.";
            header("Location: upload_payment.php?error=$em&Name_pac=".$_POST['Name_pac']."&ID=".$_POST['ID']);
        }else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png", "gif"); 

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = 'uploads/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // Insert into Database
                $sql = "UPDATE t_booking
                        SET Proof_of_payment = '$img_upload_path', Status_payment = 1
                        WHERE Email='".$_SESSION['UserID']."' and Name_tour ='".$_POST['Name_pac']."'and ID = ".$_POST['ID']."";
                if(mysqli_query($conn, $sql)){
                    $em = "บันทึกข้อมูลสำเร็จ";
                    header("Location: upload_payment.php?error=$em&Name_pac=".$_POST['Name_pac']."&ID=".$_POST['ID']);
                } else {
                    $em = "unknown error occurred!";
                    header("Location: upload_payment.php?error=$em&Name_pac=".$_POST['Name_pac']."&ID=".$_POST['ID']);
                }

            }else {
                $em = "You can't upload files of this type";
                header("Location: upload_payment.php?error=$em&Name_pac=".$_POST['Name_pac']."&ID=".$_POST['ID']);
            }
        }
    }else {
        $em = "unknown error occurred!";
        header("Location: upload_payment.php?error=$em&Name_pac=".$_POST['Name_pac']."&ID=".$_POST['ID']);
    }

}

?>
<?php 
    require_once('includes/conn.php');
    mysqli_query($conn, "SET NAMES 'utf8'");
    
    $sql = "SELECT content_key,content_value FROM t_content  WHERE content_page = 'payment'";
    // Check connection
    $result = mysqli_query($conn, $sql);

    if (empty($result)){
		die("Connection failed: ".$conn->error);
        echo "<script>";
            echo "alert(\"ข้อมูลไม่ถูกต้อง \");"; 
            echo "window.location.href = 'index.php'";
        echo "</script>";
	} else if ($result->num_rows > 0) {
        // output data of each row
        $rows = array();
        while($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }
        $img_url = $rows[0]['content_value'];
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

        <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
        <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
        <style>
            .payment{
                display: flex;
			    justify-content: center;
			    align-items: center;
			    flex-wrap: wrap;
            }
            .payment img {
			    max-width: 70%;
                border: 10px solid transparent;
                padding: 15px;
		    }

        </style>
    </head>

<body>
 
    <?php include('includes/header.php');?>
      
    <section class="banner banner-secondary" id="top" style="background-image: url(img/banner-image-1-1920x300.jpg); height: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>Upload Proof of Payment</h2>
                        <h4>อัปโหลดหลักฐานการชำระเงิน</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section class="featured-places">
            <div class="container border border-primary rounded">

                <div class="container-fuil">
                <center><img src="<?php echo $img_url; ?>" width = 100%></center>
                </div>

                <?php if (isset($_GET['error'])): ?>
                        <div class="col-lg-12">
                            <center><h3><?php echo $_GET['error']; ?></h3><center>
                        </div>
                <?php endif ?>
                
                    <div class="col-lg-12">
                        <hr>
                    </div>
                    
                    <div id="payment" class="container d-flex justify-content-center border border-primary">
                        <div class="col-lg-6 border border-primary">
                            <form method="POST" action="" enctype="multipart/form-data">
                                <input type="hidden" name="size" value="1000000">
                                <input type="hidden" name="ID" value="<?php echo $_GET['ID']; ?>">
                                <input type="hidden" name="Name_pac" value="<?php echo $_GET['Name_pac']; ?>">
                                <div>
                                    <input class="form-control" id="files" type="file" name="my_image">
                                </div>
                                <div>
                                    <button class="btn btn-primary btn-sm" type="submit" name="upload">UPLOAD</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <?php 

                                $sql = "SELECT Proof_of_payment FROM t_booking 
                                        WHERE Email='".$_SESSION['UserID']."' and Name_tour ='".$_GET['Name_pac']."'and ID = ".$_GET['ID']."";
                                
                                $res = mysqli_query($conn,  $sql);
                                if (mysqli_num_rows($res) > 0) {
                                    while ($images = mysqli_fetch_assoc($res)) {  
                                    if(!empty($images)){ ?>
                                    <br>
                                        <div class="payment">
                                            <img id='payment' src="<?=$images['Proof_of_payment']?>">
                                        </div>
                                    
                            <?php } } }?>
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