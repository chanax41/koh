    
    <div class="wrap">
        <header id="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <button id="primary-nav-button" type="button">Menu</button>
                        <a href="index.php"><div class="logo">
                            <img src="img/logo-2.png" alt="Venue Logo" style="width:265px">
                        </div></a>
                        
                        <nav id="primary-nav" class="dropdown cf">
                            <ul class="dropdown menu">
                                <li class='active'><a href="index.php">หน้าเเรก</a></li>

                                <li><a href="packages.php">แพคเกจท่องเที่ยว</a></li>

                                <li><a href="blog-details.php">ข่าวสารประชาสัมพันธ์</a></li>

                                <li>
                                    <a href="#">เกี่ยวกับฉัน </a>
                                    <ul class="sub-menu">
                                        <li><a href="about-us.php"><span class="glyphicon glyphicon-tree-deciduous"></span> เกี่ยวกับฉัน</a></li> 
                                        <li><a href="testimonials.php"><span class="glyphicon glyphicon-picture"></span> แกลเลอรี</a></li>
                                        <li><a href="terms.php"><span class="glyphicon glyphicon-user"></span> ทีมของเรา</a></li>
                                    </ul>
                                </li>

                                <li><a href="contact.php">ช่องทางติอต่อ</a></li>
                                <li>
                                    <?php 
                                        if($_SESSION["login"] == 1){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php
                                            echo '<a href="#"><img src="img/Avatar.png" width="40"></a>
                                                <ul class="sub-menu">
                                                    <li><a href="profile.php"><span class="glyphicon glyphicon-tree-deciduous"></span> โปรไฟล์</a></li> 
                                                    <li><a href="list_booking.php"><span class="glyphicon glyphicon-picture"></span> รายการจอง</a></li>';
                                        
                                                if($_SESSION["Status"] == 'admin'){
                                                    echo'<li><a href="admin-tour/html/index.php"><span class="glyphicon glyphicon-user"></span> หน้าผู้ดูแลระบบ</a></li>';
                                                }

                                                echo'<li><a href="logout.php"><span class="glyphicon glyphicon-user"></span> ออกจากระบบ</a></li>
                                                </ul>';
                                        } 
                                        if($_SESSION["login"] == 0){
                                            echo'<a href="#myModal" data-toggle="modal"><span class="glyphicon glyphicon-log-in"></span> เข้าสู่ระบบ</a>';
                                        }
                                        
                                    ?>
                                </li>
                            </ul>
                        </nav><!-- / #primary-nav -->
                    </div>
                </div>
            </div>
        </header>
    </div>
  
    <?php include('login-user.php');?>