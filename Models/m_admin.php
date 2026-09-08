<?php
require_once __DIR__ . '/m_koneksi.php';

class m_admin {

    public function tampil_by_username($username) {
        $koneksi = new m_koneksi();

        $sql = "SELECT * FROM tb_admin WHERE username = '$username'";
        $query = mysqli_query($koneksi->koneksi, $sql);

        return mysqli_fetch_object($query);
    }

}

?>