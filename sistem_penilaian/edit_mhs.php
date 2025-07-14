<article>
    <h2 align="center">Edit Data Mahasiswa</h2>
    <?php
    // ambil data user di db
    include_once "koneksi.php";
    $edit_mhs = $_GET['mhs'];
    $query = "SELECT nim, nama, tgllahir, alamat FROM tblmhs
            WHERE nim='$edit_mhs'";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        $row = mysqli_fetch_array($sql);
        $nim = $row['nim'];
        $nama = $row['nama'];
        $tgllahir = $row['tgllahir'];
        $alamat = $row['alamat'];
    ?>
    <div class="container">
        <form action="" method="post">
            <p style="margin-top: 0;">Nim : </p> <input type="text" name="nim" placeholder="Nim"
                value="<?= $row['nim'] ?>" required readonly />
            <br />
            <p>Nama : </p> <input type="name" name="nama" placeholder="Nama" value="<?= $row['nama'] ?>" required />
            <br />
            <p>Tanggal Lahir : </p> <input type="date" name="tgllahir" placeholder="Tanggal Lahir"
                value="<?=$row['tgllahir']?>" required /> <br />
            <p>Alamat : </p> <textarea type="text" name="alamat" placeholder="Alamat"
                required><?= $row['alamat']?></textarea>
            <br /><br />
            <input type="submit" name="edit" value="Edit" />
            <input type="hidden" name="edit_mhs" value="<?= $edit_mhs ?>">
        </form>
    </div>
    <?php  } ?>
    <?php
    if (isset($_POST['edit'])) {
        $nim = $_POST['edit_mhs'];
        $nama = $_POST['nama'];
        $tgllahir = date('Y-m-d', strtotime($_POST['tgllahir']));
        $alamat = $_POST['alamat'];
        include_once "koneksi.php";
        $query = "UPDATE tblmhs SET nama='$nama', tgllahir='$tgllahir', alamat='$alamat' WHERE nim='$nim'";
        $exequery = mysqli_query($conn, $query) or die($query);
        if ($exequery) {
            $pesan = "Proses Edit Berhasil";
        } else {
            $pesan = "Proses edit gagal";
        }
        echo "<script>alert('$pesan'); document.location= 'index.php?page=master_mhs'</script>";
    }
    ?>

</article>