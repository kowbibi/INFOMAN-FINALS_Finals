<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
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
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            box-sizing: border-box;
            border-radius: 5px;
            border: 1px solid #ccc;
            outline: none;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        a {
            color: floralwhite;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="center">
        <h3>Register</h3>
        <form action="handleForm.php" method="POST">
            <div class="fields">
                <p>Username: <input type="text" name="username" required></p>
                <p>Password: <input type="password" name="password" required></p>
                <p><input type="submit" value="Register" name="regBtn"></p>
                <p><span class="small-text">Back to <b><a href="login.php">Login</a></b>?</span></p>
            </div>
        </form>
    </div>
</body>
</html>
