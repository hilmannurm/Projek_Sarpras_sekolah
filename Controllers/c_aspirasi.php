<?php
// memulai session agar data login (id siswa atau admin) bisa dibaca
session_start();

// memanggil file model aspirasi agar class m_aspirasi bisa dipakai
require_once __DIR__ . '/../Models/m_aspirasi.php';
// memanggil file model progres agar class m_progres bisa dipakai
require_once __DIR__ . '/../Models/m_progres.php';
// memanggil file model histori agar class m_histori bisa dipakai
require_once __DIR__ . '/../Models/m_histori.php';
// memanggil file model siswa agar class m_siswa bisa dipakai
require_once __DIR__ . '/../Models/m_siswa.php';
// memanggil file model kategori agar class m_kategori bisa dipakai
require_once __DIR__ . '/../Models/m_kategori.php';

// membuat objek dari class m_aspirasi
$aspirasi = new m_aspirasi();
// membuat objek dari class m_progres
$progres = new m_progres();
// membuat objek dari class m_histori
$histori = new m_histori();
// membuat objek dari class m_siswa
$siswa = new m_siswa();
// membuat objek dari class m_kategori
$kategori = new m_kategori();

// ambil parameter 'aksi' dari URL (menentukan fitur yang dijalankan); jika tidak ada, isinya string kosong
$aksi = $_GET['aksi'] ?? '';


// ==================================================
// SISWA - FORM TAMBAH ASPIRASI
// ==================================================

// jika aksi adalah form_tambah (siswa membuka form buat aspirasi)
if ($aksi == 'form_tambah') {

    // ambil semua kategori untuk pilihan pada form
    $kategoris = $kategori->tampil_kategori();

    // tampilkan halaman form tambah pengaduan
    include_once __DIR__ . '/../Views/Siswa/tambah_pengaduan.php';
}


// ==================================================
// SISWA - TAMBAH ASPIRASI
// ==================================================

elseif ($aksi == 'tambah') {

    // jika aksi adalah tambah (siswa mengirim aspirasi): ambil id siswa dari session
    $id_siswa = $_SESSION['id_siswa'];
    // ambil id kategori dari form
    $id_kategori = $_POST['id_kategori'];
    // ambil judul laporan dari form
    $judul_laporan = $_POST['judul_laporan'];
    // ambil keterangan dari form
    $keterangan = $_POST['keterangan'];
    // ambil lokasi dari form
    $lokasi = $_POST['lokasi'];

    // Upload foto
    // siapkan nama foto kosong (dipakai jika siswa tidak mengunggah foto)
    $bukti_foto = '';

    // jika siswa memilih file foto
    if (!empty($_FILES['bukti_foto']['name'])) {

        // ambil nama asli file foto
        $nama_foto = $_FILES['bukti_foto']['name'];
        // ambil lokasi file sementara hasil upload
        $tmp_foto = $_FILES['bukti_foto']['tmp_name'];

        // buat nama file baru dengan menambahkan waktu (time) di depannya agar nama tidak sama
        $bukti_foto = time() . '_' . $nama_foto;

        // pindahkan file dari lokasi sementara ke folder Upload
        move_uploaded_file(
            $tmp_foto,
            __DIR__ . '/../Upload/' . $bukti_foto
        );
    }

    // simpan aspirasi ke database (status awal otomatis 'menunggu')
    $hasil = $aspirasi->tambah_aspirasi(
        $id_siswa,
        $id_kategori,
        $judul_laporan,
        $keterangan,
        $lokasi,
        $bukti_foto
    );

    // jika berhasil disimpan
    if ($hasil) {

        // tampilkan pesan berhasil lalu arahkan ke halaman daftar aspirasi siswa
        echo "<script>
                alert('Aspirasi berhasil ditambahkan!');
                window.location.href = '../Views/Siswa/aspirasi_siswa.php';
              </script>";
        // hentikan program setelah pengalihan
        exit;
    } else {

        // jika gagal disimpan, tampilkan pesan gagal
        echo "Gagal menambahkan aspirasi.";
    }
}


// ==================================================
// SISWA - RIWAYAT ASPIRASI
// ==================================================

elseif ($aksi == 'riwayat') {

    // jika aksi adalah riwayat (siswa melihat riwayat): ambil id siswa dari session
    $id_siswa = $_SESSION['id_siswa'];

    // ambil riwayat aspirasi siswa (status selesai atau ditolak)
    $riwayat = $aspirasi->riwayat_by_siswa($id_siswa);

    // tampilkan halaman riwayat aspirasi siswa
    include_once __DIR__ . '/../Views/Siswa/riwayat_aspirasi.php';
}


