<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// 1. Cek apakah pengguna sudah login
if (!isset($_SESSION['role'])) {
    echo "<script>
            alert('Anda belum login! Silakan login terlebih dahulu.');
            window.location='/Projek_Sapras_hilman/Views/login.php';
          </script>";
    exit();
}

// 2. Cek apakah role pengguna BUKAN admin
if ($_SESSION['role'] !== 'admin') {
    echo "<script>
            
            window.history.back();
          </script>";
    exit();
}
?>


<!-- Kode ini digunakan untuk mengamankan halaman. Pertama mengecek session, lalu memastikan user sudah login
 Setelah itu dicek apakah role user adalah siswa. Jika tidak, maka user akan diarahkan ke halaman lain -->