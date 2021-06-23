<?php require_once('./check.php');?>
<?php 
    require_once('includes/conn.php');
    mysqli_query($conn, "SET NAMES 'utf8'");
    
    $sql = "SELECT content_key,content_value FROM t_content  WHERE content_page = 'index'";
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
        $about = $rows[0]['content_value'];
        $vdo_url = $rows[1]['content_value'];
        $img_url = $rows[2]['content_value'];
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
                    </div>
                </div>
            </div>
        </header>
    </div>
      
    <section class="banner" id="top" style="background-image: url(img/homepage.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>เกาะแห่งพลังงานสะอาด ต้นแบบของประเทศไทย</h2>
                        <div class="blue-button">
                            <a href="contact.php">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section class="our-services">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="left-content">
                            <br>
                            <h4>About us</h4>
                            <p><?php echo $about;?></p>
                            <div class="blue-button">
                                <a href="about-us.php">Discover More</a>
                            </div>

                            <br>
                        </div>
                    </div>
                    <div class="col-md-7">
                    <iframe width="100%" height="400" src="<?php echo $vdo_url;?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </section>

        <section class="featured-places">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <span>Packages</span>
                            <h2>แพคเกจท่องเที่ยว ที่เเนะนำในเกาะพะลวย</h2>
                        </div>
                    </div> 
                </div> 
                <?php //query packager
                    require_once('includes/conn.php');
                    mysqli_query($conn, "SET NAMES 'utf8'"); 
                    
                    $sql = 'SELECT * FROM t_package where Status = "ACTIVE" LIMIT 3';
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
                ?>
                <div class="row">
                <?php foreach ($rows as $value) { ?>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="featured-item">
                            <div class="thumb">
                                <div class="thumb-img">
                                    <?php 
                                        $sql = 'SELECT * FROM t_package_meta where meta_key = "img_pack" and Name="'.$name.'" ORDER BY ID DESC limit 2';
                                        $result2 = mysqli_query($conn, $sql);
                                        if ($result2->num_rows > 0) {
                                            // output data of each row
                                            $rows2 = array();
                                            $i =0;
                                            while($r = mysqli_fetch_assoc($result2)) {
                                            $rows2[] = $r;
                                            $img[] = $rows2[$i]['meta_value'];
                                            $i++;
                                            }
                                        } else {
                                            $rows2[]= NULL;
                                        } 
                                    ?>
                                    <?php echo $img[0];?>
                                    <img src="<?php echo $img[0];?>" alt="" class="img-responsive wc-image">
                                </div>

                                <div class="overlay-content">
                                    <strong title="Nights"><i class="fa fa-calendar"></i> <?php echo $value['Time']; ?></strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                    <strong title="Flight included"><i class="fa fa-plane"></i> <?php echo $value['Position']; ?></strong>
                                </div>
                            </div>

                            <div class="down-content">
                                <h4><?php echo $value['Name']; ?></h4>
                                    <?php 
                                    
                                       $len = strlen($value['Description']);
                                       if($len > 130){
                                            $value['Description'] = substr($value['Description'],0,127)."...";
                                       } 
                                    
                                    ?>
                                <p><?php echo $value['Description']; ?></p>

                                <p><span><strong><?php echo $value['Price']; ?> ฿</strong></p>

                                <div class="text-button">
                                    <a href="package-details.php?name=<?php echo $value['Name'];?>">View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </section>
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
                    echo "window.location.href = 'index.php'";
                echo "</script>";
            } else if ($result->num_rows > 0) {
                // output data of each row
                $rows = array();
                while($r = mysqli_fetch_assoc($result)) {
                    $rows[] = $r;
                }
                $img_url = $rows[0]['content_value'];
                $discription = $rows[1]['content_value'];
            } 
        ?>
        <section class="featured-places">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <span>ประชาสัมพันธ์</span>
                            <h2>นี่คื่อข่าวสารดี ๆ จากชุมชนเกาะพะลวย</h2>
                        </div>
                    </div> 
                </div> 
                <div class="row">
                    <div class="col-12">
                        <img src="<?php echo $img_url;?>" width="100%">
                        <center><h3><?php echo $discription ?> </h3></center>
                    </div>
                </div>
            </div>
        </section>

        <section id="video-container">
            <div class="video-overlay"></div>
            <div class="video-content">
                <div class="inner">
                      <div class="section-heading">
                          <span>Contact Us</span>
                          <h2>มีข้อสงสัย ติดต่อสอบถามได้ตลอด</h2>
                      </div>
                      <!-- Modal button -->

                      <div class="blue-button">
                        <a href="contact.php">Talk to us</a>
                      </div>
                </div>
            </div>
        </section>

        <section class="popular-places" id="popular">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <span>Gallery</span>
                            <h2>ประมวลภาพถ่ายในพื้นที่เกาะพะลวย</h2>
                        </div>
                    </div> 
                </div> 
                <?php 
                    require_once('includes/conn.php');
                    mysqli_query($conn, "SET NAMES 'utf8'");
                    
                    $sql = "SELECT ID,content_value FROM t_content  
                                WHERE content_page = 'gallery' 
                                ORDER BY ID DESC LIMIT 16
                            ";
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
                    } 
                ?>

                <div class="owl-carousel owl-theme">
                <?php 
                    foreach ($rows as $value) {
                ?>
                    <div class="item popular-item">
                        <div class="thumb">
                            <img src="<?php echo $value['content_value'] ;?>" alt="" style="max-height: 200px">
                            <div class="text-content">
                                <img src="<?php echo $value['content_value'] ;?>" alt="">
                            </div>
                            <div class="plus-button">
                                <a href="testimonials.php"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                ?>
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
