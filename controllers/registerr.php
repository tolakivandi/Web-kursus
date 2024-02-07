<?php

include_once("../inc/config.php");
 $nama = $_POST['nama'];
 $gender = $_POST['gender'];
 $birthday = $_POST['birthday'];
 $email = $_POST['email'];
 $telpon = $_POST['telpon'];
 $password = md5($_POST['password']);
 $id_kelas = $_POST['id_kelas'];

 $result = mysqli_query($connection,"INSERT INTO siswa (nama,gender,birthday,email,telpon,password,id_kelas) VALUES('$nama','$gender','$birthday','$email','$telpon','$password','$id_kelas')");
 if ($result){
    header("Location:../login.php");
 }else{
    echo "error";
 }
?>