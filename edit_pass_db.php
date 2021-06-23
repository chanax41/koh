<?php
    if(isset($_POST['password']) && isset($_POST['psw-repeat'])){
        $pass = md5($_POST['password']);
        $check_pass = md5($_POST['psw-repeat']);
        $email = $_POST['email'];
        if($pass==$check_pass){
            require_once('includes/conn.php');

            $sql = "UPDATE t_user SET Password = '$pass'
                WHERE Email = '$email'";
            
            if(mysqli_query($conn,$sql)){

                $sql="DELETE FROM t_user_meta
                        WHERE meta_key = 'reset_verify_code' and Email = '$email'";
                $result = mysqli_query($conn,$sql);

                Header("Location: reg_sus.php");
                
            } else {
                echo "<script>";
                    echo "alert(\"ข้อมูลไม่ถูกต้อง กรุณากรอกใหม่อีกครั้งค่ะ\");"; 
                    echo "window.history.back()";
                echo "</script>";
            }
        }
    }

?>