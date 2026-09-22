<?php
session_start();

require_once __DIR__ . '/../Models/m_kategori.php';

$kategori = new m_kategori();

try {
    if (!empty($_GET['aksi'])) {

        if ($_GET['aksi'] != "hapus") {

            if ($_GET['aksi'] == 'edit') {

                $id = $_GET['id'];

                $kategoris = $kategori->tampil_by_id($id);

                include_once __DIR__ . '/../Views/Admin/form_edit_kategori.php';

            } else {

                $nama_kategori = $_POST['nama_kategori'];

                if ($_GET['aksi'] == "tambah") {

                    $query = $kategori->tambah_kategori($nama_kategori);

                    if ($query) {
                        echo "<script>
                            alert('Data berhasil ditambahkan');
                            window.location='../Views/Admin/kategori.php'
                        </script>";
                    } else {
                        echo "<script>
                            alert('Data gagal ditambahkan');
                            window.location='../Views/Admin/form_tambah_kategori.php'
                        </script>";
                    }

                } elseif ($_GET['aksi'] == "update") {

                    $id = $_POST['id_kategori'];
                    
                    $hasil = $kategori->edit_kategori(
                        $id,
                        $nama_kategori
                    );

                    if ($hasil) {
                        echo "<script>
                            alert('Data berhasil diubah');
                            window.location='../Views/Admin/kategori.php'
                        </script>";
                    } else {
                        echo "<script>
                            alert('Data gagal diubah');
                            window.location='../Views/Admin/form_edit_kategori.php?id=$id'
                        </script>";
                    }
                }
            }

        } else {

            $result = $kategori->hapus_kategori($_GET['id']);

            if ($result) {
                echo "<script>
                    alert('Data berhasil dihapus');
                    window.location='../Views/Admin/kategori.php'
                </script>";
            } else {
                echo "<script>
                    alert('Data gagal dihapus');
                    window.location='../Views/Admin/kategori.php'
                </script>";
            }
        }

    } else {

        $kategoris = $kategori->tampil_kategori();
        include_once __DIR__ . '/../Views/Admin/kategori.php';

    }

} catch (Exception $e) {
    echo $e->getMessage();
}
?>