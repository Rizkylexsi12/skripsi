<?php
    require "include/connection.php";

    $id = $_GET['id'];
    
    mysqli_query($db, "delete from user where user_id='$id'");
    header("location:user.php");
?>