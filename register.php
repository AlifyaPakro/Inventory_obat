<?php

include "koneksi.php";

$sql = mysqli_query($connect, "SELECT * FROM user");

if(isset($_POST['tambah'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $level = $_POST['level'];
    $no_hp = $_POST['no_hp'];
    $password = $_POST['password'];
    $password1 = $_POST['password1'];

    if($username == ""){
        echo "<script>alert('Username tidak boleh kosong');</script>";
    }else{
        if($password == $password1){
            $pw = md5($password);
            $query = mysqli_query($connect, "INSERT INTO user(username, email, status, level, password, no_hanphone)
            VALUES('$username','$email', '$status', '$level', '$pw', '$no_hp' )");

            if($query){
                echo "<script>alert('Berhasil Registrasi');window.location='login.php';</script>";
            }else{
                echo "<script>alert('Gagal Registrasi');</script>";
            }
        }else{
            echo "<script>alert('Masukkan Password yang sama');</script>";
        } 
    }
}
$level = mysqli_query($connect, "SHOW COLUMNS FROM user LIKE 'level'");
$l = mysqli_fetch_assoc($level);
preg_match("/^enum\(\'(.*)\'\)$/", $l['Type'], $matches);
$enum1 = explode("','", $matches[1]);

$status = mysqli_query($connect, "SHOW COLUMNS FROM user LIKE 'status'");
$s = mysqli_fetch_assoc($status);
preg_match("/^enum\(\'(.*)\'\)$/", $s['Type'], $matche);
$enum2 = explode("','", $matche[1]);


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class=" p-0">
                <!-- Nested Row within Card Body -->
                <div class="row justify-content-center">
                    <div class=""></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="username" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="username">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="email" name="email" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="email">
                                    </div>
                                </div>
                                <div class="col-sm-15 mb-3  mb-sm-3">
                                        <select type="text" name="status" class="form-control" id="exampleLastName"
                                            placeholder="status">
                                            <option value="">pilih status</option>
                                            <?php 
                                            foreach($enum2 as $e2):
                                            ?>
                                            <option value="<?php echo $e2 ?>"><?php echo $e2 ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                </div>
                                <div class="col-sm-15  mb-sm-3">
                                        <input type="text" name="no_hp" class="form-control"
                                            id="exampleRepeatPassword" placeholder="no handphone">
                                </div>
                                <div class="col-sm-15   mb-sm-3">
                                        <select type="text" name="level" class="form-control" id="exampleFirstName"
                                            placeholder="level">
                                            <option value="">pilih level</option>
                                            <?php 
                                            foreach($enum1 as $e1):
                                            ?>
                                            <option value="<?php echo $e1 ?>"><?php echo $e1 ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password1" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <button name="tambah" class="btn btn-danger btn-user btn-block">
                                    Register Account
                                </button>
                                <hr>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.php">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
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