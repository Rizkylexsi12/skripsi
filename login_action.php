<?php
include 'include/connection.php';
include 'aes_new.php';

$aes = new AES256();

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT user_id, username, password FROM user";
$result = $db->query($sql);

$data_user = [];
while ($row = $result->fetch_object()) {
    $data_user[] = [
        'user_id' => $row->user_id,
        'username' => $aes->decrypt($row->username),
        'password' => $aes->decrypt($row->password),
    ];
}

$login_success = false;
$user_id = null;

foreach ($data_user as $user) {
    if ($user['username'] === $username && $user['password'] === $password) {
        $login_success = true;
        $user_id = $user['user_id'];
        break;
    }
}

if ($login_success) {
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['user_id'] = $user_id;
    $_SESSION['status'] = "login";
    header("location:index.php");
} else {
    header("location:login.php?error=Invalid Credentials");
}
?>
