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

    // TAMBAH MAHASISWA
    function add($data)
    {
        global $connection;
        $id_kelas = htmlspecialchars($data["id_kelas"]);
        $id_peserta = htmlspecialchars($data["id_peserta"]);
        $id_pengajar = htmlspecialchars($data["id_pengajar"]);
        $tanggal_daftar = htmlspecialchars($data["tanggal_daftar"]);
        $status_pembayaran = htmlspecialchars($data["status_pembayaran"]);

        $query = "INSERT INTO pendaftaran ( id_kelas, id_peserta, id_pengajar, tanggal_daftar, status_pembayaran)
                                          VALUES 
                    ( '$id_kelas', '$id_peserta', '$id_pengajar', '$tanggal_daftar', '$status_pembayaran')";
        mysqli_query($connection, $query);
        return mysqli_affected_rows($connection);
    }

    // update data 
    function update($data){

        global $connection;
        $id = $data['id_pendaftaran'];
        $tanggal_daftar = htmlspecialchars($data["tanggal_daftar"]);
        $status_pembayaran = htmlspecialchars($data["status_pembayaran"]);

        $query = "UPDATE pendaftaran SET 
            tanggal_daftar = '$tanggal_daftar',
            status_pembayaran = '$status_pembayaran'
            WHERE id_pendaftaran = $id
                    ";

        mysqli_query($connection, $query);
        return mysqli_affected_rows($connection);
    }

    function delete($id)
    {
        
        global $connection;
        mysqli_query($connection, "DELETE FROM pendaftaran WHERE  id_pendaftaran= $id");
        return mysqli_affected_rows($connection);
    }

   
    ?> 