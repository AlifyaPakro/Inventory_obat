<?php

include "koneksi.php";

$id = $_GET['id'];

$delete = mysqli_query($connect, "DELETE FROM user WHERE id_user = '$id'");

if($delete){
    echo "<script>alert('User Berhasil dihapus');
    window.location='?page=user';</script>";
}else{
    echo "<script>alert('User Gagal dihapus');
    window.location='?page=user';</script>";
}

?>