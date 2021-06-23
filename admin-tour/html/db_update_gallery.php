<?php 
    require_once('includes/conn.php');
    $file[1] = isset($_FILES['img-1']) ? $_FILES['img-1'] : NULL;
    $file[2] = isset($_FILES['img-2']) ? $_FILES['img-2'] : NULL;
    $file[3] = isset($_FILES['img-3']) ? $_FILES['img-3'] : NULL;

    for($k=1; $k<=4 ;$k++){

        if ($file[$k]['name'] != NULL) {

            $index ='img-'.$k;
            $img_name = $_FILES[$index]['name'];
            $img_size = $_FILES[$index]['size'];
            $tmp_name = $_FILES[$index]['tmp_name'];
            $error = $_FILES[$index]['error'];

            if ($error === 0) {
                if ($img_size > 1000000) {
                    $em = "Sorry, your file is too large.";
                    echo "<script>";
                        echo "alert(\"$em\");"; 
                        echo "window.history.back()";
                    echo "</script>";
                }else {
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);

                    $allowed_exs = array("jpg", "jpeg", "png", "gif"); 

                    if (in_array($img_ex_lc, $allowed_exs)) {
                        $new_img_name = uniqid("PAC_IMG-", true).'.'.$img_ex_lc;
                        $img_upload_path = '../../uploads/packages/'.$new_img_name;
                        $result = move_uploaded_file($tmp_name, $img_upload_path);

                        if($result){
                            // Insert into Database
                            $IMG_PAC = 'uploads/packages/'.$new_img_name;
                            $sql = "INSERT INTO t_content (content_page,content_key,content_value) VALUES ('gallery', 'img_url', '$IMG_PAC')";
                            if(mysqli_query($conn, $sql)){
                                $em = "บันทึกรูปที่".$k."ข้อมูลสำเร็จ";
                                echo "<script>";
                                    echo "alert(\"$em\");"; 
                                    echo "window.location.href = 'manage_web_pages.php'";
                                echo "</script>";
                            } else {
                                $em = "unknown error occurred! [รูปที่ $k]";
                                echo "<script>";
                                    echo "alert(\"$em\");"; 
                                    echo "window.location.href = 'manage_web_pages.php'";
                                echo "</script>";
                            }
                        } else {
                            $em = "unknown error occurred! [รูปที่ $k]";
                            echo "<script>";
                                echo "alert(\"$em\");"; 
                                echo "window.location.href = 'manage_web_pages.php'";
                            echo "</script>";
                        }
                    }else {
                        $em = "You can't upload files of this type [รูปที่ $k]";
                            echo "<script>";
                                echo "alert(\"$em\");"; 
                                echo "window.location.href = 'manage_web_pages.php'";
                            echo "</script>";
                    }
                }
            }else {
                $em = "unknown error occurred![รูปที่ $k]";
                echo "<script>";
                    echo "alert(\"$em\");"; 
                    echo "window.location.href = 'manage_web_pages.php'";
                echo "</script>";
            }

        }
    }
?>
