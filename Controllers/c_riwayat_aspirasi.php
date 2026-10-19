<?php
session_start();

require_once __DIR__ . '/../Models/m_aspirasi.php';

$aspirasi = new m_aspirasi();

$id_siswa = $_SESSION['id_siswa'];

// Pagination
$limit = 10;

$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;

if ($halaman < 1) {
    $halaman = 1;
}

$offset = ($halaman - 1) * $limit;

// Ambil data sesuai halaman
$riwayat = $aspirasi->riwayat_by_siswa(
    $id_siswa,
    $limit,
    $offset
);

// Ambil seluruh data untuk menghitung jumlah halaman
$semua_riwayat = $aspirasi->riwayat_by_siswa($id_siswa);

$total_data = mysqli_num_rows($semua_riwayat);

// Hitung total halaman
$total_halaman = ceil($total_data / $limit);

// Jika halaman melebihi jumlah halaman
if ($total_halaman > 0 && $halaman > $total_halaman) {
    $halaman = $total_halaman;
    $offset = ($halaman - 1) * $limit;

    $riwayat = $aspirasi->riwayat_by_siswa(
        $id_siswa,
        $limit,
        $offset
    );
}

include_once __DIR__ . '/../Views/Siswa/riwayat_aspirasi.php';
?>