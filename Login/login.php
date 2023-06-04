<?php
include("koneksi.php");
if (isset($_POST["login"])) {
   $error = Login($_POST);
}
?>
<!doctype html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Login</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
   <div class="container">
      <div class="row align-items-center d-flex justify-content-center" style="height: 100vh;">
         <div class="col-12 col-md-6">
            <h1 class="text-center text-primary">Halaman Login</h1>
            <?php
            if (isset($error)) {
               if ($error === "password") { ?>
                  <h5 class="text-center text-danger">password salah</h5>
               <?php } else if ($error === "username") { ?>
                  <h5 class="text-center text-danger">username tidak ada</h5>
            <?php }
            } ?>
            <form action="" method="post">
               <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Username</label>
                  <input autocomplete="off" value="<?php if (isset($_COOKIE["username"])) echo $_COOKIE['username'] ?>" name="username" required type="text" class="form-control" id="exampleInputEmail1">
               </div>
               <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input autocomplete="off" name="password" required type="password" class="form-control" id="exampleInputPassword1">
               </div>
               <div class="mb-3 form-check d-flex justify-content-between">
                  <div>
                     <input <?php if (isset($_COOKIE["username"])) echo "checked" ?> name="ingat" type="checkbox" class="form-check-input" id="exampleCheck1">
                     <label class="form-check-label" for="exampleCheck1">Ingat Username</label>
                  </div>
                  <a class="text-end" href="../register/register.php">Register</a>
               </div>
               <button name="login" type="submit" class="btn btn-primary">Login</button>

            </form>
         </div>
      </div>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>