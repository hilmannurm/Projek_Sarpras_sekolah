<?php

// memanggil file koneksi database agar class m_koneksi bisa dipakai di file ini
require_once __DIR__ . '/m_koneksi.php';

// class m_progres: mengatur data tahapan penanganan aspirasi pada tabel tb_progres
class m_progres
{
    // Menampilkan progres berdasarkan aspirasi
    // method ini menerima id aspirasi lalu mengembalikan semua progres milik aspirasi tersebut
    public function tampil_by_aspirasi($id_aspirasi)
    {
        // membuat koneksi ke database
        $koneksi = new m_koneksi();

        // query: ambil data progres beserta nama admin yang menangani (JOIN ke tb_admin), hanya untuk aspirasi tertentu, urut dari tahap terlama
        $query = "SELECT 
                    p.*,
                    ad.nama_lengkap
                  FROM tb_progres p
                  JOIN tb_admin ad ON p.id_admin = ad.id_admin
                  WHERE p.id_aspirasi = '$id_aspirasi'
                  ORDER BY p.tanggal_progres ASC";

        // menjalankan query dan mengembalikan hasilnya
        return mysqli_query($koneksi->koneksi, $query);
    }

    // Menambahkan progres
    // method ini menyimpan satu progres baru: menerima id aspirasi, id admin, tahap progres, dan nama file foto bukti
    public function tambah_progres(
        $id_aspirasi,
        $id_admin,
        $tahap_progres,
        $foto_bukti
    ) {
        // membuat koneksi ke database
        $koneksi = new m_koneksi();

        // query: tambah baris baru ke tb_progres, tanggal progres diisi waktu saat ini (NOW)
        $query = "INSERT INTO tb_progres
                    (id_aspirasi, id_admin, tahap_progres, foto_bukti, tanggal_progres)
                  VALUES
                    ('$id_aspirasi', '$id_admin', '$tahap_progres', '$foto_bukti', NOW())";

        // menjalankan query insert dan mengembalikan hasilnya (true jika berhasil, false jika gagal)
        return mysqli_query($koneksi->koneksi, $query);
    }
}
?>