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

    include_once __DIR__ . '/../Views/Siswa/detail_aspirasi_siswa.php';

}


// ==================================================
// DAFTAR ASPIRASI SISWA
// ==================================================

else {

    $aspirasis = $aspirasi->tampil_by_siswa($id_siswa);

    include_once __DIR__ . '/../Views/Siswa/aspirasi_siswa.php';

}
?>