<article>
    <h2 align="center">Input Data Mahasiswa</h2>
    <div class="container">
        <form id="Form-Add-Mhs" action="" method="post">
            <p style="margin-top: 0;">Nim : </p><input type="text" name="nim" placeholder="Nim" required /> <br />
            <p>Nama : </p><input type="text" name="nama" placeholder="Nama" required /> <br />
            <p>Tanggal Lahir : </p><input type="date" name="tgllahir" placeholder="Tanggal Lahir" required />
            <br />
            <p>Alamat : </p><textarea rows="3" name="alamat" placeholder="Alamat" required></textarea>
            <br /><br />
            <input type="submit" name="input" value="input" />
            <input type="button" onclick="myFunction()" value="Reset">
        </form>
    </div>

    <?php
    if (isset($_POST['input'])) {
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $tgllahir = date('Y-m-d', strtotime($_POST['tgllahir']));
        $alamat = $_POST['alamat'];

        include_once "koneksi.php";
        $query = "INSERT INTO tblmhs values ('$nim', '$nama', ' $tgllahir', ' $alamat')";

        $exequerry = mysqli_query($conn, $query);


        if ($exequerry) {
            $pesan = "Tambah mahasiswa berhasil";
            echo "<script>alert('$pesan');document.location='index.php?page=master_mhs'</script>";
        } else {
            $pesan = "Tambah mahasiswa gagal";
        }
    }
    ?>
    <script>
    function myFunction() {
        document.getElementById("Formc-Add-Mhs").reset();
    }
    </script>

</article>