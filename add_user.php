<?php 
$Username = $_POST['email'];
$check_email = $_POST['email2'];
if($Username == $check_email){
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

    $digit_verify = md5(random_int(100000, 999999));
            
    $email_receiver = $Username;

    require_once('email/config_email.php');
    $subject = 'ยืนยันการลงทะเบียน';
    $mail->Subject = $subject;
    $mail->addAddress($email_receiver);
    $link_verify = $_SERVER['HTTP_HOST']."/verify.php?email=$email_receiver&code=$digit_verify";
    $email_content = "
                    <!DOCTYPE html>
                    <html>
                        <head>
                            <meta charset=utf-8'/>
                            <title>ยืนยันการสมัครสมาชิก</title>
                        </head>
                        <body>
                            <h1 style='background: #3b434c;padding: 10px 0 20px 10px;margin-bottom:10px;font-size:30px;color:white;' >
                                <img src='https://verif-y.com/wp-content/uploads/2020/07/Verif-y-logo.png' style='width: 200px;'>
                                หนีโซเชียลเที่ยวเกาะพะลวย
                            </h1>
                            <div style='padding:20px;'>
                                <div style='text-align:center;margin-bottom:50px;'>
                                    <img src='https://cms.dmpcdn.com/travel/2020/04/14/734c2e30-7e4f-11ea-a85e-972275699d5e_original.jpg' style='width:100%' />					
                                </div>
                                <div>				
                                    <h2>ยืนยันการสมัครสมาชิก : <strong style='color:#0000ff;'></strong></h2>
                                    <a href='$link_verify' target='_blank'>
                                        <h1><strong style='color:#3c83f9;'> >> กรุณาคลิ๊กที่นี่ เพื่อยืนยันการสมัครสมาชิก<< </strong> </h1>
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
                                    2021 © KohPhaluay  Thailand
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
            echo "ส่งเมล์ไม่สำเร็จ";
            echo $mail->msgHTML;
            Header("Location: reg_not_sus.php");
    	}else{
            // กรณีส่ง email สำเร็จ
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
                $meta_key = 'verify_code';
                // prepare and bind
                $sql = "INSERT INTO t_user_meta (ID, Email, meta_key, meta_value) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("isss", $ID, $Username, $meta_key, $digit_verify);
                $stmt->execute();
                Header("Location: reg_sus.php");
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