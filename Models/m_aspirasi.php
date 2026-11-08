<?php

// memanggil file koneksi database agar class m_koneksi bisa dipakai di file ini
require_once __DIR__ . '/m_koneksi.php';

// class m_aspirasi: mengatur data aspirasi (pengaduan) pada tabel tb_aspirasi
class m_aspirasi
{
    // =========================
    // ADMIN
    // =========================

    // Menampilkan semua aspirasi
    public function tampil_aspirasi($limit = null, $offset = null)
    {
        // membuat koneksi ke database
        $koneksi = new m_koneksi();

        // jika $limit dan $offset diisi, ambil data per halaman (pagination)
        if ($limit !== null && $offset !== null) {
            // query: ambil aspirasi beserta data siswa dan kategorinya (JOIN), hanya yang belum selesai/ditolak, urut dari terlama, dibatasi LIMIT dan OFFSET
            $query = "SELECT 
                    a.*,
                    s.nis,
                    s.nama_siswa,
                    s.kelas,
                    k.nama_kategori
                  FROM tb_aspirasi a
                  JOIN tb_siswa s ON a.id_siswa = s.id_siswa
                  JOIN tb_kategori k ON a.id_kategori = k.id_kategori
                  WHERE a.status NOT IN ('selesai', 'ditolak')
                  ORDER BY a.tanggal_dikirim ASC
                  LIMIT $limit OFFSET $offset";
        } else {
            // jika tidak diisi, query mengambil semua aspirasi yang belum selesai/ditolak tanpa pembatasan
            $query = "SELECT 
                    a.*,
                    s.nis,
                    s.nama_siswa,
                    s.kelas,
                    k.nama_kategori
                  FROM tb_aspirasi a
                  JOIN tb_siswa s ON a.id_siswa = s.id_siswa
                  JOIN tb_kategori k ON a.id_kategori = k.id_kategori
                  WHERE a.status NOT IN ('selesai', 'ditolak')
                  ORDER BY a.tanggal_dikirim ASC";
        }

        // menjalankan query dan mengembalikan hasilnya
        return mysqli_query($koneksi->koneksi, $query);
    }

    // Menampilkan detail satu aspirasi
    public function tampil_by_id($id_aspirasi)
    {
        // membuat koneksi ke database
        $koneksi = new m_koneksi();

        // query: ambil satu aspirasi (berdasarkan id) beserta data siswa dan nama kategorinya
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

        // menjalankan query dan mengembalikan hasilnya
        return mysqli_query($koneksi->koneksi, $query);
    }

    // =========================
    // SISWA
    // =========================

    // Menambah aspirasi
    // method untuk menyimpan aspirasi baru dari siswa: menerima id siswa, id kategori, judul, keterangan, lokasi, dan nama file foto bukti
    public function tambah_aspirasi(
        $id_siswa,
        $id_kategori,
        $judul_laporan,
        $keterangan,
        $lokasi,
        $bukti_foto
    ) {
        // membuat koneksi ke database
        $koneksi = new m_koneksi();

        // query: tambah baris baru ke tb_aspirasi, tanggal diisi waktu saat ini (NOW) dan status awal otomatis 'menunggu'
        $query = "INSERT INTO tb_aspirasi
                    (id_siswa, id_kategori, judul_laporan, keterangan, lokasi, bukti_foto, tanggal_dikirim, status)
                  VALUES
                    ('$id_siswa', '$id_kategori', '$judul_laporan', '$keterangan', '$lokasi', '$bukti_foto', NOW(), 'menunggu')";

        // menjalankan query insert dan mengembalikan hasilnya (true jika berhasil)
        return mysqli_query($koneksi->koneksi, $query);
    }


