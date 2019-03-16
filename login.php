<?php
require_once "function/config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>sensus penduduk</title>
	<meta name="description" content="Free Bootstrap 4 Admin Theme | Pike Admin">
	<meta name="author" content="Pike Web Development - https://www.pikephp.com">

	<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/tugas.css" rel="stylesheet" type="text/css" />
</head>

<body> 
<div class="container box">
   <div class="card box-top" style="max-width: 20rem;">
      <div class="card-header text-center box-header">login user</div>
      <div class="card-body box-body">
<form action="" method="post">
        <div class="form-group form-pad text-center">   
               <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-at"></i></span>
                  <input type="email" class="form-control" placeholder="masukkan email anda" name="email" autocomplete="off" required autofocus>
               </div>
            <div class="form-group form-pad">
               <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fa fa-key"></i></span>
                  <input type="password" class="form-control" placeholder="masukkan password anda" name="password" autocomplete="off" required>
               </div>      
            </div>
         </div>
            <button type="submit" class="btn btn-primary" name="login">kirim</button>
</form>
<?php
              if (isset($_POST['login'])) {
                $email=trim(mysqli_real_escape_string($conn,$_POST['email']));
                $pass=trim(mysqli_real_escape_string($conn,$_POST['password']));

                $sql=mysqli_query($conn,"SELECT * FROM user WHERE email='$email' AND password='$pass'") or die(mysqli_error($conn));
                $cek=mysqli_num_rows($sql);
                if($cek==1){

                $_SESSION['user']=mysqli_fetch_assoc($sql);
                     echo "<script>
                                  alert('berhasil login');
                               </script>";
                       ?>
                       <script>
                          window.location.href='index.php?halaman=home';
                       </script>
                       <?php
                          }else{
                                 echo "<div class='alert alert-danger'>gagal masuk</div>";      
                    }
                }
           ?>
      </div>
   </div>
</div>
<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/package/dist/sweetalert2.all.min.js"></script>
	<script src="assets/js/pikeadmin.js"></script>
	<script src="assets/js/tugas.js"></script>
</body>

</html>