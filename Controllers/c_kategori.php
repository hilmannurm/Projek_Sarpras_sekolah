<?php
// memulai session agar data login admin bisa dibaca
session_start();

// memanggil file model kategori agar class m_kategori bisa dipakai
require_once __DIR__ . '/../Models/m_kategori.php';

// membuat objek dari class m_kategori
$kategori = new m_kategori();

// coba jalankan proses di bawah ini; jika terjadi error akan ditangkap oleh catch
try {
    // jika ada parameter 'aksi' di URL (misalnya ?aksi=tambah)
    if (!empty($_GET['aksi'])) {

        // jika aksi bukan hapus
        if ($_GET['aksi'] != "hapus") {

            // jika aksi adalah edit (menampilkan form edit)
            if ($_GET['aksi'] == 'edit') {

                // ambil id kategori dari URL
                $id = $_GET['id'];

                // ambil data kategori berdasarkan id untuk mengisi form edit
                $kategoris = $kategori->tampil_by_id($id);

                // tampilkan halaman form edit kategori
                include_once __DIR__ . '/../Views/Admin/form_edit_kategori.php';

            } else {

                // jika aksi bukan edit (berarti tambah atau update), ambil nama kategori dari form
                $nama_kategori = $_POST['nama_kategori'];

                // jika aksi adalah tambah
                if ($_GET['aksi'] == "tambah") {

                    // simpan kategori baru ke database
                    $query = $kategori->tambah_kategori($nama_kategori);

                    // jika berhasil disimpan
                    if ($query) {
                        // tampilkan pesan berhasil lalu arahkan ke halaman daftar kategori
                        echo "<script>
                            alert('Data berhasil ditambahkan');
                            window.location='../Views/Admin/kategori.php'
                        </script>";
                    } else {
                        // jika gagal disimpan, tampilkan pesan gagal lalu kembali ke form tambah kategori
                        echo "<script>
                            alert('Data gagal ditambahkan');
                            window.location='../Views/Admin/form_tambah_kategori.php'
                        </script>";
                    }

                } elseif ($_GET['aksi'] == "update") {

                    // jika aksi adalah update: ambil id kategori dari form
                    $id = $_POST['id_kategori'];
                    
                    // ubah nama kategori di database
                    $hasil = $kategori->edit_kategori(
                        $id,
                        $nama_kategori
                    );

                    // jika berhasil diubah
                    if ($hasil) {
                        // tampilkan pesan berhasil lalu arahkan ke halaman daftar kategori
                        echo "<script>
                            alert('Data berhasil diubah');
                            window.location='../Views/Admin/kategori.php'
                        </script>";
                    } else {
                        // jika gagal diubah, tampilkan pesan gagal lalu kembali ke form edit kategori dengan id yang sama
                        echo "<script>
                            alert('Data gagal diubah');
                            window.location='../Views/Admin/form_edit_kategori.php?id=$id'
                        </script>";
                    }
                }
            }

        } else {

            // jika aksi adalah hapus: hapus kategori berdasarkan id dari URL
            $result = $kategori->hapus_kategori($_GET['id']);

            // jika berhasil dihapus
            if ($result) {
                // tampilkan pesan berhasil lalu arahkan ke halaman daftar kategori
                echo "<script>
                    alert('Data berhasil dihapus');
                    window.location='../Views/Admin/kategori.php'
                </script>";
            } else {
                // jika gagal dihapus, tampilkan pesan gagal lalu kembali ke halaman daftar kategori
                echo "<script>
                    alert('Data gagal dihapus');
                    window.location='../Views/Admin/kategori.php'
                </script>";
            }
        }

    } else {

        // jika tidak ada parameter 'aksi': ambil semua kategori dari database
        $kategoris = $kategori->tampil_kategori();
        // tampilkan halaman daftar kategori
        include_once __DIR__ . '/../Views/Admin/kategori.php';

    }

// jika terjadi error (misalnya kategori masih dipakai aspirasi sehingga gagal dihapus)
} catch (Exception $e) {

    // jika error terjadi saat aksi hapus
    if (isset($_GET['aksi']) && $_GET['aksi'] == 'hapus') {
        // tampilkan pesan bahwa kategori tidak dapat dihapus karena masih dipakai aspirasi, lalu kembali ke daftar kategori
        echo "<script>
                alert('Kategori tidak dapat dihapus karena masih digunakan oleh aspirasi!');
                window.location='../Views/Admin/kategori.php';
              </script>";
    } else {
        // untuk aksi lain, tampilkan pesan error apa adanya
        echo $e->getMessage();
    }
}
?>