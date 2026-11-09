<?php

// class m_koneksi: dipakai oleh semua model untuk membuat koneksi ke database MySQL
class m_koneksi{

   // data koneksi bersifat private (hanya bisa dipakai di dalam class ini): host server, username, password, dan nama database
   private $host = "localhost",
           $username = "root",
           $pass = "",
           $db = "pengaduan_sarpras_sekolah";

    // property publik yang menyimpan hasil koneksi, supaya bisa dipakai file lain lewat $koneksi->koneksi
    public $koneksi;

    // constructor: otomatis dijalankan setiap kali ada new m_koneksi()
    public function __construct()
    {
        // membuka koneksi ke MySQL memakai host, username, password, dan nama database di atas
        $this->koneksi = mysqli_connect(
            $this->host,
            $this->username,
            $this->pass,
            $this->db
        );

        // jika koneksi berhasil dibuat
        if ($this->koneksi) {
            //echo "koneksi ke database". $this->db . "berhasil";
            // kembalikan objek koneksi tersebut
            return $this->koneksi;
        // jika koneksi gagal, hentikan program dan tampilkan pesan error dari MySQL
        } else(
            die("koneksi ke database gagal:" . mysqli_connect_error())
        );
    }

}

// membuat objek m_koneksi langsung saat file ini dipanggil, sehingga variabel $koneksi siap dipakai
$koneksi = new m_koneksi();

?>