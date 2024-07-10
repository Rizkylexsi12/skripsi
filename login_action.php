<?php
include 'include/connection.php';
include 'looping_generator.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT user_id, username, password FROM user";
$result = $db->query($sql);

$data_user = [];
while ($row = $result->fetch_object()) {
    $data_user[] = [
        'user_id' => $row->user_id,
        'username' => decrypt($row->username, $aes),
        'password' => decrypt($row->password, $aes)
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
