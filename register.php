<?php require_once('./check.php');?>
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
      
    <section class="banner banner-secondary" id="top" style="background-image: url(img/banner-image-3-1920x300.jpg); height: 200px;">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>Register Form</h2>
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
                                        <h1>สมัครสมาชิก</h1>
                                        <p>Please fill in this form to create an account.</p>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="email"><b>ชื่อ (ไม่ต้องมีคำนำหน้า) </b></label>
                                                <input class="form-control" type="text" placeholder="Enter First" name="firstname" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="email"><b>นามสกุล </b></label>
                                                <input class="form-control" type="text" placeholder="Enter Surname" name="surname" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="email"><b>E-mail </b></label>
                                                <input class="form-control" type="text" placeholder="Enter Email" name="email" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="email"><b>ยืนยัน E-mail</b></label>
                                                <input class="form-control" type="text" placeholder="Enter Email" name="email2" required>
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

                                        <button type="submit" class="registerbtn">Register</button>
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




