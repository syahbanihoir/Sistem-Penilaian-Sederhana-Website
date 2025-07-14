<article>
    <h2 align="center">Data Nilai Mahasiswa</h2>
    <form class="filter" action="index.php" method="get">
        <select name="mhs" id="mhs-slct">
            <option value="%">Semua Nama Mahasiswa</option>
            <?php
            include_once "koneksi.php";
            $query = "SELECT nama,nim FROM tblmhs";
            $sql = mysqli_query($conn, $query);
            while ($mahasiswa = mysqli_fetch_array($sql)){
                ?>
            <option style="text-transform: uppercase;" value="<?=$mahasiswa[1]?>"
                <?php if($_GET['mhs']==$mahasiswa[1]){?> selected="true" <?php };?>>
                <?php echo $mahasiswa[0]?></option>
            <?php
            }
            ?>
        </select>
        <select name="matkul" id="mhs-slct">
            <option value="%">Semua Nama Matkul</option>
            <?php
            include_once "koneksi.php";
            $query = "SELECT nm_mtk, kd_mtk FROM tblmatkul";
            $sql = mysqli_query($conn, $query);
            while ($mtkul = mysqli_fetch_array($sql)) {
            ?>
            <option style="text-transform: uppercase;" value="<?= $mtkul[1] ?>"
                <?php if ($_GET['matkul'] == $mtkul[1]) { ?> selected="true" <?php }; ?>>
                <?php echo $mtkul[0] ?></option>
            <?php
            }
            ?>
        </select>
        <input type="hidden" name="page" value="tblnilai_mhs">
        <input type="submit" value="filter">
    </form>

    <table border="1" width="100%">
        <tr>
            <th>NO</th>
            <th>NIM</th>
            <th>NAMA MAHASISWA</th>
            <th>KODE</th>
            <th>MATAKULIAH</th>
            <th>NILAI</th>
            <th>GRADE</th>
            <th>PROSES</th>
        </tr>
        <?php

        if (isset($_GET['mhs'])) {
            $mhs = $_GET['mhs'];
            $matkul = $_GET['matkul'];
            $sql = "SELECT tblnilai.nim, tblmhs.nama, tblmatkul.kd_mtk, tblmatkul.nm_mtk, nilai
            FROM tblnilai
            INNER JOIN tblmhs
            ON tblnilai.nim=tblmhs.nim
            INNER JOIN tblmatkul
            ON tblnilai.kd_mtk=tblmatkul.kd_mtk
            WHERE tblmhs.nim LIKE '$mhs' AND tblmatkul.kd_mtk LIKE '$matkul'";
        } else {
            $sql = "SELECT tblnilai.nim, tblmhs.nama, tblmatkul.kd_mtk, tblmatkul.nm_mtk, nilai
            FROM tblnilai
            INNER JOIN tblmhs
            ON tblnilai.nim=tblmhs.nim
            INNER JOIN tblmatkul
            ON tblnilai.kd_mtk=tblmatkul.kd_mtk";
        }

        $sql = mysqli_query($conn, $sql);
        $no = 1;
        while ($row = mysqli_fetch_assoc($sql)) {
            $nim = $row['nim'];
            $nama = $row['nama'];
            $kode = $row['kd_mtk'];
            $mtk = $row['nm_mtk'];
            $nilai = $row['nilai'];

            if ($nilai >= 85) {
                $grade = "A";
            } else if ($nilai >= 80) {
                $grade = "A-";
            } else if ($nilai >= 75) {
                $grade = "B+";
            } else if ($nilai >= 70) {
                $grade = "B";
            } else if ($nilai >= 65) {
                $grade = "B-";
            } else if ($nilai >= 60) {
                $grade = "C";
            } else if ($nilai >= 45) {
                $grade = "D";
            } else {
                $grade = "E";
            }
        ?>

        <tr>
            <td align="center"><?php echo $no++ ?></td>
            <td align="center"><?php echo $nim ?></td>
            <td align="center"><?php echo $nama ?></td>
            <td align="center"><?php echo $kode ?></td>
            <td align="center"><?php echo $mtk ?></td>
            <td align="center"><?php echo $nilai ?></td>
            <td align="center"><?php echo $grade ?></td>
            <td align="center" class="btn">
                <a class="btn-kiri" href="index.php?page=edit_nilai&kdmtk=<?= $kode ?>&nim=<?= $nim ?>">Edit </a>
                |
                <a class="btn-kanan" onClick="return confirm('Apakah Anda yakin mau menghapus data ini?')"
                    href="index.php?page=del_nilai&kdmtk=<?= $kode ?>&nim=<?= $nim ?> ">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table><br />
    <h4>
        <a href="index.php?page=entry_nilai">+ Entri Nilai Mahasiswa</a>
    </h4>
    </h4>
</article>