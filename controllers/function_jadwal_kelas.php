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
    $id_kelas = htmlspecialchars($data["id_kelas"]);
    $hari = htmlspecialchars($data["hari"]);
    $jam_mulai = htmlspecialchars($data["jam_mulai"]);
    $jam_selesai = htmlspecialchars($data["jam_selesai"]);

    $query = "INSERT INTO jadwal_kelas (id_kelas ,hari, jam_mulai, jam_selesai)
                    VALUES
         ('$id_kelas','$hari', '$jam_mulai', '$jam_selesai')";
    mysqli_query($connection, $query);
    return mysqli_affected_rows($connection);
}

// update data 
function update($data)
{
    global $connection;
    $id = $data["id_jadwal"];
    $hari = htmlspecialchars($data["hari"]);
    $jam_mulai = htmlspecialchars($data["jam_mulai"]);
    $jam_selesai = htmlspecialchars($data["jam_selesai"]);

    $query = "UPDATE jadwal_kelas SET
                hari = '$hari',
                jam_mulai = '$jam_mulai',
                jam_selesai = '$jam_selesai'
                WHERE id_jadwal = $id 
                ";
    mysqli_query($connection, $query);
    return mysqli_affected_rows($connection);
}

function delete($id)
{
    global $connection;
    $query = "DELETE FROM jadwal_kelas WHERE id_jadwal = $id";
    $result = mysqli_query($connection, $query);
    if ($result) {
        return mysqli_affected_rows($connection);
    } else {
        return -1;
    }
}
