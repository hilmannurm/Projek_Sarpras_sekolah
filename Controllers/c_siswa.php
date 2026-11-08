<?php
//session_start();
// jika session belum dimulai
if (session_status() === PHP_SESSION_NONE) {
    // mulai session agar data login bisa dibaca
    session_start();
}


// memanggil file model siswa agar class m_siswa bisa dipakai
require_once __DIR__ . '/../Models/m_siswa.php';

// membuat objek dari class m_siswa
$siswa = new m_siswa();

// coba jalankan proses di bawah ini; jika terjadi error akan ditangkap oleh catch
try {

    // jika ada parameter 'aksi' di URL (misalnya ?aksi=tambah)
    if (!empty($_GET['aksi'])) {

        // jika aksi bukan hapus
        if ($_GET['aksi'] != "hapus") {

            // jika aksi adalah edit (menampilkan form edit)
            if ($_GET['aksi'] == "edit") {

                // ambil id siswa dari URL
                $id_siswa = $_GET['id_siswa'];

                // ambil data siswa berdasarkan id untuk mengisi form edit
                $siswas = $siswa->tampil_by_id($id_siswa);

                // tampilkan halaman form edit siswa
                include_once __DIR__ . '/../Views/Admin/form_edit_siswa.php';
                
            } else {

                // jika aksi bukan edit (berarti tambah atau update), ambil NIS dari form
                $nis = $_POST['nis'];
                // ambil nama siswa dari form
                $nama_siswa = $_POST['nama_siswa'];
                // ambil kelas dari form
                $kelas = $_POST['kelas'];
                // ambil password dari form
                $password = $_POST['password'];


                // =========================
                // VALIDASI REGEX NIS
                // =========================

                // jika NIS bukan 10 digit angka (pola regex ^[0-9]{10}$)
                if (!preg_match('/^[0-9]{10}$/', $nis)) {

                    // tampilkan pesan NIS harus 10 digit angka, lalu kembali ke halaman form sebelumnya
                    echo "<script>
                            alert('NIS harus berupa angka dan terdiri dari 10 digit.');
                            window.history.back();
                        </script>";
                    // hentikan program agar data tidak disimpan
                    exit;
                }


                // =========================
                // VALIDASI REGEX NAMA
                // =========================

                // jika nama mengandung karakter selain huruf dan spasi (pola regex)
                if (!preg_match('/^[A-Za-z\s]+$/', $nama_siswa)) {

                    // tampilkan pesan nama hanya boleh huruf dan spasi, lalu kembali ke halaman form sebelumnya
                    echo "<script>
                            alert('Nama siswa hanya boleh berisi huruf dan spasi.');
                            window.history.back();
                        </script>";
                    // hentikan program agar data tidak disimpan
                    exit;
                }


                // jika aksi adalah tambah
                if ($_GET['aksi'] == "tambah") {


                    // CEK NIS SUDAH ADA ATAU BELUM
                    // cari siswa dengan NIS yang sama untuk mengecek apakah NIS sudah terdaftar
                    $cek_nis = $siswa->tampil_by_nis($nis);

                    // jika NIS sudah terdaftar
                    if ($cek_nis) {

                        // tampilkan pesan NIS sudah terdaftar, lalu kembali ke halaman form sebelumnya
                        echo "<script>
                                alert('NIS sudah terdaftar. Data siswa tidak dapat ditambahkan.');
                                window.history.back();
                            </script>";
                        // hentikan program agar data tidak disimpan
                        exit;
                    }

                    // simpan siswa baru ke database (password di-hash di dalam model)
                    $query = $siswa->tambah_siswa(
                        $nis,
                        $nama_siswa,
                        $kelas,
                        $password
                    );

                    // jika berhasil disimpan
                    if ($query) {

                        // tampilkan pesan berhasil lalu arahkan ke halaman daftar siswa
                        echo "<script>
                                alert('Data berhasil ditambahkan');
                                window.location='../Views/Admin/daftar_siswa.php';
                              </script>";
                    } else {

                        // jika gagal disimpan, tampilkan pesan gagal lalu kembali ke form tambah siswa
                        echo "<script>
                                alert('Data gagal ditambahkan');
                                window.location='../Views/Admin/form_tambah_siswa.php';
                              </script>";
                    }
                } elseif ($_GET['aksi'] == "update") {

                    // jika aksi adalah update: ambil id siswa dari form
                    $id_siswa = $_POST['id_siswa'];

                    // CEK NIS SUDAH DIGUNAKAN SISWA LAIN ATAU BELUM
                    // cari siswa dengan NIS yang sama
                    $cek_nis = $siswa->tampil_by_nis($nis);

                    // jika NIS sudah dipakai siswa lain (id siswa-nya berbeda dengan siswa yang sedang diedit)
                    if ($cek_nis && $cek_nis->id_siswa != $id_siswa) {

                        // tampilkan pesan NIS sudah digunakan siswa lain, lalu kembali ke halaman form sebelumnya
                        echo "<script>
                                alert('NIS sudah digunakan oleh siswa lain. Data tidak dapat diubah.');
                                window.history.back();
                            </script>";
                        // hentikan program agar data tidak diubah
                        exit;
                    }

                    // ubah data siswa di database
                    $hasil = $siswa->edit_siswa(
                        $id_siswa,
                        $nis,
                        $nama_siswa,
                        $kelas,
                        $password
                    );

                    // jika berhasil diubah
                    if ($hasil) {

                        // tampilkan pesan berhasil lalu arahkan ke halaman daftar siswa
                        echo "<script>
                                alert('Data berhasil diubah');
                                window.location='/Projek_Sapras_hilman/Views/Admin/daftar_siswa.php';
                              </script>";
                    } else {

                        // jika gagal diubah, tampilkan pesan gagal lalu arahkan ke halaman daftar siswa
                        echo "<script>
                                alert('Data gagal diubah');
                                window.location='/Projek_Sapras_hilman/Views/Admin/daftar_siswa.php';
                              </script>";
                    }
                }
            }
        } else {

            // jika aksi adalah hapus: cek dulu apakah siswa masih memiliki aspirasi
            $cek = $siswa->cek_aspirasi($_GET['id_siswa']);

            // jika siswa masih memiliki aspirasi (total lebih dari 0)
            if ($cek->total > 0) {

                // tampilkan pesan data tidak dapat dihapus karena masih memiliki aspirasi, lalu kembali ke daftar siswa
                echo "<script>
                        alert('Data siswa tidak dapat dihapus karena masih memiliki aspirasi/laporan.');
                        window.location='../Views/Admin/daftar_siswa.php';
                      </script>";
            } else {

                // jika tidak punya aspirasi, hapus siswa dari database
                $result = $siswa->hapus_siswa($_GET['id_siswa']);

                // jika berhasil dihapus
                if ($result) {

                    // tampilkan pesan berhasil lalu arahkan ke halaman daftar siswa
                    echo "<script>
                            alert('Data berhasil dihapus');
                            window.location='../Views/Admin/daftar_siswa.php';
                          </script>";
                } else {

                    // jika gagal dihapus, tampilkan pesan gagal lalu kembali ke daftar siswa
                    echo "<script>
                            alert('Data gagal dihapus');
                            window.location='../Views/Admin/daftar_siswa.php';
                          </script>";
                }
            }
        }
    } else {
        // jika tidak ada parameter 'aksi', tampilkan daftar siswa; ambil kata kunci pencarian dari URL (?search=), kosong jika tidak ada
        $keyword = isset($_GET['search']) ? trim($_GET['search']) : '';

        // Pagination
        // jumlah data yang ditampilkan per halaman adalah 10
        $limit = 10;

        // ambil nomor halaman dari URL (?halaman=), jika tidak ada dianggap halaman 1
        $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;

        // jika nomor halaman kurang dari 1
        if ($halaman < 1) {
            // paksa kembali ke halaman 1
            $halaman = 1;
        }

        // hitung offset (posisi data awal): (nomor halaman - 1) dikali jumlah data per halaman
        $offset = ($halaman - 1) * $limit;

        // Jika sedang mencari siswa
        // jika ada kata kunci pencarian
        if ($keyword != '') {
            // ambil siswa hasil pencarian untuk halaman yang dibuka
            $siswas = $siswa->cari_siswa($keyword, $limit, $offset);
            // hitung jumlah seluruh hasil pencarian untuk menentukan jumlah halaman
            $total_data = $siswa->jumlah_cari_siswa($keyword);
        }
        // Jika tidak sedang mencari
        else {
            // ambil data siswa untuk halaman yang dibuka (tanpa pencarian)
            $siswas = $siswa->tampil_siswa($limit, $offset);
            // hitung jumlah seluruh siswa untuk menentukan jumlah halaman
            $total_data = $siswa->jumlah_siswa();
        }

        // total halaman = jumlah data dibagi data per halaman, dibulatkan ke atas (ceil)
        $total_halaman = ceil($total_data / $limit);

        // tampilkan halaman daftar siswa (view) yang memakai data di atas
        include_once __DIR__ . '/../Views/Admin/daftar_siswa.php';
    }
// jika terjadi error
} catch (Exception $e) {

    // tampilkan pesan error
    echo $e->getMessage();
}
