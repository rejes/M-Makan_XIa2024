<?php
require 'function.php' ;

if ( isset($_POST["submit"])){

    if (tambah($_POST) > 0 ){
        echo "<script>
                alert('Resep berhasil ditambahkan');
                document.location.href = 'index.php';
              </script>";
    }else {
        echo "<script>
                alert('Resep tidak berhasil ditambahkan');
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
    <link rel="stylesheet" href="styleee.css">
</head>
<body>
    <h1>Tulis Resep</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Gambar</legend>
            <input type="file" name="gambar" id="gambar" required>
        </fieldset>
        <fieldset>
            <legend>Nama Resep</legend>
            <input type="text" name="nama_resep" id="nama_resep" placeholder="Masukkan nama resep" required>
        </fieldset>
        <fieldset>
            <legend>Alat & Bahan</legend>
            <input type="text" name="alat_bahan" id="alat_bahan" placeholder="Masukkan alat & bahan yang diperlukan" required>
        </fieldset>
        <fieldset>
            <legend>Cara Membuat</legend>
            <input type="text" name="cara_kerja" id="cara_kerja" placeholder="Masukkan cara membuat resep" required>
        </fieldset>
        <button type="submit" name="submit">Tambah Resep</button>
    </form>
</body>

</html>