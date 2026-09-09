<?php
session_start();

require_once __DIR__ . '/../Models/m_aspirasi.php';

$aspirasi = new m_aspirasi();

try {

    $statistik = $aspirasi->statistik_aspirasi();
    include_once __DIR__ . '/../Views/Admin/dashboard_admin.php';

} catch (Exception $e) {

    echo $e->getMessage();

}

?>
