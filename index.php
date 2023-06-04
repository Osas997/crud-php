<?php
session_start();
if (!isset($_SESSION["login"])) {
   header("Location: login/login.php");
   exit;
}

if (isset($_COOKIE["username"])) {
   echo "ppepeq";
}
include("koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./style.css">
   <title>Tes</title>
   <link rel="shortcut icon" href="img/ei.png" type="image/x-icon">
</head>

<body>
   <div class="tabel">
      <h2 style="text-align: center;">SELAMAT DATANG KEMBALI <?= strtoupper($_SESSION["login"]) ?></h2>
      <h1>TABEL MAHASISWA</h1>
      <div class="cari-wrapper">
         <div>
            <a href="form.php" class="btn-tambah">Tambah Data</a>
            <a href="logout.php" class="btn">Logut</a>
         </div>
         <form action="" method="post">
            <input oninput="validate()" id="cari" type="text" name="keyword" class="cari" placeholder="Searching" autocomplete="none">
            <button disabled id="btn-cari" type="submit" class="btn btn-cari" name="cari">Cari</button>
         </form>
      </div>
      <table border="1" cellspacing="0">
         <thead>
            <tr>
               <th class="no-baris">No</th>
               <th class="nim-baris">Nim</th>
               <th>Nama</th>
               <th>Email</th>
               <th class="aksi">Aksi</th>
            </tr>
         </thead>
         <tbody>
            <?php
            $no = 1;
            $mahasiswa = getMahasiswa();
            if (isset($_POST["cari"])) {
               $mahasiswa = cariMahasiswa($_POST["keyword"]);
            }
            foreach ($mahasiswa as $mhs) : ?>
               <tr>
                  <td><?= $no ?></td>
                  <td><?= $mhs["nim"]  ?></td>
                  <td><a href=""><?= $mhs["nama"] ?></a></td>
                  <td><?= $mhs["email"]  ?></td>
                  <td><a class="btn btn-blue" href="edit.php?id=<?= $mhs["id"] ?>">Edit</a> | <a class="btn" href="hapus.php?id=<?= $mhs["id"] ?>" onclick="return confirm('yakin Hapus?')">Delete </a></td>
               </tr>
            <?php $no++;
            endforeach ?>
         </tbody>
      </table>
   </div>

   <script>
      const btn = document.getElementById("btn-cari")
      const cariInput = document.getElementById("cari")

      function validate() {
         btn.disabled = cariInput.value === "" ? true : false;
      }
   </script>
</body>

</html>