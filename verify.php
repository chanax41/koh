<?php session_start();
    if(isset($_GET['code']) && isset($_GET['email'])){
        //connection
        require_once('includes/conn.php');

        //รับค่า
        $code_verify = $_GET['code'];
        $email = $_GET['email'];
            
        //query 
        $sql="SELECT t_user.FirstName, t_user.LastName, t_user.Email, t_user.Password, 
                t_user.Create_date, t_user.Status ,t_user_meta.meta_value 
                FROM t_user_meta
                INNER JOIN t_user 
                ON t_user_meta.Email = t_user.Email
                WHERE meta_key='verify_code' and meta_value='$code_verify' and t_user.Email = '$email'";

        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)==1){

            $row = mysqli_fetch_array($result);
            $_SESSION["login"] = 1;
            $_SESSION["UserID"] = $row["Email"];
            $_SESSION["User"] = $row["FirstName"];
            $_SESSION["Status"] = $row["Status"];

            $sql="UPDATE t_user_meta
                    SET meta_value = 'ACTIVE'
                    WHERE meta_key = 'email_status' and Email = '$email'";
            $result = mysqli_query($conn,$sql);

            $sql="DELETE FROM t_user_meta
                    WHERE meta_key = 'verify_code' and Email = '$email'";
            $result = mysqli_query($conn,$sql);

            echo "<script>";
                echo "alert(\"ยินดีต้อนรับเข้าสู่ เกาะพะลวย \");"; 
                echo "window.history.back()";
            echo "</script>";

            Header("Location: verify_sus.php");

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