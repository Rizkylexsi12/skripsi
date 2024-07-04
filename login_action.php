<?php
    include 'include/connection.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $login = $db->query("select * from user where username='$username' and password='$password'");
    $cek = mysqli_num_rows($login);

    if ($cek > 0) {
        $data = mysqli_fetch_assoc($login);

        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $data['user_id'];
        $_SESSION['status'] = "login";
        header("location:index.php");
    } else {
        header("location:login.php");
    }
?>