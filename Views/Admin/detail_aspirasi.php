<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Detail Aspirasi - Admin</title>

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


            <!-- ASPIRASI ACTIVE -->
            <a href="daftar_aspirasi.php"
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


            <!-- UMPAN BALIK -->
            <a href="umpan_balik.php"
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
                    Detail Aspirasi
                </h2>

                <p class="text-sm text-gray-400">
                    Detail dan penanganan pengaduan siswa
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

            <!-- BACK -->
            <div class="mb-5">

                <a href="#"
                   class="inline-flex items-center gap-2 text-sm
                          text-gray-500 hover:text-primary transition">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-4 h-4"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor"
                         stroke-width="1.8">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M19 12H5m6 6l-6-6 6-6"/>

                    </svg>

                    Kembali ke Aspirasi

                </a>

            </div>


            <!-- TITLE -->
            <div class="mb-6">

                <h3 class="text-2xl font-semibold text-gray-800">
                    Lampu Kelas Mati
                </h3>

                <p class="text-sm text-gray-500 mt-1">
                    Detail pengaduan yang disampaikan oleh siswa
                </p>

            </div>


            <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">


                <!-- LEFT CONTENT -->
                <div class="xl:col-span-2 space-y-6">


                    <!-- INFORMASI ASPIRASI -->
                    <div class="bg-white border border-gray-200 rounded-xl">

                        <div class="px-6 py-5 border-b border-gray-200">

                            <h4 class="font-semibold text-gray-800">
                                Informasi Aspirasi
                            </h4>

                        </div>


                        <div class="p-6">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                                <!-- SISWA -->
                                <div>

                                    <p class="text-xs text-gray-400 mb-1">
                                        Nama Siswa
                                    </p>

                                    <p class="text-sm font-medium text-gray-800">
                                        Ahmad Fauzan
                                    </p>

                                </div>


                                <!-- NIS -->
                                <div>

                                    <p class="text-xs text-gray-400 mb-1">
                                        NIS
                                    </p>

                                    <p class="text-sm font-medium text-gray-800">
                                        1001
                                    </p>

                                </div>


                                <!-- KELAS -->
                                <div>

                                    <p class="text-xs text-gray-400 mb-1">
                                        Kelas
                                    </p>

                                    <p class="text-sm font-medium text-gray-800">
                                        XI RPL 1
                                    </p>

                                </div>


                                <!-- KATEGORI -->
                                <div>

                                    <p class="text-xs text-gray-400 mb-1">
                                        Kategori
                                    </p>

                                    <p class="text-sm font-medium text-gray-800">
                                        Kelistrikan
                                    </p>

                                </div>


                                <!-- LOKASI -->
                                <div>

                                    <p class="text-xs text-gray-400 mb-1">
                                        Lokasi
                                    </p>

                                    <p class="text-sm font-medium text-gray-800">
                                        Ruang XI RPL 1
                                    </p>

                                </div>


                                <!-- TANGGAL -->
                                <div>

                                    <p class="text-xs text-gray-400 mb-1">
                                        Tanggal Pengaduan
                                    </p>

                                    <p class="text-sm font-medium text-gray-800">
                                        25 Agustus 2026
                                    </p>

                                </div>


                                <!-- PRIORITAS -->
                                <div>

                                    <p class="text-xs text-gray-400 mb-1">
                                        Prioritas
                                    </p>

                                    <span class="inline-block px-3 py-1
                                                 rounded-full text-xs
                                                 bg-red-50 text-red-600">
                                        Tinggi
                                    </span>

                                </div>


                                <!-- STATUS -->
                                <div>

                                    <p class="text-xs text-gray-400 mb-1">
                                        Status Saat Ini
                                    </p>

                                    <span class="inline-block px-3 py-1
                                                 rounded-full text-xs
                                                 bg-blue-50 text-blue-600">
                                        Diproses
                                    </span>

                                </div>

                            </div>


                            <!-- KETERANGAN -->
                            <div class="mt-6 pt-6 border-t border-gray-100">

                                <p class="text-xs text-gray-400 mb-2">
                                    Keterangan Aspirasi
                                </p>

                                <p class="text-sm text-gray-600 leading-6">
                                    Lampu di ruang kelas tidak menyala
                                    sehingga ruangan menjadi kurang terang
                                    ketika digunakan untuk kegiatan belajar.
                                </p>

                            </div>


                            <!-- BUKTI FOTO -->
                            <div class="mt-6">

                                <p class="text-xs text-gray-400 mb-3">
                                    Bukti Foto
                                </p>

                                <div class="w-56 h-36 bg-gray-100 rounded-lg
                                            flex items-center justify-center
                                            border border-gray-200">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="w-8 h-8 text-gray-400"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor"
                                         stroke-width="1.5">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M4 5h16a1 1 0 011 1v12a1 1 0 01-1 1H4a1 1 0 01-1-1V6a1 1 0 011-1z"/>

                                        <circle cx="8.5"
                                                cy="9"
                                                r="1.5"/>

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              d="M21 15l-5-5L5 19"/>

                                    </svg>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- PROGRES -->
                    <div class="bg-white border border-gray-200 rounded-xl">

                        <div class="px-6 py-5 border-b border-gray-200">

                            <h4 class="font-semibold text-gray-800">
                                Progres Penanganan
                            </h4>

                            <p class="text-sm text-gray-400 mt-1">
                                Perkembangan penanganan aspirasi
                            </p>

                        </div>


                        <div class="p-6">

                            <div class="space-y-6">

                                <!-- DIPROSES -->
                                <div class="flex gap-4">

                                    <div class="w-8 h-8 rounded-full
                                                bg-primary text-white
                                                flex items-center justify-center
                                                flex-shrink-0">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="w-4 h-4"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor"
                                             stroke-width="2">

                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  d="M5 12l4 4L19 6"/>

                                        </svg>

                                    </div>

                                    <div>

                                        <p class="font-medium text-gray-800 text-sm">
                                            Diproses
                                        </p>

                                        <p class="text-xs text-gray-400 mt-1">
                                            25 Agustus 2026
                                        </p>

                                        <p class="text-sm text-gray-500 mt-2">
                                            Laporan telah diterima dan sedang
                                            diproses oleh admin.
                                        </p>

                                    </div>

                                </div>


                                <!-- DIPERBAIKI -->
                                <div class="flex gap-4">

                                    <div class="w-8 h-8 rounded-full
                                                border-2 border-gray-200
                                                flex items-center justify-center
                                                flex-shrink-0">

                                        <span class="w-2 h-2 rounded-full bg-gray-300"></span>

                                    </div>

                                    <div>

                                        <p class="font-medium text-gray-400 text-sm">
                                            Diperbaiki
                                        </p>

                                        <p class="text-sm text-gray-400 mt-1">
                                            Belum dilakukan
                                        </p>

                                    </div>

                                </div>


                                <!-- SELESAI -->
                                <div class="flex gap-4">

                                    <div class="w-8 h-8 rounded-full
                                                border-2 border-gray-200
                                                flex items-center justify-center
                                                flex-shrink-0">

                                        <span class="w-2 h-2 rounded-full bg-gray-300"></span>

                                    </div>

                                    <div>

                                        <p class="font-medium text-gray-400 text-sm">
                                            Selesai
                                        </p>

                                        <p class="text-sm text-gray-400 mt-1">
                                            Belum dilakukan
                                        </p>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <!-- RIGHT CONTENT -->
                <div class="space-y-6">


                    <!-- PENANGANAN -->
                    <div class="bg-white border border-gray-200 rounded-xl">

                        <div class="px-6 py-5 border-b border-gray-200">

                            <h4 class="font-semibold text-gray-800">
                                Penanganan Aspirasi
                            </h4>

                            <p class="text-sm text-gray-400 mt-1">
                                Perbarui status pengaduan
                            </p>

                        </div>


                        <div class="p-6">

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

                                    <option selected>
                                        Diproses
                                    </option>

                                    <option>
                                        Diperbaiki
                                    </option>

                                    <option>
                                        Selesai
                                    </option>

                                </select>

                            </div>


                            <!-- KETERANGAN -->
                            <div class="mt-5">

                                <label class="block text-sm font-medium
                                              text-gray-600 mb-2">

                                    Keterangan Progres

                                </label>

                                <textarea
                                    rows="5"
                                    placeholder="Masukkan keterangan progres..."
                                    class="w-full border border-gray-300
                                           rounded-lg px-3 py-2.5 text-sm
                                           resize-none
                                           focus:outline-none
                                           focus:ring-2 focus:ring-green-200
                                           focus:border-primary"></textarea>

                            </div>


                            <!-- BUTTON -->
                            <button
                                class="w-full mt-5 py-2.5
                                       bg-primary hover:bg-primary-dark
                                       text-white rounded-lg text-sm
                                       font-medium transition">

                                Simpan Perubahan

                            </button>

                        </div>

                    </div>


                    <!-- UMPAN BALIK -->
                    <div class="bg-white border border-gray-200 rounded-xl">

                        <div class="px-6 py-5 border-b border-gray-200">

                            <h4 class="font-semibold text-gray-800">
                                Umpan Balik
                            </h4>

                            <p class="text-sm text-gray-400 mt-1">
                                Berikan tanggapan kepada siswa
                            </p>

                        </div>


                        <div class="p-6">

                            <label class="block text-sm font-medium
                                          text-gray-600 mb-2">

                                Umpan Balik Admin

                            </label>

                            <textarea
                                rows="5"
                                placeholder="Tuliskan umpan balik untuk siswa..."
                                class="w-full border border-gray-300
                                       rounded-lg px-3 py-2.5 text-sm
                                       resize-none
                                       focus:outline-none
                                       focus:ring-2 focus:ring-green-200
                                       focus:border-primary"></textarea>


                            <button
                                class="w-full mt-4 py-2.5
                                       border border-primary
                                       text-primary hover:bg-soft-green
                                       rounded-lg text-sm
                                       font-medium transition">

                                Kirim Umpan Balik

                            </button>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </main>

</div>



</body>
</html>