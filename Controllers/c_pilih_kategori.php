<?php

session_start();

require_once __DIR__ . '/../Models/m_kategori.php';

$kategori = new m_kategori();

$kategoris = $kategori->tampil_kategori();

?>