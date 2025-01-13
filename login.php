<?php
require "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nik = $_POST['nik'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    //fungsi execute_query hanya bisa digunakan pada php8.2
    $query = "SELECT * FROM masyarakat WHERE nik = '$nik' AND username = '$username' AND password = '$password'";
    $row = $koneksi->execute_query($sql, [$nik, $username, $password]);

    if (mysqli_num_rows($row) == 1) {
        session_start();
        $_SESSION['nik'] = $nil;
        header("location:index.php");
    } else {
        echo "<script>alert ('gagal login!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
</head>
<body>
    <form action="" method="post" class="form-login">
        <p>Silahkan Login</p>
        <div class="form-item">
            <label for="nik">NIK</label>
            <input type="text" name="nik" id="nik" required>
        </div>
        <div class="form-item">
            <label for="nik">Username</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div class="form-item">
            <label for="nik">Passwword</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Login</button>
        <a href="register.php">Register</a>
    </form>
</body>
</html>