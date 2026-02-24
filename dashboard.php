<?php

include 'koneksi.php';


$sql = mysqli_query($connect, 'SELECT * FROM obat');

$query_kedeluarsa = mysqli_query($connect, 'SELECT COUNT(*) AS tanggal_kedeluarsa FROM obat WHERE tanggal_kedeluarsa < CURDATE()');
$data = mysqli_fetch_assoc($query_kedeluarsa);
$data_kedeluarsa = $data['tanggal_kedeluarsa'];

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
</head>
<body>
    <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Obat</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= mysqli_num_rows(mysqli_query($connect, 'SELECT * FROM obat')); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-capsules"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                kategori</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= mysqli_num_rows(mysqli_query($connect, 'SELECT * FROM kategori')); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-layer-group"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if($_SESSION['user']['level'] == 'admin'): ?>
                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                User</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= mysqli_num_rows(mysqli_query($connect, 'SELECT * FROM user')); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if(isset($_SESSION['user']['level']) && in_array($_SESSION['user']['level'], ['admin', 'petugas'])): ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Obat Kedeluarsa</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?= $data_kedeluarsa  ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-triangle-exclamation"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Supplier</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= mysqli_num_rows(mysqli_query($connect, 'SELECT * FROM supplier')); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-hand-holding-dollar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Stok masuk</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= mysqli_num_rows(mysqli_query($connect, 'SELECT * FROM stok_masuk')); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-chart-simple"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Stok Keluar</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= mysqli_num_rows(mysqli_query($connect, 'SELECT * FROM stok_keluar')); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-solid fa-chart-simple"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>


                
    
</body>
</html>