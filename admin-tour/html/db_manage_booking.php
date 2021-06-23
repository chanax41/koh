<?php 
    require_once('includes/conn.php');
    mysqli_query($conn, "SET NAMES 'utf8'");

    // $sql = "SELECT t_user.FirstName, t_user.LastName, t_user.Email, t_user.Password, 
    // t_user.Create_date, t_user.Status AS 'user_level' ,t_user_meta.meta_value AS 'email_status'
    // FROM t_user_meta
    // INNER JOIN t_user 
    // ON t_user_meta.Email = t_user.Email";

    $sql = "SELECT
                t_booking.ID,
                t_booking.Email,
                t_booking.Address_user,
                t_package.Name,
                t_package.Price,
                t_package.Time,
                t_booking.Amount,
                t_booking.Booking_date,
                t_booking.Last_date_payment,
                t_booking.Proof_of_payment,
                t_booking.Status_payment
            FROM t_booking
            JOIN t_package
                ON t_package.Name = t_booking.Name_tour
            Order By t_booking.ID DESC";

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

?>
