<?php
require 'function.php';
$mahasiswa = query("SELECT * FROM mahasiswa LIMIT 50");

// untuk tombol cari
if (isset($_POST["cari"])) {
    $mahasiswa = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>

<h2>DAFTAR MAHASISWA UNIVERSITAS DARUSSALAM GONTOR</h2>

<a href="tambah.php">Tambah Data Mahasiswa</a>
<br><br>

<form action="" method="post">
    <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword anda.." autocomplete="off">
    <button type="submit" name="cari">Cari</button>
</form>

<br>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Prodi</th>
    </tr>
    <?php $i = 1; ?>
    <?php if ($mahasiswa): ?>
        <?php foreach($mahasiswa as $row): ?>
        <tr>
            <td><?= $i; ?></td>
            <td>
                <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> |
                <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Yakin ingin menghapus data?');">Hapus</a>
            </td>
            <td><?= $row["nim"]; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["kode_prodi"]; ?></td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="5">Data tidak ditemukan</td>
        </tr>
    <?php endif; ?>
</table>

</body>
</html>
