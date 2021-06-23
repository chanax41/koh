<?php session_start();

        if(isset($_POST['username'])){
			//connection
            require_once('includes/conn.php');

			//รับค่า user & password
            $Username = $_POST['username'];
            $Password = md5($_POST['password']);
            
			    
            //query 
            $sql="SELECT * FROM t_user Where Email='".$Username."' and Password='".$Password."' ";
            $result = mysqli_query($conn,$sql);

            if(mysqli_num_rows($result)==1){
                $row = mysqli_fetch_array($result);
                if($row["Status"] != "DEL"){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php
                    echo "<script>";
                        echo "alert(\"ยินดีต้อนรับเข้าสู่ เกาะพะลวย \");"; 
                        echo "window.history.back()";
                    echo "</script>";
                    $_SESSION["login"] = 1;
                    $_SESSION["UserID"] = $row["Email"];
                    $_SESSION["User"] = $row["FirstName"];
                    $_SESSION["LastName"] = $row["LastName"];
                    $_SESSION["Status"] = $row["Status"];

                    if($_SESSION["Status"]=="admin"){ //ถ้าเป็น admin ให้กระโดดไปหน้า admin_page.php
                        Header("Location: admin-tour/html/index.php");
                    }

                    if($_SESSION["Status"]=="user"){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php
                        Header("Location: index.php");
                    }

                } else {
                    $_SESSION["login"] = 0;
                    echo "<script>";
                        echo "alert(\" บัญชีผู้ใช้ของถูกคุณลบไปแแล้ว\");"; 
                        echo "window.history.back()";
                    echo "</script>";
                }

            }else{
                    $_SESSION["login"] = 0;
                    echo "<script>";
                        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";
                  }
        }else{
            $_SESSION["login"] = 0;
        }
?>