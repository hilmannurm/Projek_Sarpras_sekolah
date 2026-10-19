<?php
require_once __DIR__ . '/../../Controllers/auth_admin.php';

if (!isset($siswas)) {
    require_once __DIR__ . '/../../Controllers/c_siswa.php';
}
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Siswa - Pengaduan Sarpras</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>


<body class="bg-gray-100">


    <!-- SIDEBAR -->
    <aside class="fixed left-0 top-0 h-screen w-64 bg-white shadow-md">


        <!-- LOGO -->
        <div class="h-20 flex items-center px-6 border-b">

            <div class="w-11 h-11 bg-green-100 rounded-xl
                        flex items-center justify-center mr-3">

                <i class="fa-solid fa-bullhorn text-xl text-green-600"></i>

            </div>


            <div>

                <h1 class="font-bold text-green-700">
                    Pengaduan
                </h1>

                <p class="text-xs text-gray-500">
                    Sarpras Sekolah
                </p>

            </div>

        </div>


        <!-- MENU SIDEBAR -->
        <nav class="p-4">


            <!-- DASHBOARD -->
            <a href="dashboard_admin.php"
                class="flex items-center gap-3 px-4 py-3
                      rounded-lg text-gray-600
                      hover:bg-green-50 hover:text-green-700
                      mb-2">

                <i class="fa-solid fa-gauge w-5"></i>

                <span>Dashboard</span>

            </a>


            <!-- ASPIRASI -->
            <a href="daftar_aspirasi.php"
                class="flex items-center gap-3 px-4 py-3
                      rounded-lg text-gray-600
                      hover:bg-green-50 hover:text-green-700
                      mb-2">

                <i class="fa-solid fa-file-lines w-5"></i>

                <span>Aspirasi</span>

            </a>


            <!-- HISTORI -->
            <a href="histori.php"
                class="flex items-center gap-3 px-4 py-3
                      rounded-lg text-gray-600
                      hover:bg-green-50 hover:text-green-700
                      mb-2">

                <i class="fa-solid fa-clock-rotate-left w-5"></i>

                <span>Histori Aspirasi</span>

            </a>


            <!-- SISWA AKTIF -->
            <a href="daftar_siswa.php"
                class="flex items-center gap-3 px-4 py-3
                      rounded-lg bg-green-100 text-green-700
                      font-medium mb-2">

                <i class="fa-solid fa-user-graduate w-5"></i>

                <span>Siswa</span>

            </a>


            <!-- KATEGORI -->
            <a href="kategori.php"
                class="flex items-center gap-3 px-4 py-3
                      rounded-lg text-gray-600
                      hover:bg-green-50 hover:text-green-700
                      mb-2">

                <i class="fa-solid fa-layer-group w-5"></i>

                <span>Kategori</span>

            </a>


            <!-- LOGOUT -->
            <a href="../../Controllers/c_logout.php"
                onclick="return confirm('Yakin ingin logout?')"
                class="flex items-center gap-3 px-4 py-3
                      rounded-lg text-gray-600
                      hover:bg-red-50 hover:text-red-600
                      mt-8">

                <i class="fa-solid fa-right-from-bracket w-5"></i>

                <span>Logout</span>

            </a>


        </nav>

    </aside>



    <!-- CONTENT UTAMA -->
    <main class="ml-64 min-h-screen">


        <!-- TOPBAR -->
        <header class="bg-white h-20 shadow-sm
                       flex items-center justify-between px-8">


            <!-- JUDUL -->
            <div>

                <h2 class="text-xl font-semibold text-gray-800">
                    Data Siswa
                </h2>

                <p class="text-sm text-gray-500">
                    Kelola data siswa sekolah
                </p>

            </div>


            <!-- PROFIL ADMIN -->
            <div class="flex items-center gap-3">


                <div class="text-right">

                    <p class="font-semibold text-gray-700">
                        <?= htmlspecialchars($_SESSION['username']); ?>
                    </p>

                    <p class="text-xs text-gray-500">
                        Administrator
                    </p>

                </div>


                <div class="w-10 h-10 rounded-full
                            bg-green-100
                            flex items-center justify-center">

                    <i class="fa-solid fa-user-shield
                              text-green-600">
                    </i>

                </div>


            </div>


        </header>



        <!-- ISI -->
        <div class="p-8">


            <!-- HEADER CARD -->
            <div class="flex items-center justify-between mb-6">

                <div>

                    <h1 class="text-2xl font-bold text-gray-800">
                        Daftar Siswa
                    </h1>

                    <p class="text-sm text-gray-500 mt-1">
                        Data siswa yang terdaftar dalam sistem
                    </p>

                </div>


                <!-- TAMBAH SISWA -->
                <a href="form_tambah_siswa.php"
                    class="bg-green-600 hover:bg-green-700
                          text-white px-5 py-3 rounded-xl
                          flex items-center gap-2">

                    <i class="fa-solid fa-plus"></i>

                    <span>Tambah Siswa</span>

                </a>

            </div>



            <!-- SEARCH -->
            <div class="mb-6">

                <form action="daftar_siswa.php"
                    method="GET"
                    class="flex items-center gap-2">

                    <div class="relative w-full max-w-md">

                        <i class="fa-solid fa-magnifying-glass
                                  absolute left-3 top-1/2
                                  -translate-y-1/2
                                  text-gray-400">
                        </i>

                        <input
                            type="text"
                            name="search"
                            value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>"
                            placeholder="Cari NIS atau nama siswa..."
                            class="w-full pl-10 pr-4 py-3
                                   border border-gray-300
                                   rounded-xl
                                   focus:outline-none
                                   focus:ring-2
                                   focus:ring-green-500
                                   focus:border-green-500">

                    </div>


                    <!-- TOMBOL CARI -->
                    <button
                        type="submit"
                        class="px-5 py-3
                               bg-green-600
                               hover:bg-green-700
                               text-white
                               rounded-xl
                               flex items-center gap-2">

                        <i class="fa-solid fa-magnifying-glass"></i>

                        <span>Cari</span>

                    </button>


                    <!-- RESET -->
                    <?php if (!empty($_GET['search'])): ?>

                        <a href="daftar_siswa.php"
                            class="px-5 py-3
                                  bg-gray-100
                                  hover:bg-gray-200
                                  text-gray-600
                                  rounded-xl
                                  flex items-center gap-2">

                            <i class="fa-solid fa-rotate-left"></i>

                            <span>Reset</span>

                        </a>

                    <?php endif; ?>


                </form>

            </div>



            <!-- TABLE -->
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden">


                <div class="overflow-x-auto">

                    <table class="w-full">


                        <!-- TABLE HEADER -->
                        <thead class="bg-gray-50 border-b">

                            <tr>

                                <th class="px-6 py-4 text-left
                                           text-sm font-semibold text-gray-600">
                                    No
                                </th>

                                <th class="px-6 py-4 text-left
                                           text-sm font-semibold text-gray-600">
                                    NIS
                                </th>

                                <th class="px-6 py-4 text-left
                                           text-sm font-semibold text-gray-600">
                                    Nama Siswa
                                </th>

                                <th class="px-6 py-4 text-left
                                           text-sm font-semibold text-gray-600">
                                    Kelas
                                </th>

                                <th class="px-6 py-4 text-center
                                           text-sm font-semibold text-gray-600">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <!-- TABLE BODY -->
                        <tbody class="divide-y">

                            <?php

                            /*
                             * Nomor siswa disesuaikan dengan halaman.
                             * Contoh:
                             * Halaman 1 = 1, 2, 3, ...
                             * Halaman 2 = 11, 12, 13, ...
                             */
                            $no = isset($halaman) ? (($halaman - 1) * 10) + 1 : 1;

                            foreach ($siswas as $data) {

                            ?>

                                <tr class="hover:bg-gray-50">


                                    <!-- NO -->
                                    <td class="px-6 py-4 text-sm text-gray-600">

                                        <?= $no++; ?>

                                    </td>


                                    <!-- NIS -->
                                    <td class="px-6 py-4 text-sm
                                               font-medium text-gray-700">

                                        <?= $data->nis; ?>

                                    </td>


                                    <!-- NAMA -->
                                    <td class="px-6 py-4 text-sm text-gray-700">

                                        <?= $data->nama_siswa; ?>

                                    </td>


                                    <!-- KELAS -->
                                    <td class="px-6 py-4 text-sm text-gray-600">

                                        <?= $data->kelas; ?>

                                    </td>


                                    <!-- AKSI -->
                                    <td class="px-6 py-4">

                                        <div class="flex items-center
                                                    justify-center gap-4">


                                            <!-- EDIT -->
                                            <a href="form_edit_siswa.php?aksi=edit&id_siswa=<?= $data->id_siswa; ?>"
                                                class="text-blue-600 hover:text-blue-800"
                                                title="Edit">

                                                <i class="fa-solid fa-pen-to-square"></i>

                                            </a>


                                            <!-- HAPUS -->
                                            <a href="../../Controllers/c_siswa.php?aksi=hapus&id_siswa=<?= $data->id_siswa; ?>"
                                                onclick="return confirm('Yakin ingin menghapus data siswa ini?')"
                                                class="text-red-600 hover:text-red-800"
                                                title="Hapus">

                                                <i class="fa-solid fa-trash"></i>

                                            </a>


                                        </div>

                                    </td>


                                </tr>

                            <?php

                            }

                            ?>

                        </tbody>


                    </table>

                </div>


                <!-- PAGINATION -->
                <?php if (isset($total_halaman) && $total_halaman > 1): ?>

                    <div class="flex items-center justify-center gap-2 px-6 py-5 border-t border-gray-200">

                        <!-- SEBELUMNYA -->
                        <?php if ($halaman > 1): ?>

                            <a href="?halaman=<?= $halaman - 1; ?><?= !empty($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>"
                                class="px-4 py-2 text-sm border border-gray-300 rounded-lg hover:bg-gray-100">

                                Sebelumnya

                            </a>

                        <?php endif; ?>


                        <!-- NOMOR HALAMAN -->
                        <?php for ($i = 1; $i <= $total_halaman; $i++): ?>

                            <a href="?halaman=<?= $i; ?><?= !empty($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>"
                                class="px-4 py-2 text-sm rounded-lg
                                <?= $i == $halaman
                                    ? 'bg-green-600 text-white'
                                    : 'border border-gray-300 hover:bg-gray-100'; ?>">

                                <?= $i; ?>

                            </a>

                        <?php endfor; ?>


                        <!-- SELANJUTNYA -->
                        <?php if ($halaman < $total_halaman): ?>

                            <a href="?halaman=<?= $halaman + 1; ?><?= !empty($_GET['search']) ? '&search=' . urlencode($_GET['search']) : ''; ?>"
                                class="px-4 py-2 text-sm border border-gray-300 rounded-lg hover:bg-gray-100">

                                Selanjutnya

                            </a>

                        <?php endif; ?>

                    </div>

                <?php endif; ?>


            </div>


        </div>


    </main>


</body>

</html>