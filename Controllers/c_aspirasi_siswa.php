<?php
// memulai session agar data login siswa bisa dibaca
session_start();

// memanggil file model aspirasi agar class m_aspirasi bisa dipakai
require_once __DIR__ . '/../Models/m_aspirasi.php';
// memanggil file model progres agar class m_progres bisa dipakai
require_once __DIR__ . '/../Models/m_progres.php';
// memanggil file model histori agar class m_histori bisa dipakai
require_once __DIR__ . '/../Models/m_histori.php';

// membuat objek dari class m_aspirasi
$aspirasi = new m_aspirasi();
// membuat objek dari class m_progres
$progres = new m_progres();
// membuat objek dari class m_histori
$histori = new m_histori();

// mengambil id siswa yang sedang login dari session
$id_siswa = $_SESSION['id_siswa'];


// ==================================================
// DETAIL ASPIRASI SISWA
// ==================================================

// jika ada parameter id_aspirasi di URL, tampilkan detail satu aspirasi
if (isset($_GET['id_aspirasi'])) {

    // ambil id aspirasi dari URL
    $id_aspirasi = $_GET['id_aspirasi'];

    // ambil data aspirasi berdasarkan id tersebut
    $query_aspirasi = $aspirasi->tampil_by_id($id_aspirasi);

    // ubah hasil query menjadi satu objek
    $data_aspirasi = mysqli_fetch_object($query_aspirasi);

    // Memastikan aspirasi milik siswa yang sedang login
    // jika aspirasi tidak ditemukan atau bukan milik siswa yang sedang login
    if (!$data_aspirasi || $data_aspirasi->id_siswa != $id_siswa) {

        // tampilkan pesan aspirasi tidak ditemukan, lalu kembali ke daftar aspirasi
        echo "<script>
                alert('Aspirasi tidak ditemukan.');
                window.location='c_aspirasi_siswa.php';
              </script>";
        // hentikan program agar detail aspirasi tidak ditampilkan
        exit;
    }

    // Ambil progres aspirasi
    // ambil data progres dari aspirasi tersebut
    $data_progres = $progres->tampil_by_aspirasi($id_aspirasi);

    // Ambil histori perubahan status
    // ambil data histori perubahan status dari aspirasi tersebut
    $data_histori = $histori->tampil_by_aspirasi($id_aspirasi);

    // include_once __DIR__ . '/../Views/Siswa/detail_aspirasi_siswa.php';

}


// ==================================================
// RIWAYAT ASPIRASI SISWA
// ==================================================

// jika tidak ada id_aspirasi tetapi ada parameter riwayat di URL, tampilkan riwayat aspirasi
elseif (isset($_GET['riwayat'])) {

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

    // Ambil data sesuai halaman
    // ambil riwayat aspirasi siswa untuk halaman yang dibuka
    $riwayat = $aspirasi->riwayat_by_siswa(
        $id_siswa,
        $limit,
        $offset
    );

    // Ambil seluruh data untuk menghitung jumlah halaman
    // ambil semua riwayat aspirasi siswa tanpa pembatasan halaman
    $semua_riwayat = $aspirasi->riwayat_by_siswa($id_siswa);

    // hitung jumlah seluruh data riwayat
    $total_data = mysqli_num_rows($semua_riwayat);

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

        // ambil ulang data riwayat untuk halaman terakhir
        $riwayat = $aspirasi->riwayat_by_siswa(
            $id_siswa,
            $limit,
            $offset
        );
    }

    // tampilkan halaman riwayat aspirasi siswa (view)
    include_once __DIR__ . '/../Views/Siswa/riwayat_aspirasi.php';
}


// ==================================================
// DAFTAR ASPIRASI SISWA
// ==================================================

else {

    // Pagination
    // jika tidak ada parameter lain, tampilkan daftar aspirasi siswa yang masih berjalan; jumlah data per halaman adalah 10
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

    // Ambil data sesuai halaman
    // ambil aspirasi siswa (status menunggu atau diproses) untuk halaman yang dibuka
    $aspirasis = $aspirasi->tampil_by_siswa(
        $id_siswa,
        $limit,
        $offset
    );

    // Ambil seluruh data untuk menghitung jumlah halaman
    // ambil semua aspirasi siswa tanpa pembatasan halaman
    $semua_aspirasi = $aspirasi->tampil_by_siswa($id_siswa);

    // hitung jumlah seluruh data aspirasi
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

        // ambil ulang data aspirasi untuk halaman terakhir
        $aspirasis = $aspirasi->tampil_by_siswa(
            $id_siswa,
            $limit,
            $offset
        );
    }

    // tampilkan halaman daftar aspirasi siswa (view)
    include_once __DIR__ . '/../Views/Siswa/aspirasi_siswa.php';
}
