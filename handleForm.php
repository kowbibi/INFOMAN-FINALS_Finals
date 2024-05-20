<?php
session_start();
require_once 'dbConfig.php';
require_once 'functions.php';

if (isset($_POST['regBtn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo '<script>
            alert("Input fields cannot be empty.");
            window.location.href = "register.php";
        </script>';
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        if (addUser($conn, $username, $hashedPassword)) {
            header('Location: index.php');
            exit;
        } else {
            header('Location: register.php');
            exit;
        }
    }
}

if (isset($_POST['loginBtn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo '<script>
            alert("Input fields cannot be empty.");
            window.location.href = "index.php";
        </script>';
    } else {
        if (login($conn, $username, $password)) {
            header('Location: index.php');
            exit;
        } else {
            header('Location: login.php');
            exit;
        }
    }
}
?>