    // method untuk memfilter aspirasi berdasarkan tanggal, bulan, siswa, dan/atau kategori (dengan pagination)
    public function filter_aspirasi($tanggal, $bulan, $id_siswa, $id_kategori, $limit = null, $offset = null)
    {
        // membuat koneksi ke database
        $koneksi = new m_koneksi();

        // query dasar: ambil aspirasi beserta data siswa dan kategorinya; WHERE 1=1 dipakai agar syarat filter bisa ditambah dengan AND
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

        // jika tanggal dipilih, tambahkan syarat tanggal kirim sama dengan tanggal tersebut
        if ($tanggal != '') {
            $query .= " AND DATE(a.tanggal_dikirim) = '$tanggal'";
        }

        // jika bulan dipilih, tambahkan syarat bulan kirim sama dengan bulan tersebut
        if ($bulan != '') {
            $query .= " AND MONTH(a.tanggal_dikirim) = '$bulan'";
        }

        // jika siswa dipilih, tambahkan syarat aspirasi milik siswa tersebut
        if ($id_siswa != '') {
            $query .= " AND a.id_siswa = '$id_siswa'";
        }

        // jika kategori dipilih, tambahkan syarat kategori sama dengan kategori tersebut
        if ($id_kategori != '') {
            $query .= " AND a.id_kategori = '$id_kategori'";
        }

        // Urutan data dari yang paling lama
        // tambahkan pengurutan dari tanggal kirim terlama
        $query .= " ORDER BY a.tanggal_dikirim ASC";

        // Pagination
        // jika $limit dan $offset diisi, tambahkan pembatasan data per halaman
        if ($limit !== null && $offset !== null) {
            $query .= " LIMIT $limit OFFSET $offset";
        }

        // menjalankan query dan mengembalikan hasilnya
        return mysqli_query($koneksi->koneksi, $query);
    }

    // Menampilkan aspirasi milik siswa
    // method untuk menampilkan aspirasi milik satu siswa yang masih berjalan (status menunggu atau diproses)
    public function tampil_by_siswa($id_siswa, $limit = null, $offset = null)
    {
        // membuat koneksi ke database
        $koneksi = new m_koneksi();

        // jika $limit dan $offset diisi, ambil data per halaman (pagination)
        if ($limit !== null && $offset !== null) {
            // query: ambil aspirasi milik siswa beserta nama kategorinya, hanya status menunggu atau diproses, dibatasi LIMIT dan OFFSET
            $query = "SELECT 
                    a.*,
                    k.nama_kategori
                  FROM tb_aspirasi a
                  JOIN tb_kategori k ON a.id_kategori = k.id_kategori
                  WHERE a.id_siswa = '$id_siswa'
                  AND a.status IN ('menunggu', 'diproses')
                  ORDER BY a.tanggal_dikirim ASC
                  LIMIT $limit OFFSET $offset";
        } else {
            // jika tidak diisi, query mengambil semua aspirasi berjalan milik siswa tanpa pembatasan
            $query = "SELECT 
                    a.*,
                    k.nama_kategori
                  FROM tb_aspirasi a
                  JOIN tb_kategori k ON a.id_kategori = k.id_kategori
                  WHERE a.id_siswa = '$id_siswa'
                  AND a.status IN ('menunggu', 'diproses')
                  ORDER BY a.tanggal_dikirim ASC";
        }

        // menjalankan query dan mengembalikan hasilnya
        return mysqli_query($koneksi->koneksi, $query);
    }


    // Menampilkan riwayat aspirasi milik siswa
    // method untuk menampilkan riwayat aspirasi milik satu siswa yang sudah selesai atau ditolak
    public function riwayat_by_siswa($id_siswa, $limit = null, $offset = null)
    {
        // membuat koneksi ke database
        $koneksi = new m_koneksi();

        // jika $limit dan $offset diisi, ambil data per halaman (pagination)
        if ($limit !== null && $offset !== null) {
            // query: ambil aspirasi milik siswa beserta nama kategorinya, hanya status selesai atau ditolak, dibatasi LIMIT dan OFFSET
            $query = "SELECT 
                    a.*,
                    k.nama_kategori
                  FROM tb_aspirasi a
                  JOIN tb_kategori k ON a.id_kategori = k.id_kategori
                  WHERE a.id_siswa = '$id_siswa'
                  AND a.status IN ('selesai', 'ditolak')
                  ORDER BY a.tanggal_dikirim ASC
                  LIMIT $limit OFFSET $offset";
        // jika tidak diisi, query mengambil semua riwayat aspirasi milik siswa tanpa pembatasan
        } else {
            $query = "SELECT 
                    a.*,
                    k.nama_kategori
                  FROM tb_aspirasi a
                  JOIN tb_kategori k ON a.id_kategori = k.id_kategori
                  WHERE a.id_siswa = '$id_siswa'
                  AND a.status IN ('selesai', 'ditolak')
                  ORDER BY a.tanggal_dikirim ASC";
        }

        // menjalankan query dan mengembalikan hasilnya
        return mysqli_query($koneksi->koneksi, $query);
    }

