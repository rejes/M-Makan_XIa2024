<?php
require 'function.php' ;

$id = $_GET["id"];

$ubahDB = query("SELECT * FROM resep WHERE id = $id")[0]; 

if ( isset($_POST["submit"])){

    if (update($_POST) > 0 ){
        echo "<script>
                alert('Resep Berhasil diubah');
                document.location.href = 'index.php';
              </script>";
    }else {
        echo "<script>
                alert('Resep gagal diubah');
                document.location.href = 'index.php';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Ubah Resep</h1>
<form action="" method="post">
    <input type="hidden" name="id" value="<?= $ubahDB["id"]; ?>">
    <fieldset>
            <legend>Gambar</legend>
            <input type="file" name="gambar" id="gambar" required value="<?= $ubahDB["gambar"];?>">
        </fieldset>
        <fieldset>
            <legend>Nama Resep</legend>
            <input type="text" name="nama_resep" id="nama_resep" placeholder="Masukkan nama resep" required value="<?= $ubahDB["nama_resep"];?>">
        </fieldset>
        <fieldset>
            <legend>Alat & Bahan</legend>
            <input type="text" name="alat_bahan" id="alat_bahan" placeholder="Masukkan alat & bahan yang diperlukan" required value="<?= $ubahDB["alat_bahan"];?>">
        </fieldset>
        <fieldset>
            <legend>Cara Membuat</legend>
            <input type="text" name="cara_kerja" id="cara_kerja" placeholder="Masukkan cara membuat resep" required value="<?= $ubahDB["cara_kerja"];?>">
        </fieldset>
        <button type="submit" name="submit">Ubah Resep</button>
</form>
</body>
</html>
