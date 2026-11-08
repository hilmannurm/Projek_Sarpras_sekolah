<?php
// memulai session agar data login admin bisa dibaca
session_start();

// memanggil file model aspirasi agar class m_aspirasi bisa dipakai
require_once __DIR__ . '/../Models/m_aspirasi.php';

// membuat objek dari class m_aspirasi
$aspirasi = new m_aspirasi();

// coba jalankan proses di bawah ini; jika terjadi error akan ditangkap oleh catch
try {

    // mengambil statistik semua aspirasi (jumlah per status) untuk dashboard admin
    $statistik = $aspirasi->statistik_aspirasi();
    // menampilkan halaman dashboard admin (file view) yang memakai variabel $statistik
    include_once __DIR__ . '/../Views/Admin/dashboard_admin.php';

// jika terjadi error
} catch (Exception $e) {

    // tampilkan pesan error
    echo $e->getMessage();

}

?>
