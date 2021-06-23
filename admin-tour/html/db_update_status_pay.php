<?php 

    $Id = isset($_POST['id']) ? $_POST['id']:NULL;
    if($Id != Null){
        require_once('includes/conn.php');
        mysqli_query($conn, "SET NAMES 'utf8'");

        $Id = $_POST['id'];
        $status = $_POST['proof'];
        echo $status; 
        $update_ststus ='3';
        if($status == 'pass') {
            $update_ststus = '2';
        }
        
    
        $sql = "UPDATE t_booking SET Status_payment = '".$update_ststus."' WHERE ID = $Id";
        // Check connection
        $result = mysqli_query($conn, $sql);
    
        if (empty($result)){
            die("Connection failed: ".$conn->error);
        } else {
            echo "<script>";
                echo "alert(\"บันทึกข้อมูลสำเร็จ\");"; 
                echo "window.history.back()";
            echo "</script>";
        }
    }
   

?>
