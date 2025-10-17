<?php
session_start();
$username_valid = "unnes";
$password_valid = "12345";

if(!isset($_POST['username']) || !isset($_POST['password'])) {
    header("Location: index.html");
    exit();
}

$username = $_POST["username"];
$password = $_POST["password"];

if (($username == $username_valid) && ($password == $password_valid)) {
    

    $_SESSION["login"][]=[
        "username" => $username,
        "password" => $password,
        "login_at" => date('Y-m-d H:i:s')
    ];

    
    echo "<h2>Selamat Datang!!!</h2>". $username.",anda sudah login sebanyak: ".count($_SESSION["login"])." kali";

    echo '<br>';

    echo "<a href='logout.php'>Logout</a>";
    
    echo '<pre>';
    var_dump($_SESSION['login']);
    echo '</pre>';

} else {
    echo "<h2>Username atau password salah</h2>";
}

