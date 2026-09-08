<?php
session_start();

require_once __DIR__ . '/../Models/m_aspirasi.php';
require_once __DIR__ . '/../Models/m_progres.php';
require_once __DIR__ . '/../Models/m_histori.php';
require_once __DIR__ . '/../Models/m_siswa.php';
require_once __DIR__ . '/../Models/m_kategori.php';

$aspirasi = new m_aspirasi();
$progres = new m_progres();
$histori = new m_histori();
$siswa = new m_siswa();
$kategori = new m_kategori();

$aksi = $_GET['aksi'] ?? '';


// ==================================================
// SISWA - TAMBAH ASPIRASI
// ==================================================

if ($aksi == 'tambah') {

    $id_siswa = $_POST['id_siswa'];
    $id_kategori = $_POST['id_kategori'];
    $judul_laporan = $_POST['judul_laporan'];
    $keterangan = $_POST['keterangan'];
    $lokasi = $_POST['lokasi'];

    // Upload foto
    $bukti_foto = '';

    if (!empty($_FILES['bukti_foto']['name'])) {

        $nama_foto = $_FILES['bukti_foto']['name'];
        $tmp_foto = $_FILES['bukti_foto']['tmp_name'];

        $bukti_foto = time() . '_' . $nama_foto;

        move_uploaded_file(
            $tmp_foto,
            __DIR__ . '/../Views/Upload/' . $bukti_foto
        );
    }

    $hasil = $aspirasi->tambah_aspirasi(
        $id_siswa,
        $id_kategori,
        $judul_laporan,
        $keterangan,
        $lokasi,
        $bukti_foto
    );

    if ($hasil) {

        header("Location: ../Views/Siswa/daftar_aspirasi.php");
        exit;

    } else {

        echo "Gagal menambahkan aspirasi.";

    }
}


// ==================================================
// ADMIN - TANGGAPI ASPIRASI
// ==================================================

elseif ($aksi == 'tanggapi') {

    $id_aspirasi = $_POST['id_aspirasi'];
    $id_admin = $_SESSION['id_admin'];

    $status_baru = $_POST['status'];
    $umpan_balik = $_POST['umpan_balik'];


    // ==============================================
    // Ambil data aspirasi
    // ==============================================

    $data = $aspirasi->tampil_by_id($id_aspirasi);

    $asp = mysqli_fetch_assoc($data);

    $status_lama = $asp['status'];


    // ==============================================
    // Cek urutan status
    // ==============================================

    if ($status_lama == 'diproses' && $status_baru != 'diperbaiki') {

        echo "<script>
                alert('Status harus diubah ke diperbaiki terlebih dahulu.');
                window.history.back();
              </script>";
        exit;

    }

    if ($status_lama == 'diperbaiki' && $status_baru != 'selesai') {

        echo "<script>
                alert('Status harus diubah ke selesai terlebih dahulu.');
                window.history.back();
              </script>";
        exit;

    }

    if ($status_lama == 'selesai') {

        echo "<script>
                alert('Aspirasi sudah selesai dan tidak dapat diubah lagi.');
                window.history.back();
              </script>";
        exit;

    }


    // ==============================================
    // Foto bukti wajib
    // ==============================================

    if (empty($_FILES['foto_bukti']['name'])) {

        echo "<script>
                alert('Foto bukti wajib diupload.');
                window.history.back();
              </script>";
        exit;

    }


    // ==============================================
    // Upload foto bukti progres
    // ==============================================

    $foto_bukti = '';

if (!empty($_FILES['foto_bukti']['name'])) {

    $nama_foto = $_FILES['foto_bukti']['name'];
    $tmp_foto = $_FILES['foto_bukti']['tmp_name'];
    $foto_bukti = time() . '_' . $nama_foto;

    $tujuan = __DIR__ . '/../Upload/' . $foto_bukti;

    if ($_FILES['foto_bukti']['error'] != 0) {
        echo "Error upload: " . $_FILES['foto_bukti']['error'];
        exit;
    }

    if (!move_uploaded_file($tmp_foto, $tujuan)) {
        echo "Gagal memindahkan file.<br>";
        echo "Lokasi tujuan: " . $tujuan . "<br>";
        echo "File sementara: " . $tmp_foto;
        exit;
    }
}


    // ==============================================
    // Update status
    // ==============================================

    $update_status = $aspirasi->update_status(
        $id_aspirasi,
        $status_baru
    );


    // ==============================================
    // Update umpan balik
    // ==============================================

    $update_feedback = $aspirasi->update_umpan_balik(
        $id_aspirasi,
        $umpan_balik
    );


    // ==============================================
    // Tambahkan progres
    // ==============================================

    $tambah_progres = $progres->tambah_progres(
        $id_aspirasi,
        $id_admin,
        $status_baru,
        $foto_bukti
    );


    // ==============================================
    // Tambahkan histori jika status berubah
    // ==============================================

    if ($status_lama != $status_baru) {

        $tambah_histori = $histori->tambah_histori(
            $id_aspirasi,
            $id_admin,
            $status_lama,
            $status_baru
        );
    }


    // ==============================================
    // Redirect
    // ==============================================

    if ($update_status && $update_feedback && $tambah_progres) {

        header(
            "Location: ../Views/Admin/detail_aspirasi.php?id_aspirasi=$id_aspirasi"
        );

        exit;

    } else {

        echo "Gagal menyimpan tanggapan.";

    }
}


// ==================================================
// ADMIN - DETAIL ASPIRASI
// ==================================================

elseif (isset($_GET['id_aspirasi'])) {
    $id_aspirasi = $_GET['id_aspirasi'];

    $query_aspirasi = $aspirasi->tampil_by_id($id_aspirasi);
    $data_aspirasi = mysqli_fetch_object($query_aspirasi);

    /*
     * Menentukan status berikutnya.
     * Status hanya boleh maju:
     * Diproses → Diperbaiki → Selesai
     */

    if ($data_aspirasi->status == 'diproses') {
        $status_berikutnya = 'diperbaiki';
        $form_tanggapan = true;
    } elseif ($data_aspirasi->status == 'diperbaiki') {
        $status_berikutnya = 'selesai';
        $form_tanggapan = true;
    } else {
        $status_berikutnya = '';
        $form_tanggapan = false;
    }

    $data_progres = $progres->tampil_by_aspirasi($id_aspirasi);
    $data_histori = $histori->tampil_by_aspirasi($id_aspirasi);
}


// ==================================================
// ADMIN - DAFTAR ASPIRASI
// ==================================================

else {

    $tanggal = $_GET['tanggal'] ?? '';
    $bulan = $_GET['bulan'] ?? '';
    $id_siswa = $_GET['id_siswa'] ?? '';
    $id_kategori = $_GET['id_kategori'] ?? '';

    // Data siswa untuk filter
    $data_siswa = $siswa->tampil_siswa();

    // Data kategori untuk filter
    $data_kategori = $kategori->tampil_kategori();


    // Filter aspirasi
    if (
        $tanggal != '' ||
        $bulan != '' ||
        $id_siswa != '' ||
        $id_kategori != ''
    ) {

        $aspirasis = $aspirasi->filter_aspirasi(
            $tanggal,
            $bulan,
            $id_siswa,
            $id_kategori
        );

    } else {

        $aspirasis = $aspirasi->tampil_aspirasi();

    }

}

?>