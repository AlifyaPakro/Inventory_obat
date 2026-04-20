<?php

include "koneksi.php";

if(isset($_POST['tambah'])){
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_handphone = $_POST['no_hp'];

    if($nama == ''){
        echo "<script>alert('Nama supplier tidak boleh kosong');</script>";
    }else{
        $insert = mysqli_query($connect, "INSERT INTO supplier(nama, email, no_hanphone)
        VALUES('$nama', '$email', '$no_handphone')");

        if($insert){
            echo "<script>alert('Data Berhasil Ditambahkan');window.location='?page=suppiler;'</script>";
        }else{
            echo "<script>alert('Data Gagal Ditambahkan');</script>";
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

    <title>Inventory tambah kategori</title>

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
                                        <h1 class="h4 text-gray-900 mb-4">Tambah Data Supplier</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="nama" class="form-control"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Nama Supplier">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="no_hp" class="form-control"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="No Handphone">
                                        </div>
                                        <button type="submit" name="tambah" class="btn btn-danger btn-user btn-block">
                                            Tambah Data
                                        </button>
                                        <a href="?page=suppiler" class="btn btn-danger btn-user btn-block">
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