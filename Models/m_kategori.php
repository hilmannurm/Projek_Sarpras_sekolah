<?php
// memanggil file koneksi database agar class m_koneksi bisa dipakai di file ini
require_once 'm_koneksi.php';

// class m_kategori: mengatur data kategori pada tabel tb_kategori
class m_kategori {

    // method untuk menampilkan semua kategori (dipakai di halaman daftar kategori)
    public function tampil_kategori() {
        // membuat koneksi ke database
        $koneksi = new m_koneksi();

        // query: ambil semua kolom dari tabel tb_kategori
        $sql = "SELECT * FROM tb_kategori";
        // menjalankan query ke database
        $query = mysqli_query($koneksi->koneksi, $sql);

        // siapkan array kosong untuk menampung hasil
        $result = [];

        // jika query berhasil dan ada datanya
        if ($query && $query->num_rows > 0) {
            // ambil data satu per satu sebagai objek selama masih ada baris
            while ($data = mysqli_fetch_object($query)) {
                // masukkan setiap data ke array hasil
                $result[] = $data;
            }
        }

        // kembalikan array berisi semua kategori (kosong jika belum ada data)
        return $result;
    }


    // method untuk menampilkan semua kategori sebagai pilihan (dipakai pada form buat aspirasi siswa)
    public function pilih_kategori() {
        // membuat koneksi ke database
        $koneksi = new m_koneksi();

        // query: ambil semua kolom dari tabel tb_kategori
        $sql = "SELECT * FROM tb_kategori";
        // menjalankan query ke database
        $query = mysqli_query($koneksi->koneksi, $sql);

        // siapkan array kosong untuk menampung hasil
        $result = [];

        // jika query berhasil dan ada datanya
        if ($query && $query->num_rows > 0) {
            // ambil data satu per satu sebagai objek selama masih ada baris
            while ($data = mysqli_fetch_object($query)) {
                // masukkan setiap data ke array hasil
                $result[] = $data;
            }
        }

        // kembalikan array berisi semua kategori (kosong jika belum ada data)
        return $result;
    }




    // method untuk mengambil satu kategori berdasarkan id (dipakai saat membuka form edit)
    public function tampil_by_id($id) {
        // membuat koneksi ke database
        $koneksi = new m_koneksi();

        // mengamankan id dari karakter berbahaya (mencegah SQL injection)
        $id = mysqli_real_escape_string($koneksi->koneksi, $id);

        // query: ambil kategori yang id_kategori-nya sama dengan id yang dipilih
        $sql = "SELECT * FROM tb_kategori
                WHERE id_kategori = '$id'";

        // menjalankan query ke database
        $query = mysqli_query($koneksi->koneksi, $sql);

        // kembalikan satu data kategori sebagai objek
        return mysqli_fetch_object($query);
    }

    // method untuk menambah kategori baru, menerima nama kategori
    public function tambah_kategori($nama_kategori) {
        // membuat koneksi ke database
        $koneksi = new m_koneksi();

        // mengamankan nama kategori dari karakter berbahaya (mencegah SQL injection)
        $nama_kategori = mysqli_real_escape_string(
            $koneksi->koneksi,
            $nama_kategori
        );

        // query: tambah baris baru ke tb_kategori
        $sql = "INSERT INTO tb_kategori (nama_kategori)
                VALUES ('$nama_kategori')";

        // menjalankan query insert dan mengembalikan hasilnya (true jika berhasil)
        return mysqli_query($koneksi->koneksi, $sql);
    }

    // method untuk mengubah nama kategori berdasarkan id
    public function edit_kategori($id, $nama_kategori) {
        // membuat koneksi ke database
        $koneksi = new m_koneksi();

        // mengamankan id dari karakter berbahaya (mencegah SQL injection)
        $id = mysqli_real_escape_string($koneksi->koneksi, $id);
        // mengamankan nama kategori dari karakter berbahaya (mencegah SQL injection)
        $nama_kategori = mysqli_real_escape_string(
            $koneksi->koneksi,
            $nama_kategori
        );

        // query: ubah nama_kategori pada kategori yang id-nya dipilih
        $sql = "UPDATE tb_kategori
                SET nama_kategori = '$nama_kategori'
                WHERE id_kategori = '$id'";

        // menjalankan query update dan mengembalikan hasilnya (true jika berhasil)
        return mysqli_query($koneksi->koneksi, $sql);
    }

    // method untuk menghapus kategori berdasarkan id
    public function hapus_kategori($id) {
        // membuat koneksi ke database
        $koneksi = new m_koneksi();

        // mengamankan id dari karakter berbahaya (mencegah SQL injection)
        $id = mysqli_real_escape_string($koneksi->koneksi, $id);

        // query: hapus kategori yang id-nya dipilih (gagal jika kategori masih dipakai aspirasi, karena ada relasi foreign key)
        $sql = "DELETE FROM tb_kategori
                WHERE id_kategori = '$id'";

        // menjalankan query delete dan mengembalikan hasilnya
        return mysqli_query($koneksi->koneksi, $sql);
    }
}
?>