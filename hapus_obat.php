<?php

include "koneksi.php";

$id = $_GET['id'];
$delete = mysqli_query($connect, "DELETE FROM obat WHERE id_obat = '$id'");
if($delete){
    echo "<script>
    alert('Data berhasil dihapus');
    window.location='index.php?page=obat';
    </script>";
}else{
    echo "<script>
    alert('Data gagal dihapus');
    window.location='index.php?page=tambah_keluar';
    </script>";
}



?>