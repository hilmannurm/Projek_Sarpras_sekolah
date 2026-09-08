<?php
require_once 'm_koneksi.php';

class m_kategori {

    public function tampil_kategori() {
        $koneksi = new m_koneksi();

        $sql = "SELECT * FROM tb_kategori";
        $query = mysqli_query($koneksi->koneksi, $sql);

        $result = [];

        if ($query && $query->num_rows > 0) {
            while ($data = mysqli_fetch_object($query)) {
                $result[] = $data;
            }
        }

        return $result;
    }

    public function tampil_by_id($id) {
        $koneksi = new m_koneksi();

        $id = mysqli_real_escape_string($koneksi->koneksi, $id);

        $sql = "SELECT * FROM tb_kategori
                WHERE id_kategori = '$id'";

        $query = mysqli_query($koneksi->koneksi, $sql);

        return mysqli_fetch_object($query);
    }

    public function tambah_kategori($nama_kategori) {
        $koneksi = new m_koneksi();

        $nama_kategori = mysqli_real_escape_string(
            $koneksi->koneksi,
            $nama_kategori
        );

        $sql = "INSERT INTO tb_kategori (nama_kategori)
                VALUES ('$nama_kategori')";

        return mysqli_query($koneksi->koneksi, $sql);
    }

    public function edit_kategori($id, $nama_kategori) {
        $koneksi = new m_koneksi();

        $id = mysqli_real_escape_string($koneksi->koneksi, $id);
        $nama_kategori = mysqli_real_escape_string(
            $koneksi->koneksi,
            $nama_kategori
        );

        $sql = "UPDATE tb_kategori
                SET nama_kategori = '$nama_kategori'
                WHERE id_kategori = '$id'";

        return mysqli_query($koneksi->koneksi, $sql);
    }

    public function hapus_kategori($id) {
        $koneksi = new m_koneksi();

        $id = mysqli_real_escape_string($koneksi->koneksi, $id);

        $sql = "DELETE FROM tb_kategori
                WHERE id_kategori = '$id'";

        return mysqli_query($koneksi->koneksi, $sql);
    }
}
?>