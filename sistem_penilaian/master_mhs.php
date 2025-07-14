<article>
    <h2 align="center">Data Mahasiswa</h2>
    <?php
    include_once "koneksi.php";

    $query = "SELECT * FROM tblmhs ORDER BY nim";
    $sql = mysqli_query($conn, $query);
    
    ?>
    <table border="1">
        <tr>
            <th>NO</th>
            <th>NIM</th>
            <th>NAMA</th>
            <th>TGLLAHIR</th>
            <th>ALAMAT</th>
            <th>PROSES</th>
        </tr>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($sql)){
            $nim = $row['nim'];
            $nama = $row['nama'];
            $tgllahir = date('d-m-Y', strtotime($row['tgllahir']));
            $alamat = $row['alamat'];
        ?>
        <tr>
            <td align="center"><?php echo $no++ ?></td>
            <td align="center"><?php echo $nim ?></td>
            <td align="center"><?php echo $nama ?></td>
            <td align="center"><?php echo $tgllahir ?></td>
            <td align="center"><?php echo $alamat ?></td>
            <td align="center" class="btn">
                <a class="btn-kiri" href="index.php?page=edit_mhs&mhs=<?=$nim?>">Edit </a>
                |
                <a class="btn-kanan" onClick="return confirm('Apakah Anda yakin mau menghapus data ini?')"
                    href="index.php?page=del_mhs&mhs=<?=$nim?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table><br />
    <h4>
        <a href="index.php?page=add_mhs">+ Tambah Mahasiswa Baru</a>
    </h4>
</article>