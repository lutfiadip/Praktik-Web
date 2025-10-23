<?php
session_start();
$username_valid = "blackpink";
$password_valid = "blink";

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
    //var_dump($_SESSION['login']);

?>
    <table border="1">
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Password</th>
            <th>Login At</th>
        </tr>
        <?php foreach($_SESSION['login'] as $index => $login) : ?>
        <tr>
            <td><?= $index + 1; ?></td>
            <td><?= $login['username']; ?></td>
            <td><?= $login['password']; ?></td>
            <td><?= $login['login_at']; ?></td>
        </tr>
    <?php endforeach; ?>
    </table>
    </pre>
<?php
} else {
    echo "<h2>Username atau password salah</h2>";
}

