<?php
include_once 'koneksi.php';

$kode = $_GET['mtk'];

$query="DELETE from tblmatkul where kd_mtk='$kode'";
$exequerry = mysqli_query($conn, $query);
if($exequerry) {
    $pesan = "hapus berhasil";
} else {
    $pesan = "Hapus Gagal";
}



echo "<script>alert('$pesan'); document.location= 'index.php?page=master_matkul'</script>";
?>