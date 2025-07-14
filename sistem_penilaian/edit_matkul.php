<article>
    <h2 align="center">Edit Data Matakuliah</h2>
    <?php
    // ambil data user di db
    include_once "koneksi.php";
    $edit_mtk = $_GET['mtk'];
    $query = "SELECT kd_mtk, nm_mtk, sks FROM tblmatkul
            WHERE kd_mtk='$edit_mtk'";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        $row = mysqli_fetch_array($sql);
        $kd_mtk = $row['kd_mtk'];
        $nmmtk = $row['nm_mtk'];
        $sks = ['sks'];

    ?>

    <div class="container">
        <form action="" method="post">
            <p style="margin-top: 0;">Kode Matakuliah : </p> <input type="text" name="edit_mtk"
                placeholder="Kode Matakuliah" value="<?= $row['kd_mtk'] ?>" readonly /> <br />
            <p>Nama Mata Kuliah : </p> <input size="25px" type="text" name="nm_mtk" placeholder="Nama Matakuliah"
                value="<?= $row['nm_mtk'] ?>" required /> <br />
            <p>SKS : </p> <input type="number" name="sks" placeholder="SKS" value="<?= $row['sks'] ?>" required min="1"
                max="20" /> <br /><br />
            <input type="submit" name="edit" value="Edit" />
            <input type="hidden" name="edit_mtk" value="<?= $edit_mtk ?>">
        </form>
    </div>

    <?php  } ?>
    <?php
    if (isset($_POST['edit'])) {
        $kd_mtk = $_POST['edit_mtk'];
        $nmmtk = $_POST['nm_mtk'];
        $sks = $_POST['sks'];

        include_once "koneksi.php";
        $query = "UPDATE tblmatkul SET nm_mtk='$nmmtk', sks='$sks' WHERE kd_mtk='$kd_mtk'";



        $exequery = mysqli_query($conn, $query) or die($query);
        if ($exequery) {
            $pesan = "Proses Edit Berhasil";
        } else {
            $pesan = "Proses edit gagal";
        }

        echo "<script>alert('$pesan'); document.location= 'index.php?page=master_matkul'</script>";
    }
    ?>

</article>