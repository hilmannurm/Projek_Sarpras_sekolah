<?php
require_once __DIR__ . '/m_koneksi.php';

class m_siswa
{

    public function tampil_siswa($limit = null, $offset = null)
    {
        $koneksi = new m_koneksi();

        if ($limit !== null && $offset !== null) {
            $sql = "SELECT * FROM tb_siswa
                ORDER BY id_siswa ASC
                LIMIT $limit OFFSET $offset";
        } else {
            $sql = "SELECT * FROM tb_siswa
                ORDER BY id_siswa ASC";
        }

        $query = mysqli_query($koneksi->koneksi, $sql);

        $result = [];

        if ($query->num_rows > 0) {
            while ($data = mysqli_fetch_object($query)) {
                $result[] = $data;
            }
        }

        return $result;
    }


    public function cari_siswa($keyword, $limit, $offset)
    {
        $koneksi = new m_koneksi();
        $keyword = mysqli_real_escape_string($koneksi->koneksi, $keyword);

        $sql = "SELECT * FROM tb_siswa
            WHERE nis = '$keyword'
            OR nama_siswa LIKE '%$keyword%'
            ORDER BY id_siswa ASC
            LIMIT $limit OFFSET $offset";

        $query = mysqli_query($koneksi->koneksi, $sql);

        $result = [];

        if ($query->num_rows > 0) {
            while ($data = mysqli_fetch_object($query)) {
                $result[] = $data;
            }
        }

        return $result;
    }


    public function jumlah_siswa()
    {
        $koneksi = new m_koneksi();

        $sql = "SELECT COUNT(*) AS total FROM tb_siswa";
        $query = mysqli_query($koneksi->koneksi, $sql);

        $data = mysqli_fetch_object($query);

        return $data->total;
    }

    public function jumlah_cari_siswa($keyword)
    {
        $koneksi = new m_koneksi();
        $keyword = mysqli_real_escape_string($koneksi->koneksi, $keyword);

        $sql = "SELECT COUNT(*) AS total
            FROM tb_siswa
            WHERE nis = '$keyword'
            OR nama_siswa LIKE '%$keyword%'";

        $query = mysqli_query($koneksi->koneksi, $sql);

        $data = mysqli_fetch_object($query);

        return $data->total;
    }


    public function tampil_by_id($id_siswa)
    {
        $koneksi = new m_koneksi();

        $sql = "SELECT * FROM tb_siswa WHERE id_siswa = '$id_siswa'";
        $query = mysqli_query($koneksi->koneksi, $sql);

        return mysqli_fetch_object($query);
    }


    public function tampil_by_nis($nis)
    {
        $koneksi = new m_koneksi();

        $sql = "SELECT * FROM tb_siswa WHERE nis = '$nis'";
        $query = mysqli_query($koneksi->koneksi, $sql);

        return mysqli_fetch_object($query);
    }


    public function tambah_siswa($nis, $nama_siswa, $kelas, $password)
    {
        $koneksi = new m_koneksi();

        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO tb_siswa (nis, nama_siswa, kelas, password)
        VALUES ('$nis', '$nama_siswa', '$kelas', '$password')";

        return mysqli_query($koneksi->koneksi, $sql);
    }


    public function edit_siswa($id_siswa, $nis, $nama_siswa, $kelas, $password)
    {
        $koneksi = new m_koneksi();

        $id_siswa = mysqli_real_escape_string($koneksi->koneksi, $id_siswa);
        $nis = mysqli_real_escape_string($koneksi->koneksi, $nis);
        $nama_siswa = mysqli_real_escape_string($koneksi->koneksi, $nama_siswa);
        $kelas = mysqli_real_escape_string($koneksi->koneksi, $kelas);
        $password = mysqli_real_escape_string($koneksi->koneksi, $password);

        if ($password != '') {

            $password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "UPDATE tb_siswa SET
                    nis = '$nis',
                    nama_siswa = '$nama_siswa',
                    kelas = '$kelas',
                    password = '$password'
                    WHERE id_siswa = '$id_siswa'";
        } else {

            $sql = "UPDATE tb_siswa SET
                    nis = '$nis',
                    nama_siswa = '$nama_siswa',
                    kelas = '$kelas'
                    WHERE id_siswa = '$id_siswa'";
        }

        return mysqli_query($koneksi->koneksi, $sql);
    }


    public function hapus_siswa($id_siswa)
    {
        $koneksi = new m_koneksi();

        $sql = "DELETE FROM tb_siswa WHERE id_siswa = '$id_siswa'";

        return mysqli_query($koneksi->koneksi, $sql);
    }


    public function cek_aspirasi($id_siswa)
    {
        $koneksi = new m_koneksi();

        $query = "SELECT COUNT(*) AS total
              FROM tb_aspirasi
              WHERE id_siswa = '$id_siswa'";

        $hasil = mysqli_query($koneksi->koneksi, $query);

        return mysqli_fetch_object($hasil);
    }
}
