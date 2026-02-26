<?php

include "koneksi.php";

$id = $_GET['id'];

$delete = mysqli_query($connect, "DELETE FROM kategori WHERE id_kategori = '$id'");

if($delete){
    echo "<script>alert('Kategori Berhasil dihapus');
    window.location='?page=kategori';</script>";
}else{
    echo "<script>alert('KLategori Gagal dihapus');
    window.location='?page=kategori';</script>";
}

?>