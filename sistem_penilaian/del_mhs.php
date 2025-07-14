<?php
include_once 'koneksi.php';

$nim = $_GET['mhs'];

$query="DELETE from tblmhs where nim='$nim'";
$exequerry = mysqli_query($conn, $query);
if($exequerry) {
    $pesan = "hapus berhasil";
} else {
    $pesan = "Hapus Gagal";
}



echo "<script>alert('$pesan'); document.location= 'index.php?page=master_mhs'</script>";
?>