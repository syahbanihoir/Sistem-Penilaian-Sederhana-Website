<article>
    <h2 align="center">Input Data Matakuliah</h2>
    <div class="container">
        <form id="Form-Add-Mtk" action="" method="post">
            <p style="margin-top: 0;">Kode Matakuliah : </p> <input type="text" name="kode"
                placeholder="Kode Matakuliah" required /> <br />
            <p>Nama Mata Kuliah : </p> <input type="text" name="namamatkul" placeholder="Nama MataKuliah" required />
            <br />
            <p>SKS : </p><input type="number" name="sks" placeholder="sks" min="1" max="20" required /> <br /><br />
            <input type="submit" name="input" value="input" />
            <input type="button" onclick="myFunction()" value="Reset">
        </form>
    </div>
    <?php
    if (isset($_POST['input'])) {
        $kode = $_POST['kode'];
        $namamtk = $_POST['namamatkul'];
        $sks = $_POST['sks'];

        include_once "koneksi.php";
        $query = "INSERT INTO tblmatkul values ('$kode', '$namamtk', ' $sks')";

        $exequerry = mysqli_query($conn, $query);


        if ($exequerry) {
            $pesan = "Tambah matakuliah berhasil";
            echo "<script>alert(' $pesan');document.location='index.php?page=master_matkul'</script>";
        } else {
            $pesan = "Tambah Matakuliah gagal";
        }
    }
    ?>
    <script>
    function myFunction() {
        document.getElementById("Form-Add-Mtk").reset();
    }
    </script>



</article>