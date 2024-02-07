<?php


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
    $nama_peserta = htmlspecialchars($data["nama_peserta"]);
    $alamat_peserta = htmlspecialchars($data["alamat_peserta"]);
    $no_tlep_peserta = htmlspecialchars($data["no_tlep_peserta"]);
    $email_peserta = htmlspecialchars($data["email_peserta"]);

    $query = "INSERT INTO peserta_kelas ( nama_peserta, alamat_peserta, no_tlep_peserta, email_peserta)
                            VALUES
            ('$nama_peserta', '$alamat_peserta', '$no_tlep_peserta', '$email_peserta')";
    mysqli_query($connection, $query);
    return mysqli_affected_rows($connection);
}

// update data 
function update($data)
{
    global $connection;
    $id = $data["id_peserta"];
    $nama_peserta = htmlspecialchars($data["nama_peserta"]);
    $alamat_peserta = htmlspecialchars($data["alamat_peserta"]);
    $no_tlep_peserta = htmlspecialchars($data["no_tlep_peserta"]);
    $email_peserta = htmlspecialchars($data["email_peserta"]);

    $query = "UPDATE peserta_kelas SET
                nama_peserta = '$nama_peserta',
                alamat_peserta = '$alamat_peserta',
                no_tlep_peserta = '$no_tlep_peserta',
                email_peserta = '$email_peserta'
                WHERE id_peserta = $id 
                ";
    mysqli_query($connection, $query);
    return mysqli_affected_rows($connection);
}

function delete($id)
{
    global $connection;
    $query = "DELETE FROM peserta_kelas WHERE id_peserta = $id";
    $result = mysqli_query($connection, $query);
    if ($result) {
        return mysqli_affected_rows($connection);
    } else {
        return -1;
    }
}
