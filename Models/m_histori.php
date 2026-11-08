<?php
// memanggil file koneksi database agar class m_koneksi bisa dipakai di file ini
require_once __DIR__ . '/m_koneksi.php';

// class m_histori: mengatur catatan perubahan status aspirasi pada tabel tb_histori
class m_histori
{
    // method untuk menampilkan histori perubahan status milik satu aspirasi
    public function tampil_by_aspirasi($id_aspirasi)
    {
        // membuat koneksi ke database
        $koneksi = new m_koneksi();

        // query: ambil data histori beserta nama admin yang mengubah status (JOIN ke tb_admin), urut dari perubahan terlama
        $query = "SELECT
                    h.*,
                    ad.nama_lengkap
                  FROM tb_histori h
                  JOIN tb_admin ad ON h.id_admin = ad.id_admin
                  WHERE h.id_aspirasi = '$id_aspirasi'
                  ORDER BY h.tanggal_perubahan ASC";

        // menjalankan query dan mengembalikan hasilnya
        return mysqli_query($koneksi->koneksi, $query);
    }


   // method untuk menampilkan daftar aspirasi yang sudah selesai atau ditolak (halaman histori), bisa memakai pagination lewat $limit dan $offset
   public function tampil_histori($limit = null, $offset = null)
{
    // membuat koneksi ke database
    $koneksi = new m_koneksi();

    // jika $limit dan $offset diisi, ambil data per halaman (pagination)
    if ($limit !== null && $offset !== null) {
        // query: ambil data aspirasi beserta data siswa dan kategorinya, hanya yang berstatus selesai atau ditolak, dibatasi LIMIT dan OFFSET
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
                  WHERE a.status IN ('selesai', 'ditolak')
                  ORDER BY a.tanggal_dikirim ASC
                  LIMIT $limit OFFSET $offset";
    } else {
        // jika $limit dan $offset tidak diisi, ambil semua data tanpa pagination
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
                  WHERE a.status IN ('selesai', 'ditolak')
                  ORDER BY a.tanggal_dikirim ASC";
    }

    // menjalankan query dan mengembalikan hasilnya
    return mysqli_query($koneksi->koneksi, $query);
}

    // method untuk menyimpan catatan perubahan status: menerima id aspirasi, id admin, status lama, dan status baru
    public function tambah_histori(
        $id_aspirasi,
        $id_admin,
        $status_lama,
        $status_baru
    ) {
        // membuat koneksi ke database
        $koneksi = new m_koneksi();

        // query: tambah baris baru ke tb_histori, waktu perubahan diisi waktu saat ini (NOW)
        $query = "INSERT INTO tb_histori
                    (id_aspirasi, id_admin, status_lama, status_baru, tanggal_perubahan)
                  VALUES
                    ('$id_aspirasi', '$id_admin', '$status_lama', '$status_baru', NOW())";

        // menjalankan query insert dan mengembalikan hasilnya
        return mysqli_query($koneksi->koneksi, $query);
    }
}
?>