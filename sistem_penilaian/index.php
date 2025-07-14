<?php
session_start();
include "header.php";
include "navigasi.php";

$page = isset($_GET['page'])? $_GET['page']: "home";
switch ($page) {
    case 'master_mhs'      : include "master_mhs.php"; break;
    case 'master_matkul'   : include "master_matkul.php"; break;
    case 'tblnilai_mhs'    : include "tblnilai_mhs.php"; break;
    case 'add_mhs'     : include "add_mhs.php"; break;
    case 'edit_mhs'    : include "edit_mhs.php"; break;
    case 'del_mhs'     : include "del_mhs.php"; break;
    case 'add_matkul'  : include "add_matkul.php"; break;
    case 'edit_matkul' : include "edit_matkul.php"; break;
    case 'del_matkul'  : include "del_matkul.php"; break;
    case 'del_nilai'   : include "del_nilai.php"; break;
    case 'entry_nilai' : include "entry_nilai.php"; break;
    case 'edit_nilai'  : include "edit_nilai.php"; break;
    case 'aboutus'     : include "aboutus.php"; break;
    case 'home':
    default : include "home.php";
}

include "footer.php";
?>