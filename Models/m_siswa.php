<?php
// memanggil file koneksi database agar class m_koneksi bisa dipakai di file ini
require_once __DIR__ . '/m_koneksi.php';

// class m_siswa: mengatur data siswa pada tabel tb_siswa
class m_siswa
{

    // method untuk menampilkan data siswa; jika $limit dan $offset diisi, data diambil per halaman (pagination)
    public function tampil_siswa($limit = null, $offset = null)
    {
        // membuat koneksi ke database
        $koneksi = new m_koneksi();

        // jika $limit dan $offset diisi
        if ($limit !== null && $offset !== null) {
            // query: ambil data siswa urut berdasarkan id, dibatasi LIMIT dan OFFSET untuk pagination
            $sql = "SELECT * FROM tb_siswa
                ORDER BY id_siswa ASC
                LIMIT $limit OFFSET $offset";
        } else {
            // jika tidak diisi, query mengambil semua data siswa urut berdasarkan id
            $sql = "SELECT * FROM tb_siswa
                ORDER BY id_siswa ASC";
        }

        // menjalankan query ke database
        $query = mysqli_query($koneksi->koneksi, $sql);

        // siapkan array kosong untuk menampung hasil
        $result = [];

        // jika ada datanya
        if ($query->num_rows > 0) {
            // ambil data satu per satu sebagai objek selama masih ada baris
            while ($data = mysqli_fetch_object($query)) {
                // masukkan setiap data ke array hasil
                $result[] = $data;
            }
        }

        // kembalikan array berisi data siswa
        return $result;
    }


    // method untuk mencari siswa berdasarkan NIS atau nama, dengan pagination
    public function cari_siswa($keyword, $limit, $offset)
    {
        // membuat koneksi ke database
        $koneksi = new m_koneksi();
        // mengamankan kata kunci dari karakter berbahaya (mencegah SQL injection)
        $keyword = mysqli_real_escape_string($koneksi->koneksi, $keyword);

        // query: cari siswa yang NIS-nya sama dengan kata kunci atau namanya mengandung kata kunci (LIKE), dibatasi LIMIT dan OFFSET
        $sql = "SELECT * FROM tb_siswa
            WHERE nis = '$keyword'
            OR nama_siswa LIKE '%$keyword%'
            ORDER BY id_siswa ASC
            LIMIT $limit OFFSET $offset";

        // menjalankan query ke database
        $query = mysqli_query($koneksi->koneksi, $sql);

        // siapkan array kosong untuk menampung hasil
        $result = [];

        // jika ada datanya
        if ($query->num_rows > 0) {
            // ambil data satu per satu sebagai objek selama masih ada baris
            while ($data = mysqli_fetch_object($query)) {
                // masukkan setiap data ke array hasil
                $result[] = $data;
            }
        }

        // kembalikan array berisi hasil pencarian
        return $result;
    }


    // method untuk menghitung jumlah seluruh siswa (dipakai untuk menghitung jumlah halaman pagination)
    public function jumlah_siswa()
    {
        // membuat koneksi ke database
        $koneksi = new m_koneksi();

        // query: hitung semua baris di tb_siswa dan beri nama kolom hasilnya total
        $sql = "SELECT COUNT(*) AS total FROM tb_siswa";
        // menjalankan query ke database
        $query = mysqli_query($koneksi->koneksi, $sql);

        // ambil hasil hitungan sebagai objek
        $data = mysqli_fetch_object($query);

        // kembalikan jumlah siswa
        return $data->total;
    }

    // method untuk menghitung jumlah siswa hasil pencarian (untuk pagination hasil cari)
    public function jumlah_cari_siswa($keyword)
    {
        // membuat koneksi ke database
        $koneksi = new m_koneksi();
        // mengamankan kata kunci dari karakter berbahaya (mencegah SQL injection)
        $keyword = mysqli_real_escape_string($koneksi->koneksi, $keyword);

        // query: hitung siswa yang NIS-nya sama dengan kata kunci atau namanya mengandung kata kunci
        $sql = "SELECT COUNT(*) AS total
            FROM tb_siswa
            WHERE nis = '$keyword'
            OR nama_siswa LIKE '%$keyword%'";

        // menjalankan query ke database
        $query = mysqli_query($koneksi->koneksi, $sql);

        // ambil hasil hitungan sebagai objek
        $data = mysqli_fetch_object($query);

        // kembalikan jumlah siswa hasil pencarian
        return $data->total;
    }


