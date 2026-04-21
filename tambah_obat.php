<?php

include "koneksi.php";

$kategori_drop = mysqli_query($connect, "SELECT * FROM kategori");

if(isset($_POST['tambah'])){
    $nama_obat = $_POST['nama_obat'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $satuan = $_POST['satuan'];
    $tanggal_kedeluarsa = $_POST['tanggal_kedeluarsa'];
    $keterangan = $_POST['keterangan'];
    $id_kategori = $_POST['id_kategori'];

    if($nama_obat == ''){
        echo "<script>alert('Data ini tidak boleh kosong');window.location='?page=tambah_obat';</script>";
    }else{
        $insert = mysqli_query($connect, "INSERT INTO obat(nama_obat, harga, stok, satuan, tanggal_kedeluarsa, keterangan, id_kategori)
        VALUES('$nama_obat', '$harga', '$stok', '$satuan', '$tanggal_kedeluarsa', '$keterangan', '$id_kategori')");

        if($insert){
            echo "<script>alert('Data berhasil ditambahkan');window.location='?page=obat';</script>";
        }else{
            echo "<script>alert('Data gagal ditambahkan');window.location='?page=obat';</script>";
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

    <title>Inventory tambah obat</title>

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
                                        <h1 class="h4 text-gray-900 mb-4">Tambah Data Obat</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="nama_obat" class="form-control"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="masukan nama obat">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="harga" class="form-control"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="masukan harga">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="stok" class="form-control"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="masukan stok">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="satuan" class="form-control"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="masukan satuan">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="tanggal_kedeluarsa" class="form-control"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="masukan tanggal kedeluarsa">
                                        </div>
                                         <div class="form-group">
                                            <input type="text" name="keterangan" class="form-control"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="masukan keterangan">
                                        </div>
                                        <div class="form-group">
                                           <select name="id_kategori" class="form-control">
                                            <option value="">Pilih Kategori</option>

                                            <?php while($i = mysqli_fetch_assoc($kategori_drop)): ?>
                                            <option value="<?= $i['id_kategori']; ?>">
                                            <?= $i['nama_kategori']; ?>
                                            </option>
                                            <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <button type="submit" name="tambah" class="btn btn-danger btn-user btn-block">
                                            Tambah Data
                                        </button>
                                        <a href="?page=obat" class="btn btn-danger btn-user btn-block">
                                            Back
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </div>
</body>
</html>