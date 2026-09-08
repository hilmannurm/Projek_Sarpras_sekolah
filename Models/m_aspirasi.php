<?php

require_once __DIR__ . '/m_koneksi.php';

class m_aspirasi
{
    // =========================
    // ADMIN
    // =========================

    // Menampilkan semua aspirasi
    public function tampil_aspirasi()
    {
        $koneksi = new m_koneksi();

        $query = "SELECT 
                    a.*,
                    s.nis,
                    s.nama_siswa,
                    s.kelas,
                    k.nama_kategori
                  FROM tb_aspirasi a
                  JOIN tb_siswa s ON a.id_siswa = s.id_siswa
                  JOIN tb_kategori k ON a.id_kategori = k.id_kategori
                  WHERE a.status != 'selesai'
                  ORDER BY a.tanggal_dikirim DESC";

        return mysqli_query($koneksi->koneksi, $query);
    }

    // Menampilkan detail satu aspirasi
    public function tampil_by_id($id_aspirasi)
    {
        $koneksi = new m_koneksi();

        $query = "SELECT 
                    a.*,
                    s.nis,
                    s.nama_siswa,
                    s.kelas,
                    k.nama_kategori
                  FROM tb_aspirasi a
                  JOIN tb_siswa s ON a.id_siswa = s.id_siswa
                  JOIN tb_kategori k ON a.id_kategori = k.id_kategori
                  WHERE a.id_aspirasi = '$id_aspirasi'";

        return mysqli_query($koneksi->koneksi, $query);
    }

    // =========================
    // SISWA
    // =========================

    // Menambah aspirasi
    public function tambah_aspirasi(
        $id_siswa,
        $id_kategori,
        $judul_laporan,
        $keterangan,
        $lokasi,
        $bukti_foto
    ) {
        $koneksi = new m_koneksi();

        $query = "INSERT INTO tb_aspirasi
                    (id_siswa, id_kategori, judul_laporan, keterangan, lokasi, bukti_foto, tanggal_dikirim, status)
                  VALUES
                    ('$id_siswa', '$id_kategori', '$judul_laporan', '$keterangan', '$lokasi', '$bukti_foto', NOW(), 'Diproses')";

        return mysqli_query($koneksi->koneksi, $query);
    }


    public function filter_aspirasi($tanggal, $bulan, $id_siswa, $id_kategori)
{
    $koneksi = new m_koneksi();

    $query = "SELECT 
                a.*,
                s.nis,
                s.nama_siswa,
                s.kelas,
                k.nama_kategori
              FROM tb_aspirasi a
              JOIN tb_siswa s ON a.id_siswa = s.id_siswa
              JOIN tb_kategori k ON a.id_kategori = k.id_kategori
              WHERE 1=1";

    if ($tanggal != '') {
        $query .= " AND DATE(a.tanggal_dikirim) = '$tanggal'";
    }

    if ($bulan != '') {
        $query .= " AND MONTH(a.tanggal_dikirim) = '$bulan'";
    }

    if ($id_siswa != '') {
        $query .= " AND a.id_siswa = '$id_siswa'";
    }

    if ($id_kategori != '') {
        $query .= " AND a.id_kategori = '$id_kategori'";
    }

    $query .= " ORDER BY a.tanggal_dikirim DESC";

    return mysqli_query($koneksi->koneksi, $query);
}

    // Menampilkan aspirasi milik siswa
    public function tampil_by_siswa($id_siswa)
    {
        $koneksi = new m_koneksi();

        $query = "SELECT 
                    a.*,
                    k.nama_kategori
                  FROM tb_aspirasi a
                  JOIN tb_kategori k ON a.id_kategori = k.id_kategori
                  WHERE a.id_siswa = '$id_siswa'
                  ORDER BY a.tanggal_dikirim DESC";

        return mysqli_query($koneksi->koneksi, $query);
    }

    // =========================
    // ADMIN - PENANGANAN
    // =========================

    // Mengubah status aspirasi
    public function update_status($id_aspirasi, $status)
    {
        $koneksi = new m_koneksi();

        $query = "UPDATE tb_aspirasi
                  SET status = '$status'
                  WHERE id_aspirasi = '$id_aspirasi'";

        return mysqli_query($koneksi->koneksi, $query);
    }

    // Menambahkan / mengubah umpan balik admin
    public function update_umpan_balik($id_aspirasi, $umpan_balik)
    {
        $koneksi = new m_koneksi();

        $query = "UPDATE tb_aspirasi
                  SET umpan_balik = '$umpan_balik'
                  WHERE id_aspirasi = '$id_aspirasi'";

        return mysqli_query($koneksi->koneksi, $query);
    }


    // STATISTIK DASHBOARD ADMIN
public function statistik_aspirasi()
{
    $koneksi = new m_koneksi();

    $query = "SELECT
                COUNT(*) AS total,
                SUM(status = 'Diproses') AS diproses,
                SUM(status = 'Diperbaiki') AS diperbaiki,
                SUM(status = 'Selesai') AS selesai
              FROM tb_aspirasi";

    $hasil = mysqli_query($koneksi->koneksi, $query);

    return mysqli_fetch_object($hasil);
}


public function statistik_by_siswa($id_siswa)
{
    $koneksi = new m_koneksi();

    $query = "SELECT
                COUNT(*) AS total,
                SUM(status = 'diproses') AS diproses,
                SUM(status = 'diperbaiki') AS diperbaiki,
                SUM(status = 'selesai') AS selesai
              FROM tb_aspirasi
              WHERE id_siswa = '$id_siswa'";

    $hasil = mysqli_query($koneksi->koneksi, $query);

    return mysqli_fetch_object($hasil);
}

}
?>