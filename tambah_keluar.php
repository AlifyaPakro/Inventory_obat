<?php

include "koneksi.php";

$obat = mysqli_query($connect, "SELECT * FROM obat");
$user = mysqli_query($connect, "SELECT * FROM user");

if(isset($_POST['tambah'])){
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];
    $keterangan = $_POST['keterangan'];
    $id_user = $_POST['id_user'];
    $id_obat = $_POST['id_obat'];

    if($id_obat == ''){
        echo "<script>alert('Data ini tidak boleh kosong');window.location='?page=tambah_masuk';</script>";
    }else{
        $insert = mysqli_query($connect, "INSERT INTO stok_keluar(jumlah, tanggal, keterangan, id_user, id_obat)
        VALUES('$jumlah', '$tanggal', '$keterangan', '$id_user', '$id_obat')");

        if($insert){
            echo "<script>alert('Data berhasil ditambahkan');window.location='?page=stok_keluar';</script>";
        }else{
            echo "<script>alert('Data gagal ditambahkan');window.location='?page=stok_keluar';</script>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inventory</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
    
    <div class=" w-100 row justify-content-center">
    <div class="col-xl-6 col-lg-10 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Stok Keluar</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <select name="id_obat" class="form-control">
<option value="">Pilih Obat</option>
<?php while($o = mysqli_fetch_assoc($obat)): ?>
<option value="<?= $o['id_obat']; ?>">
<?= $o['nama_obat']; ?>
</option>
<?php endwhile; ?>
</select>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" name="jumlah" class="form-control" placeholder="Jumlah keluar">
                                        </div>
                                        <div class="form-group">
                                            <input type="date" name="tanggal" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="keterangan" class="form-control" placeholder="Keterangan">
                                        </div>
                                        <div class="form-group">
                                            <select name="id_user" class="form-control">
<option value="">Pilih User</option>
<?php while($u = mysqli_fetch_assoc($user)): ?>
<option value="<?= $u['id_user']; ?>">
<?= $u['username']; ?>
</option>
<?php endwhile; ?>
</select>
                                        </div>
                                        <button type="submit" name="tambah" class="btn btn-danger btn-user btn-block">
                                            Tambah Data
                                        </button>
                                        <a href="?page=stok_keluar" class="btn btn-danger btn-user btn-block">
                                            Back
                                        </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </div>
</body>
</html>