<?php
// memulai session agar data login siswa bisa dibaca
session_start();

// memanggil file model aspirasi agar class m_aspirasi bisa dipakai
require_once __DIR__ . '/../Models/m_aspirasi.php';

// membuat objek dari class m_aspirasi
$aspirasi = new m_aspirasi();

// mengambil id siswa yang sedang login dari session
$id_siswa = $_SESSION['id_siswa'];

// Pagination
// jumlah data yang ditampilkan per halaman adalah 10
$limit = 10;

// ambil nomor halaman dari URL (?halaman=), jika tidak ada dianggap halaman 1
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;

// jika nomor halaman kurang dari 1
if ($halaman < 1) {
    // paksa kembali ke halaman 1
    $halaman = 1;
}

// hitung offset (posisi data awal): (nomor halaman - 1) dikali jumlah data per halaman
$offset = ($halaman - 1) * $limit;

// Ambil data sesuai halaman
// ambil riwayat aspirasi siswa untuk halaman yang sedang dibuka
$riwayat = $aspirasi->riwayat_by_siswa(
    $id_siswa,
    $limit,
    $offset
);

// Ambil seluruh data untuk menghitung jumlah halaman
// ambil semua riwayat aspirasi siswa tanpa pembatasan halaman
$semua_riwayat = $aspirasi->riwayat_by_siswa($id_siswa);

// hitung jumlah seluruh data riwayat
$total_data = mysqli_num_rows($semua_riwayat);

// Hitung total halaman
// total halaman = jumlah data dibagi data per halaman, dibulatkan ke atas (ceil)
$total_halaman = ceil($total_data / $limit);

// Jika halaman melebihi jumlah halaman
// jika nomor halaman melebihi total halaman
if ($total_halaman > 0 && $halaman > $total_halaman) {
    // pindahkan ke halaman terakhir
    $halaman = $total_halaman;
    // hitung ulang offset untuk halaman terakhir
    $offset = ($halaman - 1) * $limit;

    // ambil ulang data riwayat untuk halaman terakhir
    $riwayat = $aspirasi->riwayat_by_siswa(
        $id_siswa,
        $limit,
        $offset
    );
}

// menampilkan halaman riwayat aspirasi siswa (view) yang memakai data di atas
include_once __DIR__ . '/../Views/Siswa/riwayat_aspirasi.php';
?>