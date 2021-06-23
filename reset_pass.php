<?php 
$Username = $_POST['email'];
$check_email = $_POST['email2'];
if($Username == $check_email){
    //connection
    require_once('includes/conn.php');
    
    //check email status
    $sql = "SELECT Email
                FROM t_user 
                WHERE Email = '$Username'";
    $result = mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($result)==1){

        $sql = "SELECT Email
                FROM t_user_meta
                WHERE meta_key = 'reset_verify_code' and Email = '$Username'";
        $result = mysqli_query($conn,$sql);

        
            $email_receiver = $Username;
            $digit_verify = md5(random_int(100000, 999999));
            $meta_key = 'reset_verify_code';
        if(mysqli_num_rows($result) == 0){   
            // prepare and bind
            $sql = "INSERT INTO t_user_meta (ID, Email, meta_key, meta_value) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("isss", $ID, $email_receiver, $meta_key, $digit_verify);
            $stmt->execute();

        } else {
            $sql = "UPDATE t_user_meta SET meta_value = '$digit_verify'
                WHERE meta_key = 'reset_verify_code' and Email = '$Username'";
            if(mysqli_query($conn,$sql)){
                echo "<script>";
                    echo "alert(\"เราไม่พบ E-mail ที่คุณกรอก กรุณากรอกใหม่อีกครั้งค่ะ\");"; 
                    echo "window.history.back()";
                echo "</script>";
            }
        }

            if($stmt->error == NULL ){ 
                require_once('email/config_email.php');
                $subject = 'เปลี่ยนรหัสผ่าน';
                $mail->Subject = $subject;
                $mail->addAddress($email_receiver);

                $link_verify = $_SERVER['HTTP_HOST']."/reset_verify.php?email=$email_receiver&code=$digit_verify";
                $email_content = "
                    <!DOCTYPE html>
                    <html>
                        <head>
                            <meta charset=utf-8'/>
                            <title>ทดสอบการส่ง Email</title>
                        </head>
                        <body>
                            <h1 style='background: #3b434c;padding: 10px 0 20px 10px;margin-bottom:10px;font-size:30px;color:white;' >
                                <img src='https://cms.dmpcdn.com/travel/2020/04/14/734c2e30-7e4f-11ea-a85e-972275699d5e_original.jpg' style='width: 200px;'>
                                หนีโซเชียลเที่ยวเกาะพะลวย
                            </h1>
                            <div style='padding:20px;'>
                                <div style='text-align:center;margin-bottom:50px;'>
                                    <img src='img/footer.jpg' style='width:100%' />					
                                </div>
                                <div>				
                                    <h2>การกู้รหัสผ่าน สำหรับ Apple : <strong style='color:#0000ff;'></strong></h2>
                                    <a href='$link_verify' target='_blank'>
                                        <h1><strong style='color:#3c83f9;'> >> กรุณาคลิ๊กที่นี่ เพื่อตั้งรหัสผ่านใหม่<< </strong> </h1>
                                        $link_verify
                                    </a>
                                </div>
                                <div style='margin-top:30px;'>
                                    <hr>
                                    <address>
                                        <h4>ติดต่อสอบถาม</h4>
                                        <p>KohPhaluay Thailand</p>
                                        <p>เกาะพะลวย.com</p>
                                    </address>
                                </div>
                            </div>
                            <div style='background: #3b434c;color: #a2abb7;padding:30px;'>
                                <div style='text-align:center'> 
                                    2016 © KohPhaluay Thailand
                                </div>
                            </div>
                        </body>
                    </html>
                ";

                //  ถ้ามี email ผู้รับ
                if($email_receiver){
                    
                    $mail->msgHTML($email_content);
                    if (!$mail->send()) {  // สั่งให้ส่ง email
                        // กรณีส่ง email ไม่สำเร็จ
                        Header("Location: reg_not_sus.php");
                    }else{
                        // กรณีส่ง email สำเร็จ
                        Header("Location: reg_sus.php");
                    }	
                }
            } else {
                Header("Location: reg_not_sus.php");
            }

    } else {
       Header("Location: reg_not_sus.php");
    }
    
} else {
    echo "<script>";
        echo "alert(\"เราไม่พบ E-mail ที่คุณกรอก กรุณากรอกใหม่อีกครั้งค่ะ\");"; 
        echo "window.history.back()";
    echo "</script>";
}

?>