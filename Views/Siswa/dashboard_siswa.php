<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Siswa - Pengaduan Sarpras</title>

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

            <!-- DASHBOARD ACTIVE -->
            <a href="dashboard_siswa.php"
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
                          d="M3 13h8V3H3v10zm10 8h8V3h-8v18z
                             M3 21h8v-6H3v6z"/>

                </svg>

                <span>Dashboard</span>

            </a>


            <!-- PENGADUAN SAYA -->
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
                          d="M8 10h8M8 14h5M5 4h14a2 2 0
                             012 2v12a2 2 0 01-2 2H5a2 2
                             0 01-2-2V6a2 2 0 012-2z"/>

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
                          d="M8 10h8M8 14h5M5 4h14a2 2 0
                             012 2v10a2 2 0 01-2 2h-6
                             l-4 3v-3H5a2 2 0 01-2-2V6
                             a2 2 0 012-2z"/>

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
                    Dashboard
                </h2>

                <p class="text-sm text-gray-400">
                    Pantau pengaduan sarana dan prasarana sekolah
                </p>

            </div>


            <!-- SISWA -->
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

            <!-- WELCOME -->
            <div class="bg-white border border-gray-200
                        rounded-xl p-6 mb-6">

                <h3 class="text-xl font-semibold text-gray-800">
                    Selamat datang, Ahmad Fauzan
                </h3>

                <p class="text-sm text-gray-500 mt-2">
                    Sampaikan pengaduan mengenai sarana dan prasarana
                    sekolah melalui sistem ini.
                </p>

                <button
                    class="mt-5 flex items-center gap-2
                           px-5 py-2.5 bg-primary
                           hover:bg-primary-dark text-white
                           rounded-lg text-sm font-medium">

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

                    Ajukan Pengaduan

                </button>

            </div>


            <!-- STATISTIK -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-6">

                <!-- TOTAL -->
                <div class="bg-white border border-gray-200
                            rounded-xl p-5">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-gray-500">
                                Total Pengaduan
                            </p>

                            <p class="text-2xl font-semibold
                                      text-gray-800 mt-2">
                                6
                            </p>

                        </div>

                        <div class="w-11 h-11 rounded-lg
                                    bg-soft-green flex items-center
                                    justify-center">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-5 h-5 text-primary"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="1.8">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M8 10h8M8 14h5M5 4h14a2
                                         2 0 012 2v12a2 2 0
                                         01-2 2H5a2 2 0
                                         01-2-2V6a2 2 0 012-2z"/>

                            </svg>

                        </div>

                    </div>

                </div>


                <!-- DIPROSES -->
                <div class="bg-white border border-gray-200
                            rounded-xl p-5">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-gray-500">
                                Sedang Diproses
                            </p>

                            <p class="text-2xl font-semibold
                                      text-gray-800 mt-2">
                                2
                            </p>

                        </div>

                        <div class="w-11 h-11 rounded-lg
                                    bg-blue-50 flex items-center
                                    justify-center">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-5 h-5 text-blue-500"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="1.8">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M12 8v4l3 2M20 12a8
                                         8 0 11-16 0 8 8 0
                                         0116 0z"/>

                            </svg>

                        </div>

                    </div>

                </div>


                <!-- SELESAI -->
                <div class="bg-white border border-gray-200
                            rounded-xl p-5">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-sm text-gray-500">
                                Selesai
                            </p>

                            <p class="text-2xl font-semibold
                                      text-gray-800 mt-2">
                                4
                            </p>

                        </div>

                        <div class="w-11 h-11 rounded-lg
                                    bg-green-50 flex items-center
                                    justify-center">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="w-5 h-5 text-green-600"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="1.8">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M5 13l4 4L19 7"/>

                            </svg>

                        </div>

                    </div>

                </div>

            </div>


            <!-- PENGADUAN TERBARU -->
            <div class="bg-white border border-gray-200
                        rounded-xl overflow-hidden">

                <div class="px-6 py-5 border-b border-gray-200
                            flex items-center justify-between">

                    <div>

                        <h4 class="font-semibold text-gray-800">
                            Pengaduan Terbaru
                        </h4>

                        <p class="text-sm text-gray-400 mt-1">
                            Pengaduan yang terakhir kamu buat.
                        </p>

                    </div>

                    <a href="#"
                       class="text-sm text-primary
                              hover:text-primary-dark">

                        Lihat Semua

                    </a>

                </div>


                <div class="overflow-x-auto">

                    <table class="w-full text-sm">

                        <thead class="bg-gray-50 text-gray-500">

                            <tr>

                                <th class="text-left px-6 py-4 font-medium">
                                    No
                                </th>

                                <th class="text-left px-6 py-4 font-medium">
                                    Pengaduan
                                </th>

                                <th class="text-left px-6 py-4 font-medium">
                                    Kategori
                                </th>

                                <th class="text-left px-6 py-4 font-medium">
                                    Status
                                </th>

                                <th class="text-left px-6 py-4 font-medium">
                                    Tanggal
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-gray-100">

                            <tr class="hover:bg-gray-50">

                                <td class="px-6 py-4">
                                    1
                                </td>

                                <td class="px-6 py-4 font-medium text-gray-800">
                                    Lampu Kelas Mati
                                </td>

                                <td class="px-6 py-4">
                                    Kelistrikan
                                </td>

                                <td class="px-6 py-4">

                                    <span class="px-3 py-1 rounded-full
                                                 text-xs bg-blue-50
                                                 text-blue-600">

                                        Diproses

                                    </span>

                                </td>

                                <td class="px-6 py-4 text-gray-500">
                                    28-08-2026
                                </td>

                            </tr>


                            <tr class="hover:bg-gray-50">

                                <td class="px-6 py-4">
                                    2
                                </td>

                                <td class="px-6 py-4 font-medium text-gray-800">
                                    Kursi Kelas Rusak
                                </td>

                                <td class="px-6 py-4">
                                    Fasilitas
                                </td>

                                <td class="px-6 py-4">

                                    <span class="px-3 py-1 rounded-full
                                                 text-xs bg-yellow-50
                                                 text-yellow-600">

                                        Diperbaiki

                                    </span>

                                </td>

                                <td class="px-6 py-4 text-gray-500">
                                    27-08-2026
                                </td>

                            </tr>


                            <tr class="hover:bg-gray-50">

                                <td class="px-6 py-4">
                                    3
                                </td>

                                <td class="px-6 py-4 font-medium text-gray-800">
                                    Keran Air Bocor
                                </td>

                                <td class="px-6 py-4">
                                    Air
                                </td>

                                <td class="px-6 py-4">

                                    <span class="px-3 py-1 rounded-full
                                                 text-xs bg-green-50
                                                 text-green-600">

                                        Selesai

                                    </span>

                                </td>

                                <td class="px-6 py-4 text-gray-500">
                                    25-08-2026
                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>


                <!-- PAGINATION -->
                <div class="px-6 py-4 border-t border-gray-200
                            flex items-center justify-between">

                    <p class="text-sm text-gray-500">
                        Menampilkan 1–3 dari 6 pengaduan
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