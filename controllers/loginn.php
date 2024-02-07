<?php
include "../inc/config.php";
session_start();

$email = $_POST["email"];
$pass = md5($_POST["password"]);

$query = "select * from users where email='" . $email . "' and password='" . $pass . "' limit 1";

$hasil = mysqli_query($connection, $query);
$data = mysqli_num_rows($hasil);

if ($data > 0) {
    $key = mysqli_fetch_assoc($hasil);
    $_SESSION["id"] = $key["id"];
    $_SESSION["nama"] = $key["nama"];
    $_SESSION["gender"] = $key["gender"];
    $_SESSION["birthday"] = $key["birthday"];
    $_SESSION["email"] = $key["email"];
    $_SESSION["telpon"] = $key["telpon"];

    header("Location:../index.php");
} else {
    echo "failed <a href ='../login.php'>login</a>";
}
