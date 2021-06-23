<?php session_start();
    // Create database connection
    if (isset($_FILES['my_image'])) {
        require_once('includes/conn.php');

        $img_name = $_FILES['my_image']['name'];
        $img_size = $_FILES['my_image']['size'];
        $tmp_name = $_FILES['my_image']['tmp_name'];
        $error = $_FILES['my_image']['error'];
    
        if ($error === 0) {
            if ($img_size > 125000) {
                $em = "Sorry, your file is too large.";
                header("Location: index.php?error=$em");
            }else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
    
                $allowed_exs = array("jpg", "jpeg", "png", "gif"); 
    
                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                    $img_upload_path = 'uploads/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
    
                    // Insert into Database
                    $sql = "UPDATE t_booking
                            SET Proof_of_payment = '$img_upload_path'
                            WHERE Email='".$_SESSION['UserID']."' and Name_tour ='".$_POST['Name_pac']."'and ID = ".$_POST['ID']."";
                    echo $sql;
                    if(mysqli_query($conn, $sql)){
                        echo "<img src='".$img_upload_path."'>";
                    } else {
                        $em = "unknown error occurred!";
                        header("Location: upload_payment.php?error=$em&".$_POST['Name_pac']."&ID=".$_POST['ID']);
                    }

                }else {
                    $em = "You can't upload files of this type";
                    header("Location: upload_payment.php?error=$em&".$_POST['Name_pac']."&ID=".$_POST['ID']);
                }
            }
        }else {
            $em = "unknown error occurred!";
            header("Location: upload_payment.php?error=$em&".$_POST['Name_pac']."&ID=".$_POST['ID']);
        }
    
    }else {
        header("Location: upload_payment.php?Name_pac=".$_POST['Name_pac']."&ID=".$_POST['ID']);
    }
?>