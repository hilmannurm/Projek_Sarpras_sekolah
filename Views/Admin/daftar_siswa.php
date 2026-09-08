<?php
require_once '../../Controllers/c_siswa.php';
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

                <i class="fa-solid fa-gauge"></i>

                <span>Dashboard</span>

            </a>


            <!-- ASPIRASI -->
            <a href="daftar_aspirasi.php"
               class="flex items-center gap-3 px-4 py-3
                      rounded-lg text-gray-600
                      hover:bg-green-50 hover:text-green-700
                      mb-2">

                <i class="fa-solid fa-file-lines"></i>

                <span>Aspirasi</span>

            </a>


            <!-- HISTORI -->
            <a href="/Projek_sapras_hilman/Controllers/c_histori.php"
               class="flex items-center gap-3 px-4 py-3
                      rounded-lg text-gray-600
                      hover:bg-green-50 hover:text-green-700
                      mb-2">

                <i class="fa-solid fa-clock-rotate-left"></i>

                <span>Histori</span>

            </a>


            <!-- SISWA AKTIF -->
            <a href="daftar_siswa.php"
               class="flex items-center gap-3 px-4 py-3
                      rounded-lg bg-green-100 text-green-700
                      font-medium mb-2">

                <i class="fa-solid fa-user-graduate"></i>

                <span>Siswa</span>

            </a>


            <!-- KATEGORI -->
            <a href="kategori.php"
               class="flex items-center gap-3 px-4 py-3
                      rounded-lg text-gray-600
                      hover:bg-green-50 hover:text-green-700
                      mb-2">

                <i class="fa-solid fa-layer-group"></i>

                <span>Kategori</span>

            </a>


            <!-- LOGOUT -->
            <a href="../../Controllers/c_logout.php"
               class="flex items-center gap-3 px-4 py-3
                      rounded-lg text-gray-600
                      hover:bg-red-50 hover:text-red-600
                      mt-8">

                <i class="fa-solid fa-right-from-bracket"></i>

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

                <h2 class="text-xl font-bold text-gray-800">
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
                        Admin
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

                            $no = 1;

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
                                            <a href="../../Controllers/c_siswa.php?aksi=edit&id_siswa=<?= $data->id_siswa; ?>"
                                               class="text-blue-600 hover:text-blue-800"
                                               title="Edit">

                                                <i class="fa-solid fa-pen-to-square"></i>

                                            </a>


                                            <!-- HAPUS -->
                                            <a href="../../Controllers/c_siswa.php?aksi=hapus&id_siswa=<?= $data->id_siswa; ?>"
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

            </div>


        </div>


    </main>


</body>

</html>