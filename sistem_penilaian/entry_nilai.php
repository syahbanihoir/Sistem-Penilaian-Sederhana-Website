<article>
    <h2 align="center">Entri Nilai Mahasiswa</h2>
    <div class="container">
        <form action="" method="post">
            <p style="margin-top: 0;">Nama : </p><select name="nama" required>
                <option value=""></option>
                <?php
            include "koneksi.php";
            $q = "SELECT * from tblmhs";
            $resultq = mysqli_query($conn, $q);
            while ($x = mysqli_fetch_array($resultq)) {
            ?>
                <option value="<?php echo $x['nim']; ?>">
                    <?php echo $x['nama']; ?>
                </option>
                <?php
            }
            ?>
            </select>
            <p>Nama MataKuliah : </p><select name="nm_mtk" required>
                <option value=""></option>
                <?php
            include "koneksi.php";
            $q = "SELECT * from tblmatkul";
            $resultq = mysqli_query($conn, $q);
            while ($x = mysqli_fetch_array($resultq)) {
            ?>
                <option value="<?php echo $x['kd_mtk']; ?>">
                    <?php echo $x['nm_mtk']; ?>
                </option>
                <?php
            }
            ?>
            </select>
            </table>
            <p>Nilai : </p><input type="number" name="nilai" placeholder="nilai" min="0" max="100" required />
            <br /><br />
            <input type="submit" name="input" value="input" />
        </form>
    </div>
    <?php
    if (isset($_POST['input'])) {
        $nama = $_POST['nama'];
        $nm_mtk = $_POST['nm_mtk'];
        $nilai = $_POST['nilai'];

        include_once "koneksi.php";
        $query = "INSERT INTO tblnilai values ('$nama', '$nm_mtk', ' $nilai')";

        $exequerry = mysqli_query($conn, $query);


        if ($exequerry) {
            $pesan = "Tambah matakuliah berhasil";
            echo "<script>alert(' $pesan');document.location='index.php?mhs=%25&matkul=%25&page=tblnilai_mhs'</script>";
        } else {
            $pesan = "Tambah Matakuliah gagal";
        }
    }
    ?>
</article>