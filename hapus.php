<?php
include("koneksi.php");
$id = $_GET["id"];
if (deleteMahasiswa($id) > 0) {
   echo "<script>alert('berhasil dihapus');location.href = 'index.php'</script>";
}
