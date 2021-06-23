<?php 
    require_once('includes/conn.php');
    mysqli_query($conn, "SET NAMES 'utf8'");

        $about = $_POST['about'];
        $img_url = isset($_FILES['img']) ? $_FILES['img'] : NULL;
        
        $sql = "UPDATE t_content
                    SET content_value = '$about'
                    WHERE content_key = 'detail' and content_page = 'aboutus'
                ";
        if(mysqli_query($conn, $sql)){
            $em = "บันทึกข้อมูล about us สำเร็จ";
            echo "<script>";
                echo "alert(\"$em\");"; 
                echo "window.location.href = 'manage_web_pages.php'";
            echo "</script>";
        }
        
        if ($img_url != NULL) {
            $img_name = $_FILES['img']['name'];
            $img_size = $_FILES['img']['size'];
            $tmp_name = $_FILES['img']['tmp_name'];
            $error = $_FILES['img']['error'];
        
            if ($error === 0) {
                if ($img_size > 400000) {
                    $em = "Sorry, your file is too large.";
                    echo "<script>";
                        echo "alert(\"$em\");"; 
                        echo "window.location.href = 'manage_web_pages.php'";
                    echo "</script>";
                }else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
        
                    $allowed_exs = array("jpg", "jpeg", "png", "gif"); 
        
                    if (in_array($img_ex_lc, $allowed_exs)) {
                        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                        $img_upload_path = '../../uploads/'.$new_img_name;
                        $result = move_uploaded_file($tmp_name, $img_upload_path);
                        if($result){
                            $img = "uploads/".$new_img_name;
                            // Insert into Database
                            $sql = "UPDATE t_content
                                        SET content_value = '$img'
                                        WHERE content_key = 'img_url' and content_page = 'aboutus'
                                    ";
                            if(mysqli_query($conn, $sql)){
                                $em = "บันทึกข้อมูลรูปภาพสำเร็จ";
                                echo "<script>";
                                    echo "alert(\"$em\");"; 
                                    echo "window.location.href = 'manage_web_pages.php'";
                                echo "</script>";
                            } else {
                                $em = "unknown error occurred!";
                                echo "<script>";
                                    echo "alert(\"$em\");"; 
                                    echo "window.location.href = 'manage_web_pages.php'";
                                echo "</script>";
                            }
                        } else {
                            $em = "unknown error occurred!";
                            echo "<script>";
                                echo "alert(\"$em\");"; 
                                echo "window.location.href = 'manage_web_pages.php'";
                            echo "</script>";
                        }
        
                    }else {
                        $em = "You can't upload files of this type";
                        echo "<script>";
                            echo "alert(\"$em\");"; 
                            echo "window.location.href = 'manage_web_pages.php'";
                        echo "</script>";
                    }
                }
            }else {
                $em = "unknown error occurred!";
                echo "<script>";
                    echo "alert(\"$em\");"; 
                    echo "window.location.href = 'manage_web_pages.php'";
                echo "</script>";
            }
        }

?>
