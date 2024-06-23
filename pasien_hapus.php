<?php
    require "include/connection.php";

    $id = $_GET['id'];
    
    mysqli_query($db, "delete from pasien where pasien_id='$id'");
    header("location:pasien.php");
?>