// ==================================================
// ADMIN - TANGGAPI ASPIRASI
// ==================================================

elseif ($aksi == 'tanggapi') {

    // jika aksi adalah tanggapi (admin menanggapi aspirasi): ambil id aspirasi dari form
    $id_aspirasi = $_POST['id_aspirasi'];
    // ambil id admin dari session
    $id_admin = $_SESSION['id_admin'];

    // ambil status baru yang dipilih admin
    $status_baru = $_POST['status'];
    // ambil umpan balik yang ditulis admin
    $umpan_balik = $_POST['umpan_balik'];


    // ==============================================
    // Ambil data aspirasi
    // ==============================================

    // ambil data aspirasi berdasarkan id
    $data = $aspirasi->tampil_by_id($id_aspirasi);

    // ubah hasil query menjadi array
    $asp = mysqli_fetch_assoc($data);

    // simpan status lama sebelum diubah (untuk dicatat di histori)
    $status_lama = $asp['status'];


    // ==============================================
    // Cek urutan status
    // ==============================================

    // Menunggu hanya boleh menjadi diproses
    // jika status lama menunggu tetapi status baru bukan diproses
    if ($status_lama == 'menunggu' && $status_baru != 'diproses') {

        // tampilkan pesan bahwa menunggu hanya dapat menjadi diproses, lalu kembali ke form
        echo "<script>
                alert('Aspirasi dari status menunggu hanya dapat diproses.');
                window.history.back();
              </script>";
        // hentikan program agar status tidak diubah
        exit;
    }


    // Diproses hanya boleh menjadi selesai
    // jika status lama diproses tetapi status baru bukan selesai
    if ($status_lama == 'diproses' && $status_baru != 'selesai') {

        // tampilkan pesan bahwa diproses hanya dapat menjadi selesai, lalu kembali ke form
        echo "<script>
                alert('Aspirasi yang sedang diproses hanya dapat diselesaikan.');
                window.history.back();
              </script>";
        // hentikan program agar status tidak diubah
        exit;
    }


    // Selesai tidak dapat diubah
    // jika aspirasi sudah selesai
    if ($status_lama == 'selesai') {

        // tampilkan pesan aspirasi sudah selesai dan tidak dapat diubah lagi, lalu kembali ke form
        echo "<script>
                alert('Aspirasi sudah selesai dan tidak dapat diubah lagi.');
                window.history.back();
              </script>";
        // hentikan program agar status tidak diubah
        exit;
    }


    // Ditolak tidak dapat diubah
    // jika aspirasi sudah ditolak
    if ($status_lama == 'ditolak') {

        // tampilkan pesan aspirasi sudah ditolak dan tidak dapat diubah lagi, lalu kembali ke form
        echo "<script>
                alert('Aspirasi sudah ditolak dan tidak dapat diubah lagi.');
                window.history.back();
              </script>";
        // hentikan program agar status tidak diubah
        exit;
    }


    // ==============================================
    // Foto bukti wajib
    // ==============================================

    // jika admin tidak mengunggah foto bukti
    if (empty($_FILES['foto_bukti']['name'])) {

        // tampilkan pesan foto bukti wajib diupload, lalu kembali ke form
        echo "<script>
                alert('Foto bukti wajib diupload.');
                window.history.back();
              </script>";
        // hentikan program agar tanggapan tidak disimpan
        exit;
    }


    // ==============================================
    // Upload foto bukti progres
    // ==============================================

    // siapkan nama foto bukti kosong
    $foto_bukti = '';

    // jika ada file foto bukti yang diunggah
    if (!empty($_FILES['foto_bukti']['name'])) {

        // ambil nama asli file foto bukti
        $nama_foto = $_FILES['foto_bukti']['name'];
        // ambil lokasi file sementara hasil upload
        $tmp_foto = $_FILES['foto_bukti']['tmp_name'];

        // buat nama file baru dengan menambahkan waktu (time) di depannya agar nama tidak sama
        $foto_bukti = time() . '_' . $nama_foto;

        // tentukan lokasi tujuan penyimpanan di folder Upload
        $tujuan = __DIR__ . '/../Upload/' . $foto_bukti;

        // jika terjadi error saat upload file
        if ($_FILES['foto_bukti']['error'] != 0) {

            // tampilkan kode error upload
            echo "Error upload: " . $_FILES['foto_bukti']['error'];
            // hentikan program
            exit;
        }

        // pindahkan file ke folder Upload; jika gagal memindahkan
        if (!move_uploaded_file($tmp_foto, $tujuan)) {

            // tampilkan pesan gagal memindahkan file beserta lokasi tujuan dan file sementara
            echo "Gagal memindahkan file.<br>";
            echo "Lokasi tujuan: " . $tujuan . "<br>";
            echo "File sementara: " . $tmp_foto;
            // hentikan program
            exit;
        }
    }


    // ==============================================
    // Update status
    // ==============================================

    // ubah status aspirasi menjadi status baru
    $update_status = $aspirasi->update_status(
        $id_aspirasi,
        $status_baru
    );


    // ==============================================
    // Update umpan balik
    // ==============================================

    // simpan umpan balik dari admin ke aspirasi
    $update_feedback = $aspirasi->update_umpan_balik(
        $id_aspirasi,
        $umpan_balik
    );


    // ==============================================
    // Tambahkan progres
    // ==============================================

    // tambah catatan progres baru (tahap, foto bukti, dan admin yang menangani) ke tb_progres
    $tambah_progres = $progres->tambah_progres(
        $id_aspirasi,
        $id_admin,
        $status_baru,
        $foto_bukti
    );


    // ==============================================
    // Tambahkan histori
    // ==============================================

    // jika status berubah (status lama berbeda dengan status baru)
    if ($status_lama != $status_baru) {

        // catat perubahan status (status lama dan status baru) ke tb_histori
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

    // jika status, umpan balik, dan progres semuanya berhasil disimpan
    if ($update_status && $update_feedback && $tambah_progres) {

        // arahkan ke halaman detail aspirasi untuk aspirasi tersebut
        header(
            "Location: ../Views/Admin/detail_aspirasi.php?id_aspirasi=$id_aspirasi"
        );

        // hentikan program setelah pengalihan
        exit;
    } else {

        // jika ada yang gagal disimpan, tampilkan pesan gagal
        echo "Gagal menyimpan tanggapan.";
    }
}


// ==================================================
// ADMIN - TOLAK ASPIRASI
// ==================================================

elseif ($aksi == 'tolak') {

    // jika aksi adalah tolak (admin menolak aspirasi): ambil id aspirasi dari form
    $id_aspirasi = $_POST['id_aspirasi'];
    // ambil id admin dari session
    $id_admin = $_SESSION['id_admin'];

    // Ambil data aspirasi
    // ambil data aspirasi berdasarkan id
    $data = $aspirasi->tampil_by_id($id_aspirasi);
    // ubah hasil query menjadi array
    $asp = mysqli_fetch_assoc($data);

    // simpan status lama sebelum diubah (untuk dicatat di histori)
    $status_lama = $asp['status'];


    // Aspirasi hanya boleh ditolak jika masih menunggu
    // jika status lama bukan menunggu
    if ($status_lama != 'menunggu') {

        // tampilkan pesan bahwa aspirasi hanya dapat ditolak saat status menunggu, lalu kembali ke halaman sebelumnya
        echo "<script>
                alert('Aspirasi hanya dapat ditolak saat status masih menunggu.');
                window.history.back();
              </script>";
        // hentikan program agar aspirasi tidak ditolak
        exit;
    }


    // Ubah status menjadi ditolak
    // ubah status aspirasi menjadi 'ditolak'
    $update_status = $aspirasi->update_status(
        $id_aspirasi,
        'ditolak'
    );


    // Simpan ke histori
    // catat perubahan status (dari status lama menjadi ditolak) ke histori
    $tambah_histori = $histori->tambah_histori(
        $id_aspirasi,
        $id_admin,
        $status_lama,
        'ditolak'
    );


    // jika status dan histori berhasil disimpan
    if ($update_status && $tambah_histori) {

        // tampilkan pesan aspirasi berhasil ditolak, lalu arahkan ke halaman daftar aspirasi admin
        echo "<script>
                alert('Aspirasi berhasil ditolak.');
                window.location.href = '../Views/Admin/daftar_aspirasi.php';
              </script>";
        // hentikan program setelah pengalihan
        exit;
    } else {

        // jika gagal, tampilkan pesan gagal
        echo "Gagal menolak aspirasi.";
    }
}


// ==================================================
// ADMIN - DETAIL ASPIRASI
// ==================================================

elseif (isset($_GET['id_aspirasi'])) {

    // jika ada parameter id_aspirasi di URL (admin membuka detail aspirasi): ambil id aspirasi dari URL
    $id_aspirasi = $_GET['id_aspirasi'];

    // ambil data aspirasi berdasarkan id
    $query_aspirasi = $aspirasi->tampil_by_id($id_aspirasi);

    // ubah hasil query menjadi satu objek
    $data_aspirasi = mysqli_fetch_object($query_aspirasi);


    // ==============================================
    // Menentukan status berikutnya
    // ==============================================

    // jika status aspirasi menunggu
    if ($data_aspirasi->status == 'menunggu') {

        // status berikutnya yang boleh dipilih adalah 'diproses'
        $status_berikutnya = 'diproses';
        // tampilkan form tanggapan
        $form_tanggapan = true;
    } elseif ($data_aspirasi->status == 'diproses') {

        // jika status aspirasi diproses, status berikutnya yang boleh dipilih adalah 'selesai'
        $status_berikutnya = 'selesai';
        // tampilkan form tanggapan
        $form_tanggapan = true;
    } else {

        // jika sudah selesai atau ditolak, tidak ada status berikutnya
        $status_berikutnya = '';
        // sembunyikan form tanggapan
        $form_tanggapan = false;
    }


    // ==============================================
    // Ambil data progres
    // ==============================================

    // ambil data progres dari aspirasi tersebut
    $data_progres = $progres->tampil_by_aspirasi($id_aspirasi);


    // ==============================================
    // Ambil data histori
    // ==============================================

    // ambil data histori dari aspirasi tersebut
    $data_histori = $histori->tampil_by_aspirasi($id_aspirasi);


    // ==============================================
    // Tampilkan detail
    // ==============================================

    // tampilkan halaman detail aspirasi admin (view)
    include_once __DIR__ . '/../Views/Admin/detail_aspirasi.php';
}


// ==================================================
// ADMIN - DAFTAR ASPIRASI
// ==================================================

// ADMIN - DAFTAR ASPIRASI
else {
    // jika tidak ada aksi lain, tampilkan daftar aspirasi admin; ambil filter tanggal dari URL, kosong jika tidak ada
    $tanggal = $_GET['tanggal'] ?? '';
    // ambil filter bulan dari URL, kosong jika tidak ada
    $bulan = $_GET['bulan'] ?? '';
    // ambil filter siswa dari URL, kosong jika tidak ada
    $id_siswa = $_GET['id_siswa'] ?? '';
    // ambil filter kategori dari URL, kosong jika tidak ada
    $id_kategori = $_GET['id_kategori'] ?? '';

    // Data siswa untuk filter
    // ambil semua siswa untuk pilihan pada filter
    $data_siswa = $siswa->tampil_siswa();

    // Data kategori untuk filter
    // ambil semua kategori untuk pilihan pada filter
    $data_kategori = $kategori->tampil_kategori();

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

    // Cek apakah ada filter
    // $ada_filter bernilai true jika salah satu filter diisi
    $ada_filter = (
        $tanggal != '' ||
        $bulan != '' ||
        $id_siswa != '' ||
        $id_kategori != ''
    );

    // jika ada filter yang dipakai
    if ($ada_filter) {

        // Ambil seluruh data sesuai filter untuk menghitung jumlah data
        // ambil semua aspirasi sesuai filter (tanpa pembatasan halaman) untuk menghitung jumlah data
        $semua_aspirasi = $aspirasi->filter_aspirasi(
            $tanggal,
            $bulan,
            $id_siswa,
            $id_kategori
        );

        // hitung jumlah data hasil filter
        $total_data = mysqli_num_rows($semua_aspirasi);

        // Hitung total halaman
        // total halaman = jumlah data dibagi data per halaman, dibulatkan ke atas (ceil)
        $total_halaman = ceil($total_data / $limit);

        // Jika halaman melebihi jumlah halaman
        // jika nomor halaman melebihi total halaman
        if ($total_halaman > 0 && $halaman > $total_halaman) {
            // pindahkan ke halaman terakhir
            $halaman = $total_halaman;
            // hitung ulang offset untuk halaman terakhir
            $offset = ($halaman - 1) * $limit;
        }

        // Ambil data sesuai halaman
        // ambil aspirasi sesuai filter untuk halaman yang dibuka
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
        // jika tidak ada filter, ambil aspirasi yang belum selesai atau ditolak untuk halaman yang dibuka
        $aspirasis = $aspirasi->tampil_aspirasi(
            $limit,
            $offset
        );

        // Ambil seluruh data untuk menghitung jumlah halaman
        // ambil semua aspirasi tanpa pembatasan halaman
        $semua_aspirasi = $aspirasi->tampil_aspirasi();

        // hitung jumlah seluruh data
        $total_data = mysqli_num_rows($semua_aspirasi);

        // Hitung total halaman
        // total halaman = jumlah data dibagi data per halaman, dibulatkan ke atas (ceil)
        $total_halaman = ceil($total_data / $limit);
    }

    // tampilkan halaman daftar aspirasi admin (view)
    include_once __DIR__ . '/../Views/Admin/daftar_aspirasi.php';
}

?>
