<?php
include("koneksi.php");
if (isset($_POST["register"])) {
   if (Register($_POST) > 0) {
      echo "<script> alert('Register Berhasil') </script>";
      echo "<script> window.location.href = '../login/login.php' </script>";
   }
}
?>

<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Register</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
   <div class="container">
      <div class="row align-items-center d-flex justify-content-center" style="height: 100vh;">
         <div class="col-12 col-md-6">
            <h1 class="text-center text-primary">Halaman Register</h1>
            <form action="" method="post">
               <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Username</label>
                  <input autocomplete="off" name="username" required type="text" class="form-control" id="exampleInputEmail1">
               </div>
               <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input autocomplete="off" name="password1" required type="password" class="form-control" id="exampleInputPassword1">
               </div>
               <div class="mb-3">
                  <label for="exampleInputPassword2" class="form-label">Ulang Password</label>
                  <input autocomplete="off" name="password2" required type="password" class="form-control" id="exampleInputPassword2">
               </div>
               <div class="mb-3 form-check d-flex justify-content-end">
                  <a class="text-end" href="../login/login.php">Login</a>
               </div>
               <button name="register" type="submit" class="btn btn-primary">Register</button>
            </form>
         </div>
      </div>
   </div>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>