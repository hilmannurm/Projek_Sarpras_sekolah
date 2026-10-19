<?php
//session_start();
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


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


                // =========================
                // VALIDASI REGEX NIS
                // =========================

                if (!preg_match('/^[0-9]{10}$/', $nis)) {

                    echo "<script>
                            alert('NIS harus berupa angka dan terdiri dari 10 digit.');
                            window.history.back();
                        </script>";
                    exit;
                }


                // =========================
                // VALIDASI REGEX NAMA
                // =========================

                if (!preg_match('/^[A-Za-z\s]+$/', $nama_siswa)) {

                    echo "<script>
                            alert('Nama siswa hanya boleh berisi huruf dan spasi.');
                            window.history.back();
                        </script>";
                    exit;
                }


                if ($_GET['aksi'] == "tambah") {


                    // CEK NIS SUDAH ADA ATAU BELUM
                    $cek_nis = $siswa->tampil_by_nis($nis);

                    if ($cek_nis) {

                        echo "<script>
                                alert('NIS sudah terdaftar. Data siswa tidak dapat ditambahkan.');
                                window.history.back();
                            </script>";
                        exit;
                    }

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

                    // CEK NIS SUDAH DIGUNAKAN SISWA LAIN ATAU BELUM
                    $cek_nis = $siswa->tampil_by_nis($nis);

                    if ($cek_nis && $cek_nis->id_siswa != $id_siswa) {

                        echo "<script>
                                alert('NIS sudah digunakan oleh siswa lain. Data tidak dapat diubah.');
                                window.history.back();
                            </script>";
                        exit;
                    }

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

            $cek = $siswa->cek_aspirasi($_GET['id_siswa']);

            if ($cek->total > 0) {

                echo "<script>
                        alert('Data siswa tidak dapat dihapus karena masih memiliki aspirasi/laporan.');
                        window.location='../Views/Admin/daftar_siswa.php';
                      </script>";
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
        }
    } else {
        $keyword = isset($_GET['search']) ? trim($_GET['search']) : '';

        // Pagination
        $limit = 10;

        $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;

        if ($halaman < 1) {
            $halaman = 1;
        }

        $offset = ($halaman - 1) * $limit;

        // Jika sedang mencari siswa
        if ($keyword != '') {
            $siswas = $siswa->cari_siswa($keyword, $limit, $offset);
            $total_data = $siswa->jumlah_cari_siswa($keyword);
        }
        // Jika tidak sedang mencari
        else {
            $siswas = $siswa->tampil_siswa($limit, $offset);
            $total_data = $siswa->jumlah_siswa();
        }

        $total_halaman = ceil($total_data / $limit);

        include_once __DIR__ . '/../Views/Admin/daftar_siswa.php';
    }
} catch (Exception $e) {

    echo $e->getMessage();
}
