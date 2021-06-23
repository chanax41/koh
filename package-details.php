<?php require_once('./check.php');?>
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
 
    <?php 
      include('includes/header.php');
      require_once('includes/conn.php');
      mysqli_query($conn, "SET NAMES 'utf8'");
      if(!empty($_GET['name'])){

        $name = $_GET['name'];
        $sql = 'SELECT * FROM t_package where Status = "ACTIVE" and Name="'.$name.'" ORDER BY ID DESC ';
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
<?php 
  foreach ($rows as $value) {  
?>
    <section class="banner banner-secondary" id="top" style="background-image: url(img/banner-image-1-1920x300.jpg); height: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2><?php echo $name ?></h2>

                        <h4> <i class="fa fa-calendar"></i> <?php echo $value['Time'];?> &nbsp;&nbsp;  &nbsp;&nbsp; <i class="fa fa-plane"></i> <?php echo $value['Position'];?> </h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php 
      $sql = 'SELECT * FROM t_package_meta where meta_key = "img_pack" and Name="'.$name.'"';
      $result = mysqli_query($conn, $sql);
      if ($result->num_rows > 0) {
        // output data of each row
        $rows = array();
        $i =0;
        while($r = mysqli_fetch_assoc($result)) {
          $rows[] = $r;
          $img[] = $rows[$i]['meta_value'];
          $i++;
        }
      } else {
        $rows[]= NULL;
      } 
    ?>
    <main>
        <section class="featured-places">
            <div class="container">
               <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <div>
                      <img src="<?php echo $img[0];?>" alt="" class="img-responsive wc-image">
                    </div>
                    <br>
                  </div>

                  <div class="col-md-6 col-xs-12">
                    <h2><strong class="text-primary">ในราคาเพียง <?php echo $value['Price']?> บาท</strong></h2>

                    <h2><small><i class="fa fa-map-marker"></i>  <?php echo $value['Position'];?></small></h2>

                    <br>

                    <div class="row">
                      <?php 
                        foreach ($img as $item) {
                      ?>
                        <div class="col-sm-4 col-xs-6">
                          <div class="form-group">
                              <img src="<?php echo $item; ?>" alt="" class="img-responsive">
                          </div>
                        </div>
                      <?php
                          }
                      ?>
                    </div>
                  </div>
                </div>

                <form action="booking.php" method="post" class="form">
                    <div class="accordions">
                        <ul class="accordion">
                            <li>
                                <a class="accordion-trigger">Description</a>
                                
                                <div class="accordion-content">
                                    <p><?php echo $value['Description'];?></p>
                                    ระยะเวลา<p><?php echo $value['Time'];?></p>
                                    
                                    สถานที่<p><?php echo $value['Position'];?></p>
                                    
                                    ราคา<p><?php echo $value['Price']?> บาท</p> 
                                </div>
                            </li>
<?php 
  }
?>
                            <li>
                                <a class="accordion-trigger">Enquiry &amp; Contact Details</a>
                            
                                <div class="accordion-content">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                  <fieldset>
                                                    <div class="col-md-6">
                                                      <label for="firstname"><b>ชื่อ </b></label>
                                                      <input class="form-control" type="text" value="<?php echo $_SESSION['User']; ?>" name="firstname" readonly>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="surname"><b>นามสกุล </b></label>
                                                        <input class="form-control" type="text" value="<?php echo $_SESSION['LastName']; ?>" name="surname" readonly>
                                                    </div>
                                                  </fieldset>
                                                </div>

                                                <div class="col-sm-12">
                                                  <div class="col-sm-6">
                                                    <fieldset>
                                                      <label for="email"><b>E-mail </b></label>
                                                      <input name="email" type="email" class="form-control" value="<?php echo $_SESSION['UserID']; ?>"" placeholder="E-mail" readonly>
                                                    </fieldset>
                                                  </div>

                                                  <div class="col-sm-6">
                                                    <fieldset>
                                                      <label for="phone"><b>หมายเลขโทรศัพท์ </b></label>
                                                      <input name="phone" type="text" class="form-control" id="phone" placeholder="Phone" required="">
                                                    </fieldset>
                                                  </div>
                                                </div>

                                                <div class="col-sm-12">
                                                  <div class="col-sm-6">
                                                    <fieldset>
                                                    <label for="date"><b>วันที่ต้องการจอง </b></label>
                                                      <input name="date" type="date" class="form-control" id="date1" placeholder="From 16.06.2020" required="">
                                                      <input name="Name_tour" type="hidden" class="form-control" value="<?php echo $name; ?>" required="">
                                                    </fieldset>
                                                  </div>

                                                  <div class="col-lg-6">
                                                    <fieldset>
                                                      <label for="Amount"><b>จำนวน </b></label>
                                                      <input name="Amount" type="number"class="form-control"  placeholder="0" required="">
                                                    </fieldset>
                                                  </div>

                                                  <div class="col-lg-12">
                                                    <fieldset>
                                                      <label for="Address"><b>ที่อยู่ที่สามารถติดต่อได้ </b></label>
                                                      <textarea name="Address" class="form-control" id="message" placeholder="Address" required=""></textarea>
                                                    </fieldset>
                                                  </div>
                                                  
                                                </div>
                                                <div class="col-lg-12">
                                                  <div class="col-lg-12">
                                                    <p style="text-align: right">By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
                                                    <div class="blue-button">

                                                      <?php 
                                                        if($_SESSION["login"] == 0){
                                                          echo'<a href="#myModal" data-toggle="modal"><span class="glyphicon glyphicon-log-in"></span> เข้าสู่ระบบ</a>';
                                                        } else {
                                                          echo '<button type="submit" class="btn btn-lg btn-success pull-right"> Send Request</button>';
                                                        }
                                                      ?>
                                                      
                                                    </div>
                                                  </div>
                                                </div>   
                                            </div>
                                        </div>
                                        <?php 
                                            require_once('includes/conn.php');
                                            mysqli_query($conn, "SET NAMES 'utf8'");
                                            
                                            $sql = "SELECT content_key,content_value FROM t_content  WHERE content_page = 'promote'";
                                            // Check connection
                                            $result = mysqli_query($conn, $sql);

                                            if (empty($result)){
                                              die("Connection failed: ".$conn->error);
                                                  echo "<script>";
                                                      echo "alert(\"ข้อมูลไม่ถูกต้อง \");"; 
                                                      echo "window.location.href = 'manage_web_pages.php'";
                                                  echo "</script>";
                                            } else if ($result->num_rows > 0) {
                                                // output data of each row
                                                $rows = array();
                                                while($r = mysqli_fetch_assoc($result)) {
                                                    $rows[] = $r;
                                                }
                                                $img_url_book = $rows[2]['content_value'];
                                            } 
                                        ?>
                                        <div class="col-lg-4">
                                          <center>
                                            <h3>ประชาสัมพันธ์</h3>
                                            <img src="<?php echo $img_url_book; ?>"  width="480" >
                                          </center>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul> <!-- / accordion -->
                    </div>
                </form>
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