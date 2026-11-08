<?php
// memulai session agar data login siswa bisa dibaca
session_start();

// memanggil file model aspirasi agar class m_aspirasi bisa dipakai
require_once __DIR__ . '/../Models/m_aspirasi.php';

// membuat objek dari class m_aspirasi
$aspirasi = new m_aspirasi();

// mengambil id siswa yang sedang login dari session
$id_siswa = $_SESSION['id_siswa'];

// mengambil statistik aspirasi milik siswa (jumlah per status) untuk ditampilkan di dashboard
$statistik = $aspirasi->statistik_by_siswa($id_siswa);

// mengambil daftar aspirasi milik siswa yang masih berjalan untuk ditampilkan di dashboard
$aspirasis = $aspirasi->tampil_by_siswa($id_siswa);
?>