<?php

include "koneksi.php";

$query = mysqli_query($connect, "SELECT * FROM user");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inventory Obat</title>

    <!-- Custom fonts for this template-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css//costum.css">
    <link rel="shortcut icon" href="img/logo_fav.png" type="image/x-icon">
</head>
<body>
    <div class="card shadow mb-4 w-100">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-danger">Data User</h6>
                        </div>
                         <div class="card-body">
                            <div class="table-responsive ">
                                <table class="table table-bordered" method='GET'>
                                    <tr class="text-center">
                                        <th>Id</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>No Hanphone</th>
                                        <th>Status</th>
                                        <th>Level</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php 
                                    while($u = mysqli_fetch_assoc($query)):
                                    ?>
                                    <tr class="text-center">
                                        <td><?= $u['id_user']; ?></td>
                                        <td><?= $u['username']; ?></td>
                                        <td><?= $u['email']; ?></td>
                                        <td><?= $u['no_hanphone']; ?></td>
                                        <td><?= $u['status']; ?></td>
                                        <td><?= $u['level']; ?></td>
                                        <td>
                                            <a href="index.php?page=hapus_user&id=<?= $u['id_user']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="d-none d-sm-inline-block btn btn-sm btn-danger ml-2 shadow-sm">
                                            <i class="fa-solid fa-trash">
                                            </i>
                                        </a></td>
                                    </tr>
                                    <?php 
                                    endwhile;
                                    ?>
                        
                                </table>
                            </div>
                        </div>
    </div>
</body>
</html>