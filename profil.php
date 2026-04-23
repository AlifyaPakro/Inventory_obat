<?php

include "koneksi.php";

$sql = mysqli_query($connect, "SELECT * FROM user");
$u = mysqli_fetch_assoc($sql);

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
                                    <div class="row justify-content-center text-center">
                                        <div class="">
                                            <div class="">
                                                <img src="img/undraw_profile.svg" alt="Foto" width="100px">
                                                <div class="">
                                                    <h2><?= $u['username'] ?></h2>
                                                </div>
                                            </div>
                                            <div class="">
                                                <table class="table table-border">
                            <tr>
                                <td width="150"><strong>Username</strong></td>
                                <td width="1">:</td>
                                <td width="200"><?= $u['username']; ?></td>
                            </tr>
                            <tr>
                                <td width="150"><strong>Email</strong></td>
                                <td width="1">:</td>
                                <td width="200"><?= $u['email']; ?></td>
                            </tr>
                            <tr>
                                <td width="150"><strong>No Handphone</strong></td>
                                <td width="1">:</td>
                                <td width="200"><?= $u['no_hanphone']; ?></td>
                            </tr>
                            <tr>
                                <td width="150"><strong>Status</strong></td>
                                <td width="1">:</td>
                                <td width="200"><?= $u['status']; ?></td>
                            </tr>
                            <tr>
                                <td width="150"><strong>Level</strong></td>
                                <td width="1">:</td>
                                <td width="200"><?= $u['level']; ?></td>
                            </tr>
                            <tr>
                                <td width="150"><strong>Tanggal Login</strong></td>
                                <td width="1">:</td>
                                <td><?= date('d-m-y'); ?></td>
                            </tr>
                        </table>
                                        <a href="?page=update_profil&&id=<?= $u['id_user'] ?>" class="btn btn-danger btn-user btn-block">
                                            Edit
                                        </a>
                                        <a href="?page=dashboard" class="btn btn-danger btn-user btn-block">
                                            Back
                                        </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </div>
</body>
</html>