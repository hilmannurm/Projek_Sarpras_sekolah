<?php
// memanggil file koneksi database agar class m_koneksi bisa dipakai di file ini
require_once __DIR__ . '/m_koneksi.php';

// class m_admin: mengatur data admin pada tabel tb_admin
class m_admin {

    // method untuk mengambil satu data admin berdasarkan username (dipakai saat login admin)
    public function tampil_by_username($username) {
        // membuat koneksi ke database
        $koneksi = new m_koneksi();

        // query: ambil semua kolom dari tb_admin yang username-nya sama dengan yang diinputkan
        $sql = "SELECT * FROM tb_admin WHERE username = '$username'";
        // menjalankan query ke database
        $query = mysqli_query($koneksi->koneksi, $sql);

        // mengembalikan hasilnya sebagai satu objek (kosong jika username tidak ditemukan)
        return mysqli_fetch_object($query);
    }

}

?>