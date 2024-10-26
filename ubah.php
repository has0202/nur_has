<?php 
require 'function.php';

// pengambilan data dari url
$id= $_GET["id"];

// query data mahasiswa
$mahasiswa = query("SELECT * FROM mahasiswa WHERE id = $id")[0];


// cek apakah tombol sub mit sudah di tekan atau belum
if(isset($_POST["submit"])){

    // cek error setelah submit data
    if(ubah($_POST)> 0 ){
        echo "
            <script> 
                alert ('data berhasil diubah ');
                document.location.href = 'index.php'
            </script> 
        ";
        
    }else {
        echo "
            <script> 
                alert ('data gagal diubah ');
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
    <title>update data mahasiswa</title>
</head>
<body>
    
    <h2>update data mahasiswa</h2>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $mahasiswa["id"]; ?>">
        <ul>
            <li>
                <label for="nim">NIM</label>
                <input type="text" name="nim" id="nim" required value="<?= $mahasiswa["nim"]; ?>">
            </li>
            <li>
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" required value="<?= $mahasiswa["nama"]; ?>">
            </li>
            <li>
                <label for="kode_prodi">Prodi</label>
                <input type="text" name="kode_prodi" id="kode_prodi" value="<?= $mahasiswa["kode_prodi"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Update Data</button>
            </li>
        </ul>


    </form>

</body>
</html>