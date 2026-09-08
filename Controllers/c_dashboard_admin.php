<?php
session_start();

require_once __DIR__ . '/../Models/m_aspirasi.php';

$aspirasi = new m_aspirasi();

try {

    $statistik = $aspirasi->statistik_aspirasi();

} catch (Exception $e) {

    echo $e->getMessage();

}

?>
