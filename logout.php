<?php session_start(); //to ensure you are using same session
    $_SESSION["login"] = 0;
    $_SESSION["UserID"] = NULL;
    $_SESSION["User"] = NULL;
    $_SESSION["Status"] = NULL;
    header("location:/index.php"); //to redirect back to "index.php" after logging out
?>