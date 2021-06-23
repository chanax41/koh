<?php 
$Username = isset($_POST['email']) ? $_POST['email']:NULL;
if($Username != NULL){
    //connection
    require_once('includes/conn.php');
    //รับค่า user & password
    $Password = strval(md5($_POST['password']));
    $P2 = strval(md5($_POST['psw-repeat']));

    if($Password != $P2){
        echo "<script>";
            echo "alert(\"Password ไม่ตรงกัน กรุณากรอกใหม่อีกครั้งค่ะ\");"; 
            echo "window.history.back()";
        echo "</script>";
    }
    $firstname = strval($_POST['firstname']);
    $lastname = strval($_POST['surname']);
    $create_date = strval(date("Y-m-d"));
    $status = "user";
    $ID = 0;
    //query 
    // prepare and bind
    $sql = "INSERT INTO t_user (ID, Firstname, Lastname, Email, Password, Create_date, Status) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issssss", $ID, $firstname, $lastname, $Username, $Password, $create_date, $status);
    $stmt->execute();
    if($stmt->error != NULL){
        echo "<script>";
        echo "alert(\"เพิ่มผู้ใช่ไม่สำเร็จ มีผู้ใช้อีเมล์นีเเล้ว\");"; 
        echo "window.history.back()";
    echo "</script>";
    } else {

        // prepare and bind
        $meta_key = 'email_status';
        $meta_value = 'NON-ACTIVE';
        $sql = "INSERT INTO t_user_meta (ID, Email, meta_key, meta_value) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isss", $ID, $Username, $meta_key, $meta_value);
        $stmt->execute();

        if($stmt->error == NULL){

            $digit_verify = md5(random_int(100000, 999999));
            $meta_key = 'verify_code';
            // prepare and bind
            $sql = "INSERT INTO t_user_meta (ID, Email, meta_key, meta_value) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("isss", $ID, $Username, $meta_key, $digit_verify);
            $stmt->execute();

            $email_receiver = $Username;
            if($stmt->error == NULL){ 
                require_once('../../email/config_email.php');
                $mail->Username = $gmail_username;
                $mail->Password = $gmail_password;
                $mail->setFrom($email_sender, $sender);
                $mail->addAddress($email_receiver);
                $mail->Subject = $subject;

                $link_verify = "localhost/tour/verify.php?email=$email_receiver&code=$digit_verify";
                $email_content = "
                    <!DOCTYPE html>
                    <html>
                        <head>
                            <meta charset=utf-8'/>
                            <title>ทดสอบการส่ง Email</title>
                        </head>
                        <body>
                            <h1 style='background: #3b434c;padding: 10px 0 20px 10px;margin-bottom:10px;font-size:30px;color:white;' >
                                <img src='https://comrad.co.nz/wp-content/uploads/2017/04/verify-logo-300x111.png' style='width: 200px;'>
                                หนีโซเชียลเที่ยวเกาะพะลวย
                            </h1>
                            <div style='padding:20px;'>
                                <div style='text-align:center;margin-bottom:50px;'>
                                    <img src='http://cdn.wccftech.com/wp-content/uploads/2017/02/Apple-logo.jpg' style='width:100%' />					
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
                                        <p>Apple Thailand</p>
                                        <p>www.facebook.com/apple</p>
                                    </address>
                                </div>
                            </div>
                            <div style='background: #3b434c;color: #a2abb7;padding:30px;'>
                                <div style='text-align:center'> 
                                    2016 © Apple Thailand
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
                        echo "<script>";
                            echo "alert(\"เพิ่มผู้ใช่ไม่สำเร็จ กรุณากรอกใหม่อีกครั้งค่ะ\");"; 
                            echo "window.history.back()";
                        echo "</script>";
                    }else{
                        // กรณีส่ง email สำเร็จ
                        echo "<script>";
                            echo "alert(\"ยินดีด้วย เพิ่มผู้ใช่สำเร็จเเล้ว\");"; 
                            echo "window.history.back()";
                        echo "</script>";
                    }	
                }

            } else {
                echo "<script>";
                            echo "alert(\"เพิ่มผู้ใช่ไม่สำเร็จ กรุณากรอกใหม่อีกครั้งค่ะ\");"; 
                            echo "window.history.back()";
                        echo "</script>";
            
            }        
        }
    } 
    $stmt->close();

}else{

    echo "<script>";
        echo "alert(\"คุณกรอกข้อมูลไม่ถูกต้อง กรุณากรอกใหม่อีกครั้งค่ะ\");"; 
        echo "window.history.back()";
    echo "</script>";
}
?>