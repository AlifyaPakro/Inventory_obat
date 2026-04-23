<?php

include "koneksi.php";

$id = $_GET['id'];
$query = mysqli_query($connect, "SELECT * FROM user WHERE id_user = '$id'");
$isi = mysqli_fetch_array($query);

if(!isset($id)){
    echo "<script>alert('Id tidak ditemukan');
    window.location='?page=profil';</script>";
}

if(isset($_POST['update'])){
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $no_handphone = $_POST['no_hp'];
    $status = $_POST['status'];
    $level = $_POST['level'];

    $update = mysqli_query($connect, "UPDATE user SET
    username = '$username',
    email = '$email',
    no_hanphone = '$no_handphone',
    status = '$status',
    level = '$level'
    WHERE id_user = '$id_user'
    ");
    if($update){
        echo "<script>alert('Supplier Berhasil Diupdate');
        window.location='?page=profil';</script>";
    }else{
        echo "<script>alert('Data Kategori Gagal Diupdate');</script>";
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

    <title>Inventory update obat</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
    

    <div class="container">
         <a href="?page=kategori" class="btn btn-danger btn-user btn-block w-25">
             Back
         </a>

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-10 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Edit</h1>
                                    </div>
                                    <form class="user" method="POST">
                                        <input type="hidden" name="id_user" value="<?= $isi['id_user']; ?>">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                value="<?= $isi['username']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control mb-3"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                value="<?= $isi['email']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="no_hp" class="form-control mb-3"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                value="<?= $isi['no_hanphone']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="status" class="form-control mb-3"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                value="<?= $isi['status']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="level" class="form-control mb-3"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                value="<?= $isi['level']; ?>">
                                        </div>
                                        <button type="submit" name="update" class="btn btn-danger btn-user btn-block">
                                            Update
                                        </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>