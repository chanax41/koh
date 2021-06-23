<?php require_once('./check.php');?>
<?php 
    require_once('includes/conn.php');
    mysqli_query($conn, "SET NAMES 'utf8'");
    
    $sql = "SELECT ID,content_value FROM t_content  
				WHERE content_page = 'gallery' 
				ORDER BY ID DESC LIMIT 18
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
      
    <section class="banner banner-secondary" id="top" style="background-image: url(img/banner-image-3-1920x300.jpg); height: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>Gallery</h2>
                        <h4>ประมวลรูปภาพในเกาะพลวย</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>
        <section class="popular-places" id="popular">
            <div class="container">
                <div class="row">
                <?php 
                    foreach ($rows as $value) {
                ?>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="item popular-item">
                            <div class="thumb">
                                <div class="thumb-img">
                                    <img src="<?php echo $value['content_value'] ;?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                <?php
                    }
                ?>
                </div>
            </div>
        </section>

        <section id="video-container">
            <div class="video-overlay"></div>
            <div class="video-content">
                <div class="inner">
                      <div class="section-heading">
                          <span>Virgin Island Thailand</span>
                          <h2>'เกาะพะลวย'</h2>
                      </div>
                      <!-- Modal button -->

                      <div class="container">
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-1">
                                <p class="lead">แม้กลิ่นหอมของฤดูฝนกำลังจะผ่านไป ได้เวลาที่ท้องฟ้าคราม น้ำทะเลสีเทอควอยซ์ จะได้อวดความสวยชวนหลงใหล เผยให้เห็นเสน่ห์ของท้องทะเลอ่าวไทย และเรากำลังเดินทางสู่เกาะเล็กๆ ที่อยู่ระหว่างแผ่นดินสุราษฎร์กับเกาะสมุย ความน่าสนใจของเกาะนี้นอกจากเป็นเกาะต้นแบบด้านพลังงานทดแทนแห่งแรกของเมืองไทยแล้ว เกาะพะลวยยังคงเป็น “เกาะลับ” ของอ่าวไทยที่น้อยคนนักไปเยือน</p>

                                <div class="section-heading">
                                    <span>Credit : วิชชุ ชาญณรงค์ - onceinlife</span>
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