<?php
include_once 'm_koneksi.php';

class m_siswa {
    // properties and methods

    public function tampil_siswa() {
        $koneksi = new m_koneksi();
        $sql = "SELECT * FROM tb_siswa ";
        $query = mysqli_query($koneksi->koneksi, $sql);

        if ($query->num_row> 0) {
            while ($data = mysqli_fetch_object($query)) {
                $result[] = $data;
            }
            return $result;
        }
    }

    public function tampil_by_nis($nis) {
        $koneksi = new m_koneksi();

        $sql = "SELECT * FROM tb_siswa WHERE nis = '$nis'";
        $query = mysqli_query($koneksi->koneksi, $sql);

        return mysqli_fetch_object($query);
    }


    public function tambah_siswa($nis, $username, $nama_lengkap, $kelas, $password) {
        $koneksi = new m_koneksi();

        $sql = "INSERT INTO tb_siswa (nis, username, nama_lengkap, kelas, password )
        VALUES ('$nis', '$username', '$nama_lengkap', 'kelas', '$password')";

        return mysqli_query($koneksi->koneksi, $sql);
    }


    public function edit_siswa($nis, $username, $nama_lengkap, $kelas, $password) {
        $koneksi = new m_koneksi();

        $sql = "UPDATE tb_user SET
        nis = '$nis',
        username = '$username',
        nama_lengkap = '$nama_lengkap',
        kelas = '$kelas',
        password = '$password'
        WHERE nis = '$nis'";
    }


    public function hapus_siswa($nis) {
        $koneksi = new m_koneksi();

        $sql = "DELETE FROM tb_siswa WHERE nis = '$nis'";

        return mysqli_query($koneksi->koneksi, $sql);
    }
}

?>