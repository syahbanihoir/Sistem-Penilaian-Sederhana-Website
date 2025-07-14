<article>
    <h2 align="center">Data Matakuliah</h2>
    <?php
    include_once "koneksi.php";

    $query = "SELECT * FROM tblmatkul ORDER BY kd_mtk";
    $sql = mysqli_query($conn, $query);
    ?>
    <table border="1">
        <tr>
            <th>NO</th>
            <th>KODE</th>
            <th>Nama MataKuliah</th>
            <th>SKS</th>
            <th>PROSES</th>
        </tr>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($sql)) {
            $kode = $row['kd_mtk'];
            $nmmtk = $row['nm_mtk'];
            $sks = $row['sks'];
        ?>
        <tr>
            <td align="center"><?php echo $no++ ?></td>
            <td align="center"><?php echo $kode ?></td>
            <td align="center"><?php echo $nmmtk ?></td>
            <td align="center"><?php echo $sks ?></td>
            <td align="center" class="btn">
                <a class="btn-kiri" href="index.php?page=edit_matkul&mtk=<?= $kode ?>">Edit </a>
                |
                <a class="btn-kanan" onClick="return confirm('Apakah Anda yakin mau menghapus data ini?')"
                    href="index.php?page=del_matkul&mtk=<?= $kode ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table> <br />
    <h4>
        <a href="index.php?page=add_matkul">+ Tambah Matakuliah Baru</a>
    </h4>
</article>