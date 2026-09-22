<?php

session_start();

require_once __DIR__ . '/../Models/m_siswa.php';
require_once __DIR__ . '/../Models/m_admin.php';


$siswa = new m_siswa();
$admin = new m_admin();


try {

    // Mengambil data dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];


    // =====================================================
    // CEK LOGIN ADMIN
    // =====================================================

    $data_admin = $admin->tampil_by_username($username);


    if ($data_admin && password_verify($password, $data_admin->password)) {

        // Menyimpan data Admin ke session
        $_SESSION['id_admin'] = $data_admin->id_admin;
        $_SESSION['username'] = $data_admin->username;
        $_SESSION['nama_lengkap'] = $data_admin->nama_lengkap;
        $_SESSION['role'] = 'admin';


        // Masuk ke Dashboard Admin
        echo "<script>
                window.location='../Views/Admin/dashboard_admin.php';
              </script>";

        exit;
    }



    // =====================================================
    // CEK LOGIN SISWA
    // =====================================================

    $data_siswa = $siswa->tampil_by_nis($username);


    if ($data_siswa && password_verify($password, $data_siswa->password)) {

        // Menyimpan data Siswa ke session
        $_SESSION['id_siswa'] = $data_siswa->id_siswa;
        $_SESSION['nis'] = $data_siswa->nis;
        $_SESSION['nama_siswa'] = $data_siswa->nama_siswa;
        $_SESSION['kelas'] = $data_siswa->kelas;
        $_SESSION['role'] = 'siswa';


        // Masuk ke Dashboard Siswa
        echo "<script>
                window.location='../Views/Siswa/dashboard_siswa.php';
              </script>";

        exit;
    }



    // =====================================================
    // LOGIN GAGAL
    // =====================================================

    echo "<script>
            alert('Username/NIS atau password salah');
            window.location='../Views/login.php';
          </script>";


} catch (Exception $e) {

    echo $e->getMessage();

}

?>