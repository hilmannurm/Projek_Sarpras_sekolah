<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Pengaduan - Pengaduan Sarpras</title>

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
    <aside class="w-64 bg-white border-r border-gray-200
                  fixed left-0 top-0 bottom-0">

        <!-- LOGO -->
        <div class="h-20 flex items-center gap-3 px-6
                    border-b border-gray-100">

            <div class="w-10 h-10 rounded-xl bg-primary
                        flex items-center justify-center">

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
            <a href="dashboard_siswa.php"
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


            <!-- PENGADUAN SAYA ACTIVE -->
            <a href="pengaduan.php"
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
                          d="M8 10h8M8 14h5M5 4h14a2
                             2 0 012 2v12a2 2 0
                             01-2 2H5a2 2 0
                             01-2-2V6a2 2
                             0 012-2z"/>

                </svg>

                <span>Pengaduan Saya</span>

            </a>


            <!-- AJUKAN PENGADUAN -->
            <a href="tambah_pengaduan.php"
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
                          d="M12 5v14M5 12h14"/>

                </svg>

                <span>Ajukan Pengaduan</span>

            </a>


            <!-- UMPAN BALIK -->
            <a href="umpan_balik_siswa.php"
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
                          d="M8 10h8M8 14h5M5 4h14a2
                             2 0 012 2v10a2 2 0
                             01-2 2h-6l-4 3v-3H5a2
                             2 0 01-2-2V6a2 2
                             0 012-2z"/>

                </svg>

                <span>Umpan Balik</span>

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
                    Detail Pengaduan
                </h2>

                <p class="text-sm text-gray-400">
                    Informasi dan perkembangan pengaduan.
                </p>

            </div>


            <!-- PROFILE -->
            <div class="flex items-center gap-3">

                <div class="text-right">

                    <p class="text-sm font-medium text-gray-700">
                        Ahmad Fauzan
                    </p>

                    <p class="text-xs text-gray-400">
                        XI RPL 1
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
                          d="M20 21a8 8 0 00-16 0
                             M12 13a4 4 0 100-8
                             4 4 0 000 8z"/>

                    </svg>

                </div>

            </div>

        </header>


        <!-- CONTENT -->
        <section class="p-8">

            <!-- BACK -->
            <div class="mb-5">

                <a href="#"
                   class="inline-flex items-center gap-2
                          text-sm text-gray-500
                          hover:text-primary">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-4 h-4"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="2">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M15 19l-7-7 7-7"/>

                    </svg>

                    Kembali ke Pengaduan Saya

                </a>

            </div>


            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">


                <!-- INFORMASI PENGADUAN -->
                <div class="lg:col-span-2 space-y-6">


                    <!-- DETAIL -->
                    <div class="bg-white border border-gray-200
                                rounded-xl overflow-hidden">

                        <div class="px-6 py-5 border-b border-gray-200
                                    flex items-start justify-between">

                            <div>

                                <p class="text-xs text-gray-400 mb-1">
                                    Pengaduan #ASP-001
                                </p>

                                <h3 class="text-xl font-semibold
                                           text-gray-800">
                                    Lampu Kelas Mati
                                </h3>

                            </div>

                            <span class="px-3 py-1.5 rounded-full
                                         text-xs font-medium
                                         bg-blue-50 text-blue-600">

                                Diproses

                            </span>

                        </div>


                        <div class="p-6">

                            <!-- META -->
                            <div class="grid grid-cols-1 md:grid-cols-2
                                        gap-5 mb-6">

                                <div>

                                    <p class="text-xs text-gray-400 mb-1">
                                        Kategori
                                    </p>

                                    <p class="text-sm font-medium
                                              text-gray-700">
                                        Kelistrikan
                                    </p>

                                </div>


                                <div>

                                    <p class="text-xs text-gray-400 mb-1">
                                        Lokasi
                                    </p>

                                    <p class="text-sm font-medium
                                              text-gray-700">
                                        Ruang XI RPL 1
                                    </p>

                                </div>


                                <div>

                                    <p class="text-xs text-gray-400 mb-1">
                                        Tanggal Pengaduan
                                    </p>

                                    <p class="text-sm font-medium
                                              text-gray-700">
                                        28 Agustus 2026
                                    </p>

                                </div>

                            </div>


                            <!-- ISI -->
                            <div class="mb-6">

                                <p class="text-sm font-semibold
                                          text-gray-800 mb-2">
                                    Isi Pengaduan
                                </p>

                                <div class="bg-gray-50 rounded-lg p-4">

                                    <p class="text-sm text-gray-600
                                              leading-6">

                                        Lampu di dalam kelas XI RPL 1
                                        mati sehingga kondisi ruangan
                                        menjadi kurang terang ketika
                                        kegiatan belajar berlangsung.

                                    </p>

                                </div>

                            </div>


                            <!-- FOTO -->
                            <div>

                                <p class="text-sm font-semibold
                                          text-gray-800 mb-3">
                                    Foto Bukti
                                </p>

                                <div class="w-full max-w-md h-56
                                            bg-gray-100 rounded-lg
                                            flex items-center
                                            justify-center">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="w-10 h-10 text-gray-400"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor"
                                         stroke-width="1.5">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M4 16l4.586-4.586a2
                                                 2 0 012.828 0L16
                                                 16m-2-2l1.586-1.586a2
                                                 2 0 012.828 0L20
                                                 14M4 19h16a1 1 0
                                                 001-1V6a1 1 0
                                                 00-1-1H4a1 1 0
                                                 00-1 1v12a1 1 0
                                                 001 1z"/>

                                    </svg>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- PROGRES -->
                    <div class="bg-white border border-gray-200
                                rounded-xl p-6">

                        <h3 class="font-semibold text-gray-800">
                            Perkembangan Pengaduan
                        </h3>

                        <p class="text-sm text-gray-400 mt-1 mb-6">
                            Status penanganan pengaduan oleh admin.
                        </p>


                        <div class="space-y-6">

                            <!-- DIPROSES -->
                            <div class="flex gap-4">

                                <div class="flex flex-col items-center">

                                    <div class="w-9 h-9 rounded-full
                                                bg-primary text-white
                                                flex items-center
                                                justify-center">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-5 h-5"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor"
                                             stroke-width="2">

                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M5 13l4 4L19 7"/>

                                        </svg>

                                    </div>

                                    <div class="w-px h-12 bg-gray-200">
                                    </div>

                                </div>


                                <div>

                                    <p class="font-medium text-gray-800">
                                        Diproses
                                    </p>

                                    <p class="text-sm text-gray-500 mt-1">
                                        Pengaduan telah diterima dan
                                        sedang diproses oleh admin.
                                    </p>

                                    <p class="text-xs text-gray-400 mt-2">
                                        28 Agustus 2026
                                    </p>

                                </div>

                            </div>


                            <!-- DIPERBAIKI -->
                            <div class="flex gap-4">

                                <div class="flex flex-col items-center">

                                    <div class="w-9 h-9 rounded-full
                                                bg-gray-100 text-gray-400
                                                flex items-center
                                                justify-center">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-5 h-5"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor"
                                             stroke-width="2">

                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M12 8v4l3 2"/>

                                            <circle cx="12" cy="12"
                                                    r="9"/>

                                        </svg>

                                    </div>

                                    <div class="w-px h-12 bg-gray-200">
                                    </div>

                                </div>


                                <div>

                                    <p class="font-medium text-gray-400">
                                        Diperbaiki
                                    </p>

                                    <p class="text-sm text-gray-400 mt-1">
                                        Menunggu proses perbaikan.
                                    </p>

                                </div>

                            </div>


                            <!-- SELESAI -->
                            <div class="flex gap-4">

                                <div>

                                    <div class="w-9 h-9 rounded-full
                                                bg-gray-100 text-gray-400
                                                flex items-center
                                                justify-center">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-5 h-5"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor"
                                             stroke-width="2">

                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M5 13l4 4L19 7"/>

                                        </svg>

                                    </div>

                                </div>


                                <div>

                                    <p class="font-medium text-gray-400">
                                        Selesai
                                    </p>

                                    <p class="text-sm text-gray-400 mt-1">
                                        Pengaduan belum selesai.
                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- SIDEBAR DETAIL -->
                <div class="space-y-6">


                    <!-- STATUS -->
                    <div class="bg-white border border-gray-200
                                rounded-xl p-6">

                        <h3 class="font-semibold text-gray-800 mb-4">
                            Status Pengaduan
                        </h3>

                        <div class="bg-blue-50 rounded-lg p-4">

                            <p class="text-xs text-blue-500 mb-1">
                                Status saat ini
                            </p>

                            <p class="text-lg font-semibold text-blue-600">
                                Diproses
                            </p>

                        </div>

                    </div>


                    <!-- INFORMASI SISWA -->
                    <div class="bg-white border border-gray-200
                                rounded-xl p-6">

                        <h3 class="font-semibold text-gray-800 mb-4">
                            Pengadu
                        </h3>

                        <div class="space-y-4">

                            <div>

                                <p class="text-xs text-gray-400">
                                    Nama
                                </p>

                                <p class="text-sm font-medium text-gray-700">
                                    Ahmad Fauzan
                                </p>

                            </div>


                            <div>

                                <p class="text-xs text-gray-400">
                                    Kelas
                                </p>

                                <p class="text-sm font-medium text-gray-700">
                                    XI RPL 1
                                </p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </main>

</div>

</body>
</html>