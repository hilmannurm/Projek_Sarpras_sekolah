<?php
include_once '../../Controllers/c_kategori.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Kategori - Admin</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#2F7D5A',
                        'primary-dark': '#256348',
                        'soft-green': '#EAF5EF'
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50 text-gray-700">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-white border-r border-gray-200 fixed left-0 top-0 bottom-0">

        <!-- LOGO -->
        <div class="h-20 flex items-center gap-3 px-6 border-b border-gray-100">

            <div class="w-10 h-10 rounded-xl bg-primary flex items-center justify-center">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-6 h-6 text-white"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="1.8">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M3 21h18M5 21V5l7-3 7 3v16
                             M9 21v-5h6v5M8 9h1m6 0h1
                             m-8 4h1m6 0h1"/>

                </svg>

            </div>

            <div>

                <h1 class="font-semibold text-gray-800 text-sm">
                    Pengaduan Sarpras
                </h1>

                <p class="text-xs text-gray-400">
                    Sekolah
                </p>

            </div>

        </div>


        <!-- MENU -->
        <nav class="px-4 py-6 space-y-1">

            <!-- DASHBOARD -->
            <a href="dashboard_admin.php"
               class="flex items-center gap-3 px-4 py-3
                      rounded-lg text-gray-600
                      hover:bg-soft-green hover:text-primary">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="1.8">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M3 13h8V3H3v10zm10 8h8V3h-8v18z
                             M3 21h8v-6H3v6z"/>

                </svg>

                <span>Dashboard</span>

            </a>


            <!-- ASPIRASI -->
            <a href="daftar_aspirasi.php"
               class="flex items-center gap-3 px-4 py-3
                      rounded-lg text-gray-600
                      hover:bg-soft-green hover:text-primary">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="1.8">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M8 10h8M8 14h5M5 4h14a2 2 0
                             012 2v12a2 2 0 01-2 2H5a2 2
                             0 01-2-2V6a2 2 0 012-2z"/>

                </svg>

                <span>Aspirasi</span>

            </a>


            <!-- HISTORI -->
            <a href="histori.php"
               class="flex items-center gap-3 px-4 py-3
                      rounded-lg text-gray-600
                      hover:bg-soft-green hover:text-primary">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="1.8">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M12 8v4l3 2M20 12a8 8
                             0 11-16 0 8 8 0 0116 0z"/>

                </svg>

                <span>Histori</span>

            </a>


            <!-- UMPAN BALIK -->
            <a href="umpan_balik.php"
               class="flex items-center gap-3 px-4 py-3
                      rounded-lg text-gray-600
                      hover:bg-soft-green hover:text-primary">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="1.8">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M8 10h8M8 14h5M5 4h14a2 2
                             0 012 2v10a2 2 0 01-2 2h-6
                             l-4 3v-3H5a2 2 0 01-2-2V6
                             a2 2 0 012-2z"/>

                </svg>

                <span>Umpan Balik</span>

            </a>


            <!-- SISWA -->
            <a href="daftar_siswa.php"
               class="flex items-center gap-3 px-4 py-3
                      rounded-lg text-gray-600
                      hover:bg-soft-green hover:text-primary">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="1.8">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M16 21v-2a4 4 0 00-4-4H6a4 4
                             0 00-4 4v2M9 11a4 4 0 100-8
                             4 4 0 000 8M19 8v6m3-3h-6"/>

                </svg>

                <span>Siswa</span>

            </a>


            <!-- KATEGORI ACTIVE -->
            <a href="kategori.php"
               class="flex items-center gap-3 px-4 py-3
                      rounded-lg bg-soft-green text-primary
                      font-medium">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="1.8">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M20 13l-7 7-9-9V4h7l9 9z"/>

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M7 7h.01"/>

                </svg>

                <span>Kategori</span>

            </a>


            <!-- LOGOUT -->
            <div class="pt-5 mt-5 border-t border-gray-100">

                <a href="#"
                   class="flex items-center gap-3 px-4 py-3
                          rounded-lg text-gray-600
                          hover:bg-red-50 hover:text-red-500">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.8">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M10 17l5-5-5-5M15 12H3
                                 m12-7h4a2 2 0 012 2v10a2
                                 2 0 01-2 2h-4"/>

                    </svg>

                    <span>Logout</span>

                </a>

            </div>

        </nav>

    </aside>


    <!-- MAIN -->
    <main class="ml-64 flex-1">

        <!-- HEADER -->
        <header class="h-20 bg-white border-b border-gray-200
                       flex items-center justify-between px-8">

            <div>

                <h2 class="text-lg font-semibold text-gray-800">
                    Data Kategori
                </h2>

                <p class="text-sm text-gray-400">
                    Kelola kategori pengaduan sarana dan prasarana
                </p>

            </div>


            <!-- ADMIN -->
            <div class="flex items-center gap-3">

                <div class="text-right">

                    <p class="text-sm font-medium text-gray-700">
                        Admin
                    </p>

                    <p class="text-xs text-gray-400">
                        Administrator
                    </p>

                </div>

                <div class="w-10 h-10 rounded-full bg-soft-green
                            flex items-center justify-center">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5 text-primary"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.8">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M20 21a8 8 0 00-16 0M12 13a4
                                 4 0 100-8 4 4 0 000 8z"/>

                    </svg>

                </div>

            </div>

        </header>


        <!-- CONTENT -->
        <section class="p-8">

            <!-- TITLE -->
            <div class="flex items-center justify-between mb-6">

                <div>

                    <h3 class="text-2xl font-semibold text-gray-800">
                        Daftar Kategori
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        Kategori digunakan untuk mengelompokkan pengaduan siswa.
                    </p>

                </div>


                <!-- TAMBAH -->
                <a href="form_tambah_kategori.php"
                   class="flex items-center gap-2 px-5 py-2.5
                          bg-primary hover:bg-primary-dark
                          text-white rounded-lg text-sm
                          font-medium transition">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-4 h-4"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.8">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M12 5v14M5 12h14"/>

                    </svg>

                    Tambah Kategori

                </a>

            </div>


            <!-- TABLE -->
            <div class="bg-white border border-gray-200
                        rounded-xl overflow-hidden">

                <div class="px-6 py-5 border-b border-gray-200">

                    <h4 class="font-semibold text-gray-800">
                        Data Kategori
                    </h4>

                    <p class="text-sm text-gray-400 mt-1">
                        Daftar kategori pengaduan yang tersedia.
                    </p>

                </div>


                <div class="overflow-x-auto">

                    <table class="w-full text-sm">

                        <thead class="bg-gray-50 text-gray-500">

                            <tr>

                                <th class="text-left px-6 py-4 font-medium">
                                    No
                                </th>

                                <th class="text-left px-6 py-4 font-medium">
                                    Nama Kategori
                                </th>

                                <th class="text-center px-6 py-4 font-medium">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-gray-100">

                            <?php if (!empty($kategoris)) : ?>

                                <?php $no = 1; ?>

                                <?php foreach ($kategoris as $kategori) : ?>

                                    <tr class="hover:bg-gray-50">

                                        <td class="px-6 py-4">
                                            <?= $no++; ?>
                                        </td>


                                        <td class="px-6 py-4 font-medium text-gray-800">
                                            <?= htmlspecialchars($kategori->nama_kategori); ?>
                                        </td>


                                        <td class="px-6 py-4">

                                            <div class="flex justify-center gap-2">

                                                <!-- EDIT -->
                                                <a href="../../Controllers/c_kategori.php?aksi=edit&id=<?= $kategori->id_kategori; ?>"
                                                   class="w-9 h-9 flex items-center
                                                          justify-center rounded-lg
                                                          border border-gray-200
                                                          text-gray-500
                                                          hover:bg-gray-50">

                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         class="w-4 h-4"
                                                         fill="none"
                                                         viewBox="0 0 24 24"
                                                         stroke="currentColor"
                                                         stroke-width="1.8">

                                                        <path stroke-linecap="round"
                                                              stroke-linejoin="round"
                                                              d="M15.232 5.232l3.536 3.536
                                                                 M4 20h4l10.768-10.768a2.5
                                                                 2.5 0 00-3.536-3.536L4.464
                                                                 16.464A2 2 0 004 18v2z"/>

                                                    </svg>

                                                </a>


                                                <!-- HAPUS -->
                                                <a href="../../Controllers/c_kategori.php?aksi=hapus&id=<?= $kategori->id_kategori; ?>"
                                                   onclick="return confirm('Apakah kamu yakin ingin menghapus kategori ini?')"
                                                   class="w-9 h-9 flex items-center
                                                          justify-center rounded-lg
                                                          border border-red-200
                                                          text-red-500
                                                          hover:bg-red-50">

                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         class="w-4 h-4"
                                                         fill="none"
                                                         viewBox="0 0 24 24"
                                                         stroke="currentColor"
                                                         stroke-width="1.8">

                                                        <path stroke-linecap="round"
                                                              stroke-linejoin="round"
                                                              d="M6 7h12M10 11v6M14 11v6
                                                                 M9 7V4h6v3m-8 0l1 13h8l1-13"/>

                                                    </svg>

                                                </a>

                                            </div>

                                        </td>

                                    </tr>

                                <?php endforeach; ?>

                            <?php else : ?>

                                <tr>

                                    <td colspan="3"
                                        class="px-6 py-10 text-center text-gray-400">

                                        Belum ada data kategori.

                                    </td>

                                </tr>

                            <?php endif; ?>

                        </tbody>

                    </table>

                </div>


                <!-- PAGINATION -->
                <div class="px-6 py-4 border-t border-gray-200
                            flex items-center justify-between">

                    <p class="text-sm text-gray-500">

                        <?php
                        $jumlah_kategori = !empty($kategoris) ? count($kategoris) : 0;
                        ?>

                        Menampilkan 1–<?= $jumlah_kategori; ?>
                        dari <?= $jumlah_kategori; ?> kategori

                    </p>


                    <div class="flex gap-1">

                        <button
                            class="px-3 py-2 border border-gray-200
                                   rounded-lg text-sm text-gray-400">

                            Sebelumnya

                        </button>

                        <button
                            class="px-3 py-2 rounded-lg text-sm
                                   bg-primary text-white">

                            1

                        </button>

                        <button
                            class="px-3 py-2 border border-gray-200
                                   rounded-lg text-sm text-gray-600">

                            Berikutnya

                        </button>

                    </div>

                </div>

            </div>

        </section>

    </main>

</div>

</body>
</html>