<?php

include "koneksi.php";

$id = $_GET['id'];

$delete = mysqli_query($connect, "DELETE FROM supplier WHERE id_supplier = '$id'");

if($delete){
    echo "<script>alert('Kategori Berhasil dihapus');
    window.location='?page=suppiler';</script>";
}else{
    echo "<script>alert('supplier Gagal dihapus');
    window.location='?page=suppiler';</script>";
}

?>