    // method untuk mengambil satu data siswa berdasarkan id_siswa
    public function tampil_by_id($id_siswa)
    {
        // membuat koneksi ke database
        $koneksi = new m_koneksi();

        // query: ambil siswa yang id_siswa-nya sama dengan id yang dipilih
        $sql = "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa'";
        // menjalankan query ke database
        $query = mysqli_query($koneksi->koneksi, $sql);

        // kembalikan satu data siswa sebagai objek
        return mysqli_fetch_object($query);
    }


    // method untuk mengambil satu data siswa berdasarkan NIS (dipakai saat login dan untuk mengecek NIS sudah terdaftar atau belum)
    public function tampil_by_nis($nis)
    {
        // membuat koneksi ke database
        $koneksi = new m_koneksi();

        // query: ambil siswa yang NIS-nya sama dengan NIS yang diinputkan
        $sql = "SELECT * FROM tb_siswa WHERE nis = '$nis'";
        // menjalankan query ke database
        $query = mysqli_query($koneksi->koneksi, $sql);

        // kembalikan satu data siswa sebagai objek (kosong jika NIS tidak ditemukan)
        return mysqli_fetch_object($query);
    }


    // method untuk menambah siswa baru: menerima NIS, nama, kelas, dan password
    public function tambah_siswa($nis, $nama_siswa, $kelas, $password)
    {
        // membuat koneksi ke database
        $koneksi = new m_koneksi();

        // mengubah password menjadi hash (disandikan) sebelum disimpan, supaya password tidak tersimpan apa adanya
        $password = password_hash($password, PASSWORD_DEFAULT);

        // query: tambah baris baru ke tb_siswa
        $sql = "INSERT INTO tb_siswa (nis, nama_siswa, kelas, password)
        VALUES ('$nis', '$nama_siswa', '$kelas', '$password')";

        // menjalankan query insert dan mengembalikan hasilnya (true jika berhasil)
        return mysqli_query($koneksi->koneksi, $sql);
    }


    // method untuk mengubah data siswa berdasarkan id_siswa
    public function edit_siswa($id_siswa, $nis, $nama_siswa, $kelas, $password)
    {
        // membuat koneksi ke database
        $koneksi = new m_koneksi();

        // mengamankan semua data inputan dari karakter berbahaya (mencegah SQL injection)
        $id_siswa = mysqli_real_escape_string($koneksi->koneksi, $id_siswa);
        $nis = mysqli_real_escape_string($koneksi->koneksi, $nis);
        $nama_siswa = mysqli_real_escape_string($koneksi->koneksi, $nama_siswa);
        $kelas = mysqli_real_escape_string($koneksi->koneksi, $kelas);
        $password = mysqli_real_escape_string($koneksi->koneksi, $password);

        // jika password diisi (admin ingin mengganti password siswa)
        if ($password != '') {

            // ubah password baru menjadi hash sebelum disimpan
            $password = password_hash($password, PASSWORD_DEFAULT);

            // query: ubah NIS, nama, kelas, dan password pada siswa yang id-nya dipilih
            $sql = "UPDATE tb_siswa SET
                    nis = '$nis',
                    nama_siswa = '$nama_siswa',
                    kelas = '$kelas',
                    password = '$password'
                    WHERE id_siswa = '$id_siswa'";
        } else {

            // jika password dikosongkan, password lama tidak diubah: query hanya mengubah NIS, nama, dan kelas
            $sql = "UPDATE tb_siswa SET
                    nis = '$nis',
                    nama_siswa = '$nama_siswa',
                    kelas = '$kelas'
                    WHERE id_siswa = '$id_siswa'";
        }

        // menjalankan query update dan mengembalikan hasilnya (true jika berhasil)
        return mysqli_query($koneksi->koneksi, $sql);
    }


    // method untuk menghapus siswa berdasarkan id_siswa
    public function hapus_siswa($id_siswa)
    {
        // membuat koneksi ke database
        $koneksi = new m_koneksi();

        // query: hapus siswa yang id-nya dipilih
        $sql = "DELETE FROM tb_siswa WHERE id_siswa = '$id_siswa'";

        // menjalankan query delete dan mengembalikan hasilnya
        return mysqli_query($koneksi->koneksi, $sql);
    }


    // method untuk mengecek berapa banyak aspirasi milik seorang siswa (dipakai sebelum menghapus siswa)
    public function cek_aspirasi($id_siswa)
    {
        // membuat koneksi ke database
        $koneksi = new m_koneksi();

        // query: hitung aspirasi di tb_aspirasi milik siswa tersebut
        $query = "SELECT COUNT(*) AS total
              FROM tb_aspirasi
              WHERE id_siswa = '$id_siswa'";

        // menjalankan query ke database
        $hasil = mysqli_query($koneksi->koneksi, $query);

        // kembalikan hasil hitungan sebagai objek (isinya kolom total)
        return mysqli_fetch_object($hasil);
    }
}
