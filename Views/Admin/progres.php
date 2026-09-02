<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Progres - Admin</title>

    <!-- Tailwind CSS -->
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
    <aside class="fixed top-0 left-0 w-64 h-screen bg-white border-r border-slate-200">

        <!-- Logo -->
        <div class="h-20 flex items-center px-6 border-b border-slate-200">

            <div class="w-10 h-10 rounded-xl bg-green-100
                        flex items-center justify-center mr-3">

                <!-- Logo -->
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
             NAVIGATION
        ================================================== -->
        <nav class="p-4">

            <p class="px-3 mb-3 text-xs font-semibold
                      uppercase tracking-wider text-slate-400">
                Menu
            </p>


            <!-- Dashboard -->
            <a href="index.php?controller=admin&action=dashboard"
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


            <!-- Data Siswa -->
            <a href="index.php?controller=siswa&action=index"
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
                          d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4-8a4 4 0 110 8 4 4 0 010-8zm6 4a3 3 0 10-6 0 3 3 0 006 0z"/>

                </svg>

                <span>
                    Data Siswa
                </span>

            </a>


            <!-- Daftar Aspirasi -->
            <a href="../Admin/daftar_aspirasi.php"
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
                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h10a2 2 0 012 2v14a2 2 0 01-2 2z"/>

                </svg>

                <span>
                    Daftar Aspirasi
                </span>

            </a>


            <!-- =================================================
                 PROGRES - AKTIF
            ================================================== -->
            <a href="../Admin/progres.php"
               class="flex items-center gap-3 px-4 py-3 mb-1
                      rounded-xl bg-green-50 text-green-700">

                <!-- Progress Icon -->
                <svg class="w-5 h-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M13 10V3L4 14h7v7l9-11h-7z"/>

                </svg>

                <span class="font-medium">
                    Progres
                </span>

            </a>


            <!-- Histori -->
            <a href="../Admin/histori.php"
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
                          d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z"/>

                </svg>

                <span>
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


        <!-- =================================================
             LOGOUT
        ================================================== -->
        <div class="absolute bottom-0 left-0 w-full p-4 border-t border-slate-200">

            <a href="index.php?controller=login&action=logout"
               class="flex items-center gap-3 px-4 py-3 rounded-xl
                      text-slate-600 hover:bg-red-50
                      hover:text-red-600 transition">

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
                    Progres Aspirasi
                </h2>

                <p class="text-sm text-slate-400">
                    Pantau perkembangan pengaduan sarana prasarana.
                </p>

            </div>


            <!-- Admin Profile -->
            <div class="flex items-center gap-3">

                <div class="text-right">

                    <p class="text-sm font-semibold text-slate-700">
                        Admin
                    </p>

                    <p class="text-xs text-slate-400">
                        Administrator
                    </p>

                </div>

                <div class="w-10 h-10 rounded-full bg-green-100
                            flex items-center justify-center">

                    <span class="font-semibold text-green-700">
                        A
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
                    Progres Aspirasi
                </h1>

                <p class="text-sm text-slate-500 mt-1">
                    Pantau dan perbarui perkembangan setiap pengaduan.
                </p>

            </div>


            <!-- =================================================
                 ASPIRATION CARD
            ================================================== -->
            <div class="bg-white border border-slate-200
                        rounded-2xl overflow-hidden">


                <!-- CARD HEADER -->
                <div class="px-6 py-5 border-b border-slate-200
                            flex items-center justify-between">

                    <div>

                        <p class="text-xs text-slate-400 mb-1">
                            ASP-001
                        </p>

                        <h2 class="font-semibold text-slate-800">
                            Keran Air Rusak
                        </h2>

                        <p class="text-xs text-slate-400 mt-1">
                            Ahmad Fauzan • NIS 10231
                        </p>

                    </div>


                    <!-- Status -->
                    <span class="inline-flex items-center
                                 px-3 py-1.5 rounded-full
                                 text-sm font-medium
                                 bg-blue-50 text-blue-600">

                        Diproses

                    </span>

                </div>


                <!-- =================================================
                     PROGRESS TIMELINE
                ================================================== -->
                <div class="p-8">

                    <h3 class="text-base font-semibold
                               text-slate-800 mb-6">

                        Riwayat Progres

                    </h3>


                    <div class="relative">


                        <!-- GARIS TIMELINE -->
                        <div class="absolute left-4 top-3 bottom-3
                                    w-px bg-slate-200">
                        </div>


                        <!-- =========================================
                             PROGRES 1
                        ========================================== -->
                        <div class="relative flex gap-5 pb-8">

                            <!-- Circle -->
                            <div class="relative z-10 w-8 h-8
                                        rounded-full bg-green-100
                                        border-4 border-white
                                        flex items-center justify-center">

                                <svg class="w-4 h-4 text-green-600"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M5 13l4 4L19 7"/>

                                </svg>

                            </div>


                            <div class="flex-1">

                                <div class="flex items-center
                                            justify-between">

                                    <div>

                                        <h4 class="font-medium
                                                   text-slate-700">

                                            Pengaduan Diterima

                                        </h4>

                                        <p class="text-xs text-slate-400">
                                            28 Agustus 2026
                                        </p>

                                    </div>

                                    <span class="text-xs font-medium
                                                 text-green-600">

                                        Selesai

                                    </span>

                                </div>


                                <p class="text-sm text-slate-500 mt-2">
                                    Pengaduan telah diterima oleh sistem
                                    dan masuk ke proses pemeriksaan.
                                </p>

                            </div>

                        </div>


                        <!-- =========================================
                             PROGRES 2
                        ========================================== -->
                        <div class="relative flex gap-5 pb-8">

                            <div class="relative z-10 w-8 h-8
                                        rounded-full bg-green-100
                                        border-4 border-white
                                        flex items-center justify-center">

                                <svg class="w-4 h-4 text-green-600"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M5 13l4 4L19 7"/>

                                </svg>

                            </div>


                            <div class="flex-1">

                                <div class="flex items-center
                                            justify-between">

                                    <div>

                                        <h4 class="font-medium
                                                   text-slate-700">

                                            Pemeriksaan

                                        </h4>

                                        <p class="text-xs text-slate-400">
                                            28 Agustus 2026
                                        </p>

                                    </div>

                                    <span class="text-xs font-medium
                                                 text-green-600">

                                        Selesai

                                    </span>

                                </div>


                                <p class="text-sm text-slate-500 mt-2">
                                    Kondisi keran telah diperiksa oleh
                                    pihak sekolah.
                                </p>

                            </div>

                        </div>


                        <!-- =========================================
                             PROGRES 3 - AKTIF
                        ========================================== -->
                        <div class="relative flex gap-5 pb-8">

                            <div class="relative z-10 w-8 h-8
                                        rounded-full bg-blue-100
                                        border-4 border-white
                                        flex items-center justify-center">

                                <span class="w-2.5 h-2.5 rounded-full
                                             bg-blue-600">
                                </span>

                            </div>


                            <div class="flex-1">

                                <div class="flex items-center
                                            justify-between">

                                    <div>

                                        <h4 class="font-medium
                                                   text-blue-700">

                                            Dalam Perbaikan

                                        </h4>

                                        <p class="text-xs text-slate-400">
                                            28 Agustus 2026
                                        </p>

                                    </div>

                                    <span class="text-xs font-medium
                                                 text-blue-600">

                                        Berlangsung

                                    </span>

                                </div>


                                <p class="text-sm text-slate-500 mt-2">
                                    Perbaikan sarana sedang dilakukan.
                                </p>

                            </div>

                        </div>


                        <!-- =========================================
                             PROGRES BERIKUTNYA
                        ========================================== -->
                        <div class="relative flex gap-5">

                            <div class="relative z-10 w-8 h-8
                                        rounded-full bg-slate-100
                                        border-4 border-white
                                        flex items-center justify-center">

                                <span class="w-2.5 h-2.5 rounded-full
                                             bg-slate-300">
                                </span>

                            </div>


                            <div class="flex-1">

                                <h4 class="font-medium text-slate-400">
                                    Selesai
                                </h4>

                                <p class="text-xs text-slate-400 mt-1">
                                    Menunggu proses sebelumnya selesai.
                                </p>

                            </div>

                        </div>

                    </div>


                    <!-- =================================================
                         ACTION
                    ================================================== -->
                    <div class="mt-8 pt-6 border-t border-slate-200
                                flex justify-end">

                        <a href="../Admin/tambah_progres.php"
                           class="inline-flex items-center gap-2
                                  px-4 py-2.5 rounded-xl
                                  bg-green-600 text-white
                                  font-medium
                                  hover:bg-green-700 transition">

                            <!-- Plus -->
                            <svg class="w-5 h-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M12 4v16m8-8H4"/>

                            </svg>

                            Tambah Progres

                        </a>

                    </div>

                </div>

            </div>

        </main>

    </div>

</body>

</html>