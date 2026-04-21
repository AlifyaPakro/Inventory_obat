<?php

include "koneksi.php";

$id = $_GET['id'];

$hapus = mysqli_query($connect, "DELETE FROM stok_masuk WHERE id_masuk = '$id'");

if($hapus){
    echo "<script>alert('Data Berhasil Dihapus');window.location='?page=stok_masuk';</script>";
}else{
    echo "<script>alert('Data Gagal Dihapus');window.location='?page=stok_masuk';</script>";
}
?>