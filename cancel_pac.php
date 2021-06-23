<?php require_once('./check.php');

if($_SESSION["login"] == 0){
    Header("Location: index.php");
}

$Name_tour = isset($_GET['Name_pac']) ? $_GET['Name_pac']: NULL;
if($Name_tour != NULL && $_SESSION["UserID"]!=NULL){
    //connection
    require_once('includes/conn.php');
    //รับค่า user & password
    $ID = $_GET['ID'];
    $Name_tour = $_GET['Name_pac'];
    $create_date = strval(date("Y-m-d"));

    //query 
    $sql = "UPDATE t_booking
                SET Status_payment = 'DEL'
                WHERE Email = '".$_SESSION['UserID']."' AND Name_tour ='".$Name_tour."' AND ID =$ID";
    $result = mysqli_query($conn, $sql);
    if($result){
        echo "<script>";
            echo "alert(\"ลบข้อมูลสำเร็จ\");"; 
        echo "</script>";
        Header("Location: list_booking.php");
    }
}
?>
