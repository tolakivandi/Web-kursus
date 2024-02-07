 <?php
    // koneksi ke DB
    $connection = mysqli_connect("localhost", "root", "", "kursus");
    // QUERY TABLE DI DB
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


    // TAMBAH GURU
    function add($data)
    {
        global $connection;
        $nama_pengajar = htmlspecialchars($data['nama_pengajar']);
        $alamat_pengajar = htmlspecialchars($data['alamat_pengajar']);
        $no_telp_pengajar = htmlspecialchars($data['no_telp_pengajar']);
        $email_pengajar = htmlspecialchars($data['email_pengajar']);

        $query = "INSERT INTO pengajar (nama_pengajar,alamat_pengajar, no_telp_pengajar, email_pengajar)
                                    VALUES
                        ('$nama_pengajar','$alamat_pengajar','$no_telp_pengajar','$email_pengajar')";

        mysqli_query($connection, $query);
        return mysqli_affected_rows($connection);
    }

    // update data 
    function update($data)
    {
        global $connection;
        $id = $data["id_pengajar"];
        $nama_pengajar = htmlspecialchars($data['nama_pengajar']);
        $alamat_pengajar = htmlspecialchars($data['alamat_pengajar']);
        $no_telp_pengajar = htmlspecialchars($data['no_telp_pengajar']);
        $email_pengajar = htmlspecialchars($data['email_pengajar']);

        $query = "UPDATE pengajar SET
                nama_pengajar = '$nama_pengajar',
                alamat_pengajar = '$alamat_pengajar',
                no_telp_pengajar = '$no_telp_pengajar',
                email_pengajar = '$email_pengajar'
                WHERE id_pengajar=$id 
                ";
        mysqli_query($connection, $query);
        return mysqli_affected_rows($connection);
    }

    function delete($id)
    {
        global $connection;
        mysqli_query($connection, "DELETE FROM pengajar WHERE id_pengajar = $id");
        return mysqli_affected_rows($connection);
    }



    ?> 