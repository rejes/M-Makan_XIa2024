<?php
    require 'function.php';

    $id = $_GET["id"];

    if (hapus($id) > 0 ) {
        echo "
        <script>
            alert('Resep berhasil dihapus!');
            document.location.href = 'index.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('Resep gagal dihapus!');
            document.location.href = 'index.php';
        </script>
        ";
    }
?>