<?php

// memulai session
session_start();

// memanggil file model kategori agar class m_kategori bisa dipakai
require_once __DIR__ . '/../Models/m_kategori.php';

// membuat objek dari class m_kategori
$kategori = new m_kategori();

// mengambil semua kategori dari database untuk ditampilkan sebagai pilihan pada form
$kategoris = $kategori->tampil_kategori();

?>