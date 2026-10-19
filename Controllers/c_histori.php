<?php
session_start();
require_once __DIR__ . '/../Models/m_histori.php';

$histori = new m_histori();
//
//$historis = $histori->tampil_histori();
//
//include_once __DIR__ . '/../Views/Admin/histori.php';

try {

    // Pagination
    $limit = 10;

    $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;

    if ($halaman < 1) {
        $halaman = 1;
    }

    $offset = ($halaman - 1) * $limit;

    // Ambil data sesuai halaman
    $historis = $histori->tampil_histori(
        $limit,
        $offset
    );

    // Ambil seluruh data untuk menghitung jumlah halaman
    $semua_histori = $histori->tampil_histori();

    $total_data = mysqli_num_rows($semua_histori);

    // Hitung total halaman
    $total_halaman = ceil($total_data / $limit);

    // Jika halaman melebihi jumlah halaman
    if ($total_halaman > 0 && $halaman > $total_halaman) {
        $halaman = $total_halaman;
        $offset = ($halaman - 1) * $limit;

        $historis = $histori->tampil_histori(
            $limit,
            $offset
        );
    }

    include_once __DIR__ . '/../Views/Admin/histori.php';

} catch (Exception $e) {
    echo $e->getMessage();
}

?>