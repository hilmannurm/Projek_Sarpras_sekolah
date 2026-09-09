<?php

require_once __DIR__ . '/../Models/m_siswa.php';

$siswa = new m_siswa();

try {

    if (!empty($_GET['aksi'])) {

        if ($_GET['aksi'] != "hapus") {

            if ($_GET['aksi'] == "edit") {

                $id_siswa = $_GET['id_siswa'];

                $siswas = $siswa->tampil_by_id($id_siswa);

                include_once __DIR__ . '/../Views/Admin/form_edit_siswa.php';

            } else {

                $nis = $_POST['nis'];
                $nama_siswa = $_POST['nama_siswa'];
                $kelas = $_POST['kelas'];
                $password = $_POST['password'];


                if ($_GET['aksi'] == "tambah") {

                    $query = $siswa->tambah_siswa(
                        $nis,
                        $nama_siswa,
                        $kelas,
                        $password
                    );

                    if ($query) {

                        echo "<script>
                                alert('Data berhasil ditambahkan');
                                window.location='../Views/Admin/daftar_siswa.php';
                              </script>";

                    } else {

                        echo "<script>
                                alert('Data gagal ditambahkan');
                                window.location='../Views/Admin/form_tambah_siswa.php';
                              </script>";
                    }


                } elseif ($_GET['aksi'] == "update") {

    $id_siswa = $_POST['id_siswa'];

    $hasil = $siswa->edit_siswa(
        $id_siswa,
        $nis,
        $nama_siswa,
        $kelas,
        $password
    );

    if ($hasil) {

        echo "<script>
                alert('Data berhasil diubah');
                window.location='/Projek_Sapras_hilman/Views/Admin/daftar_siswa.php';
              </script>";

    } else {

        echo "<script>
                alert('Data gagal diubah');
                window.location='/Projek_Sapras_hilman/Views/Admin/daftar_siswa.php';
              </script>";
    }
}
            }

        } else {

            $result = $siswa->hapus_siswa($_GET['id_siswa']);

            if ($result) {

                echo "<script>
                        alert('Data berhasil dihapus');
                        window.location='../Views/Admin/daftar_siswa.php';
                      </script>";

            } else {

                echo "<script>
                        alert('Data gagal dihapus');
                        window.location='../Views/Admin/daftar_siswa.php';
                      </script>";
            }
        }

    } else {

        $siswas = $siswa->tampil_siswa();
        include_once __DIR__ . '/../Views/Admin/daftar_siswa.php';

    }

} catch (Exception $e) {

    echo $e->getMessage();

}

?>