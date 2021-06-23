<?php require_once('./check.php');
if($_SESSION["login"] == 0){
    Header("Location: index.php");
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
                        <h2>Travel Package List</h2>
                        <h4>รายการเเพคเกจท่องเที่ยว</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section class="featured-places">
            <div class="container-fluid">
                <h2>รายการเเพคเกจท่องเที่ยว</h2>
                    <div class="table-responsive">
                        <table id="myTable" style="width:100%" class="table">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อเเพคเกจ</th>
                                        <th>ราคา</th>
                                        <th>จำนวน</th>
                                        <th>ระยะเวลา</th>
                                        <th>วันที่จอง</th>
                                        <th>เงินที่ต้องชำระ</th>
                                        <th>ชำระเงินภายใน</th>
                                        <th>สถานะ</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require_once('db_user_manage_booking.php');
                                    if($obj != NULL){
                                        $json_decoded = json_decode($obj);
                                        foreach($json_decoded as $val){
                                    ?>
                                        <tr>
                                        <td><?php echo $val->ID; ?></td>
                                        <td><?php echo '<a href="package-details.php?name='.$val->Name.'"><p class="text-primary">'.$val->Name.'<p>'; ?></td>
                                        <td><?php echo '<p class="text-info">'. $val->Price.' บาท <p>'; ?></td>
                                        <td><?php echo '<p class="text-info">'. $val->Amount.'<p>'; ?></td>
                                        <td><?php echo '<p class="text-info">'. $val->Time.'<p>'; ?></td>
                                        <td><?php echo '<p class="text-info">'. $val->Booking_date.'<p>'; ?></td>
                                        <td><?php echo '<p class="text-info">'. $val->Amount * $val->Price.' บาท <p>'; ?></td>
                                        <td><?php echo '<p class="text-info">'. $val->Last_date_payment.'<p>'; ?></td>
                                        <td>
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
                                    
                                        </td>
                                        <td>
                                        <?php if($val->Status_payment === '0' || $val->Status_payment === '1' || $val->Status_payment === '3'){ ?>
                                            <a class="btn btn-success btn-sm" href="upload_payment.php?Name_pac=<?php echo $val->Name; ?>&ID=<?php echo $val->ID; ?>"> Upload หลักฐาน </a> 
                                            <a class="btn btn-danger btn-sm" href="cancel_pac.php?Name_pac=<?php echo $val->Name; ?>&ID=<?php echo $val->ID; ?>" onclick='return checkdelete()'> Cancel </a>
                                        <?php }?>
                                        </td>
                                        
                                        </tr>
                                    <?php 
                                        }
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ชื่อเเพคเกจ</th>
                                        <th>ราคา</th>
                                        <th>จำนวน</th>
                                        <th>ระยะเวลา</th>
                                        <th>วันที่จอง</th>
                                        <th>เงินที่ต้องชำระ</th>
                                        <th>ชำระเงินภายใน</th>
                                        <th>สถานะ</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                        </table>
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