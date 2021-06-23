<?php 
    require_once('includes/conn.php');
    mysqli_query($conn, "SET NAMES 'utf8'");

    $sql = "SELECT t_user.ID, t_user.FirstName, t_user.LastName, t_user.Email, t_user.Password, 
    t_user.Create_date, t_user.Status AS 'user_level' ,t_user_meta.meta_value  AS 'email_status'
    FROM t_user_meta
    INNER JOIN t_user 
    ON t_user_meta.Email = t_user.Email and t_user_meta.meta_key = 'email_status'";
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
