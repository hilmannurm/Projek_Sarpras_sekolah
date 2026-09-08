<?php
session_start();

require_once __DIR__ . '/../Models/m_siswa.php';
require_once __DIR__ . '/../Models/m_admin.php';

$siswa = new m_siswa();
$admin = new m_admin();

try {

    $role = $_POST['role'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($role == 'siswa') {

        $data = $siswa->tampil_by_nis($username);

        if ($data && password_verify($password, $data->password)) {

            $_SESSION['id_siswa'] = $data->id_siswa;
            $_SESSION['nis'] = $data->nis;
            $_SESSION['nama_siswa'] = $data->nama_siswa;
            $_SESSION['kelas'] = $data->kelas;
            $_SESSION['role'] = 'siswa';

            echo "<script>
                    window.location='../Views/Siswa/dashboard_siswa.php';
                  </script>";

        } else {

            echo "<script>
                    alert('NIS atau password salah');
                    window.location='../Views/login.php';
                  </script>";
        }

    } elseif ($role == 'admin') {

        $data = $admin->tampil_by_username($username);

        if ($data && password_verify($password, $data->password)) {

            $_SESSION['id_admin'] = $data->id_admin;
            $_SESSION['username'] = $data->username;
            $_SESSION['nama_lengkap'] = $data->nama_lengkap;
            $_SESSION['role'] = 'admin';

            echo "<script>
                    window.location='../Views/Admin/dashboard_admin.php';
                  </script>";

        } else {

            echo "<script>
                    alert('Username atau password salah');
                    window.location='../Views/login.php';
                  </script>";
        }
    }

} catch (Exception $e) {

    echo $e->getMessage();

}
?>