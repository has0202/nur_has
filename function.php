<?php 
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "hasanah_cantik");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data){
    global $conn;
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $kode_prodi = htmlspecialchars($data["kode_prodi"]);

    $query = "INSERT INTO mahasiswa (id,nim, nama, kode_prodi) VALUES ('', '$nim', '$nama', '$kode_prodi')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;
    $id = $data["id"];
    $nim = htmlspecialchars($data["nim"]);
    $nama = htmlspecialchars($data["nama"]);
    $kode_prodi = htmlspecialchars($data["kode_prodi"]);

    $query = "UPDATE mahasiswa SET nim = '$nim', nama = '$nama', kode_prodi = '$kode_prodi' WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT * FROM mahasiswa WHERE nim LIKE '%$keyword%' OR nama LIKE '%$keyword%' OR kode_prodi LIKE '%$keyword%'";
    return query($query);
}
?>
