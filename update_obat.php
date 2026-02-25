<?php

include 'koneksi.php';

$sql = mysqli_query($connect, 'SELECT * FROM kategori');

$id = $_GET['id'];
$query = mysqli_query($connect, "SELECT * FROM obat WHERE id_obat = '$id'");
$sql_kategori = mysqli_query($connect, 'SELECT * FROM kategori');
$sql_kategori_dropdown = mysqli_query($connect, 'SELECT * FROM kategori');
$obat = mysqli_fetch_assoc($query);

if(!isset($_GET['id'])){
    echo "<script>alert('ID tidak ditemukan');window.location='obat.php';</script>";
    exit;
}

if(isset($_POST['update'])){
    $id_obat = $_POST['id_obat'];
    $nama = $_POST['nama_obat'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $satuan = $_POST['satuan'];
    $tanggal_kedeluarsa = $_POST['tanggal_kedeluarsa'];
    if(empty($_POST['id_kategori'])){
    echo "<script>alert('Kategori harus dipilih');history.back();</script>";
    exit;
}
    $keterangan = $_POST['keterangan'];
    $id_kategori = $_POST['id_kategori'];
    $update = mysqli_query($connect, "UPDATE obat SET 
    nama_obat = '$nama',
    harga = '$harga',
    stok = '$stok',
    satuan = '$satuan',
    tanggal_kedeluarsa = '$tanggal_kedeluarsa',
    keterangan = '$keterangan',
    id_kategori = '$id_kategori'
    WHERE id_obat = '$id_obat'");
    if($update){
        echo "<script>alert('Data berhasil di update');
        window.location='index.php?page=obat';</script>";
    }else{
        echo "<script>alert('Data gagal di update');</script>";
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
         

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-10 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5 text-center">
                                    <h4 class="pb-4"> Kategori</h4>
                                    <table class="table table-bordered">
                    <tr>
                        <td>ID</td>
                        <td>Nama Kategori</td>
                    </tr>
                    <?php while($i = mysqli_fetch_assoc($sql_kategori)): ?>
                        <td><?php echo $i['id_kategori']; ?></td>
                        <td><?php echo $i['nama_kategori']; ?></td>
                    <?php endwhile; ?>
                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

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
                                        <input type="hidden" name="id_obat" value="<?= $obat['id_obat']; ?>">
                                        <div class="form-group">
                                            <input type="text" name="nama_obat" class="form-control``"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                value="<?= $obat['nama_obat']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="harga" class="form-control"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                value="<?= $obat['harga']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="stok" class="form-control"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                value="<?= $obat['stok']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="satuan" class="form-control"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                value="<?= $obat['satuan']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="tanggal_kedeluarsa" class="form-control"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                value="<?= $obat['tanggal_kedeluarsa']; ?>">
                                        </div>
                                         <div class="form-group">
                                            <input type="text" name="keterangan" class="form-control"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                value="<?= $obat['keterangan']; ?>">
                                        </div>
                                        <div class="form-group">
                                           <select name="id_kategori" class="form-control">
                                            <option value="">Pilih Kategori</option>

                                            <?php while($i = mysqli_fetch_assoc($sql_kategori_dropdown)): ?>
                                            <option value="<?= $i['id_kategori']; ?>"
                                            <?= $i['id_kategori'] == $obat['id_kategori'] ? 'selected' : '' ?>>
                                            <?= $i['nama_kategori']; ?>
                                            </option>
                                            <?php endwhile; ?>
                                            </select>
                                        </div>
                                        <button type="submit" name="update" class="btn btn-primary btn-user btn-block">
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