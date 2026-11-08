<?php
// memulai session agar data login admin bisa dibaca
session_start();
// memanggil file model histori agar class m_histori bisa dipakai
require_once __DIR__ . '/../Models/m_histori.php';

// membuat objek dari class m_histori
$histori = new m_histori();


//$historis = $histori->tampil_histori();
//
//include_once __DIR__ . '/../Views/Admin/histori.php';


// coba jalankan proses di bawah ini; jika terjadi error akan ditangkap oleh catch
try {

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
    // ambil histori (aspirasi yang selesai atau ditolak) untuk halaman yang sedang dibuka
    $historis = $histori->tampil_histori(
        $limit,
        $offset
    );

    // Ambil seluruh data untuk menghitung jumlah halaman
    // ambil semua histori tanpa pembatasan halaman
    $semua_histori = $histori->tampil_histori();

    // hitung jumlah seluruh data histori
    $total_data = mysqli_num_rows($semua_histori);

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

        // ambil ulang data histori untuk halaman terakhir
        $historis = $histori->tampil_histori(
            $limit,
            $offset
        );
    }

    // menampilkan halaman histori admin (view) yang memakai data di atas
    include_once __DIR__ . '/../Views/Admin/histori.php';

// jika terjadi error
} catch (Exception $e) {
    // tampilkan pesan error
    echo $e->getMessage();
}

?>