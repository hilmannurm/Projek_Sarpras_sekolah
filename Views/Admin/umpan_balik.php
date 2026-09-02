<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Umpan Balik - Admin</title>

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
               class="flex items-center gap-3 px-4 py-3 rounded-lg
                      text-gray-600 hover:bg-soft-green hover:text-primary transition">

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
               class="flex items-center gap-3 px-4 py-3 rounded-lg
                      text-gray-600 hover:bg-soft-green hover:text-primary transition">

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
               class="flex items-center gap-3 px-4 py-3 rounded-lg
                      text-gray-600 hover:bg-soft-green hover:text-primary transition">

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


            <!-- UMPAN BALIK ACTIVE -->
            <a href="umpan_balik.php"
               class="flex items-center gap-3 px-4 py-3 rounded-lg
                      bg-soft-green text-primary font-medium">

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
               class="flex items-center gap-3 px-4 py-3 rounded-lg
                      text-gray-600 hover:bg-soft-green hover:text-primary transition">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     stroke-width="1.8">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2
                             M9 11a4 4 0 100-8 4 4 0 000 8
                             M19 8v6m3-3h-6"/>

                </svg>

                <span>Siswa</span>

            </a>


            <!-- KATEGORI -->
            <a href="kategori.php"
               class="flex items-center gap-3 px-4 py-3 rounded-lg
                      text-gray-600 hover:bg-soft-green hover:text-primary transition">

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
                   class="flex items-center gap-3 px-4 py-3 rounded-lg
                          text-gray-600 hover:bg-red-50 hover:text-red-500 transition">

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
                    Kelola tanggapan untuk pengaduan siswa
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
                              d="M20 21a8 8 0 00-16 0M12 13a4 4 0 100-8 4 4 0 000 8z"/>

                    </svg>

                </div>

            </div>

        </header>


        <!-- CONTENT -->
        <section class="p-8">

            <!-- TITLE -->
            <div class="mb-6">

                <h3 class="text-2xl font-semibold text-gray-800">
                    Daftar Umpan Balik
                </h3>

                <p class="text-sm text-gray-500 mt-1">
                    Berikan tanggapan terhadap aspirasi yang telah ditangani.
                </p>

            </div>


            <!-- FILTER -->
            <div class="bg-white border border-gray-200 rounded-xl p-6 mb-6">

                <div class="flex items-center gap-2 mb-5">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-5 h-5 text-primary"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.8">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M3 5h18M6 12h12M10 19h4"/>

                    </svg>

                    <h4 class="font-semibold text-gray-800">
                        Filter

                    </h4>

                </div>


                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                    <!-- TANGGAL -->
                    <div>

                        <label class="block text-sm font-medium
                                      text-gray-600 mb-2">

                            Tanggal

                        </label>

                        <input type="date"
                               class="w-full border border-gray-300
                                      rounded-lg px-3 py-2.5 text-sm
                                      focus:outline-none
                                      focus:ring-2 focus:ring-green-200
                                      focus:border-primary">

                    </div>


                    <!-- STATUS -->
                    <div>

                        <label class="block text-sm font-medium
                                      text-gray-600 mb-2">

                            Status

                        </label>

                        <select
                            class="w-full border border-gray-300
                                   rounded-lg px-3 py-2.5 text-sm
                                   focus:outline-none
                                   focus:ring-2 focus:ring-green-200
                                   focus:border-primary">

                            <option>Semua Status</option>
                            <option>Belum Diberi Umpan Balik</option>
                            <option>Sudah Diberi Umpan Balik</option>

                        </select>

                    </div>


                    <!-- SISWA -->
                    <div>

                        <label class="block text-sm font-medium
                                      text-gray-600 mb-2">

                            Siswa

                        </label>

                        <select
                            class="w-full border border-gray-300
                                   rounded-lg px-3 py-2.5 text-sm
                                   focus:outline-none
                                   focus:ring-2 focus:ring-green-200
                                   focus:border-primary">

                            <option>Semua Siswa</option>
                            <option>Ahmad Fauzan</option>
                            <option>Siti Rahma</option>
                            <option>Budi Setiawan</option>

                        </select>

                    </div>

                </div>


                <div class="flex gap-3 mt-5">

                    <button
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
                                  d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"/>

                        </svg>

                        Terapkan Filter

                    </button>


                    <button
                        class="px-5 py-2.5 border border-gray-300
                               text-gray-600 rounded-lg text-sm
                               hover:bg-gray-50 transition">

                        Reset

                    </button>

                </div>

            </div>


            <!-- TABLE -->
            <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">

                <div class="px-6 py-5 border-b border-gray-200">

                    <h4 class="font-semibold text-gray-800">
                        Aspirasi
                    </h4>

                    <p class="text-sm text-gray-400 mt-1">
                        Daftar aspirasi yang dapat diberikan umpan balik.
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
                                    Aspirasi
                                </th>

                                <th class="text-left px-6 py-4 font-medium">
                                    Siswa
                                </th>

                                <th class="text-left px-6 py-4 font-medium">
                                    Status
                                </th>

                                <th class="text-left px-6 py-4 font-medium">
                                    Umpan Balik
                                </th>

                                <th class="text-left px-6 py-4 font-medium">
                                    Tanggal
                                </th>

                                <th class="text-center px-6 py-4 font-medium">
                                    Aksi
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-gray-100">


                            <!-- DATA 1 -->
                            <tr class="hover:bg-gray-50">

                                <td class="px-6 py-4">
                                    1
                                </td>

                                <td class="px-6 py-4">

                                    <p class="font-medium text-gray-800">
                                        Lampu Kelas Mati
                                    </p>

                                    <p class="text-xs text-gray-400 mt-1">
                                        Kelistrikan
                                    </p>

                                </td>

                                <td class="px-6 py-4">
                                    Ahmad Fauzan
                                </td>

                                <td class="px-6 py-4">

                                    <span class="px-3 py-1 rounded-full
                                                 text-xs bg-green-50 text-green-600">

                                        Selesai

                                    </span>

                                </td>

                                <td class="px-6 py-4">

                                    <span class="px-3 py-1 rounded-full
                                                 text-xs bg-green-50 text-green-600">

                                        Sudah Diberikan

                                    </span>

                                </td>

                                <td class="px-6 py-4 text-gray-500">
                                    27-08-2026
                                </td>

                                <td class="px-6 py-4 text-center">

                                    <button
                                        class="inline-flex items-center gap-2
                                               px-3 py-2 rounded-lg
                                               border border-gray-200
                                               text-gray-600
                                               hover:bg-gray-50 transition">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-4 h-4"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor"
                                             stroke-width="1.8">

                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M15.232 5.232l3.536 3.536M4 20h4l10.768-10.768a2.5 2.5 0 00-3.536-3.536L4.464 16.464A2 2 0 004 18v2z"/>

                                        </svg>

                                        Lihat

                                    </button>

                                </td>

                            </tr>


                            <!-- DATA 2 -->
                            <tr class="hover:bg-gray-50">

                                <td class="px-6 py-4">
                                    2
                                </td>

                                <td class="px-6 py-4">

                                    <p class="font-medium text-gray-800">
                                        Keran Air Bocor
                                    </p>

                                    <p class="text-xs text-gray-400 mt-1">
                                        Fasilitas
                                    </p>

                                </td>

                                <td class="px-6 py-4">
                                    Budi Setiawan
                                </td>

                                <td class="px-6 py-4">

                                    <span class="px-3 py-1 rounded-full
                                                 text-xs bg-green-50 text-green-600">

                                        Selesai

                                    </span>

                                </td>

                                <td class="px-6 py-4">

                                    <span class="px-3 py-1 rounded-full
                                                 text-xs bg-yellow-50 text-yellow-600">

                                        Belum Diberikan

                                    </span>

                                </td>

                                <td class="px-6 py-4 text-gray-500">
                                    27-08-2026
                                </td>

                                <td class="px-6 py-4 text-center">

                                    <button
                                        class="inline-flex items-center gap-2
                                               px-3 py-2 rounded-lg
                                               bg-primary text-white
                                               hover:bg-primary-dark transition">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-4 h-4"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor"
                                             stroke-width="1.8">

                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M12 20h9M16.5 3.5a2.121 2.121 0 013 3L7 19l-4 1 1-4L16.5 3.5z"/>

                                        </svg>

                                        Beri Umpan Balik

                                    </button>

                                </td>

                            </tr>


                            <!-- DATA 3 -->
                            <tr class="hover:bg-gray-50">

                                <td class="px-6 py-4">
                                    3
                                </td>

                                <td class="px-6 py-4">

                                    <p class="font-medium text-gray-800">
                                        Kursi Rusak
                                    </p>

                                    <p class="text-xs text-gray-400 mt-1">
                                        Fasilitas
                                    </p>

                                </td>

                                <td class="px-6 py-4">
                                    Siti Rahma
                                </td>

                                <td class="px-6 py-4">

                                    <span class="px-3 py-1 rounded-full
                                                 text-xs bg-blue-50 text-blue-600">

                                        Diproses

                                    </span>

                                </td>

                                <td class="px-6 py-4">

                                    <span class="px-3 py-1 rounded-full
                                                 text-xs bg-gray-100 text-gray-500">

                                        Belum Tersedia

                                    </span>

                                </td>

                                <td class="px-6 py-4 text-gray-500">
                                    28-08-2026
                                </td>

                                <td class="px-6 py-4 text-center">

                                    <button
                                        disabled
                                        class="inline-flex items-center gap-2
                                               px-3 py-2 rounded-lg
                                               bg-gray-100 text-gray-400
                                               cursor-not-allowed">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-4 h-4"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor"
                                             stroke-width="1.8">

                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M12 15v2m0-8v2m0-6a9 9 0 110 18 9 9 0 010-18z"/>

                                        </svg>

                                        Belum Selesai

                                    </button>

                                </td>

                            </tr>

                        </tbody>

                    </table>

                </div>


                <!-- PAGINATION -->
                <div class="px-6 py-4 border-t border-gray-200
                            flex items-center justify-between">

                    <p class="text-sm text-gray-500">
                        Menampilkan 1–3 dari 3 aspirasi
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
                                   rounded-lg text-sm text-gray-600
                                   hover:bg-gray-50">

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