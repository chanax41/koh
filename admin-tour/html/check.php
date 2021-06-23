<?php session_start();
    if(empty($_SESSION['login'])==TRUE){
        $_SESSION["login"] = 0;
        $_SESSION["Status"] = NULL;
        $_SESSION["UserID"] = NULL;
        $_SESSION["User"] = NULL;
        $_SESSION["LastName"] = NULL;         
    }
    if(empty($_SESSION["Status"]) == TRUE){
        $_SESSION["Status"] = 'user';
    }
    if($_SESSION["Status"]=="user"){  //ถ้าเป็น member ให้กระโดดไปหน้า user_page.php
        Header("Location: ../../index.php");
    }
?>