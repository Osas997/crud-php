<?php
$conn = mysqli_connect("localhost", "root", "", "latihan");

function Register($data)
{
   global $conn;

   $username = strtolower($data["username"]);
   $password1 = mysqli_real_escape_string($conn, $data["password1"]);
   $password2 = mysqli_real_escape_string($conn, $data["password2"]);

   $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
   if (mysqli_num_rows($result) > 0) {
      echo "<script> alert('Username Sudah ada') </script>";
      return 0;
   }

   if ($password1 !== $password2) {
      echo "<script> alert('password tidak sama') </script>";
      return 0;
   }

   $password = password_hash($password1, PASSWORD_DEFAULT);

   $query = "INSERT INTO `user` (`id_user`, `username`, `password`) VALUES (NULL, '$username', '$password')";

   mysqli_query($conn, $query);
   return mysqli_affected_rows($conn);
}
