<?php
// jika session belum dimulai
if (session_status() == PHP_SESSION_NONE) {
    // mulai session agar data login bisa dibaca
    session_start();
}

// 1. Cek apakah pengguna sudah login
// jika tidak ada role di session (artinya pengguna belum login)
if (!isset($_SESSION['role'])) {
    // tampilkan pesan peringatan, lalu arahkan ke halaman login memakai JavaScript
    echo "<script>
            alert('Anda belum login! Silakan login terlebih dahulu.');
            window.location='/Projek_Sapras_hilman/Views/login.php';
          </script>";
    // hentikan program agar halaman yang dilindungi tidak ditampilkan
    exit();
}

// 2. Cek apakah role pengguna BUKAN siswa
// jika role pengguna bukan siswa (misalnya pengguna lain mencoba membuka halaman ini)
if ($_SESSION['role'] !== 'siswa') {
    // kembalikan pengguna ke halaman sebelumnya memakai JavaScript history.back()
    echo "<script>
        
            window.history.back();
          </script>";
    // hentikan program agar halaman ini tidak ditampilkan
    exit();
}
?>

<!-- Kode ini digunakan untuk mengamankan halaman. Pertama mengecek session, lalu memastikan user sudah login
 Setelah itu dicek apakah role user adalah siswa. Jika tidak, maka user akan diarahkan ke halaman lain -->