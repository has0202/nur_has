<?php 
require 'function.php';
// koneksi 
$conn = mysqli_connect("localhost", "root", "", "hasanah_cantik");

if(isset($_POST["submit"])){

    // cek error setelah submit data
    if(tambah($_POST)> 0 ){
        echo "
            <script> 
                alert ('data berhasil ditambahkan ');
                document.location.href = 'index.php'
            </script> 
        ";
        
    }else {
        echo "
            <script> 
                alert ('data gagal ditambahkan ');
                document.location.href = 'index.php'
            </script> 
            ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah data mahasiswa</title>
</head>
<body>
    
    <h2>tambah data mahasiswa</h2>

    <form action="" method="post">
        <ul>
            <li>
                <label for="nim">NIM</label>
                <input type="text" name="nim" id="nim " require>
            </li>
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama"require>
            </li>
            <li>
                <label for="kode_prodi">prodi</label>
                <input type="text" name="kode_prodi" id="kode_prodi">
            </li>
            
            <li>
                <button type="submit" name="submit">tambahkan data</button>
            </li>
        </ul>

    </form>

</body>
</html>