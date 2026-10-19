<?php
session_start();

require_once __DIR__ . '/../Models/m_aspirasi.php';
require_once __DIR__ . '/../Models/m_progres.php';
require_once __DIR__ . '/../Models/m_histori.php';

$aspirasi = new m_aspirasi();
$progres = new m_progres();
$histori = new m_histori();

$id_siswa = $_SESSION['id_siswa'];


// ==================================================
// DETAIL ASPIRASI SISWA
// ==================================================

if (isset($_GET['id_aspirasi'])) {

    $id_aspirasi = $_GET['id_aspirasi'];

    $query_aspirasi = $aspirasi->tampil_by_id($id_aspirasi);

    $data_aspirasi = mysqli_fetch_object($query_aspirasi);

    // Memastikan aspirasi milik siswa yang sedang login
    if (!$data_aspirasi || $data_aspirasi->id_siswa != $id_siswa) {

        echo "<script>
                alert('Aspirasi tidak ditemukan.');
                window.location='c_aspirasi_siswa.php';
              </script>";
        exit;
    }

    // Ambil progres aspirasi
    $data_progres = $progres->tampil_by_aspirasi($id_aspirasi);

    // Ambil histori perubahan status
    $data_histori = $histori->tampil_by_aspirasi($id_aspirasi);

    // include_once __DIR__ . '/../Views/Siswa/detail_aspirasi_siswa.php';

}


// ==================================================
// RIWAYAT ASPIRASI SISWA
// ==================================================

elseif (isset($_GET['riwayat'])) {

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
}


// ==================================================
// DAFTAR ASPIRASI SISWA
// ==================================================

else {

    // Pagination
    $limit = 10;

    $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;

    if ($halaman < 1) {
        $halaman = 1;
    }

    $offset = ($halaman - 1) * $limit;

    // Ambil data sesuai halaman
    $aspirasis = $aspirasi->tampil_by_siswa(
        $id_siswa,
        $limit,
        $offset
    );

    // Ambil seluruh data untuk menghitung jumlah halaman
    $semua_aspirasi = $aspirasi->tampil_by_siswa($id_siswa);

    $total_data = mysqli_num_rows($semua_aspirasi);

    // Hitung total halaman
    $total_halaman = ceil($total_data / $limit);

    // Jika halaman melebihi jumlah halaman
    if ($total_halaman > 0 && $halaman > $total_halaman) {
        $halaman = $total_halaman;
        $offset = ($halaman - 1) * $limit;

        $aspirasis = $aspirasi->tampil_by_siswa(
            $id_siswa,
            $limit,
            $offset
        );
    }

    include_once __DIR__ . '/../Views/Siswa/aspirasi_siswa.php';
}
