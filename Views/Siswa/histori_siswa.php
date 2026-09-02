<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Histori Aspirasi - Sarpras</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#16a34a',
                        primaryDark: '#15803d'
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-slate-50 text-slate-700">

    <!-- =====================================================
         SIDEBAR
    ====================================================== -->
    <aside class="fixed top-0 left-0 w-64 h-screen
                  bg-white border-r border-slate-200">

        <!-- Logo -->
        <div class="h-20 flex items-center px-6
                    border-b border-slate-200">

            <div class="w-10 h-10 rounded-xl bg-green-100
                        flex items-center justify-center mr-3">

                <svg class="w-6 h-6 text-green-600"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M8 10h8M8 14h5m-1 7a9 9 0 110-18 9 9 0 010 18z"/>

                </svg>

            </div>

            <div>
                <h1 class="font-bold text-slate-800">
                    Sarpras
                </h1>

                <p class="text-xs text-slate-400">
                    Pengaduan Sekolah
                </p>
            </div>

        </div>


        <!-- =================================================
             MENU
        ================================================== -->
        <nav class="p-4">

            <p class="px-3 mb-3 text-xs font-semibold
                      uppercase tracking-wider text-slate-400">
                Menu
            </p>


            <!-- Dashboard -->
            <a href="index.php?controller=siswa&action=dashboard"
               class="flex items-center gap-3 px-4 py-3 mb-1
                      rounded-xl text-slate-600
                      hover:bg-green-50 hover:text-green-700 transition">

                <svg class="w-5 h-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M3 12l9-9 9 9M5 10v10h14V10"/>

                </svg>

                <span>
                    Dashboard
                </span>

            </a>


            <!-- Pengaduan -->
            <a href="index.php?controller=aspirasi&action=tambah"
               class="flex items-center gap-3 px-4 py-3 mb-1
                      rounded-xl text-slate-600
                      hover:bg-green-50 hover:text-green-700 transition">

                <svg class="w-5 h-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h10a2 2 0 012 2v14a2 2 0 01-2 2v14a2 2 0 01-2-2V5a2 2 0 012-2h10a2 2 0 012 2v14a2 2 0 01-2 2z"/>

                </svg>

                <span>
                    Pengaduan
                </span>

            </a>


            <!-- =================================================
                 HISTORI - AKTIF
            ================================================== -->
            <a href="index.php?controller=histori&action=index"
               class="flex items-center gap-3 px-4 py-3 mb-1
                      rounded-xl bg-green-50 text-green-700">

                <svg class="w-5 h-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>

                </svg>

                <span class="font-medium">
                    Histori Aspirasi
                </span>

            </a>


            <!-- Umpan Balik -->
            <a href="index.php?controller=umpan_balik&action=index"
               class="flex items-center gap-3 px-4 py-3
                      rounded-xl text-slate-600
                      hover:bg-green-50 hover:text-green-700 transition">

                <svg class="w-5 h-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M8 10h8M8 14h5m7-2a8 8 0 11-16 0c0 1.4.36 2.72 1 3.87L4 20l4.13-1A8 8 0 0012 20a8 8 0 008-8z"/>

                </svg>

                <span>
                    Umpan Balik
                </span>

            </a>

        </nav>


        <!-- LOGOUT -->
        <div class="absolute bottom-0 left-0 w-full p-4
                    border-t border-slate-200">

            <a href="index.php?controller=login&action=logout"
               class="flex items-center gap-3 px-4 py-3
                      rounded-xl text-slate-600
                      hover:bg-red-50 hover:text-red-600 transition">

                <svg class="w-5 h-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>

                </svg>

                <span>
                    Logout
                </span>

            </a>

        </div>

    </aside>


    <!-- =====================================================
         MAIN
    ====================================================== -->
    <div class="ml-64">

        <!-- TOPBAR -->
        <header class="h-20 bg-white border-b border-slate-200
                       flex items-center justify-between px-8">

            <div>

                <h2 class="text-lg font-semibold text-slate-800">
                    Histori Aspirasi
                </h2>

                <p class="text-sm text-slate-400">
                    Riwayat perkembangan pengaduan kamu.
                </p>

            </div>


            <!-- PROFILE -->
            <div class="flex items-center gap-3">

                <div class="text-right">

                    <p class="text-sm font-semibold text-slate-700">
                        Maull
                    </p>

                    <p class="text-xs text-slate-400">
                        Siswa
                    </p>

                </div>

                <div class="w-10 h-10 rounded-full bg-green-100
                            flex items-center justify-center">

                    <span class="font-semibold text-green-700">
                        M
                    </span>

                </div>

            </div>

        </header>


        <!-- =================================================
             CONTENT
        ================================================== -->
        <main class="p-8">

            <!-- Heading -->
            <div class="mb-6">

                <h1 class="text-2xl font-bold text-slate-800">
                    Riwayat Aspirasi
                </h1>

                <p class="text-sm text-slate-500 mt-1">
                    Lihat perubahan status dari setiap pengaduan
                    yang telah kamu kirim.
                </p>

            </div>


            <!-- =================================================
                 HISTORI CARD
            ================================================== -->
            <div class="bg-white border border-slate-200
                        rounded-2xl overflow-hidden">

                <!-- Header -->
                <div class="px-6 py-5 border-b border-slate-200">

                    <h2 class="font-semibold text-slate-800">
                        Riwayat Perubahan
                    </h2>

                    <p class="text-xs text-slate-400 mt-1">
                        Data histori hanya dapat dilihat dan tidak dapat
                        diubah.
                    </p>

                </div>


                <!-- TABLE -->
                <div class="overflow-x-auto">

                    <table class="w-full text-sm">

                        <thead class="bg-slate-50">

                            <tr class="text-left text-xs
                                       uppercase tracking-wider
                                       text-slate-500">

                                <th class="px-6 py-4">
                                    No
                                </th>

                                <th class="px-6 py-4">
                                    Pengaduan
                                </th>

                                <th class="px-6 py-4">
                                    Status Lama
                                </th>

                                <th class="px-6 py-4">
                                    Status Baru
                                </th>

                                <th class="px-6 py-4">
                                    Tanggal Perubahan
                                </th>

                                <th class="px-6 py-4 text-center">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-slate-100">


                            <!-- =================================================
                                 DATA 1
                            ================================================== -->
                            <tr class="hover:bg-slate-50 transition">

                                <td class="px-6 py-4">
                                    1
                                </td>


                                <td class="px-6 py-4">

                                    <p class="font-medium text-slate-700">
                                        Keran Air Rusak
                                    </p>

                                    <p class="text-xs text-slate-400">
                                        ID Aspirasi: 1
                                    </p>

                                </td>


                                <!-- Status Lama -->
                                <td class="px-6 py-4">

                                    <span class="inline-flex items-center
                                                 px-3 py-1 rounded-full
                                                 text-xs font-medium
                                                 bg-amber-50 text-amber-700">

                                        Menunggu

                                    </span>

                                </td>


                                <!-- Status Baru -->
                                <td class="px-6 py-4">

                                    <span class="inline-flex items-center
                                                 px-3 py-1 rounded-full
                                                 text-xs font-medium
                                                 bg-blue-50 text-blue-700">

                                        Diproses

                                    </span>

                                </td>


                                <td class="px-6 py-4 text-slate-500">
                                    29 Agu 2026, 09:30
                                </td>


                                <!-- Aksi -->
                                <td class="px-6 py-4 text-center">

                                    <a href="index.php?controller=aspirasi&action=detail&id=1"
                                       class="inline-flex items-center
                                              px-3 py-2 rounded-lg
                                              bg-slate-100 text-slate-600
                                              hover:bg-slate-200 transition">

                                        Lihat

                                    </a>

                                </td>

                            </tr>


                            <!-- =================================================
                                 DATA 2
                            ================================================== -->
                            <tr class="hover:bg-slate-50 transition">

                                <td class="px-6 py-4">
                                    2
                                </td>


                                <td class="px-6 py-4">

                                    <p class="font-medium text-slate-700">
                                        Lampu Kelas Mati
                                    </p>

                                    <p class="text-xs text-slate-400">
                                        ID Aspirasi: 2
                                    </p>

                                </td>


                                <td class="px-6 py-4">

                                    <span class="inline-flex items-center
                                                 px-3 py-1 rounded-full
                                                 text-xs font-medium
                                                 bg-blue-50 text-blue-700">

                                        Diproses

                                    </span>

                                </td>


                                <td class="px-6 py-4">

                                    <span class="inline-flex items-center
                                                 px-3 py-1 rounded-full
                                                 text-xs font-medium
                                                 bg-green-50 text-green-700">

                                        Selesai

                                    </span>

                                </td>


                                <td class="px-6 py-4 text-slate-500">
                                    28 Agu 2026, 14:15
                                </td>


                                <td class="px-6 py-4 text-center">

                                    <a href="index.php?controller=aspirasi&action=detail&id=2"
                                       class="inline-flex items-center
                                              px-3 py-2 rounded-lg
                                              bg-slate-100 text-slate-600
                                              hover:bg-slate-200 transition">

                                        Lihat

                                    </a>

                                </td>

                            </tr>


                            <!-- =================================================
                                 DATA 3
                            ================================================== -->
                            <tr class="hover:bg-slate-50 transition">

                                <td class="px-6 py-4">
                                    3
                                </td>


                                <td class="px-6 py-4">

                                    <p class="font-medium text-slate-700">
                                        Meja Kelas Rusak
                                    </p>

                                    <p class="text-xs text-slate-400">
                                        ID Aspirasi: 3
                                    </p>

                                </td>


                                <td class="px-6 py-4">

                                    <span class="inline-flex items-center
                                                 px-3 py-1 rounded-full
                                                 text-xs font-medium
                                                 bg-blue-50 text-blue-700">

                                        Diproses

                                    </span>

                                </td>


                                <td class="px-6 py-4">

                                    <span class="inline-flex items-center
                                                 px-3 py-1 rounded-full
                                                 text-xs font-medium
                                                 bg-green-50 text-green-700">

                                        Selesai

                                    </span>

                                </td>


                                <td class="px-6 py-4 text-slate-500">
                                    27 Agu 2026, 10:00
                                </td>


                                <td class="px-6 py-4 text-center">

                                    <a href="index.php?controller=aspirasi&action=detail&id=3"
                                       class="inline-flex items-center
                                              px-3 py-2 rounded-lg
                                              bg-slate-100 text-slate-600
                                              hover:bg-slate-200 transition">

                                        Lihat

                                    </a>

                                </td>

                            </tr>


                            <!-- =================================================
                                 EMPTY DATA
                            ================================================== -->
                            <!--

                            <tr>

                                <td colspan="6"
                                    class="px-6 py-12 text-center">

                                    <p class="text-slate-400">
                                        Belum ada histori pengaduan.
                                    </p>

                                </td>

                            </tr>

                            -->

                        </tbody>

                    </table>

                </div>

            </div>

        </main>

    </div>

</body>

</html>