<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Pengaduan Sarpras</title>

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

                    <!-- ICON GEDUNG -->
                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-6 h-6 text-white"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.8">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M3 21h18M5 21V5l7-3 7 3v16M9 21v-5h6v5M8 9h1m6 0h1m-8 4h1m6 0h1"/>
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
                   class="flex items-center gap-3 px-4 py-3 rounded-lg bg-soft-green text-primary font-medium">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.8">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M3 13h8V3H3v10zm10 8h8V3h-8v18zM3 21h8v-6H3v6z"/>
                    </svg>

                    <span>Dashboard</span>
                </a>


                <!-- ASPIRASI -->
                <a href="daftar_aspirasi.php"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-soft-green hover:text-primary transition">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.8">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M8 10h8M8 14h5M5 4h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V6a2 2 0 012-2z"/>
                    </svg>

                    <span>Aspirasi</span>
                </a>


                <!-- HISTORI -->
                <a href="histori.php"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-soft-green hover:text-primary transition">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.8">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M12 8v4l3 2M20 12a8 8 0 11-16 0 8 8 0 0116 0z"/>
                    </svg>

                    <span>Histori</span>
                </a>


                <!-- UMPAN BALIK -->
                <a href="umpan_balik.php"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-soft-green hover:text-primary transition">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.8">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M8 10h8M8 14h5M5 4h14a2 2 0 012 2v10a2 2 0 01-2 2h-6l-4 3v-3H5a2 2 0 01-2-2V6a2 2 0 012-2z"/>
                    </svg>

                    <span>Umpan Balik</span>
                </a>


                <!-- SISWA -->
                <a href="daftar_siswa.php"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-soft-green hover:text-primary transition">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.8">
                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2M9 11a4 4 0 100-8 4 4 0 000 8zm8-3v6m3-3h-6"/>
                    </svg>

                    <span>Siswa</span>
                </a>


                <!-- KATEGORI -->
                <a href="kategori.php"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-soft-green hover:text-primary transition">

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


                <div class="pt-5 mt-5 border-t border-gray-100">

                    <!-- LOGOUT -->
                    <a href="#"
                       class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-600 hover:bg-red-50 hover:text-red-500 transition">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-5 h-5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="1.8">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M10 17l5-5-5-5M15 12H3m12-7h4a2 2 0 012 2v10a2 2 0 01-2 2h-4"/>
                        </svg>

                        <span>Logout</span>
                    </a>

                </div>

            </nav>

        </aside>


        <!-- MAIN CONTENT -->
        <main class="ml-64 flex-1">

            <!-- HEADER -->
            <header class="h-20 bg-white border-b border-gray-200 flex items-center justify-between px-8">

                <div>
                    <h2 class="text-lg font-semibold text-gray-800">
                        Dashboard
                    </h2>

                    <p class="text-sm text-gray-400">
                        Pengelolaan pengaduan sarana dan prasarana sekolah
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

                    <div class="w-10 h-10 rounded-full bg-soft-green flex items-center justify-center">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="w-5 h-5 text-primary"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="1.8">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M20 21a8 8 0 00-16 0M12 13a4 4 0 100-8 4 4 0 000 8z"/>
                        </svg>

                    </div>

                </div>

            </header>


            <!-- CONTENT -->
            <section class="p-8">

                <!-- WELCOME -->
                <div class="mb-7">

                    <h3 class="text-2xl font-semibold text-gray-800">
                        Selamat Datang, Admin
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        Pantau dan kelola pengaduan sarpras sekolah dengan mudah.
                    </p>

                </div>


                <!-- STATISTICS -->
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5 mb-8">

                    <!-- TOTAL -->
                    <div class="bg-white rounded-xl border border-gray-200 p-5">

                        <p class="text-sm text-gray-500">
                            Total Aspirasi
                        </p>

                        <div class="flex items-end justify-between mt-3">

                            <h4 class="text-3xl font-semibold text-gray-800">
                                24
                            </h4>

                            <div class="w-10 h-10 rounded-lg bg-soft-green flex items-center justify-center">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-5 h-5 text-primary"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor"
                                     stroke-width="1.8">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M8 10h8M8 14h5M5 4h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V6a2 2 0 012-2z"/>
                                </svg>

                            </div>

                        </div>

                    </div>


                    <!-- DIPROSES -->
                    <div class="bg-white rounded-xl border border-gray-200 p-5">

                        <p class="text-sm text-gray-500">
                            Diproses
                        </p>

                        <div class="flex items-end justify-between mt-3">

                            <h4 class="text-3xl font-semibold text-gray-800">
                                8
                            </h4>

                            <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-5 h-5 text-blue-600"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor"
                                     stroke-width="1.8">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M12 6v6l4 2"/>
                                    <circle cx="12" cy="12" r="9"/>
                                </svg>

                            </div>

                        </div>

                    </div>


                    <!-- DIPERBAIKI -->
                    <div class="bg-white rounded-xl border border-gray-200 p-5">

                        <p class="text-sm text-gray-500">
                            Diperbaiki
                        </p>

                        <div class="flex items-end justify-between mt-3">

                            <h4 class="text-3xl font-semibold text-gray-800">
                                6
                            </h4>

                            <div class="w-10 h-10 rounded-lg bg-yellow-50 flex items-center justify-center">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-5 h-5 text-yellow-600"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor"
                                     stroke-width="1.8">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M11 4h2M12 4v4m5.66 1.34l-2.83 2.83M20 13h-4m-4 7a7 7 0 117-7 7 7 0 01-7 7z"/>
                                </svg>

                            </div>

                        </div>

                    </div>


                    <!-- SELESAI -->
                    <div class="bg-white rounded-xl border border-gray-200 p-5">

                        <p class="text-sm text-gray-500">
                            Selesai
                        </p>

                        <div class="flex items-end justify-between mt-3">

                            <h4 class="text-3xl font-semibold text-gray-800">
                                10
                            </h4>

                            <div class="w-10 h-10 rounded-lg bg-green-50 flex items-center justify-center">

                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-5 h-5 text-green-600"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor"
                                     stroke-width="1.8">
                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          d="M5 12l4 4L19 6"/>
                                </svg>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- RECENT ASPIRATION -->
                <div class="bg-white border border-gray-200 rounded-xl">

                    <div class="px-6 py-5 border-b border-gray-200">

                        <h3 class="font-semibold text-gray-800">
                            Aspirasi Terbaru
                        </h3>

                        <p class="text-sm text-gray-400 mt-1">
                            Daftar aspirasi yang baru masuk
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
                                        Siswa
                                    </th>

                                    <th class="text-left px-6 py-4 font-medium">
                                        Judul Aspirasi
                                    </th>

                                    <th class="text-left px-6 py-4 font-medium">
                                        Kategori
                                    </th>

                                    <th class="text-left px-6 py-4 font-medium">
                                        Status
                                    </th>

                                </tr>

                            </thead>


                            <tbody class="divide-y divide-gray-100">

                                <tr class="hover:bg-gray-50">

                                    <td class="px-6 py-4">
                                        1
                                    </td>

                                    <td class="px-6 py-4 font-medium text-gray-700">
                                        Ahmad
                                    </td>

                                    <td class="px-6 py-4">
                                        Lampu Kelas Mati
                                    </td>

                                    <td class="px-6 py-4">
                                        Kelistrikan
                                    </td>

                                    <td class="px-6 py-4">

                                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-600">
                                            Diproses
                                        </span>

                                    </td>

                                </tr>


                                <tr class="hover:bg-gray-50">

                                    <td class="px-6 py-4">
                                        2
                                    </td>

                                    <td class="px-6 py-4 font-medium text-gray-700">
                                        Siti
                                    </td>

                                    <td class="px-6 py-4">
                                        Kursi Rusak
                                    </td>

                                    <td class="px-6 py-4">
                                        Fasilitas
                                    </td>

                                    <td class="px-6 py-4">

                                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-yellow-50 text-yellow-600">
                                            Diperbaiki
                                        </span>

                                    </td>

                                </tr>


                                <tr class="hover:bg-gray-50">

                                    <td class="px-6 py-4">
                                        3
                                    </td>

                                    <td class="px-6 py-4 font-medium text-gray-700">
                                        Budi
                                    </td>

                                    <td class="px-6 py-4">
                                        Keran Air Bocor
                                    </td>

                                    <td class="px-6 py-4">
                                        Air
                                    </td>

                                    <td class="px-6 py-4">

                                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-green-50 text-green-600">
                                            Selesai
                                        </span>

                                    </td>

                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

            </section>

        </main>

    </div>

</body>
</html>