<?php 
session_start();

if (isset($_SESSION['welcomeMessage']) && !isset($_SESSION['username'])) {
    echo $_SESSION['welcomeMessage'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style type="text/css">
        body {
            background-color: floralwhite;
            font-family: Arial, sans-serif;
        }
        .center {
            margin: 25px auto;
            padding: 20px;
            max-width: 600px;
            width: 30%;
            background-color: indianred;
            color: floralwhite;
            border-radius: 32px;
            text-align: center;
        }
        a {
            color: floralwhite;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        a:active {
            color: grey;
        }
        h6 {
            font-weight: normal;
        }
    </style>
</head>
<body>
    <div class="center">
        <h3>Login</h3>
        <form action="handleForm.php" method="POST">
            <p>Username: <input type="text" name="username"></p>
            <p>Password: <input type="password" name="password"></p>
            <p><input type="submit" value="Login" name="loginBtn"></p>
        </form>
        <h6>No account yet? Click here to <b><a href="register.php">Register</a></b>.</h6>
    </div>
</body>
</html>
