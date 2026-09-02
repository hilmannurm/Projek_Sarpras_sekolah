<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Umpan Balik - Pengaduan Sarpras</title>

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


            <!-- PENGADUAN -->
            <a href="pengaduan.php"
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
                             2 0 012 2v12a2 2 0
                             01-2 2H5a2 2 0
                             01-2-2V6a2 2
                             0 012-2z"/>

                </svg>

                <span>Pengaduan Saya</span>

            </a>


            <!-- AJUKAN -->
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


            <!-- UMPAN BALIK ACTIVE -->
            <a href="umpan_balik_siswa.php"
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
                    Umpan Balik
                </h2>

                <p class="text-sm text-gray-400">
                    Lihat tanggapan admin terhadap pengaduanmu.
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

            <div class="max-w-5xl mx-auto">

                <!-- TITLE -->
                <div class="mb-6">

                    <h3 class="text-2xl font-semibold text-gray-800">
                        Umpan Balik Admin
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        Berikut tanggapan yang diberikan admin
                        terhadap pengaduanmu.
                    </p>

                </div>


                <!-- FEEDBACK CARD -->
                <div class="bg-white border border-gray-200
                            rounded-xl overflow-hidden">

                    <!-- HEADER CARD -->
                    <div class="px-6 py-5 border-b border-gray-200
                                flex items-center justify-between">

                        <div>

                            <p class="text-xs text-gray-400 mb-1">
                                Pengaduan #ASP-001
                            </p>

                            <h4 class="font-semibold text-gray-800">
                                Lampu Kelas Mati
                            </h4>

                        </div>


                        <span class="px-3 py-1.5 rounded-full
                                     text-xs font-medium
                                     bg-green-50 text-green-600">

                            Selesai

                        </span>

                    </div>


                    <!-- FEEDBACK CONTENT -->
                    <div class="p-6">

                        <div class="flex gap-4">

                            <!-- ICON -->
                            <div class="w-11 h-11 rounded-full
                                        bg-soft-green
                                        flex items-center
                                        justify-center flex-shrink-0">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-5 h-5 text-primary"
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

                            </div>


                            <!-- TEXT -->
                            <div class="flex-1">

                                <div class="flex items-center
                                            justify-between mb-2">

                                    <p class="font-medium text-gray-800">
                                        Admin
                                    </p>

                                    <p class="text-xs text-gray-400">
                                        30 Agustus 2026
                                    </p>

                                </div>


                                <div class="bg-gray-50 rounded-lg p-4">

                                    <p class="text-sm text-gray-600
                                              leading-6">

                                        Pengaduan telah ditindaklanjuti.
                                        Lampu pada ruang XI RPL 1
                                        sudah diperbaiki dan dapat
                                        digunakan kembali.

                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- SECOND FEEDBACK -->
                <div class="bg-white border border-gray-200
                            rounded-xl overflow-hidden mt-5">

                    <div class="px-6 py-5 border-b border-gray-200
                                flex items-center justify-between">

                        <div>

                            <p class="text-xs text-gray-400 mb-1">
                                Pengaduan #ASP-002
                            </p>

                            <h4 class="font-semibold text-gray-800">
                                Kursi Kelas Rusak
                            </h4>

                        </div>


                        <span class="px-3 py-1.5 rounded-full
                                     text-xs font-medium
                                     bg-yellow-50 text-yellow-600">

                            Diperbaiki

                        </span>

                    </div>


                    <div class="p-6">

                        <div class="flex gap-4">

                            <div class="w-11 h-11 rounded-full
                                        bg-soft-green
                                        flex items-center
                                        justify-center flex-shrink-0">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-5 h-5 text-primary"
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

                            </div>


                            <div class="flex-1">

                                <div class="flex items-center
                                            justify-between mb-2">

                                    <p class="font-medium text-gray-800">
                                        Admin
                                    </p>

                                    <p class="text-xs text-gray-400">
                                        29 Agustus 2026
                                    </p>

                                </div>


                                <div class="bg-gray-50 rounded-lg p-4">

                                    <p class="text-sm text-gray-600
                                              leading-6">

                                        Kursi sedang dalam proses
                                        perbaikan. Setelah selesai,
                                        kursi akan dikembalikan ke
                                        ruang kelas.

                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- EMPTY STATE CONCEPT -->
                <!--
                Jika belum ada umpan balik:

                <div class="bg-white border border-gray-200
                            rounded-xl p-12 text-center">

                    <svg ...></svg>

                    <h4 class="font-medium text-gray-800">
                        Belum Ada Umpan Balik
                    </h4>

                    <p class="text-sm text-gray-400 mt-1">
                        Belum ada tanggapan dari admin.
                    </p>

                </div>
                -->


                <!-- PAGINATION -->
                <div class="flex items-center justify-between
                            mt-6">

                    <p class="text-sm text-gray-500">
                        Menampilkan 1–2 dari 6 umpan balik
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

                            2

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