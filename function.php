    <?php
    //koneksi database
    $conn = mysqli_connect("localhost", "root", "", "test");
    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query) ;
        // menyediakan wadahnya
        $rows =[];
        // yg akan di ambil setiap data
        while ( $row = mysqli_fetch_assoc($result)) {
        // menambahkan elemen baru setiap array
            $rows[] = $row;
        }
        //mengembalikan data, rows bentuknya sudah array assosiatif
        return $rows;
    }
        function tambah ($data) {
            global $conn ;
        // ambil data dari tiap elemen dalam form
            $gambar           = upload();
                if (!$gambar){
                return false;
            }
            $nama_resep       = htmlspecialchars($data["nama_resep"]);
            $alat_bahan       = htmlspecialchars($data["alat_bahan"]);
            $cara_kerja       = htmlspecialchars($data["cara_kerja"]);
        // query insert data
        $query = "INSERT INTO resep
                    VALUES
                    ('','$gambar', '$nama_resep', '$alat_bahan', '$cara_kerja')";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

        function hapus($id){
            global $conn;
            mysqli_query($conn, "DELETE FROM resep WHERE id = $id");
            
            return mysqli_affected_rows($conn);
    }
        function update ($data) {
            global $conn ;

            $id               = $data["id"];
            $gambar           = 
            $nama_resep       = htmlspecialchars($data["nama_resep"]);
            $alat_bahan       = htmlspecialchars($data["alat_bahan"]);
            $cara_kerja       = htmlspecialchars($data["cara_kerja"]);

            // membuat variabel untuk gambarLama
            $gambarLama = htmlspecialchars($data["gambarLama"]);

            // mengechek apakah user pilih gambar baru atau tidak
            if( $_FILES ['gambar']['error'] === 4 ) {
                $gambar = $gambarLama;
            }else {
                $gambar = upload();
            }

    // query insert data
        $query = "UPDATE resep SET
                    gambar      = '$gambar',
                    nama_resep  = '$nama_resep',
                    alat_bahan  = '$alat_bahan',
                    cara_kerja  = '$cara_kerja'
                WHERE id        = $id
                ";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    function cari($keyword){
        $query = "SELECT * FROM resep WHERE nama_resep LIKE '$keyword'
                    ";
        return query($query);
    }

    function upload(){
    $namafile   = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error      = $_FILES['gambar']['error'];
    $tmpname    = $_FILES['gambar']['tmp_name'];
    
    if ($error === 4){
        echo "<script>
        alert('Pilih gambar terlebih dahulu');
        </script>";
        return false;
    }

    $EkstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $EkstensiGambar      = explode('.', $namafile);
    $EkstensiGambar      = strtolower(end($EkstensiGambar));

    if(!in_array($EkstensiGambar, $EkstensiGambarValid)){
        echo "<script>
        alert('Yang anda upload bukan gambar');
        </script>";
        return false;
    }

    if($ukuranfile > 100000){
        echo "<script>
        alert('Gambar yang anda masukkan terlalu besar!');
        </script>";
        return false;
    }

    $NamaFileBaru = uniqid();
    $NamaFileBaru .= '.';
    $NamaFileBaru .= $EkstensiGambar;

    move_uploaded_file($tmpname, 'img/' . $NamaFileBaru);
    return $NamaFileBaru;
}

    ?>