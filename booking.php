<?php require_once('./check.php');

if($_SESSION["login"] == 1 && isset($_POST['email'])){
    //connection
    require_once('includes/conn.php');
    //รับค่า user & password
    $Username = $_POST['email'];
    $ID = 0;
    $Email = strval($_POST['email']);
    $Name_tour = strval($_POST['Name_tour']);
    $Address_user = strval($_POST['Address']);
    $Amount = $_POST['Amount'];
    $Booking_date = strval($_POST['date']);
    $Proof_of_payment = ' ';

    $today = date("Y-m-d");
    $date1 = str_replace('-', '/', $today);
    $Last_date_payment = date('Y-m-d',strtotime($date1 . "+7 days"));
    $Status_payment = '0';

    //query 
    // prepare and bind
    $sql = "INSERT INTO t_booking (ID, Name_tour, Email, Address_user, Amount, Booking_date, Proof_of_payment, Last_date_payment, Status_payment) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issssssss", $ID, $Name_tour, $Email, $Address_user, $Amount, $Booking_date, $Proof_of_payment, $Last_date_payment, $Status_payment);
    $stmt->execute();

    if($stmt->error == NULL){

        $email_receiver = $_SESSION["UserID"];
        if($stmt->error == NULL){ 
            require_once('email/config_email.php');
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


    $stmt->close();

}else{

    echo "<script>";
        echo "alert(\"คุณกรอกข้อมูลไม่ถูกต้อง กรุณากรอกใหม่อีกครั้งค่ะ\");"; 
        echo "window.history.back()";
    echo "</script>";
}
?>