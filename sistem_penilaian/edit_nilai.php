<article>
    <h2 align="center">Edit Nilai Mahasiswa</h2>
    <?php
    // ambil data user di db
    include_once "koneksi.php";
    $kd_mtk_edit = $_GET['kdmtk']; 
    $nim_edited = $_GET['nim']; 
    $query = "SELECT tblnilai.nilai, tblmhs.nama, tblmatkul.nm_mtk FROM tblnilai, tblmhs, tblmatkul WHERE tblnilai.kd_mtk='$kd_mtk_edit' AND tblnilai.nim = '$nim_edited' AND tblmhs.nim= '$nim_edited' AND tblmatkul.kd_mtk='$kd_mtk_edit'";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        $row = mysqli_fetch_array($sql);
        $nilai = $row['nilai'];
        $nama = $row['nama'];
        $nm_mtk = $row['nm_mtk'];
        ?>

    <div class="container">
        <form action="" method="post">
            Nim : <?php echo $nim_edited ?> - <?php echo $nama ?> <br /><br />
            Kode Matakuliah : <?php echo $kd_mtk_edit ?> - <?php echo $nm_mtk?> <br /> <br />
            <label for="nilai">Nlai (Angka) : </label> <input id="nilai" class="box4" min="0" max="100" type="number"
                name="nilai" placeholder="Nilai" value="<?= $row['nilai'] ?>" required
                oninvalid="this.setCustomValidity('Isi Nilai Mahasiswa!  Nilai 0-100')"
                oninput="this.setCustomValidity('')" /> <br /><br />
            <input class="submit" type="submit" name="edit" value="Edit" />
            <input type="hidden" name="grade_edited" value="<?= $grade_edited ?>">
        </form>
    </div>

    <?php  } ?>
    <?php
    if (isset($_POST['edit'])) {
        $nim = $_POST['grade_edited'];
        $nilai = $_POST['nilai'];

        include_once "koneksi.php";
        $query = "UPDATE tblnilai SET nilai='$nilai' WHERE nim='$nim_edited' AND kd_mtk='$kd_mtk_edit'";

        
        $exequery = mysqli_query($conn, $query) or die($query);
        if ($exequery) {
            $pesan = "Proses Edit Berhasil";
        } else {
            $pesan = "Proses edit gagal";
        }

        echo "<script>alert('$pesan'); document.location= 'index.php?mhs=%25&matkul=%25&page=tblnilai_mhs'</script>";
    }
    ?>
    </div>
</article>