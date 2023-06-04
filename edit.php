<?php include("koneksi.php");
// get data sebelumnya
if (isset($_GET["id"])) {
   $id = $_GET["id"];
   $results = getMahasiswaBy($id);
}
// ubah data
if (isset($_POST["submit"])) {
   if (editMahasiswa($_GET["id"], $_POST) > 0) {
      echo "<script>
      alert('Berhasil Diupdate'); 
      document.location.href = 'index.php';
      </script>";
   } else {
      echo "<script>
      alert('gagal Di update'); 
      document.location.href = 'index.php';
      </script>";
   }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Form</title>
   <style>
      html,
      body,
      * {
         margin: 0;
         padding: 0;
      }

      .container {
         width: 80%;
         min-height: 100vh;
         margin: auto;
         display: flex;
         justify-content: center;
         align-items: center;
      }

      .wrapper {
         width: 70%;
         background-color: #7c3aed;
         border-radius: 20px;
         padding: 15px;
         display: flex;
         flex-direction: column;
         align-items: center;
         /* justify-content: center; */
         color: white;
      }

      h1 {
         text-align: center;
         padding: 5px;
      }

      form {
         padding: 25px;
      }

      label,
      input {
         display: inline-block;
         margin: 15px 0px;
      }

      input {
         padding: 10px 20px;
         width: 400px;
         margin: 10px 0px;
         border-radius: 15px;
      }

      button {
         display: block;
         color: white;
         cursor: pointer;
         margin: 15px 0px 0px;
         padding: 10px 25px;
         border: 1px solid black;
         border-radius: 30px;
         background-color: #4f46e5;
      }

      .btn-wrap {
         width: 100%;
         display: flex;
         justify-content: center;
      }
   </style>
</head>

<body>
   <div class="container">
      <div class="wrapper">
         <h1>Form Mahasiswa</h1>
         <form action="" method="post">
            <?php
            if (isset($results)) { ?>
               <input type="text" name="nim" required id="nim" placeholder="Masukkan Nim" value="<?= $results['nim'] ?>">
               <br>
               <input type="text" name="nama" required id="nama" placeholder="Masukkan Nama" value="<?= $results['nama'] ?>">
               <br>
               <input type="email" name="email" required id="email" placeholder="Masukkan email" value="<?= $results['email'] ?>">
               <br>
               <div class="btn-wrap">
                  <button type="submit" name="submit">Update Coy</button>
               </div>
            <?php } else { ?>
               <h1>Tidak ada Data</h1>
            <?php } ?>
         </form>
      </div>
   </div>
</body>

</html>