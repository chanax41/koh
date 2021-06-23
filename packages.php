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
 
    <?php include('includes/header.php');?>
      
    <section class="banner banner-secondary" id="top" style="background-image: url(img/banner-image-3-1920x300.jpg);height: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>Packages</h2>
                        <h4>รายการเเพคเกจท่องเที่ยวเกาะพะลวย</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php //query packager
        require_once('includes/conn.php');
        mysqli_query($conn, "SET NAMES 'utf8'"); 
        
        $sql = 'SELECT * FROM t_package where Status = "ACTIVE"';
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

    <main>
        <section class="featured-places">
            <div class="container">
                <div class="row">
                <?php foreach ($rows as $value) { ?>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="featured-item">
                            <div class="thumb">
                                <div class="thumb-img">
                                    <img src="img/product-1-720x480.jpg" alt="">
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