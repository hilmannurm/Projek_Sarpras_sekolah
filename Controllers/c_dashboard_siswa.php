<?php
session_start();

require_once __DIR__ . '/../Models/m_aspirasi.php';

$aspirasi = new m_aspirasi();

$id_siswa = $_SESSION['id_siswa'];

$statistik = $aspirasi->statistik_by_siswa($id_siswa);

$aspirasis = $aspirasi->tampil_by_siswa($id_siswa);
?>