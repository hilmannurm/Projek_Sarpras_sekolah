<?php
// memulai session agar data login (role) bisa dibaca
session_start();

// jika sudah ada role di session (artinya pengguna sudah login)
if (isset($_SESSION['role'])) {
    // jika role-nya admin
    if ($_SESSION['role'] === 'admin') {
        // arahkan ke halaman dashboard admin
        header("Location: Views/Admin/dashboard_admin.php");
        // hentikan program agar kode di bawahnya tidak dijalankan
        exit();
    } elseif ($_SESSION['role'] === 'siswa') {
        // jika role-nya siswa, arahkan ke halaman dashboard siswa
        header("Location: Views/Siswa/dashboard_siswa.php");
        // hentikan program setelah pengalihan
        exit();
    } 
}

//  Bagian header ke form_login digunakan untuk mengarahkan
//  user ke halaman login jika belum memiliki session atau belum login
header("Location: Views/login.php");
// hentikan program setelah pengalihan ke halaman login
exit();
?>