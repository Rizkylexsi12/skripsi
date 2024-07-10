<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <div class="background">
        <div class="login-box">
            <img src="https://zicare.id/upload/website/logo_header.svg" alt="logo-icon" height="40px"/>
            <hr/>
            <h2>Login</h2>
            <form action="login_action.php" method="post">
                <div class="textbox">
                    <input type="text" placeholder="Username" name="username" required>
                </div>
                <div class="textbox">
                    <input type="password" placeholder="Password" name="password" required>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </div>
</body>
</html>