<?php session_start();
    if(isset($_GET['code']) && isset($_GET['email'])){
        //connection
        require_once('includes/conn.php');

        //รับค่า
        $code_verify = $_GET['code'];
        $email = $_GET['email'];
            
        //query 
        $sql="SELECT * FROM t_user_meta
                WHERE meta_key ='reset_verify_code' and meta_value ='$code_verify' and Email = '$email'";

        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)==1){
            Header("Location: edit_pass.php?email=$email");
        }else{
            $_SESSION["login"] = 0;
            echo "<script>";
                echo "alert(\"Verify code ไม่ถูกต้อง\");"; 
                echo "window.history.back()";
            echo "</script>";
        }

    }else{
        echo "<script>";
            echo "alert(\"คุณกรอกข้อมูลไม่ถูกต้อง กรุณากรอกใหม่อีกครั้งค่ะ\");"; 
            echo "window.history.back()";
        echo "</script>";
    }
?>