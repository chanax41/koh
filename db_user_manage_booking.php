<?php require_once('./check.php');
    
    if(isset($_SESSION['UserID'])){

        require_once('includes/conn.php');
        mysqli_query($conn, "SET NAMES 'utf8'");

        $sql = "SELECT
                    t_booking.ID,
                    t_package.Name,
                    t_package.Price,
                    t_package.Time,
                    t_booking.Amount,
                    t_booking.Booking_date,
                    t_booking.Last_date_payment,
                    t_booking.Status_payment
                FROM t_booking
                JOIN t_package
                    ON t_package.Name = t_booking.Name_tour
                WHERE t_booking.Email = '".$_SESSION['UserID']."'
                ORDER BY t_booking.ID DESC";

        // Check connection
        $result = mysqli_query($conn, $sql);

        if (empty($result)){
            die("Connection failed: ".$conn->error);
        } 


        if ($result->num_rows > 0) {
            // output data of each row
            $rows = array();
            while($r = mysqli_fetch_assoc($result)) {
                $rows[] = $r;
            }
            $obj = json_encode($rows);
        } else {
            $obj = NULL;
        }
    } else {
        echo "<script>";
            echo "alert(\"คุณไม่มีสิทธิเข้าถึงหน้านี้\");"; 
            echo "window.history.back()";
        echo "</script>";
    }
    

?>
