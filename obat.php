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
    
    <div class="card shadow mb-4 w-100">
                        <div class="card-header py-3 d-flex justify-content-between">
                            <h6 class="m-0 font-weight-bold text-danger">Data Obat</h6>
                            <?php if($_SESSION['user']['level'] == 'admin'): ?>
                            <a href="index.php?page=tambah_obat" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">
                                            Tambah Obat
                                        </a>
                            <?php endif; ?>
                        </div>
                         <div class="card-body">
                            <div class="table-responsive ">
                                <table class="table table-bordered" method='GET'>
                                    <tr class="text-center">
                                        <th>Id</th>
                                        <th>Nama Obat</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Satuan</th>
                                        <th>Tanggal Kedeluarsa</th>
                                        <th>Keterangan</th>
                                        <th>Kategori</th>
                                        <th>Kedeluarsa</th>
                                        <?php if($_SESSION['user']['level'] == 'admin'): ?>
                                        <th>Action</th>
                                        <?php endif; ?>
                                    </tr>
                                    <?php 
                                    while($t = mysqli_fetch_assoc($sql)):
                                    ?>
                                    <tr class="text-center">
                                        <td><?php echo $t['id_obat']; ?></td>
                                        <td><?php echo $t['nama_obat']; ?></td>
                                        <td><?php echo $t['harga']; ?></td>
                                        <td><?php echo $t['stok']; ?></td>
                                        <td><?php echo $t['satuan']; ?></td>
                                        <td><?php echo $t['tanggal_kedeluarsa']; ?></td>
                                        <td><?php echo $t['keterangan']; ?></td>
                                        <td><?php echo $t['id_kategori']; ?></td>
                                        <td>
                                            <?php 
                                            $today = new DateTime();

                                            $tgl_kedeluarsa = new DateTime($t['tanggal_kedeluarsa']);
                                            $selisih = $today->diff($tgl_kedeluarsa)->days;

                                            if($today > $tgl_kedeluarsa){
                                                echo 'Kedeluarsa <i class="fa-solid fa-triangle-exclamation text text-danger"></i>';
                                            }elseif($selisih <= 30){
                                                echo $selisih, 'Hari <i class="fa-solid fa-circle-info text text-warning"></i>';
                                            }else{
                                                echo 'Aman <i class="fa-solid fa-circle-check text text-success"></i>';
                                            }
                                            
                                            ?>
                                        </td>
                                        <?php if($_SESSION['user']['level'] == 'admin'): ?>
                                        <td><a href="index.php?page=update_obat&id=<?= $t['id_obat']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                                            <i class="fa-solid fa-file-pen"></i></a>
                                            <a href="index.php?page=hapus_obat&id=<?= $t['id_obat']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?')" class="d-none d-sm-inline-block btn btn-sm btn-danger ml-2 shadow-sm">
                                            <i class="fa-solid fa-trash">
                                            </i>
                                        </a></td>
                                        <?php endif; ?>
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