<?php

// memulai session agar data login bisa disimpan
session_start();

// memanggil file model siswa agar class m_siswa bisa dipakai
require_once __DIR__ . '/../Models/m_siswa.php';
// memanggil file model admin agar class m_admin bisa dipakai
require_once __DIR__ . '/../Models/m_admin.php';


// membuat objek dari class m_siswa
$siswa = new m_siswa();
// membuat objek dari class m_admin
$admin = new m_admin();


// coba jalankan proses login; jika terjadi error akan ditangkap oleh catch
try {

    // Mengambil data dari form login
    // mengambil isi kolom username dari form (bisa berisi username admin atau NIS siswa)
    $username = $_POST['username'];
    // mengambil isi kolom password dari form
    $password = $_POST['password'];


    // =====================================================
    // CEK LOGIN ADMIN
    // =====================================================

    // cari admin di database berdasarkan username yang diinputkan
    $data_admin = $admin->tampil_by_username($username);


    // jika admin ditemukan dan password yang diinputkan cocok dengan password (hash) di database
    if ($data_admin && password_verify($password, $data_admin->password)) {

        // Menyimpan data Admin ke session
        // simpan id admin ke session
        $_SESSION['id_admin'] = $data_admin->id_admin;
        // simpan username admin ke session
        $_SESSION['username'] = $data_admin->username;
        // simpan nama lengkap admin ke session
        $_SESSION['nama_lengkap'] = $data_admin->nama_lengkap;
        // simpan role 'admin' ke session sebagai penanda jenis pengguna yang sedang login
        $_SESSION['role'] = 'admin';


        // Masuk ke Dashboard Admin
        // arahkan ke halaman dashboard admin memakai JavaScript
        echo "<script>
                window.location='../Views/Admin/dashboard_admin.php';
              </script>";

        // hentikan program agar proses cek login siswa di bawahnya tidak dijalankan
        exit;
    }



    // =====================================================
    // CEK LOGIN SISWA
    // =====================================================

    // cari siswa di database berdasarkan NIS (isi kolom username dipakai sebagai NIS)
    $data_siswa = $siswa->tampil_by_nis($username);


    // jika siswa ditemukan dan password yang diinputkan cocok dengan password (hash) di database
    if ($data_siswa && password_verify($password, $data_siswa->password)) {

        // Menyimpan data Siswa ke session
        // simpan id siswa ke session
        $_SESSION['id_siswa'] = $data_siswa->id_siswa;
        // simpan NIS siswa ke session
        $_SESSION['nis'] = $data_siswa->nis;
        // simpan nama siswa ke session
        $_SESSION['nama_siswa'] = $data_siswa->nama_siswa;
        // simpan kelas siswa ke session
        $_SESSION['kelas'] = $data_siswa->kelas;
        // simpan role 'siswa' ke session sebagai penanda jenis pengguna yang sedang login
        $_SESSION['role'] = 'siswa';


        // Masuk ke Dashboard Siswa
        // arahkan ke halaman dashboard siswa memakai JavaScript
        echo "<script>
                window.location='../Views/Siswa/dashboard_siswa.php';
              </script>";

        // hentikan program setelah pengalihan
        exit;
    }



    // =====================================================
    // LOGIN GAGAL
    // =====================================================

    // jika sampai di sini, berarti admin dan siswa tidak cocok: tampilkan pesan salah lalu kembali ke halaman login
    echo "<script>
            alert('Username/NIS atau password salah');
            window.location='../Views/login.php';
          </script>";


// jika terjadi error saat proses login
} catch (Exception $e) {

    // tampilkan pesan error
    echo $e->getMessage();

}

?>