<?php require_once('./check.php');

if($_SESSION["login"] == 0){
    Header("Location: index.php");
}

if($_SESSION["UserID"]!=NULL){
    //connection
    require_once('includes/conn.php');
    //รับค่า user & password
    
    $create_date = strval(date("Y-m-d"));

    //query 
    $sql = "UPDATE t_user
                SET Status = 'DEL', Create_date = '$create_date'
                WHERE Email = '".$_SESSION['UserID']."'";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "<script>";
            echo "alert(\"ลบข้อมูลสำเร็จ\");"; 
        echo "</script>";
        Header("Location: logout.php");
    }
}
?>
