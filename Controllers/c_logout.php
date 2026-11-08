<?php
// memulai session agar session yang sedang aktif bisa dihapus
session_start();

// menghapus semua variabel session (data login seperti role dan id)
session_unset();
// menghancurkan session sepenuhnya
session_destroy();

// mengarahkan pengguna ke halaman login
header("Location: ../Views/login.php");
// hentikan program setelah pengalihan
exit;
?>