    // =========================
    // ADMIN - PENANGANAN
    // =========================

    // Mengubah status aspirasi
    // method untuk mengubah status aspirasi (menunggu, diproses, selesai, atau ditolak)
    public function update_status($id_aspirasi, $status)
    {
        // membuat koneksi ke database
        $koneksi = new m_koneksi();

        // query: ubah kolom status pada aspirasi yang id-nya dipilih
        $query = "UPDATE tb_aspirasi
                  SET status = '$status'
                  WHERE id_aspirasi = '$id_aspirasi'";

        // menjalankan query update dan mengembalikan hasilnya
        return mysqli_query($koneksi->koneksi, $query);
    }

    // Menambahkan / mengubah umpan balik admin
    // method untuk mengisi atau mengubah umpan balik dari admin pada sebuah aspirasi
    public function update_umpan_balik($id_aspirasi, $umpan_balik)
    {
        // membuat koneksi ke database
        $koneksi = new m_koneksi();

        // query: ubah kolom umpan_balik pada aspirasi yang id-nya dipilih
        $query = "UPDATE tb_aspirasi
                  SET umpan_balik = '$umpan_balik'
                  WHERE id_aspirasi = '$id_aspirasi'";

        // menjalankan query update dan mengembalikan hasilnya
        return mysqli_query($koneksi->koneksi, $query);
    }


    // STATISTIK DASHBOARD ADMIN
    // method untuk menghitung jumlah aspirasi per status (ditampilkan pada dashboard admin)
    public function statistik_aspirasi()
    {
        // membuat koneksi ke database
        $koneksi = new m_koneksi();

        // query: hitung total aspirasi, lalu jumlah yang berstatus menunggu, diproses, selesai, dan ditolak
        $query = "SELECT
                COUNT(*) AS total,
                SUM(status = 'menunggu') AS menunggu,
                SUM(status = 'diproses') AS diproses,
                SUM(status = 'selesai') AS selesai,
                SUM(status = 'ditolak') AS ditolak
              FROM tb_aspirasi";

        // menjalankan query ke database
        $hasil = mysqli_query($koneksi->koneksi, $query);

        // kembalikan hasil hitungan sebagai satu objek (total, menunggu, diproses, selesai, ditolak)
        return mysqli_fetch_object($hasil);
    }


    // method untuk menghitung jumlah aspirasi per status milik satu siswa (ditampilkan pada dashboard siswa)
    public function statistik_by_siswa($id_siswa)
    {
        // membuat koneksi ke database
        $koneksi = new m_koneksi();

        // query: sama seperti statistik admin, tetapi hanya menghitung aspirasi milik siswa tersebut
        $query = "SELECT
                COUNT(*) AS total,
                SUM(status = 'menunggu') AS menunggu,
                SUM(status = 'diproses') AS diproses,
                SUM(status = 'selesai') AS selesai,
                SUM(status = 'ditolak') AS ditolak
              FROM tb_aspirasi
              WHERE id_siswa = '$id_siswa'";

        // menjalankan query ke database
        $hasil = mysqli_query($koneksi->koneksi, $query);

        // kembalikan hasil hitungan sebagai satu objek (total, menunggu, diproses, selesai, ditolak)
        return mysqli_fetch_object($hasil);
    }
}
