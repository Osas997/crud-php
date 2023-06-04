<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "latihan");

if (isset($_SESSION['login'])) {
   echo "<script>window.location.href = '../index.php'</script>";
}

function Login($data)
{
   global $conn;
   $username = $data["username"];
   $password = $data["password"];

   $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

   if (mysqli_num_rows($result) > 0) {
      $hasil = mysqli_fetch_assoc($result);
      if (password_verify($password, $hasil["password"])) {
         $_SESSION["login"] = $username;

         if (isset($data["ingat"])) {
            setcookie("username", $username, time() * 30);
         } else {
            setcookie("username", "", time() - 3600);
         }

         header("Location: ../index.php");
         exit;
      } else {
         $error = "password";
      }
   } else {
      $error = "username";
   }

   return $error;
}
