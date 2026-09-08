<?php
require_once __DIR__ . '/m_koneksi.php';

class m_histori
{
    public function tampil_by_aspirasi($id_aspirasi)
    {
        $koneksi = new m_koneksi();

        $query = "SELECT
                    h.*,
                    ad.nama_lengkap
                  FROM tb_histori h
                  JOIN tb_admin ad ON h.id_admin = ad.id_admin
                  WHERE h.id_aspirasi = '$id_aspirasi'
                  ORDER BY h.tanggal_perubahan ASC";

        return mysqli_query($koneksi->koneksi, $query);
    }


    public function tampil_histori()
    {
        $koneksi = new m_koneksi();

        $query = "SELECT
                    a.id_aspirasi,
                    a.judul_laporan,
                    a.keterangan,
                    a.lokasi,
                    a.bukti_foto,
                    a.tanggal_dikirim,
                    a.status,
                    s.nis,
                    s.nama_siswa,
                    s.kelas,
                    k.nama_kategori
                  FROM tb_aspirasi a
                  JOIN tb_siswa s ON a.id_siswa = s.id_siswa
                  JOIN tb_kategori k ON a.id_kategori = k.id_kategori
                  WHERE a.status = 'selesai'
                  ORDER BY a.tanggal_dikirim DESC";

        return mysqli_query($koneksi->koneksi, $query);
    }

    public function tambah_histori(
        $id_aspirasi,
        $id_admin,
        $status_lama,
        $status_baru
    ) {
        $koneksi = new m_koneksi();

        $query = "INSERT INTO tb_histori
                    (id_aspirasi, id_admin, status_lama, status_baru, tanggal_perubahan)
                  VALUES
                    ('$id_aspirasi', '$id_admin', '$status_lama', '$status_baru', NOW())";

        return mysqli_query($koneksi->koneksi, $query);
    }
}
?>