<?php

require_once __DIR__ . '/m_koneksi.php';

class m_progres
{
    // Menampilkan progres berdasarkan aspirasi
    public function tampil_by_aspirasi($id_aspirasi)
    {
        $koneksi = new m_koneksi();

        $query = "SELECT 
                    p.*,
                    ad.nama_lengkap
                  FROM tb_progres p
                  JOIN tb_admin ad ON p.id_admin = ad.id_admin
                  WHERE p.id_aspirasi = '$id_aspirasi'
                  ORDER BY p.tanggal_progres ASC";

        return mysqli_query($koneksi->koneksi, $query);
    }

    // Menambahkan progres
    public function tambah_progres(
        $id_aspirasi,
        $id_admin,
        $tahap_progres,
        $foto_bukti
    ) {
        $koneksi = new m_koneksi();

        $query = "INSERT INTO tb_progres
                    (id_aspirasi, id_admin, tahap_progres, foto_bukti, tanggal_progres)
                  VALUES
                    ('$id_aspirasi', '$id_admin', '$tahap_progres', '$foto_bukti', NOW())";

        return mysqli_query($koneksi->koneksi, $query);
    }
}
?>