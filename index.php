<?php
session_start();

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === 'admin') {
        header("Location: ../Views/dashboard_admin.php");
        exit();
    } elseif ($_SESSION['role'] === 'siswa') {
        header("Location: ../Views/dashboard_siswa.php");
        exit();
    } 
}

//  Bagian header ke form_login digunakan untuk mengarahkan
//  user ke halaman login jika belum memiliki session atau belum login
header("Location: Views/login.php");
exit();
?>