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
// SISWA - FORM TAMBAH ASPIRASI
// ==================================================

if ($aksi == 'form_tambah') {

    $kategoris = $kategori->tampil_kategori();

    include_once __DIR__ . '/../Views/Siswa/tambah_pengaduan.php';
}


// ==================================================
// SISWA - TAMBAH ASPIRASI
// ==================================================

elseif ($aksi == 'tambah') {

    $id_siswa = $_SESSION['id_siswa'];
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
            __DIR__ . '/../Upload/' . $bukti_foto
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

        echo "<script>
                alert('Aspirasi berhasil ditambahkan!');
                window.location.href = '../Views/Siswa/aspirasi_siswa.php';
              </script>";
        exit;
    } else {

        echo "Gagal menambahkan aspirasi.";
    }
}


// ==================================================
// SISWA - RIWAYAT ASPIRASI
// ==================================================

elseif ($aksi == 'riwayat') {

    $id_siswa = $_SESSION['id_siswa'];

    $riwayat = $aspirasi->riwayat_by_siswa($id_siswa);

    include_once __DIR__ . '/../Views/Siswa/riwayat_aspirasi.php';
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

    // Menunggu hanya boleh menjadi diproses
    if ($status_lama == 'menunggu' && $status_baru != 'diproses') {

        echo "<script>
                alert('Aspirasi dari status menunggu hanya dapat diproses.');
                window.history.back();
              </script>";
        exit;
    }


    // Diproses hanya boleh menjadi selesai
    if ($status_lama == 'diproses' && $status_baru != 'selesai') {

        echo "<script>
                alert('Aspirasi yang sedang diproses hanya dapat diselesaikan.');
                window.history.back();
              </script>";
        exit;
    }


    // Selesai tidak dapat diubah
    if ($status_lama == 'selesai') {

        echo "<script>
                alert('Aspirasi sudah selesai dan tidak dapat diubah lagi.');
                window.history.back();
              </script>";
        exit;
    }


    // Ditolak tidak dapat diubah
    if ($status_lama == 'ditolak') {

        echo "<script>
                alert('Aspirasi sudah ditolak dan tidak dapat diubah lagi.');
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
    // Tambahkan histori
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
// ADMIN - TOLAK ASPIRASI
// ==================================================

elseif ($aksi == 'tolak') {

    $id_aspirasi = $_POST['id_aspirasi'];
    $id_admin = $_SESSION['id_admin'];

    // Ambil data aspirasi
    $data = $aspirasi->tampil_by_id($id_aspirasi);
    $asp = mysqli_fetch_assoc($data);

    $status_lama = $asp['status'];


    // Aspirasi hanya boleh ditolak jika masih menunggu
    if ($status_lama != 'menunggu') {

        echo "<script>
                alert('Aspirasi hanya dapat ditolak saat status masih menunggu.');
                window.history.back();
              </script>";
        exit;
    }


    // Ubah status menjadi ditolak
    $update_status = $aspirasi->update_status(
        $id_aspirasi,
        'ditolak'
    );


    // Simpan ke histori
    $tambah_histori = $histori->tambah_histori(
        $id_aspirasi,
        $id_admin,
        $status_lama,
        'ditolak'
    );


    if ($update_status && $tambah_histori) {

        echo "<script>
                alert('Aspirasi berhasil ditolak.');
                window.location.href = '../Views/Admin/daftar_aspirasi.php';
              </script>";
        exit;
    } else {

        echo "Gagal menolak aspirasi.";
    }
}


// ==================================================
// ADMIN - DETAIL ASPIRASI
// ==================================================

elseif (isset($_GET['id_aspirasi'])) {

    $id_aspirasi = $_GET['id_aspirasi'];

    $query_aspirasi = $aspirasi->tampil_by_id($id_aspirasi);

    $data_aspirasi = mysqli_fetch_object($query_aspirasi);


    // ==============================================
    // Menentukan status berikutnya
    // ==============================================

    if ($data_aspirasi->status == 'menunggu') {

        $status_berikutnya = 'diproses';
        $form_tanggapan = true;
    } elseif ($data_aspirasi->status == 'diproses') {

        $status_berikutnya = 'selesai';
        $form_tanggapan = true;
    } else {

        $status_berikutnya = '';
        $form_tanggapan = false;
    }


    // ==============================================
    // Ambil data progres
    // ==============================================

    $data_progres = $progres->tampil_by_aspirasi($id_aspirasi);


    // ==============================================
    // Ambil data histori
    // ==============================================

    $data_histori = $histori->tampil_by_aspirasi($id_aspirasi);


    // ==============================================
    // Tampilkan detail
    // ==============================================

    include_once __DIR__ . '/../Views/Admin/detail_aspirasi.php';
}


// ==================================================
// ADMIN - DAFTAR ASPIRASI
// ==================================================

// ADMIN - DAFTAR ASPIRASI
else {
    $tanggal = $_GET['tanggal'] ?? '';
    $bulan = $_GET['bulan'] ?? '';
    $id_siswa = $_GET['id_siswa'] ?? '';
    $id_kategori = $_GET['id_kategori'] ?? '';

    // Data siswa untuk filter
    $data_siswa = $siswa->tampil_siswa();

    // Data kategori untuk filter
    $data_kategori = $kategori->tampil_kategori();

    // Pagination
    $limit = 10;

    $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;

    if ($halaman < 1) {
        $halaman = 1;
    }

    $offset = ($halaman - 1) * $limit;

    // Cek apakah ada filter
    $ada_filter = (
        $tanggal != '' ||
        $bulan != '' ||
        $id_siswa != '' ||
        $id_kategori != ''
    );

    if ($ada_filter) {

        // Ambil seluruh data sesuai filter untuk menghitung jumlah data
        $semua_aspirasi = $aspirasi->filter_aspirasi(
            $tanggal,
            $bulan,
            $id_siswa,
            $id_kategori
        );

        $total_data = mysqli_num_rows($semua_aspirasi);

        // Hitung total halaman
        $total_halaman = ceil($total_data / $limit);

        // Jika halaman melebihi jumlah halaman
        if ($total_halaman > 0 && $halaman > $total_halaman) {
            $halaman = $total_halaman;
            $offset = ($halaman - 1) * $limit;
        }

        // Ambil data sesuai halaman
        $aspirasis = $aspirasi->filter_aspirasi(
            $tanggal,
            $bulan,
            $id_siswa,
            $id_kategori,
            $limit,
            $offset
        );

    } else {

        // Ambil data sesuai halaman
        $aspirasis = $aspirasi->tampil_aspirasi(
            $limit,
            $offset
        );

        // Ambil seluruh data untuk menghitung jumlah halaman
        $semua_aspirasi = $aspirasi->tampil_aspirasi();

        $total_data = mysqli_num_rows($semua_aspirasi);

        // Hitung total halaman
        $total_halaman = ceil($total_data / $limit);
    }

    include_once __DIR__ . '/../Views/Admin/daftar_aspirasi.php';
}

?>
