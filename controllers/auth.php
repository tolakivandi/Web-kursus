 <?php
    session_start();
    $connection = mysqli_connect("localhost", "root", "", "kursus");

    // login

    if (isset($_POST['login'])) {
        $username = $_POST['uname'];
        $password = $_POST['psw'];


        $cekuser = mysqli_query($connection, "SELECT * FROM users WHERE username= '$username' and password = '$password' ");
        $hitung = mysqli_num_rows($cekuser);

        if ($hitung > 0) {
            // jika di temukan
            $ambilDataRole = mysqli_fetch_array($cekuser);
            $role = $ambilDataRole['role'];

            if ($role == 'admin') {
                // jika admin
                $_SESSION['log'] = 'Logged';
                $_SESSION['role'] = 'Admin';
                header('location:../home.php');

                $_SESSION['login'] = true;
            } else {
                // jika bukan admin
                $_SESSION['log'] = 'Logged';
                $_SESSION['role'] = 'User';
                header('location:../user/peserta_kelas.php');
                $_SESSION['login'] = true;
            }
        } else {
            // jika tidak di temukan
            echo " Data tidak di temukan";
        }
    }




    ?> 