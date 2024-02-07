<?php
    // session_start();
    // if (!isset($_SESSION["email"])) {
    //     header("Location:../login.php");
    //     exit;
    // }
    require '../controllers/function_pengajar.php';

    $id = $_GET['id'];
    if (delete($id) > 0) {
        echo "
            <script>
                alert('data berhasil dihapus');
                document.location.href= '../pengajar.php';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('data gagal dihapus');
                document.location.href= '../pengajar.php';
            </script>
            ";
    }

    ?> 