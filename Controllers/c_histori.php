<?php

require_once __DIR__ . '/../Models/m_histori.php';

$histori = new m_histori();

$historis = $histori->tampil_histori();

include_once __DIR__ . '/../Views/Admin/histori.php';

?>