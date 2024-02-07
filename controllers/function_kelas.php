 <?php
    // koneksi ke DB
    // require '../inc/config.php';
    // QUERY TABLE DI DB

    $connection = mysqli_connect("localhost", "root", "", "kursus");

    function query($query)
    {
        global $connection;
        $result = mysqli_query($connection, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    // TAMBAH MAHASISWA
    function add($data)
    {
        global $connection;
        $kelas = htmlspecialchars($data["nama_kelas"]);
        $query = "INSERT INTO kelas (nama_kelas) VALUES ('$kelas')";
        mysqli_query($connection, $query);
        return mysqli_affected_rows($connection); 
    }

    // update data 
    function update($data)
    {
        global $connection;
        $id = $data["id_kelas"];
        $kelas = htmlspecialchars($data["nama_kelas"]);

        $query = "UPDATE kelas SET
                nama_kelas = '$kelas'
                WHERE id_kelas = $id 
                        ";
        mysqli_query($connection, $query);
        return mysqli_affected_rows($connection);
    }

    function delete($id)
    {
        global $connection;
        mysqli_query($connection, "DELETE FROM kelas WHERE  id_kelas= $id");
        return mysqli_affected_rows($connection);
    }

    ?> 