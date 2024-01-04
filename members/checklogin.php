<?php
    include("php/dbconnect.php");

    session_start();

    if(isset($_SESSION['rainbow_uid'])) {
        $sql = "select * from members where id='".$_SESSION['rainbow_uid']."'";
        $q = $conn->query($sql);
        if($q->num_rows!=1)
        {
            header("Location: login.php");
            exit();
        }
    }
    else {
        header("Location: login.php");
        exit();
    }
?>