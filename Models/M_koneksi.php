<?php

class m_koneksi{

   private $host = "localhost",
           $username = "root",
           $pass = "",
           $db = "pengaduan_sarpras_sekolah";

    public $koneksi;

    function __construct()
    {
        $this->koneksi = mysqli_connect(
            $this->host,
            $this->username,
            $this->pass,
            $this->db
        );

        if ($this->koneksi) {
            echo "koneksi ke database". $this->db . "berhasil";
            return $this->koneksi;
        } else(
            die("koneksi ke database gagal:" . mysqli_connect_error())
        );
    }

}

$koneksi = new m_koneksi();

?>