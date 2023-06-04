<?php
$conn = mysqli_connect("localhost", "root", "", "latihan");
if (!$conn) {
   die("Koneksi gagal");
}

function getMahasiswa()
{
   $query = "SELECT * FROM mahasiswa";
   global $conn;
   $db = mysqli_query($conn, $query);
   $results = [];
   while ($result = mysqli_fetch_assoc($db)) {
      $results[] = $result;
   }
   return $results;
}

function addMahasiswa($data)
{
   global $conn;
   if (isset($data["submit"])) {
      $nama = htmlspecialchars($data["nama"]);
      $nim = htmlspecialchars($data["nim"]);
      $email = htmlspecialchars($data["email"]);
      $query = "INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `email`) VALUES (NULL, '$nama', '$nim', '$email')";
      mysqli_query($conn, $query);
      return mysqli_affected_rows($conn);
   }
}

function deleteMahasiswa($id)
{
   global $conn;
   $query = "DELETE FROM mahasiswa WHERE id = $id";
   mysqli_query($conn, $query);
   return mysqli_affected_rows($conn);
}

function getMahasiswaBy($id)
{
   global $conn;
   $query = "SELECT * FROM mahasiswa WHERE id = $id";
   $result = mysqli_query($conn, $query);
   if (mysqli_affected_rows($conn) > 0) {
      return mysqli_fetch_assoc($result);
   }
}

function editMahasiswa($id, $data)
{
   $nama = htmlspecialchars($data["nama"]);
   $nim = htmlspecialchars($data["nim"]);
   $email = htmlspecialchars($data["email"]);
   global $conn;
   $query = "UPDATE `mahasiswa` SET `nama` = '$nama', `nim` = '$nim', `email` = '$email' WHERE `mahasiswa`.`id` = $id";
   mysqli_query($conn, $query);
   return mysqli_affected_rows($conn);
}

function cariMahasiswa($keyword)
{
   global $conn;
   $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$keyword%' OR nim LIKE '%$keyword%' OR email LIKE '%$keyword%'";
   $db = mysqli_query($conn, $query);
   $results = [];
   while ($result = mysqli_fetch_assoc($db)) {
      $results[] = $result;
   }
   return $results;
}
